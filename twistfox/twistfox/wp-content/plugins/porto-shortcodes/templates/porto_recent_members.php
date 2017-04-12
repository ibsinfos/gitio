<?php
$output = $title = $view = $overview = $socials = $number = $cat = $cats = $items_desktop = $items_tablets = $items_mobile = $animation_type = $animation_duration = $animation_delay = $el_class = '';
extract(shortcode_atts(array(
    'title' => '',
    'view' => 'classic',
    'overview' => true,
    'socials' => true,
    'number' => 8,
    'cats' => '',
    'cat' => '',
    'items_desktop' => 4,
    'items_tablets' => 3,
    'items_mobile' => 2,
    'animation_type' => '',
    'animation_duration' => 1000,
    'animation_delay' => 0,
    'el_class' => ''
), $atts));

$options = array();
$options['themeConfig'] = true;
$options['lg'] = (int)$items_desktop;
$options['md'] = (int)$items_tablets;
$options['sm'] = (int)$items_mobile;
$options = json_encode($options);

$args = array(
    'post_type' => 'member',
    'posts_per_page' => $number
);

if (!$cats)
    $cats = $cat;

if ($cats) {
    $cat = explode(',', $cats);
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'member_cat',
            'field' => 'term_id',
            'terms' => $cat,
        )
    );
}

$posts = new WP_Query($args);

if ($posts->have_posts()) {
    $el_class = porto_shortcode_extract_class( $el_class );

    $output = '<div class="porto-recent-members wpb_content_element ' . $el_class . '"';
    if ($animation_type) {
        $output .= ' data-appear-animation="'.$animation_type.'"';
        if ($animation_delay)
            $output .= ' data-appear-animation-delay="'.$animation_delay.'"';
        if ($animation_duration && $animation_duration != 1000)
            $output .= ' data-appear-animation-duration="'.$animation_duration.'"';
    }
    $output .= '>';

    $output .= porto_shortcode_widget_title( array( 'title' => $title, 'extraclass' => '' ) );

    global $porto_member_view, $porto_member_overview, $porto_member_socials;

    $porto_member_view = $view;
    $porto_member_overview = $overview ? 'yes' : 'no';
    $porto_member_socials = $socials ? 'yes' : 'no';

    ob_start();
    ?>
    <div class="row">
        <div class="member-carousel porto-carousel owl-carousel" data-plugin-options="<?php echo esc_attr($options) ?>">
            <?php
            while ($posts->have_posts()) {
                $posts->the_post();
                global $previousday;
                unset($previousday);

                echo '<div class="member-slide">';

                get_template_part('content', 'member-item');

                echo '</div>';
            }
            ?>
        </div>
    </div>
    <?php
    $output .= ob_get_clean();

    $porto_member_view = '';
    $porto_member_overview = '';
    $porto_member_socials = '';

    $output .= '</div>';

    echo $output;
}

wp_reset_postdata();