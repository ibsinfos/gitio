<?php

/**
 * Define variables
 */

define('porto_lib',                   get_template_directory() . '/inc');                     // library directory
define('porto_admin',                 porto_lib . '/admin');                    // admin directory
define('porto_plugins',               porto_lib . '/plugins');                  // plugins directory
define('porto_content_types',         porto_lib . '/content_types');            // content_types directory
define('porto_menu',                  porto_lib . '/menu');                     // menu directory
define('porto_functions',             porto_lib . '/functions');                // functions directory
define('porto_options_dir',           porto_admin . '/theme_options');                // options directory

define('porto_dir',                   get_template_directory());                  // template directory
define('porto_uri',                   get_template_directory_uri());              // template directory uri
define('porto_css',                   porto_uri . '/css');                      // css uri

define('porto_js',                    porto_uri . '/js');                       // javascript uri
define('porto_plugins_uri',           porto_uri . '/inc/plugins');              // plugins uri
define('porto_options_uri',           porto_uri . '/inc/admin/theme_options');        // plugins uri

$theme = wp_get_theme();
define('porto_version',               '3.0.3');                    // get current version

/**
 * Wordpress theme check
 */
// set content width
if ( ! isset( $content_width ) ) $content_width = 900;

/**
 * Porto content types functions
 */

require_once(porto_functions . '/content_type.php');

/**
 * Porto functions
 */
require_once(porto_functions . '/functions.php');

/**
 * Menu
 */
require_once(porto_menu . '/menu.php');

/**
 * Content Types
 */
require_once(porto_content_types . '/content_types.php');

/**
 * Install Plugins
 */
require_once(porto_plugins . '/plugins.php');

/**
 * Theme support & Theme setup
 */
// theme setup
if ( ! function_exists( 'porto_setup' ) ) :
    function porto_setup() {

        add_theme_support( "title-tag" );
        //add_theme_support( "custom-header", array() );
        //add_theme_support( 'custom-background', array() );
        add_editor_style( array( 'style.css', 'style_rtl.css' ) );

        if ( defined( 'WOOCOMMERCE_VERSION' ) ) {
            if ( version_compare( WOOCOMMERCE_VERSION, "2.1" ) >= 0 ) {
                add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
            } else {
                define( 'WOOCOMMERCE_USE_CSS', false );
            }
        }

        // translation
        load_theme_textdomain('porto', porto_dir.'/languages');
        load_child_theme_textdomain('porto', get_stylesheet_directory().'/languages');

        /**
         * Porto admin options
         */
        require_once(porto_admin . '/admin.php');

        global $porto_settings;

        // default rss feed links
        add_theme_support('automatic-feed-links');

        // add support for post thumbnails
        add_theme_support( 'post-thumbnails' );

        // add image sizes
        add_image_size( 'blog-large', 1140, 445, true );
        add_image_size( 'blog-medium', 463, 348, true );
        add_image_size( 'related-post', (isset($porto_settings['post-related-image-size']) && (int)$porto_settings['post-related-image-size']['width']) ? (int)$porto_settings['post-related-image-size']['width'] : 450, (isset($porto_settings['post-related-image-size']) && (int)$porto_settings['post-related-image-size']['height']) ? (int)$porto_settings['post-related-image-size']['height'] : 231, true );

        if (isset($porto_settings['enable-portfolio']) && $porto_settings['enable-portfolio']) {
            add_image_size( 'portfolio-grid-one', 1140, 595, true );
            add_image_size( 'portfolio-grid-two', 560, 560, true );
            add_image_size( 'portfolio-grid', 367, 367, true );
            add_image_size( 'portfolio-full', 1140, 595, true );
            add_image_size( 'portfolio-large', 560, 367, true );
            add_image_size( 'portfolio-medium', 367, 367, true );
            add_image_size( 'portfolio-timeline', 560, 560, true );
            add_image_size( 'related-portfolio', 367, 367, true );
        }

        if (isset($porto_settings['enable-member']) && $porto_settings['enable-member']) {
            add_image_size( 'member-two', 560, 560, true );
            add_image_size( 'member', 367, 367, true );
        }

        add_image_size( 'widget-thumb-medium', 85, 85, true );
        add_image_size( 'widget-thumb', 50, 50, true );

        // woocommerce support
        add_theme_support('woocommerce');

        // allow shortcodes in widget text
        add_filter('widget_text', 'do_shortcode');

        // register menus
        register_nav_menus( array(
            'main_menu' => __('Main Menu', 'porto'),
            'sidebar_menu' => __('Sidebar Menu', 'porto'),
            'top_nav' => __('Top Navigation', 'porto'),
            'view_switcher' => __('View Switcher', 'porto'),
            'currency_switcher' => __('Currency Switcher', 'porto')
        ));

        // add post formats
        add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio', 'chat'));

        // disable master slider woocommerce product slider
        $options = get_option( 'msp_woocommerce' );

        if ( isset( $options ) && isset($options['enable_single_product_slider'] ) && $options['enable_single_product_slider'] == 'on' ) {
            $options['enable_single_product_slider'] = '';
            update_option('msp_woocommerce', $options);
        }
    }
