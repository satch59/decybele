<?php

if (!function_exists('mixtape_qodef_search_opener_icon_size')) {

	function mixtape_qodef_search_opener_icon_size()
	{

		if (mixtape_qodef_options()->getOptionValue('header_search_icon_size')) {
			echo mixtape_qodef_dynamic_css('.qodef-search-opener, .qodef-header-standard .qodef-search-opener', array(
				'font-size' => mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('header_search_icon_size')) . 'px'
			));
		}

	}

	add_action('mixtape_qodef_style_dynamic', 'mixtape_qodef_search_opener_icon_size');

}

if (!function_exists('mixtape_qodef_search_opener_icon_colors')) {

	function mixtape_qodef_search_opener_icon_colors()
	{

		if (mixtape_qodef_options()->getOptionValue('header_search_icon_color') !== '') {
			echo mixtape_qodef_dynamic_css('.qodef-search-opener', array(
				'color' => mixtape_qodef_options()->getOptionValue('header_search_icon_color')
			));
		}

		if (mixtape_qodef_options()->getOptionValue('header_search_icon_hover_color') !== '') {
			echo mixtape_qodef_dynamic_css('.qodef-search-opener:hover', array(
				'color' => mixtape_qodef_options()->getOptionValue('header_search_icon_hover_color')
			));
		}

		if (mixtape_qodef_options()->getOptionValue('header_light_search_icon_color') !== '') {
			echo mixtape_qodef_dynamic_css('.qodef-light-header .qodef-page-header > div:not(.qodef-sticky-header) .qodef-search-opener,
			.qodef-light-header.qodef-header-style-on-scroll .qodef-page-header .qodef-search-opener,
			.qodef-light-header .qodef-top-bar .qodef-search-opener', array(
				'color' => mixtape_qodef_options()->getOptionValue('header_light_search_icon_color') . ' !important'
			));
		}

		if (mixtape_qodef_options()->getOptionValue('header_light_search_icon_hover_color') !== '') {
			echo mixtape_qodef_dynamic_css('.qodef-light-header .qodef-page-header > div:not(.qodef-sticky-header) .qodef-search-opener:hover,
			.qodef-light-header.qodef-header-style-on-scroll .qodef-page-header .qodef-search-opener:hover,
			.qodef-light-header .qodef-top-bar .qodef-search-opener:hover', array(
				'color' => mixtape_qodef_options()->getOptionValue('header_light_search_icon_hover_color') . ' !important'
			));
		}

		if (mixtape_qodef_options()->getOptionValue('header_dark_search_icon_color') !== '') {
			echo mixtape_qodef_dynamic_css('.qodef-dark-header .qodef-page-header > div:not(.qodef-sticky-header) .qodef-search-opener,
			.qodef-dark-header.qodef-header-style-on-scroll .qodef-page-header .qodef-search-opener,
			.qodef-dark-header .qodef-top-bar .qodef-search-opener', array(
				'color' => mixtape_qodef_options()->getOptionValue('header_dark_search_icon_color') . ' !important'
			));
		}
		if (mixtape_qodef_options()->getOptionValue('header_dark_search_icon_hover_color') !== '') {
			echo mixtape_qodef_dynamic_css('.qodef-dark-header .qodef-page-header > div:not(.qodef-sticky-header) .qodef-search-opener:hover,
			.qodef-dark-header.qodef-header-style-on-scroll .qodef-page-header .qodef-search-opener:hover,
			.qodef-dark-header .qodef-top-bar .qodef-search-opener:hover', array(
				'color' => mixtape_qodef_options()->getOptionValue('header_dark_search_icon_hover_color') . ' !important'
			));
		}

	}

	add_action('mixtape_qodef_style_dynamic', 'mixtape_qodef_search_opener_icon_colors');

}

if (!function_exists('mixtape_qodef_search_opener_icon_background_colors')) {

	function mixtape_qodef_search_opener_icon_background_colors()
	{

		if (mixtape_qodef_options()->getOptionValue('search_icon_background_color') !== '') {
			echo mixtape_qodef_dynamic_css('.qodef-search-opener', array(
				'background-color' => mixtape_qodef_options()->getOptionValue('search_icon_background_color')
			));
		}

		if (mixtape_qodef_options()->getOptionValue('search_icon_background_hover_color') !== '') {
			echo mixtape_qodef_dynamic_css('.qodef-search-opener:hover', array(
				'background-color' => mixtape_qodef_options()->getOptionValue('search_icon_background_hover_color')
			));
		}

	}

	add_action('mixtape_qodef_style_dynamic', 'mixtape_qodef_search_opener_icon_background_colors');
}

