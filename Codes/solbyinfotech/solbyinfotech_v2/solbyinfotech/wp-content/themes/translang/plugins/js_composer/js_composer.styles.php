<?php
// Add plugin-specific colors and fonts to the custom CSS
if ( !function_exists( 'translang_vc_get_css' ) ) {
	add_filter( 'translang_filter_get_css', 'translang_vc_get_css', 10, 4 );
	function translang_vc_get_css($css, $colors, $fonts, $scheme='') {
		if (isset($css['fonts']) && $fonts) {
			$css['fonts'] .= <<<CSS
.vc_tta.vc_tta-accordion .vc_tta-panel-title .vc_tta-title-text {
	{$fonts['p_font-family']}
}
.vc_progress_bar.vc_progress_bar_narrow .vc_single_bar .vc_label .vc_label_units {
	{$fonts['info_font-family']}
}

CSS;
		}

		if (isset($css['colors']) && $colors) {
			$css['colors'] .= <<<CSS

/* Row and columns */
.scheme_self.vc_section,
.scheme_self.wpb_row,
.scheme_self.wpb_column > .vc_column-inner > .wpb_wrapper,
.scheme_self.wpb_text_column {
	color: {$colors['text']};
}
.scheme_self.vc_section[data-vc-full-width="true"],
.scheme_self.wpb_row[data-vc-full-width="true"],
.scheme_self.wpb_column > .vc_column-inner > .wpb_wrapper,
.scheme_self.wpb_text_column {
	background-color: {$colors['bg_color']};
}
.scheme_self.vc_row.vc_parallax[class*="scheme_"] .vc_parallax-inner:before {
	background-color: {$colors['bg_color_08']};
}

/* Accordion */
.vc_tta.vc_tta-accordion .vc_tta-panel-heading .vc_tta-controls-icon {
	color: {$colors['inverse_link']};
	background-color: {$colors['text_dark']};
}
.vc_tta.vc_tta-accordion .vc_active .vc_tta-panel-heading {
	// background-color: {$colors['text_hover']}!important;
}
.vc_tta.vc_tta-accordion .vc_active .vc_tta-panel-heading a{
	// color: {$colors['bg_color']}!important;
}
.vc_tta.vc_tta-accordion .vc_tta-panel-heading .vc_tta-controls-icon:before,
.vc_tta.vc_tta-accordion .vc_tta-panel-heading .vc_tta-controls-icon:after {
	border-color: {$colors['inverse_link']};
	background-color: {$colors['text_hover']};
}
.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-title > a {
	color: {$colors['text_dark']};
}
.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-title > a,
.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-title > a:hover {
	color: {$colors['text_hover']};
}
.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-title > a .vc_tta-controls-icon,
.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-title > a:hover .vc_tta-controls-icon {
	color: {$colors['inverse_link']};
	background-color: {$colors['text_link']};
}

.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-title > a .vc_tta-controls-icon:before,
.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-title > a .vc_tta-controls-icon:after {
	border-color: {$colors['inverse_link']};
}
.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-title > a:hover .vc_tta-controls-icon:before {
	color: {$colors['text_hover']};
}
.vc_tta.vc_tta-accordion .vc_tta-panel:not(.vc_active) .vc_tta-panel-heading .vc_tta-panel-title > a:hover .vc_tta-controls-icon:before, 
.vc_tta.vc_tta-accordion .vc_tta-panel:not(.vc_active) .vc_tta-panel-heading .vc_tta-panel-title > a:hover .vc_tta-controls-icon:after {
	background-color: {$colors['bg_color']};
}



.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-title > a:hover .vc_tta-controls-icon:before {
	color: {$colors['bg_color']};
}

.wpb-js-composer .vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading,
.vc_general.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading {
	background-color: {$colors['alter_bg_color']};
}
.wpb-js-composer .vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading:hover,
.vc_general.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading:hover {
	background-color: {$colors['alter_bg_color']};
}
.wpb-js-composer .vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading a,
.vc_general.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading a{
	color: {$colors['text_dark']};
}

.wpb-js-composer .vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-heading,
.vc_general.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-heading {
	background-color: {$colors['text_hover']};
}
.wpb-js-composer .vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-heading a,
.vc_general.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-heading a{
	color: {$colors['bg_color']};
}




/* Tabs */
.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tabs-list .vc_tta-tab > a {
	color: {$colors['inverse_link']};
	background-color: {$colors['text_dark']};
}
.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tabs-list .vc_tta-tab > a:hover,
.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tabs-list .vc_tta-tab.vc_active > a {
	color: {$colors['inverse_hover']};
	background-color: {$colors['text_link']};
}

/* Separator */
.vc_separator.vc_sep_color_grey .vc_sep_line {
	border-color: {$colors['bd_color']};
}

/* Progress bar */
.vc_progress_bar.vc_progress_bar_narrow .vc_single_bar {
	background-color: {$colors['alter_bg_color']};
}
.vc_progress_bar.vc_progress_bar_narrow .vc_single_bar .vc_bar {
	background-color: {$colors['text_link']};
}
.vc_progress_bar.vc_progress_bar_narrow .vc_single_bar .vc_label {
	color: {$colors['text_dark']};
}
.vc_progress_bar.vc_progress_bar_narrow .vc_single_bar .vc_label .vc_label_units {
	color: {$colors['text_light']};
}
.scheme_dark .vc_progress_bar.vc_progress_bar_narrow .vc_single_bar {
	background-color: {$colors['inverse_light']};
}
.scheme_dark .vc_progress_bar.vc_progress_bar_narrow .vc_single_bar .vc_bar {
	background-color: {$colors['text_link']};
}
.scheme_dark .vc_progress_bar.vc_progress_bar_narrow .vc_single_bar .vc_label {
	color: {$colors['bg_color']};
}
.scheme_dark .vc_progress_bar.vc_progress_bar_narrow .vc_single_bar .vc_label .vc_label_units {
	color: {$colors['text_light']};
}

CSS;
		}

		return $css;
	}
}
?>