endif;
add_action( 'after_setup_theme', 'porto_setup' );

/**
 * Enqueue css, js files
 */
add_action('wp_enqueue_scripts',    'porto_css', 1000);
add_action('wp_enqueue_scripts',    'porto_scripts', 1000);
add_action('admin_enqueue_scripts', 'porto_admin_css', 1000);
add_action('admin_enqueue_scripts', 'porto_admin_scripts', 1000);
add_action( 'wp_footer',            'porto_footer_hook', 1 );

function porto_css() {

    // deregister plugin styles
    wp_dequeue_style( 'font-awesome' );
    wp_dequeue_style( 'yith-wcwl-font-awesome' );
    wp_dequeue_style( 'bsf-Simple-Line-Icons' );

    // load visual composer styles
    if (!wp_style_is('js_composer_front'))
        wp_enqueue_style('js_composer_front');

    // load ultimate addons default js
    $bsf_options = get_option('bsf_options');
    $ultimate_global_scripts = (isset($bsf_options['ultimate_global_scripts'])) ? $bsf_options['ultimate_global_scripts'] : false;
    if ($ultimate_global_scripts !== 'enable') {
        $ultimate_css = get_option('ultimate_css');
        if ($ultimate_css == "enable") {
            if (!wp_style_is('ultimate-style-min'))
                wp_enqueue_style('ultimate-style-min');
        } else {
            if (!wp_style_is('ultimate-style'))
                wp_enqueue_style('ultimate-style');
        }
    }

    global $porto_settings;

    // bootstrap styles
    wp_deregister_style( 'porto-bootstrap' );
    if (is_rtl()) {
        $css_file = porto_dir.'/css/bootstrap_rtl_'.porto_get_blog_id().'.css';
        if (file_exists($css_file)) {
            wp_register_style( 'porto-bootstrap', porto_uri.'/css/bootstrap_rtl_'.porto_get_blog_id().'.css?ver=' . porto_version );
        } else {
            wp_register_style( 'porto-bootstrap', porto_uri.'/css/bootstrap_rtl.css?ver=' . porto_version );
        }
    } else {
        $css_file = porto_dir.'/css/bootstrap_'.porto_get_blog_id().'.css';
        if (file_exists($css_file)) {
            wp_register_style( 'porto-bootstrap', porto_uri.'/css/bootstrap_'.porto_get_blog_id().'.css?ver=' . porto_version );
        } else {
            wp_register_style( 'porto-bootstrap', porto_uri.'/css/bootstrap.css?ver=' . porto_version );
        }
    }
    wp_enqueue_style( 'porto-bootstrap' );

    // plugins styles
    wp_deregister_style( 'porto-plugins' );
    if (is_rtl()) {
        $css_file = porto_dir.'/css/plugins_rtl_'.porto_get_blog_id().'.css';
        if (file_exists($css_file)) {
            wp_register_style( 'porto-plugins', porto_uri.'/css/plugins_rtl_'.porto_get_blog_id().'.css?ver=' . porto_version );
        } else {
            wp_register_style( 'porto-plugins', porto_uri.'/css/plugins_rtl.css?ver=' . porto_version );
        }
    } else {
        $css_file = porto_dir.'/css/plugins_'.porto_get_blog_id().'.css';
        if (file_exists($css_file)) {
            wp_register_style( 'porto-plugins', porto_uri.'/css/plugins_'.porto_get_blog_id().'.css?ver=' . porto_version );
        } else {
            wp_register_style( 'porto-plugins', porto_uri.'/css/plugins.css?ver=' . porto_version );
        }
    }
    wp_enqueue_style( 'porto-plugins' );

    // porto styles
    // elements styles
    wp_deregister_style( 'porto-theme-elements' );
    if (is_rtl()) {
        $css_file = porto_dir.'/css/theme_rtl_elements_'.porto_get_blog_id().'.css';
        if (file_exists($css_file)) {
            wp_register_style( 'porto-theme-elements', porto_uri.'/css/theme_rtl_elements_'.porto_get_blog_id().'.css?ver=' . porto_version );
        } else {
            wp_register_style( 'porto-theme-elements', porto_uri.'/css/theme_rtl_elements.css?ver=' . porto_version );
        }
    } else {
        $css_file = porto_dir.'/css/theme_elements_'.porto_get_blog_id().'.css';
        if (file_exists($css_file)) {
            wp_register_style( 'porto-theme-elements', porto_uri.'/css/theme_elements_'.porto_get_blog_id().'.css?ver=' . porto_version );
        } else {
            wp_register_style( 'porto-theme-elements', porto_uri.'/css/theme_elements.css?ver=' . porto_version );
        }
    }
    wp_enqueue_style( 'porto-theme-elements' );

    // default styles
    wp_deregister_style( 'porto-theme' );
    if (is_rtl()) {
        $css_file = porto_dir.'/css/theme_rtl_'.porto_get_blog_id().'.css';
        if (file_exists($css_file)) {
            wp_register_style( 'porto-theme', porto_uri.'/css/theme_rtl_'.porto_get_blog_id().'.css?ver=' . porto_version );
        } else {
            wp_register_style( 'porto-theme', porto_uri.'/css/theme_rtl.css?ver=' . porto_version );
        }
    } else {
        $css_file = porto_dir.'/css/theme_'.porto_get_blog_id().'.css';
        if (file_exists($css_file)) {
            wp_register_style( 'porto-theme', porto_uri.'/css/theme_'.porto_get_blog_id().'.css?ver=' . porto_version );
        } else {
            wp_register_style( 'porto-theme', porto_uri.'/css/theme.css?ver=' . porto_version );
        }
    }
    wp_enqueue_style( 'porto-theme' );

    // woocommerce styles
    if (class_exists('WooCommerce')) {
        wp_deregister_style( 'porto-theme-shop' );
        if (is_rtl()) {
            $css_file = porto_dir.'/css/theme_rtl_shop_'.porto_get_blog_id().'.css';
            if (file_exists($css_file)) {
                wp_register_style( 'porto-theme-shop', porto_uri.'/css/theme_rtl_shop_'.porto_get_blog_id().'.css?ver=' . porto_version );
            } else {
                wp_register_style( 'porto-theme-shop', porto_uri.'/css/theme_rtl_shop.css?ver=' . porto_version );
            }
        } else {
            $css_file = porto_dir.'/css/theme_shop_'.porto_get_blog_id().'.css';
            if (file_exists($css_file)) {
                wp_register_style( 'porto-theme-shop', porto_uri.'/css/theme_shop_'.porto_get_blog_id().'.css?ver=' . porto_version );
            } else {
                wp_register_style( 'porto-theme-shop', porto_uri.'/css/theme_shop.css?ver=' . porto_version );
            }
        }
        wp_enqueue_style( 'porto-theme-shop' );
    }

    // bbpress, buddypress styles
    if (class_exists('bbPress') || class_exists('BuddyPress')) {
        wp_deregister_style( 'porto-theme-bbpress' );
        if (is_rtl()) {
            $css_file = porto_dir.'/css/theme_rtl_bbpress_'.porto_get_blog_id().'.css';
            if (file_exists($css_file)) {
                wp_register_style( 'porto-theme-bbpress', porto_uri.'/css/theme_rtl_bbpress_'.porto_get_blog_id().'.css?ver=' . porto_version );
            } else {
                wp_register_style( 'porto-theme-bbpress', porto_uri.'/css/theme_rtl_bbpress.css?ver=' . porto_version );
            }
        } else {
            $css_file = porto_dir.'/css/theme_bbpress_'.porto_get_blog_id().'.css';
            if (file_exists($css_file)) {
                wp_register_style( 'porto-theme-bbpress', porto_uri.'/css/theme_bbpress_'.porto_get_blog_id().'.css?ver=' . porto_version );
            } else {
                wp_register_style( 'porto-theme-bbpress', porto_uri.'/css/theme_bbpress.css?ver=' . porto_version );
            }
        }
        wp_enqueue_style( 'porto-theme-bbpress' );
    }

    // skin styles
    wp_deregister_style( 'porto-skin' );
    if (is_rtl()) {
        $css_file = porto_dir.'/css/skin_rtl_'.porto_get_blog_id().'.css';
        if (file_exists($css_file)) {
            wp_register_style( 'porto-skin', porto_uri.'/css/skin_rtl_'.porto_get_blog_id().'.css?ver=' . porto_version );
        } else {
            wp_register_style( 'porto-skin', porto_uri.'/css/skin_rtl.css?ver=' . porto_version );
        }
    } else {
        $css_file = porto_dir.'/css/skin_'.porto_get_blog_id().'.css';
        if (file_exists($css_file)) {
            wp_register_style( 'porto-skin', porto_uri.'/css/skin_'.porto_get_blog_id().'.css?ver=' . porto_version );
        } else {
            wp_register_style( 'porto-skin', porto_uri.'/css/skin.css?ver=' . porto_version );
        }
    }
    wp_enqueue_style( 'porto-skin' );

    // custom styles
    wp_deregister_style( 'porto-style' );
    wp_register_style( 'porto-style', porto_uri . '/style.css' );
    wp_enqueue_style( 'porto-style' );

    if (is_rtl()) {
        wp_deregister_style( 'porto-style-rtl' );
        wp_register_style( 'porto-style-rtl', porto_uri . '/style_rtl.css' );
        wp_enqueue_style( 'porto-style-rtl' );
    }

    // Load Google Fonts
    $gfont = array();
    $fonts = array('body', 'alt', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'menu', 'menu-side', 'menu-popup');
    foreach ($fonts as $option) {
        if (isset($porto_settings[$option.'-font']['google']) && $porto_settings[$option.'-font']['google'] !== 'false') {
            $font = urlencode($porto_settings[$option.'-font']['font-family']);
            if (!in_array($font, $gfont))
                $gfont[] = $font;
        }
    }

    $font_family = '';
    foreach ($gfont as $font)
        $font_family .= $font . ':300,300italic,400,400italic,600,600italic,700,700italic,800,800italic%7C';

    if ($font_family) {
        $charsets = '';
        if (isset($porto_settings['select-google-charsets']) && isset($porto_settings['select-google-charsets']) && isset($porto_settings['google-charsets']) && $porto_settings['google-charsets']) {
            $i = 0;
            foreach ($porto_settings['google-charsets'] as $charset) {
                if ($i == 0) $charsets .= $charset;
                else $charsets .= ",".$charset;
                $i++;
            }
            if ($charsets)
                $charsets = "&amp;subset=" . $charsets;
        }
        wp_register_style( 'porto-google-fonts', "//fonts.googleapis.com/css?family=" . $font_family . $charsets );
        wp_enqueue_style( 'porto-google-fonts' );
    }

    global $wp_styles;
    wp_deregister_style( 'porto-ie' );
    wp_register_style( 'porto-ie', porto_uri.'/css/ie.css?ver=' . porto_version );
    wp_enqueue_style( 'porto-ie' );
    $wp_styles->add_data( 'porto-ie', 'conditional', 'lt IE 10' );

    if ( current_user_can( 'edit_theme_options' ) ) {
        // admin style
        wp_enqueue_style('porto_admin_bar', porto_css . '/admin_bar.css', false, porto_version, 'all');
    }

    porto_enqueue_revslider_css();
    porto_enqueue_custom_css();
}

