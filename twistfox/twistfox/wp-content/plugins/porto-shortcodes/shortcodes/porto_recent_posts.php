<?php

// Porto Recent Posts
add_shortcode('porto_recent_posts', 'porto_shortcode_recent_posts');
add_action('vc_after_init', 'porto_load_recent_posts_shortcode');

function porto_shortcode_recent_posts($atts, $content = null) {
    ob_start();
    if ($template = porto_shortcode_template('porto_recent_posts'))
        include $template;
    return ob_get_clean();
}

function porto_load_recent_posts_shortcode() {
    $animation_type = porto_vc_animation_type();
    $animation_duration = porto_vc_animation_duration();
    $animation_delay = porto_vc_animation_delay();
    $custom_class = porto_vc_custom_class();

    vc_map( array(
        'name' => "Porto " . __('Recent Posts', 'porto-shortcodes'),
        'base' => 'porto_recent_posts',
        'category' => __('Porto', 'porto-shortcodes'),
        'icon' => 'porto_vc_recent_posts',
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => __("Title", 'porto-shortcodes'),
                "param_name" => "title",
                "admin_label" => true
            ),
            array(
                "type" => "dropdown",
                "heading" => __("View Type", 'porto-shortcodes'),
                "param_name" => "view",
                'std' => '',
                "value" => array(
                    __('Standard', 'porto-shortcodes' ) => '',
                    __('Read More Link', 'porto-shortcodes' ) => 'style-1',
                    __('Post Meta', 'porto-shortcodes' ) => 'style-2',
                    __('Read More Button', 'porto-shortcodes' ) => 'style-3',
                    __('Side Image', 'porto-shortcodes' ) => 'style-4',
                ),
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Button Style", 'porto-shortcodes'),
                "param_name" => "btn_style",
                'dependency' => array('element' => 'view','value' => array( 'style-3' )),
                'std' => '',
                "value" => array(
                    __('Standard', 'porto-shortcodes' ) => '',
                    __('Normal', 'porto-shortcodes' ) => 'btn-normal',
                    __('Borders', 'porto-shortcodes' ) => 'btn-borders',
                ),
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Button Size", 'porto-shortcodes'),
                "param_name" => "btn_size",
                'dependency' => array('element' => 'view','value' => array( 'style-3' )),
                'std' => '',
                "value" => array(
                    __('Standard', 'porto-shortcodes' ) => '',
                    __('Normal', 'porto-shortcodes' ) => 'btn-normal',
                    __('Small', 'porto-shortcodes' ) => 'btn-sm',
                    __('Extra Small', 'porto-shortcodes' ) => 'btn-xs',
                ),
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Button Color", 'porto-shortcodes'),
                "param_name" => "btn_color",
                'dependency' => array('element' => 'view','value' => array( 'style-3' )),
                'std' => '',
                "value" => array(
                    __('Standard', 'porto-shortcodes' ) => '',
                    __('Default', 'porto-shortcodes' ) => 'btn-default',
                    __('Primary', 'porto-shortcodes' ) => 'btn-primary',
                    __('Secondary', 'porto-shortcodes' ) => 'btn-secondary',
                    __('Tertiary', 'porto-shortcodes' ) => 'btn-tertiary',
                    __('Quaternary', 'porto-shortcodes' ) => 'btn-quaternary',
                    __('Dark', 'porto-shortcodes' ) => 'btn-dark',
                    __('Light', 'porto-shortcodes' ) => 'btn-light',
                ),
            ),
            array(
                "type" => "textfield",
                "heading" => __("Image Size", 'porto-shortcodes'),
                "param_name" => "image_size",
                'std' => '',
                'description' => __('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'js_composer')
            ),
            array(
                "type" => "textfield",
                "heading" => __("Posts Count", 'porto-shortcodes'),
                "param_name" => "number",
                "value" => "8",
                "admin_label" => true
            ),
            array(
                "type" => "textfield",
                "heading" => __("Category IDs", 'porto-shortcodes'),
                "param_name" => "cats",
                "admin_label" => true
            ),
            array(
                'type' => 'checkbox',
                'heading' => __( 'Show Post Image', 'porto-shortcodes' ),
                'param_name' => 'show_image',
                'std' => 'yes',
                'value' => array( __( 'Yes', 'js_composer' ) => 'yes' )
            ),
            array(
                "type" => "textfield",
                "heading" => __("Items to show on Desktop", 'porto-shortcodes'),
                "param_name" => "items_desktop",
                "value" => "4"
            ),
            array(
                "type" => "textfield",
                "heading" => __("Items to show on Tablets", 'porto-shortcodes'),
                "param_name" => "items_tablets",
                "value" => "3"
            ),
            array(
                "type" => "textfield",
                "heading" => __("Items to show on Mobile", 'porto-shortcodes'),
                "param_name" => "items_mobile",
                "value" => "2"
            ),
            $custom_class,
            $animation_type,
            $animation_duration,
            $animation_delay
        )
    ) );

    if (!class_exists('WPBakeryShortCode_Porto_Recent_Posts')) {
        class WPBakeryShortCode_Porto_Recent_Posts extends WPBakeryShortCode {
        }
    }
}