if (!function_exists('mixtape_qodef_search_opener_text_styles')) {

	function mixtape_qodef_search_opener_text_styles()
	{
		$text_styles = array();

		if (mixtape_qodef_options()->getOptionValue('search_icon_text_color') !== '') {
			$text_styles['color'] = mixtape_qodef_options()->getOptionValue('search_icon_text_color');
		}
		if (mixtape_qodef_options()->getOptionValue('search_icon_text_fontsize') !== '') {
			$text_styles['font-size'] = mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('search_icon_text_fontsize')) . 'px';
		}
		if (mixtape_qodef_options()->getOptionValue('search_icon_text_lineheight') !== '') {
			$text_styles['line-height'] = mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('search_icon_text_lineheight')) . 'px';
		}
		if (mixtape_qodef_options()->getOptionValue('search_icon_text_texttransform') !== '') {
			$text_styles['text-transform'] = mixtape_qodef_options()->getOptionValue('search_icon_text_texttransform');
		}
		if (mixtape_qodef_options()->getOptionValue('search_icon_text_google_fonts') !== '-1') {
			$text_styles['font-family'] = mixtape_qodef_get_formatted_font_family(mixtape_qodef_options()->getOptionValue('search_icon_text_google_fonts')) . ', sans-serif';
		}
		if (mixtape_qodef_options()->getOptionValue('search_icon_text_fontstyle') !== '') {
			$text_styles['font-style'] = mixtape_qodef_options()->getOptionValue('search_icon_text_fontstyle');
		}
		if (mixtape_qodef_options()->getOptionValue('search_icon_text_fontweight') !== '') {
			$text_styles['font-weight'] = mixtape_qodef_options()->getOptionValue('search_icon_text_fontweight');
		}		
		if (mixtape_qodef_options()->getOptionValue('search_icon_text_letterspacing') !== '') {
			$text_styles['letter-spacing'] = mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('search_icon_text_letterspacing')).'px';
		}

		if (!empty($text_styles)) {
			echo mixtape_qodef_dynamic_css('.qodef-search-icon-text', $text_styles);
		}
		if (mixtape_qodef_options()->getOptionValue('search_icon_text_color_hover') !== '') {
			echo mixtape_qodef_dynamic_css('.qodef-search-opener:hover .qodef-search-icon-text', array(
				'color' => mixtape_qodef_options()->getOptionValue('search_icon_text_color_hover')
			));
		}

	}

	add_action('mixtape_qodef_style_dynamic', 'mixtape_qodef_search_opener_text_styles');
}

if (!function_exists('mixtape_qodef_search_opener_spacing')) {

	function mixtape_qodef_search_opener_spacing()
	{
		$spacing_styles = array();

		if (mixtape_qodef_options()->getOptionValue('search_padding_left') !== '') {
			$spacing_styles['padding-left'] = mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('search_padding_left')) . 'px';
		}
		if (mixtape_qodef_options()->getOptionValue('search_padding_right') !== '') {
			$spacing_styles['padding-right'] = mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('search_padding_right')) . 'px';
		}
		if (mixtape_qodef_options()->getOptionValue('search_margin_left') !== '') {
			$spacing_styles['margin-left'] = mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('search_margin_left')) . 'px';
		}
		if (mixtape_qodef_options()->getOptionValue('search_margin_right') !== '') {
			$spacing_styles['margin-right'] = mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('search_margin_right')) . 'px';
		}

		if (!empty($spacing_styles)) {
			echo mixtape_qodef_dynamic_css('.qodef-search-opener', $spacing_styles);
		}

	}

	add_action('mixtape_qodef_style_dynamic', 'mixtape_qodef_search_opener_spacing');
}