function porto_scripts() {
    global $porto_settings;

    if (!is_admin() && !in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ) )) {
        wp_reset_postdata();

        // comment reply
        if ( is_singular() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }

        // load wc variation script
        wp_enqueue_script( 'wc-add-to-cart-variation' );

        // load visual composer default js
        if (!wp_script_is('wpb_composer_front_js')) {
            wp_enqueue_script('wpb_composer_front_js');
        }

        // load ultimate addons default js
        $bsf_options = get_option('bsf_options');
        $ultimate_global_scripts = (isset($bsf_options['ultimate_global_scripts'])) ? $bsf_options['ultimate_global_scripts'] : false;
        if ($ultimate_global_scripts !== 'enable') {
            $isAjax = false;
            $ultimate_ajax_theme = get_option('ultimate_ajax_theme');
            if ($ultimate_ajax_theme == 'enable')
                $isAjax = true;
            $ultimate_js = get_option('ultimate_js', 'disable');
            $bsf_dev_mode = (isset($bsf_options['dev_mode'])) ? $bsf_options['dev_mode'] : false;
            if (($ultimate_js == 'enable' || $isAjax == true) && ($bsf_dev_mode != 'enable') ) {
                if (!wp_script_is('ultimate-script')) {
                    wp_enqueue_script('ultimate-script');
                }
            }
        }

        // porto scripts
        wp_deregister_script( 'porto-plugins' );
        wp_register_script( 'porto-plugins', porto_js .'/plugins'.(WP_DEBUG?'':'.min').'.js', array('jquery', 'jquery-migrate'), porto_version, false );
        wp_enqueue_script( 'porto-plugins' );

        // load porto theme js file

        wp_deregister_script( 'porto-theme' );
        wp_register_script( 'porto-theme', porto_js .'/theme'.(WP_DEBUG?'':'.min').'.js', array('jquery'), porto_version, true );
        wp_enqueue_script( 'porto-theme' );

        // compatible check with product filter plugin
        $js_wc_prdctfltr = false;
        if (class_exists('WC_Prdctfltr')) {
            $porto_settings['category-ajax'] = false;
            if ( get_option( 'wc_settings_prdctfltr_use_ajax', 'no' ) == 'yes' ) {
                $js_wc_prdctfltr = true;
            }
        }

        $sticky_header = porto_get_meta_value('sticky_header');
        $show_sticky_header = false;
        if ('no' !== $sticky_header && ('yes' === $sticky_header || ('yes' !== $sticky_header && $porto_settings['enable-sticky-header']))) {
            $show_sticky_header = true;
        }

        wp_localize_script( 'porto-theme', 'js_porto_vars', array(
            'rtl' => esc_js(is_rtl() ? true : false),
            'ajax_url' => esc_js(admin_url( 'admin-ajax.php' )),
            'change_logo' => esc_js($porto_settings['change-header-logo']),
            'container_width' => esc_js($porto_settings['container-width']),
            'grid_gutter_width' => esc_js($porto_settings['grid-gutter-width']),
            'show_sticky_header' => esc_js($show_sticky_header),
            'show_sticky_header_tablet' => esc_js($porto_settings['enable-sticky-header-tablet']),
            'show_sticky_header_mobile' => esc_js($porto_settings['enable-sticky-header-mobile']),
            'ajax_loader_url' => esc_js(str_replace(array('http:', 'https'), array('', ''), porto_uri . '/images/ajax-loader@2x.gif')),
            'category_ajax' => esc_js($porto_settings['category-ajax']),
            'prdctfltr_ajax' => esc_js($js_wc_prdctfltr),
            'show_minicart' => esc_js($porto_settings['show-minicart']),
            'slider_loop' => esc_js($porto_settings['slider-loop']),
            'slider_autoplay' => esc_js($porto_settings['slider-autoplay']),
            'slider_autoheight' => esc_js($porto_settings['slider-autoheight']),
            'slider_speed' => esc_js($porto_settings['slider-speed']),
            'slider_nav' => esc_js($porto_settings['slider-nav']),
            'slider_nav_hover' => esc_js($porto_settings['slider-nav-hover']),
            'slider_margin' => esc_js($porto_settings['slider-margin']),
            'slider_dots' => esc_js($porto_settings['slider-dots']),
            'slider_animatein' => esc_js($porto_settings['slider-animatein']),
            'slider_animateout' => esc_js($porto_settings['slider-animateout']),
            'product_thumbs_count' => esc_js($porto_settings['product-thumbs-count']),
            'product_zoom' => esc_js($porto_settings['product-zoom']),
            'product_zoom_mobile' => esc_js($porto_settings['product-zoom-mobile']),
            'product_image_popup' => esc_js($porto_settings['product-image-popup']),
            'zoom_type' => esc_js($porto_settings['zoom-type']),
            'zoom_scroll' => esc_js($porto_settings['zoom-scroll']),
            'zoom_lens_size' => esc_js($porto_settings['zoom-lens-size']),
            'zoom_lens_shape' => esc_js($porto_settings['zoom-lens-shape']),
            'zoom_contain_lens' => esc_js($porto_settings['zoom-contain-lens']),
            'zoom_lens_border' => esc_js($porto_settings['zoom-lens-border']),
            'zoom_border_color' => esc_js($porto_settings['zoom-border-color']),
            'zoom_border' => esc_js($porto_settings['zoom-type'] == 'inner' ? 0 : $porto_settings['zoom-border']),
            'screen_lg' => esc_js($porto_settings['container-width'] + $porto_settings['grid-gutter-width']),
            'mfp_counter' => esc_js(__('%curr% of %total%', 'porto')),
            'mfp_img_error' => esc_js(__('<a href="%url%">The image</a> could not be loaded.', 'porto')),
            'mfp_ajax_error' => esc_js(__('<a href="%url%">The content</a> could not be loaded.', 'porto')),
            'popup_close' => esc_js(__('Close', 'porto')),
            'popup_prev' => esc_js(__('Previous', 'porto')),
            'popup_next' => esc_js(__('Next', 'porto')),
            'request_error' => esc_js(__('The requested content cannot be loaded.<br/>Please try again later.', 'porto'))
        ) );
    }
}

