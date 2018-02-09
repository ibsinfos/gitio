<?php
/**
 * The template to display default site footer
 *
 * @package WordPress
 * @subpackage TRANSLANG
 * @since TRANSLANG 1.0.10
 */

$translang_footer_scheme =  translang_is_inherit(translang_get_theme_option('footer_scheme')) ? translang_get_theme_option('color_scheme') : translang_get_theme_option('footer_scheme');
$translang_footer_id = str_replace('footer-custom-', '', translang_get_theme_option("footer_style"));
?>
<footer class="footer_wrap footer_custom footer_custom_<?php echo esc_attr($translang_footer_id); 
						?> footer_custom_<?php echo esc_attr(sanitize_title(get_the_title($translang_footer_id))); 
						?> scheme_<?php echo esc_attr($translang_footer_scheme); 
						?>">
	<?php
    // Custom footer's layout
    do_action('translang_action_show_layout', $translang_footer_id);
	?>
</footer><!-- /.footer_wrap -->