if (!function_exists('mixtape_qodef_search_bar_background')) {

	function mixtape_qodef_search_bar_background()
	{

		if (mixtape_qodef_options()->getOptionValue('search_background_color') !== '') {
			echo mixtape_qodef_dynamic_css('.qodef-search-cover, .qodef-search-fade .qodef-fullscreen-search-holder .qodef-fullscreen-search-table, .qodef-fullscreen-search-overlay, .qodef-search-slide-window-top, .qodef-search-slide-window-top input[type="text"]', array(
				'background-color' => mixtape_qodef_options()->getOptionValue('search_background_color')
			));
		}
	}

	add_action('mixtape_qodef_style_dynamic', 'mixtape_qodef_search_bar_background');
}

if (!function_exists('mixtape_qodef_search_text_styles')) {

	function mixtape_qodef_search_text_styles()
	{
		$text_styles = array();

		if (mixtape_qodef_options()->getOptionValue('search_text_color') !== '') {
			$text_styles['color'] = mixtape_qodef_options()->getOptionValue('search_text_color');
			echo mixtape_qodef_dynamic_css('.qodef_search_field::-webkit-input-placeholder',array('color' => $text_styles['color']));
			echo mixtape_qodef_dynamic_css('.qodef_search_field:-moz-placeholder',array('color' => $text_styles['color']));
			echo mixtape_qodef_dynamic_css('.qodef_search_field::-moz-placeholder',array('color' => $text_styles['color']));
			echo mixtape_qodef_dynamic_css('.qodef_search_field:-ms-input-placeholder',array('color' => $text_styles['color']));
		}
		if (mixtape_qodef_options()->getOptionValue('search_text_fontsize') !== '') {
			$text_styles['font-size'] = mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('search_text_fontsize')) . 'px';
		}
		if (mixtape_qodef_options()->getOptionValue('search_text_texttransform') !== '') {
			$text_styles['text-transform'] = mixtape_qodef_options()->getOptionValue('search_text_texttransform');
		}
		if (mixtape_qodef_options()->getOptionValue('search_text_google_fonts') !== '-1') {
			$text_styles['font-family'] = mixtape_qodef_get_formatted_font_family(mixtape_qodef_options()->getOptionValue('search_text_google_fonts')) . ', sans-serif';
		}
		if (mixtape_qodef_options()->getOptionValue('search_text_fontstyle') !== '') {
			$text_styles['font-style'] = mixtape_qodef_options()->getOptionValue('search_text_fontstyle');
		}
		if (mixtape_qodef_options()->getOptionValue('search_text_fontweight') !== '') {
			$text_styles['font-weight'] = mixtape_qodef_options()->getOptionValue('search_text_fontweight');
		}
		if (mixtape_qodef_options()->getOptionValue('search_text_letterspacing') !== '') {
			$text_styles['letter-spacing'] = mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('search_text_letterspacing')) . 'px';
		}

		if (!empty($text_styles)) {
			echo mixtape_qodef_dynamic_css('.qodef-search-cover input[type="text"], .qodef-fullscreen-search-opened .qodef-form-holder .qodef-search-field, .qodef-search-slide-window-top input[type="text"]', $text_styles);
		}

	}

	add_action('mixtape_qodef_style_dynamic', 'mixtape_qodef_search_text_styles');
}

if (!function_exists('mixtape_qodef_search_label_styles')) {

	function mixtape_qodef_search_label_styles()
	{
		$text_styles = array();

		if (mixtape_qodef_options()->getOptionValue('search_label_text_color') !== '') {
			$text_styles['color'] = mixtape_qodef_options()->getOptionValue('search_label_text_color');
		}
		if (mixtape_qodef_options()->getOptionValue('search_label_text_fontsize') !== '') {
			$text_styles['font-size'] = mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('search_label_text_fontsize')) . 'px';
		}
		if (mixtape_qodef_options()->getOptionValue('search_label_text_texttransform') !== '') {
			$text_styles['text-transform'] = mixtape_qodef_options()->getOptionValue('search_label_text_texttransform');
		}
		if (mixtape_qodef_options()->getOptionValue('search_label_text_google_fonts') !== '-1') {
			$text_styles['font-family'] = mixtape_qodef_get_formatted_font_family(mixtape_qodef_options()->getOptionValue('search_label_text_google_fonts')) . ', sans-serif';
		}
		if (mixtape_qodef_options()->getOptionValue('search_label_text_fontstyle') !== '') {
			$text_styles['font-style'] = mixtape_qodef_options()->getOptionValue('search_label_text_fontstyle');
		}
		if (mixtape_qodef_options()->getOptionValue('search_label_text_fontweight') !== '') {
			$text_styles['font-weight'] = mixtape_qodef_options()->getOptionValue('search_label_text_fontweight');
		}
		if (mixtape_qodef_options()->getOptionValue('search_label_text_letterspacing') !== '') {
			$text_styles['letter-spacing'] = mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('search_label_text_letterspacing')) . 'px';
		}

		if (!empty($text_styles)) {
			echo mixtape_qodef_dynamic_css('.qodef-fullscreen-search-holder .qodef-search-label', $text_styles);
		}

	}

	add_action('mixtape_qodef_style_dynamic', 'mixtape_qodef_search_label_styles');
}