function porto_admin_css() {
    // simple line icon font
    wp_dequeue_style( 'bsf-Simple-Line-Icons' );
    wp_dequeue_style( 'porto_shortcodes_simpleline' );
    wp_enqueue_style('porto-sli-font', porto_css . '/Simple-Line-Icons/Simple-Line-Icons.css', false, porto_version, 'all');

    // wp default styles
    wp_enqueue_style( 'wp-color-picker' );

    // admin style
    wp_enqueue_style('porto_admin', porto_css . '/admin.css', false, porto_version, 'all');
    wp_enqueue_style('porto_admin_bar', porto_css . '/admin_bar.css', false, porto_version, 'all');

    porto_enqueue_revslider_css();
}

function porto_admin_scripts() {
    if (function_exists('add_thickbox'))
        add_thickbox();

    wp_enqueue_media();

    wp_register_script('porto-admin', porto_js.'/admin.js', array('common', 'jquery', 'media-upload', 'thickbox', 'wp-color-picker'), porto_version, true);
    wp_enqueue_script('porto-admin');

    wp_localize_script( 'porto-admin', 'js_porto_admin_vars', array(
        'import_options_msg' => __('If you want to import demo, please backup current theme options in "Import / Export" section before import. Do you want to import demo?', 'porto'),
        'theme_option_url' => admin_url('admin.php?page=porto_settings')
    ) );
}

// Disable the WordPress Admin Bar for all but admins
if (! current_user_can('edit_posts')):
    show_admin_bar(false);
endif;

function porto_footer_hook() {
    add_filter('style_loader_tag', 'porto_style_loader_tag');
}

function porto_style_loader_tag($tag) {
    return str_replace("rel='stylesheet'", "rel='stylesheet' property='stylesheet'", $tag);
}

function porto_enqueue_custom_css() {
    global $porto_settings;

    $logo_width = (isset($porto_settings['logo-width']) && (int)$porto_settings['logo-width']) ? (int)$porto_settings['logo-width'] : 170;
    $logo_width_wide = (isset($porto_settings['logo-width-wide']) && (int)$porto_settings['logo-width-wide']) ? (int)$porto_settings['logo-width-wide'] : 250;
    $logo_width_tablet = (isset($porto_settings['logo-width-tablet']) && (int)$porto_settings['logo-width-tablet']) ? (int)$porto_settings['logo-width-tablet'] : 110;
    $logo_width_mobile = (isset($porto_settings['logo-width-mobile']) && (int)$porto_settings['logo-width-mobile']) ? (int)$porto_settings['logo-width-mobile'] : 110;
    $logo_width_sticky = (isset($porto_settings['logo-width-sticky']) && (int)$porto_settings['logo-width-sticky']) ? (int)$porto_settings['logo-width-sticky'] : 80;
    ?><style rel="stylesheet" property="stylesheet" type="text/css">.ms-loading-container .ms-loading, .ms-slide .ms-slide-loading { background-image: none !important; background-color: transparent !important; box-shadow: none !important; } #header .logo { max-width: <?php
        echo $logo_width ?>px; } @media (min-width: <?php echo ($porto_settings['container-width'] + $porto_settings['grid-gutter-width']) ?>px) { #header .logo { max-width: <?php
        echo $logo_width_wide ?>px; } } @media (max-width: 991px) { #header .logo { max-width: <?php
        echo $logo_width_tablet ?>px; } } @media (max-width: 767px) { #header .logo { max-width: <?php
        echo $logo_width_mobile ?>px; } } <?php if ($porto_settings['change-header-logo']) : ?>#header.sticky-header .logo { max-width: <?php
        echo $logo_width_sticky * 1.25 ?>px; }<?php endif; ?></style><?php
}