if (!function_exists('mixtape_qodef_search_icon_styles')) {

	function mixtape_qodef_search_icon_styles()
	{

		if (mixtape_qodef_options()->getOptionValue('search_icon_color') !== '') {
			echo mixtape_qodef_dynamic_css('.qodef-search-slide-window-top > i, .qodef-fullscreen-search-holder .qodef-search-submit', array(
				'color' => mixtape_qodef_options()->getOptionValue('search_icon_color')
			));
		}
		if (mixtape_qodef_options()->getOptionValue('search_icon_hover_color') !== '') {
			echo mixtape_qodef_dynamic_css('.qodef-search-slide-window-top > i:hover, .qodef-fullscreen-search-holder .qodef-search-submit:hover', array(
				'color' => mixtape_qodef_options()->getOptionValue('search_icon_hover_color')
			));
		}
		if (mixtape_qodef_options()->getOptionValue('search_icon_size') !== '') {
			echo mixtape_qodef_dynamic_css('.qodef-search-slide-window-top > i, .qodef-fullscreen-search-holder .qodef-search-submit', array(
				'font-size' => mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('search_icon_size')) . 'px'
			));
		}

	}

	add_action('mixtape_qodef_style_dynamic', 'mixtape_qodef_search_icon_styles');
}

if (!function_exists('mixtape_qodef_search_close_icon_styles')) {

	function mixtape_qodef_search_close_icon_styles()
	{

		if (mixtape_qodef_options()->getOptionValue('search_close_color') !== '') {
			echo mixtape_qodef_dynamic_css('.qodef-search-slide-window-top .qodef-search-close i, .qodef-search-cover .qodef-search-close i,.qodef-search-cover .qodef-search-close span, .qodef-fullscreen-search-close', array(
				'color' => mixtape_qodef_options()->getOptionValue('search_close_color')
			));
		}
		if (mixtape_qodef_options()->getOptionValue('search_close_hover_color') !== '') {
			echo mixtape_qodef_dynamic_css('.qodef-search-slide-window-top .qodef-search-close i:hover, .qodef-search-cover .qodef-search-close i:hover,.qodef-search-cover .qodef-search-close span:hover, .qodef-fullscreen-search-close:hover', array(
				'color' => mixtape_qodef_options()->getOptionValue('search_close_hover_color')
			));
		}
		if (mixtape_qodef_options()->getOptionValue('search_close_size') !== '') {
			echo mixtape_qodef_dynamic_css('.qodef-search-slide-window-top .qodef-search-close i, .qodef-search-cover .qodef-search-close i,.qodef-search-cover .qodef-search-close span, .qodef-fullscreen-search-close', array(
				'font-size' => mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('search_close_size')) . 'px'
			));
		}

	}

	add_action('mixtape_qodef_style_dynamic', 'mixtape_qodef_search_close_icon_styles');
}

if (!function_exists('mixtape_qodef_search_border_styles')) {

	function mixtape_qodef_search_border_styles()
	{

		if (mixtape_qodef_options()->getOptionValue('search_border_color') !== '') {
			echo mixtape_qodef_dynamic_css('.qodef-fullscreen-search-holder .qodef-field-holder', array(
				'border-color' => mixtape_qodef_options()->getOptionValue('search_border_color')
			));
		}
		if (mixtape_qodef_options()->getOptionValue('search_border_focus_color') !== '') {
			echo mixtape_qodef_dynamic_css('.qodef-fullscreen-search-holder .qodef-field-holder .qodef-line', array(
				'background-color' => mixtape_qodef_options()->getOptionValue('search_border_focus_color')
			));
		}

	}

	add_action('mixtape_qodef_style_dynamic', 'mixtape_qodef_search_border_styles');
}

?>