function porto_enqueue_revslider_css() {
    global $porto_settings;

    $style = '';
    if ($porto_settings['skin-color']) {
        $style = '.tparrows:before{color:' . $porto_settings['skin-color'] . ';text-shadow:0 0 3px #fff;}';
    }
    $style .= '.revslider-initialised .tp-loader{z-index:18;}';

    wp_add_inline_style('rs-plugin-settings', $style);
}


/* Customized By Gaurav */
//Example with enclosed content: [display_form_frontend]content[/display_form_frontend]
function display_form( $atts, $content = "" ) {
    $formString = '';
    if(($content)==""){
        $formString .= '<div class="form_in_modal">';
    }
	//return "content = $content";
	//echo get_the_post_thumbnail( $post_id, 'thumbnail', array( 'class' => 'alignleft' ) );
    $formString .= '<form onsubmit="return validateForm()" method="post" action="' . site_url() . '/free-assessment/" id="assesment" name="assesment">

    <h3>Visa Assessment</h3>
    <div class="frrasse_bg">
        <div class="fr_txt"><span>01</span><p>Where do you live?</p></div>
        <div class="drp_dwn_pnl">
         <select id="living" class="drpDwnlst residingcountry" name="residingcountry">
            <option value="" label="Select your country of residence" selected="selected">Select your country of residence</option>
            <option value="United Kingdom">United Kingdom</option>
            <option value="Afghanistan">Afghanistan</option><option value="4">Albania</option>
            <option value="Algeria">Algeria</option>
            <option value="American Samoa">American Samoa</option>
            <option value="Andorra">Andorra</option>
            <option value="Angola">Angola</option>
            <option value="Anguilla">Anguilla</option>
            <option value="Antarctica">Antarctica</option>
            <option value="Antigua and/or Barbuda">Antigua and/or Barbuda</option>
            <option value="Argentina">Argentina</option>
            <option value="Armenia">Armenia</option>
            <option value="Aruba">Aruba</option>
            <option value="Australia">Australia</option>
            <option value="Austria">Austria</option>
            <option value="Azerbaijan">Azerbaijan</option>
            <option value="Bahamas">Bahamas</option>
            <option value="Bahrain">Bahrain</option>
            <option value="Bangladesh">Bangladesh</option>
            <option value="Barbados">Barbados</option>
            <option value="Belarus">Belarus</option>
            <option value="Belgium">Belgium</option>
            <option value="Belize">Belize</option>
            <option value="Benin">Benin</option>
            <option value="Bermuda">Bermuda</option>
            <option value="Bhutan">Bhutan</option>
            <option value="Bolivia">Bolivia</option>
            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
            <option value="Botswana">Botswana</option>
            <option value="Bouvet Island">Bouvet Island</option>
            <option value="Brazil">Brazil</option>
            <option value="British lndian Ocean Territory">British lndian Ocean Territory</option>
            <option value="Brunei Darussalam">Brunei Darussalam</option>
            <option value="Bulgaria">Bulgaria</option>
            <option value="Burkina Faso">Burkina Faso</option>
            <option value="Burundi">Burundi</option>
            <option value="Cambodia">Cambodia</option>
            <option value="Cameroon">Cameroon</option>
            <option value="Canada">Canada</option>
            <option value="Cape Verde">Cape Verde</option>
            <option value="Cayman Islands">Cayman Islands</option>
            <option value="Central African Republic">Central African Republic</option>
            <option value="Chad">Chad</option>
            <option value="Chile">Chile</option>
            <option value="China">China</option>
            <option value="Christmas Island">Christmas Island</option>
            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
            <option value="Colombia">Colombia</option>
            <option value="Comoros">Comoros</option>
            <option value="Congo">Congo</option>
            <option value="Cook Islands">Cook Islands</option>
            <option value="Costa Rica">Costa Rica</option>
            <option value="Croatia (Hrvatska)">Croatia (Hrvatska)</option>
            <option value="Cuba">Cuba</option>
            <option value="Cyprus">Cyprus</option>
            <option value="Czech Republic">Czech Republic</option>
            <option value="Denmark">Denmark</option>
            <option value="Djibouti">Djibouti</option>
            <option value="Dominica">Dominica</option>
            <option value="Dominican Republic">Dominican Republic</option>
            <option value="East Timor">East Timor</option>
            <option value="Ecudaor">Ecudaor</option>
            <option value="Egypt">Egypt</option>
            <option value="El Salvador">El Salvador</option>
            <option value="Equatorial Guinea">Equatorial Guinea</option>
            <option value="Eritrea">Eritrea</option>
            <option value="Estonia">Estonia</option>
            <option value="Ethiopia">Ethiopia</option>
            <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
            <option value="Faroe Islands">Faroe Islands</option>
            <option value="Fiji">Fiji</option>
            <option value="Finland">Finland</option>
            <option value="France">France</option>
            <option value="France, Metropolitan">France, Metropolitan</option>
            <option value="French Guiana">French Guiana</option>
            <option value="French Polynesia">French Polynesia</option>
            <option value="French Southern Territories">French Southern Territories</option>
            <option value="Gabon">Gabon</option>
            <option value="Gambia">Gambia</option>
            <option value="Georgia">Georgia</option>
            <option value="Germany">Germany</option>
            <option value="Ghana">Ghana</option>
            <option value="Gibraltar">Gibraltar</option>
            <option value="Greece">Greece</option>
            <option value="Greenland">Greenland</option>
            <option value="Grenada">Grenada</option>
            <option value="Guadeloupe">Guadeloupe</option>
            <option value="Guam">Guam</option>
            <option value="Guatemala">Guatemala</option>
            <option value="Guinea">Guinea</option>
            <option value="Guinea-Bissau">Guinea-Bissau</option>
            <option value="Guyana">Guyana</option>
            <option value="Haiti">Haiti</option>
            <option value="Heard and Mc Donald Islands">Heard and Mc Donald Islands</option>
            <option value="Honduras">Honduras</option><option value="Hong Kong">Hong Kong</option><option value="Hungary">Hungary</option>
            <option value="Iceland">Iceland</option>
            <option value="India">India</option>
            <option value="Indonesia">Indonesia</option>
            <option value="Iran (Islamic Republic of)">Iran (Islamic Republic of)</option>
            <option value="Iraq">Iraq</option><option value="Ireland">Ireland</option>
            <option value="Israel">Israel</option><option value="Italy">Italy</option>
            <option value="Ivory Coast">Ivory Coast</option>
            <option value="Jamaica">Jamaica</option><option value="Japan">Japan</option><option value="Jordan">Jordan</option>
            <option value="Kazakhstan">Kazakhstan</option><option value="Kenya">Kenya</option>
            <option value="Kiribati">Kiribati</option><option value="Korea, Democratic People&#39;s Republic of">Korea, Democratic People&#39;s Republic of</option>
            <option value="Korea, Republic of">Korea, Republic of</option><option value="Kuwait">Kuwait</option>
            <option value="Kyrgyzstan">Kyrgyzstan</option><option value="Lao People&#39;s Democratic Republic">Lao People&#39;s Democratic Republic</option>
            <option value="Latvia">Latvia</option><option value="Lebanon">Lebanon</option><option value="Lesotho">Lesotho</option>
            <option value="Liberia">Liberia</option><option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
            <option value="Liechtenstein">Liechtenstein</option><option value="Lithuania">Lithuania</option><option value="Luxembourg">Luxembourg</option>
            <option value="Macau">Macau</option><option value="Macedonia">Macedonia</option><option value="Madagascar">Madagascar</option>
            <option value="Malawi">Malawi</option><option value="Malaysia">Malaysia</option>
            <option value="Maldives">Maldives</option><option value="Mali">Mali</option>
            <option value="Malta">Malta</option>
            <option value="Marshall Islands">Marshall Islands</option>
            <option value="Martinique">Martinique</option>
            <option value="Mauritania">Mauritania</option>
            <option value="Mauritius">Mauritius</option><option value="Mayotte">Mayotte</option>
            <option value="Mexico">Mexico</option><option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
            <option value="Moldova, Republic of">Moldova, Republic of</option><option value="Monaco">Monaco</option><option value="Mongolia">Mongolia</option>
            <option value="Montserrat">Montserrat</option><option value="Morocco">Morocco</option><option value="Mozambique">Mozambique</option>
            <option value="Myanmar">Myanmar</option><option value="Namibia">Namibia</option><option value="Nauru">Nauru</option><option value="Nepal">Nepal</option>
            <option value="Netherlands">Netherlands</option><option value="Netherlands Antilles">Netherlands Antilles</option>
            <option value="New Caledonia">New Caledonia</option><option value="New Zealand">New Zealand</option><option value="Nicaragua">Nicaragua</option>
            <option value="Niger">Niger</option><option value="Nigeria">Nigeria</option><option value="Niue">Niue</option><option value="Norfork Island">Norfork Island</option>
            <option value="Northern Mariana Islands">Northern Mariana Islands</option><option value="Norway">Norway</option><option value="Oman">Oman</option>
            <option value="Pakistan">Pakistan</option><option value="Palau">Palau</option><option value="Panama">Panama</option>
            <option value="Papua New Guinea">Papua New Guinea</option><option value="Paraguay">Paraguay</option>
            <option value="Peru">Peru</option><option value="Philippines">Philippines</option><option value="Pitcairn">Pitcairn</option>
            <option value="Poland">Poland</option><option value="Portugal">Portugal</option><option value="Puerto Rico">Puerto Rico</option>
            <option value="Qatar">Qatar</option><option value="Reunion">Reunion</option><option value="Romania">Romania</option>
            <option value="Russian Federation">Russian Federation</option><option value="Rwanda">Rwanda</option>
            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option><option value="Saint Lucia">Saint Lucia</option>
            <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option><option value="Samoa">Samoa</option>
            <option value="San Marino">San Marino</option><option value="Sao Tome and Principe">Sao Tome and Principe</option>
            <option value="Saudi Arabia">Saudi Arabia</option><option value="Schengen">Schengen</option><option value="Senegal">Senegal</option>
            <option value="Seychelles">Seychelles</option><option value="Sierra Leone">Sierra Leone</option>
            <option value="Singapore">Singapore</option><option value="Slovakia">Slovakia</option><option value="Slovenia">Slovenia</option>
            <option value="Solomon Islands">Solomon Islands</option><option value="Somalia">Somalia</option><option value="South Africa">South Africa</option>
            <option value="South Georgia South Sandwich Islands">South Georgia South Sandwich Islands</option><option value="Spain">Spain</option>
            <option value="Sri Lanka">Sri Lanka</option><option value="St. Helena">St. Helena</option><option value="St. Pierre and Miquelon">St. Pierre and Miquelon</option>
            <option value="Sudan">Sudan</option><option value="Suriname">Suriname</option><option value="Svalbarn and Jan Mayen Islands">Svalbarn and Jan Mayen Islands</option>
            <option value="Swaziland">Swaziland</option><option value="Sweden">Sweden</option><option value="Switzerland">Switzerland</option>
            <option value="Syrian Arab Republic">Syrian Arab Republic</option><option value="Taiwan">Taiwan</option><option value="Tajikistan">Tajikistan</option>
            <option value="Tanzania, United Republic of">Tanzania, United Republic of</option><option value="Thailand">Thailand</option><option value="Togo">Togo</option>
            <option value="Tokelau">Tokelau</option><option value="Tonga">Tonga</option><option value="Trinidad and Tobago">Trinidad and Tobago</option>
            <option value="Tunisia">Tunisia</option><option value="Turkey">Turkey</option><option value="Turkmenistan">Turkmenistan</option>
            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option><option value="Tuvalu">Tuvalu</option><option value="Uganda">Uganda</option>
            <option value="Ukraine">Ukraine</option><option value="United Arab Emirates">United Arab Emirates</option>
            <option value="United Kingdom">United Kingdom</option><option value="United States">United States</option><option value="United States minor outlying islands">United States minor outlying islands</option>
            <option value="Uruguay">Uruguay</option><option value="Uzbekistan">Uzbekistan</option><option value="Vanuatu">Vanuatu</option>
            <option value="Vatican City State">Vatican City State</option><option value="Venezuela">Venezuela</option><option value="Vietnam">Vietnam</option>
            <option value="Virgin Islands (U.S.)">Virgin Islands (U.S.)</option><option value="Virigan Islands (British)">Virigan Islands (British)</option>
            <option value="Wallis and Futuna Islands">Wallis and Futuna Islands</option><option value="Western Sahara">Western Sahara</option>
            <option value="Yemen">Yemen</option><option value="Yugoslavia">Yugoslavia</option><option value="Zaire">Zaire</option><option value="Zambia">Zambia</option>
            <option value="Zimbabwe">Zimbabwe</option>                
        </select>
                    
        </div>
        
    </div>
    <div class="frrasse_bg1">
        <div class="fr_txt"><span>02</span><p>Where do you want to go?</p></div>
        <div class="drp_dwn_pnl">
            <select name="destinationcountry" id="select" class="drpDwnlst destinationcountry">
                <option value="" label="Select your country of choice" selected="selected">Select your country of choice</option>
                <option value="Australia">Australia</option>
                <option value="Canada">Canada</option>
                <option value="Denmark">Denmark</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="usa">USA</option> 
                <option value="newzealand">New Zealand</option>  
                <option value="others">Others</option>               
            </select>
        </div>
    </div>
    <div class="button-back">
        <button name="go" class="btn green btn-primary go">Go</button> 

    </div>

</form>
<script>
function validateForm() {

	var residing = document.forms["assesment"]["residingcountry"].value;
	var destination = document.forms["assesment"]["destinationcountry"].value;
    if ((residing == null || residing == "") || (destination == null || destination == "")) {
        alert("Please select your country");
        return false;
    }
}
</script>';
if(($content)==""){
        $formString .= '</div>';
    }

	//return '<div class="vc_col-sm-8">'.get_the_post_thumbnail( $post_id, 'thumbnail', array( 'class' => 'alignleft' ) ).'</div><div class="vc_col-sm-4">'.$formString.'</div>';
    
    return $formString;
}
add_shortcode( 'display_form_frontend', 'display_form' );

function global_widget_areas(){
		    register_sidebar(
		    	array(
			        'name' => __( 'News Page', 'theme-slug' ),
			        'id' => 'sidebar-1',
			        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
			        'before_widget' => '<li id="%1$s" class="widget %2$s">',
					'after_widget'  => '</li>',
					'before_title'  => '<h2 class="widgettitle">',
					'after_title'   => '</h2>',
			    )

		    );
		}
add_action( 'widgets_init', 'global_widget_areas'  );