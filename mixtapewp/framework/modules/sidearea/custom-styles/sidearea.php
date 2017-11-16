<?php

if (!function_exists('mixtape_qodef_side_area_slide_from_right_type_style')) {

	function mixtape_qodef_side_area_slide_from_right_type_style()
	{

		if (mixtape_qodef_options()->getOptionValue('side_area_type') == 'side-menu-slide-from-right') {

			if (mixtape_qodef_options()->getOptionValue('side_area_width') !== '' && mixtape_qodef_options()->getOptionValue('side_area_width') >= 20) {
				echo mixtape_qodef_dynamic_css('.qodef-side-menu-slide-from-right .qodef-side-menu', array(
					'right' => '-'.mixtape_qodef_options()->getOptionValue('side_area_width') . '%',
					'width' => mixtape_qodef_options()->getOptionValue('side_area_width') . '%'
				));
			}

			if (mixtape_qodef_options()->getOptionValue('side_area_content_overlay_color') !== '') {

				echo mixtape_qodef_dynamic_css('.qodef-side-menu-slide-from-right .qodef-wrapper .qodef-cover', array(
					'background-color' => mixtape_qodef_options()->getOptionValue('side_area_content_overlay_color')
				));

			}
			if (mixtape_qodef_options()->getOptionValue('side_area_content_overlay_opacity') !== '') {

				echo mixtape_qodef_dynamic_css('.qodef-side-menu-slide-from-right.qodef-right-side-menu-opened .qodef-wrapper .qodef-cover', array(
					'opacity' => mixtape_qodef_options()->getOptionValue('side_area_content_overlay_opacity')
				));

			}
		}

	}

	add_action('mixtape_qodef_style_dynamic', 'mixtape_qodef_side_area_slide_from_right_type_style');

}

if (!function_exists('mixtape_qodef_side_area_icon_color_styles')) {

	function mixtape_qodef_side_area_icon_color_styles()
	{

		if (mixtape_qodef_options()->getOptionValue('side_area_icon_font_size') !== '') {

			echo mixtape_qodef_dynamic_css('a.qodef-side-menu-button-opener', array(
				'font-size' => mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('side_area_icon_font_size')) . 'px'
			));

			if (mixtape_qodef_options()->getOptionValue('side_area_icon_font_size') > 30) {
				echo '@media only screen and (max-width: 480px) {
						a.qodef-side-menu-button-opener {
						font-size: 30px;
						}
					}';
			}

		}

		if (mixtape_qodef_options()->getOptionValue('side_area_icon_color') !== '') {

			echo mixtape_qodef_dynamic_css('a.qodef-side-menu-button-opener', array(
				'color' => mixtape_qodef_options()->getOptionValue('side_area_icon_color')
			));

		}
		if (mixtape_qodef_options()->getOptionValue('side_area_icon_hover_color') !== '') {

			echo mixtape_qodef_dynamic_css('a.qodef-side-menu-button-opener:hover', array(
				'color' => mixtape_qodef_options()->getOptionValue('side_area_icon_hover_color')
			));

		}
		if (mixtape_qodef_options()->getOptionValue('side_area_light_icon_color') !== '') {

			echo mixtape_qodef_dynamic_css('.qodef-light-header .qodef-page-header > div:not(.qodef-sticky-header) .qodef-side-menu-button-opener,
			.qodef-light-header.qodef-header-style-on-scroll .qodef-page-header .qodef-side-menu-button-opener,
			.qodef-light-header .qodef-top-bar .qodef-side-menu-button-opener', array(
				'color' => mixtape_qodef_options()->getOptionValue('side_area_light_icon_color') . ' !important'
			));

		}
		if (mixtape_qodef_options()->getOptionValue('side_area_light_icon_hover_color') !== '') {

			echo mixtape_qodef_dynamic_css('.qodef-light-header .qodef-page-header > div:not(.qodef-sticky-header) .qodef-side-menu-button-opener:hover,
			.qodef-light-header.qodef-header-style-on-scroll .qodef-page-header .qodef-side-menu-button-opener:hover,
			.qodef-light-header .qodef-top-bar .qodef-side-menu-button-opener:hover', array(
				'color' => mixtape_qodef_options()->getOptionValue('side_area_light_icon_hover_color') . ' !important'
			));

		}
		if (mixtape_qodef_options()->getOptionValue('side_area_dark_icon_color') !== '') {

			echo mixtape_qodef_dynamic_css('.qodef-dark-header .qodef-page-header > div:not(.qodef-sticky-header) .qodef-side-menu-button-opener,
			.qodef-dark-header.qodef-header-style-on-scroll .qodef-page-header .qodef-side-menu-button-opener,
			.qodef-dark-header .qodef-top-bar .qodef-side-menu-button-opener', array(
				'color' => mixtape_qodef_options()->getOptionValue('side_area_dark_icon_color') . ' !important'
			));

		}
		if (mixtape_qodef_options()->getOptionValue('side_area_dark_icon_hover_color') !== '') {

			echo mixtape_qodef_dynamic_css('.qodef-dark-header .qodef-page-header > div:not(.qodef-sticky-header) .qodef-side-menu-button-opener:hover,
			.qodef-dark-header.qodef-header-style-on-scroll .qodef-page-header .qodef-side-menu-button-opener:hover,
			.qodef-dark-header .qodef-top-bar .qodef-side-menu-button-opener:hover', array(
				'color' => mixtape_qodef_options()->getOptionValue('side_area_dark_icon_hover_color') . ' !important'
			));

		}

	}

	add_action('mixtape_qodef_style_dynamic', 'mixtape_qodef_side_area_icon_color_styles');

}

if (!function_exists('mixtape_qodef_side_area_icon_spacing_styles')) {

	function mixtape_qodef_side_area_icon_spacing_styles()
	{
		$icon_spacing = array();

		if (mixtape_qodef_options()->getOptionValue('side_area_icon_padding_left') !== '') {
			$icon_spacing['padding-left'] = mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('side_area_icon_padding_left')) . 'px';
		}

		if (mixtape_qodef_options()->getOptionValue('side_area_icon_padding_right') !== '') {
			$icon_spacing['padding-right'] = mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('side_area_icon_padding_right')) . 'px';
		}

		if (mixtape_qodef_options()->getOptionValue('side_area_icon_margin_left') !== '') {
			$icon_spacing['margin-left'] = mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('side_area_icon_margin_left')) . 'px';
		}

		if (mixtape_qodef_options()->getOptionValue('side_area_icon_margin_right') !== '') {
			$icon_spacing['margin-right'] = mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('side_area_icon_margin_right')) . 'px';
		}

		if (!empty($icon_spacing)) {

			echo mixtape_qodef_dynamic_css('a.qodef-side-menu-button-opener', $icon_spacing);

		}

	}

	add_action('mixtape_qodef_style_dynamic', 'mixtape_qodef_side_area_icon_spacing_styles');
}

if (!function_exists('mixtape_qodef_side_area_icon_border_styles')) {

	function mixtape_qodef_side_area_icon_border_styles()
	{
		if (mixtape_qodef_options()->getOptionValue('side_area_icon_border_yesno') == 'yes') {

			$side_area_icon_border = array();

			if (mixtape_qodef_options()->getOptionValue('side_area_icon_border_color') !== '') {
				$side_area_icon_border['border-color'] = mixtape_qodef_options()->getOptionValue('side_area_icon_border_color');
			}

			if (mixtape_qodef_options()->getOptionValue('side_area_icon_border_width') !== '') {
				$side_area_icon_border['border-width'] = mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('side_area_icon_border_width')) . 'px';
			} else {
				$side_area_icon_border['border-width'] = '1px';
			}

			if (mixtape_qodef_options()->getOptionValue('side_area_icon_border_radius') !== '') {
				$side_area_icon_border['border-radius'] = mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('side_area_icon_border_radius')) . 'px';
			}

			if (mixtape_qodef_options()->getOptionValue('side_area_icon_border_style') !== '') {
				$side_area_icon_border['border-style'] = mixtape_qodef_options()->getOptionValue('side_area_icon_border_style');
			} else {
				$side_area_icon_border['border-style'] = 'solid';
			}

			if (!empty($side_area_icon_border)) {
				$side_area_icon_border['-webkit-transition'] = 'all 0.15s ease-out';
				$side_area_icon_border['transition'] = 'all 0.15s ease-out';
				echo mixtape_qodef_dynamic_css('a.qodef-side-menu-button-opener', $side_area_icon_border);
			}

			if (mixtape_qodef_options()->getOptionValue('side_area_icon_border_hover_color') !== '') {
				$side_area_icon_border_hover['border-color'] = mixtape_qodef_options()->getOptionValue('side_area_icon_border_hover_color');
                echo mixtape_qodef_dynamic_css('a.qodef-side-menu-button-opener:hover', $side_area_icon_border_hover);
			}


		}
	}

	add_action('mixtape_qodef_style_dynamic', 'mixtape_qodef_side_area_icon_border_styles');

}

if (!function_exists('mixtape_qodef_side_area_alignment')) {

	function mixtape_qodef_side_area_alignment()
	{

		if (mixtape_qodef_options()->getOptionValue('side_area_aligment')) {

			echo mixtape_qodef_dynamic_css('.qodef-side-menu-slide-from-right .qodef-side-menu, .qodef-side-menu-slide-with-content .qodef-side-menu, .qodef-side-area-uncovered-from-content .qodef-side-menu', array(
				'text-align' => mixtape_qodef_options()->getOptionValue('side_area_aligment')
			));

		}

	}

	add_action('mixtape_qodef_style_dynamic', 'mixtape_qodef_side_area_alignment');

}

if (!function_exists('mixtape_qodef_side_area_styles')) {

	function mixtape_qodef_side_area_styles()
	{

		$side_area_styles = array();

		if (mixtape_qodef_options()->getOptionValue('side_area_background_color') !== '') {
			$side_area_styles['background-color'] = mixtape_qodef_options()->getOptionValue('side_area_background_color');
		}

		if (mixtape_qodef_options()->getOptionValue('side_area_padding_top') !== '') {
			$side_area_styles['padding-top'] = mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('side_area_padding_top')) . 'px';
		}

		if (mixtape_qodef_options()->getOptionValue('side_area_padding_right') !== '') {
			$side_area_styles['padding-right'] = mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('side_area_padding_right')) . 'px';
		}

		if (mixtape_qodef_options()->getOptionValue('side_area_padding_bottom') !== '') {
			$side_area_styles['padding-bottom'] = mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('side_area_padding_bottom')) . 'px';
		}

		if (mixtape_qodef_options()->getOptionValue('side_area_padding_left') !== '') {
			$side_area_styles['padding-left'] = mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('side_area_padding_left')) . 'px';
		}

		if (!empty($side_area_styles)) {
			echo mixtape_qodef_dynamic_css('.qodef-side-menu, .qodef-side-area-uncovered-from-content .qodef-side-menu, .qodef-side-menu-slide-from-right .qodef-side-menu', $side_area_styles);
		}

		if (mixtape_qodef_options()->getOptionValue('side_area_close_icon') == 'dark') {
			echo mixtape_qodef_dynamic_css('.qodef-side-menu a.qodef-close-side-menu span, .qodef-side-menu a.qodef-close-side-menu i', array(
				'color' => '#000000'
			));
		}

		if (mixtape_qodef_options()->getOptionValue('side_area_close_icon_size') !== '') {
			echo mixtape_qodef_dynamic_css('.qodef-side-menu a.qodef-close-side-menu', array(
				'height' => mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('side_area_close_icon_size')) . 'px',
				'width' => mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('side_area_close_icon_size')) . 'px',
				'line-height' => mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('side_area_close_icon_size')) . 'px',
				'padding' => 0,
			));
			echo mixtape_qodef_dynamic_css('.qodef-side-menu a.qodef-close-side-menu span, .qodef-side-menu a.qodef-close-side-menu i', array(
				'font-size' => mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('side_area_close_icon_size')) . 'px',
				'height' => mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('side_area_close_icon_size')) . 'px',
				'width' => mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('side_area_close_icon_size')) . 'px',
				'line-height' => mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('side_area_close_icon_size')) . 'px',
			));
		}

	}

	add_action('mixtape_qodef_style_dynamic', 'mixtape_qodef_side_area_styles');

}

if (!function_exists('mixtape_qodef_side_area_title_styles')) {

	function mixtape_qodef_side_area_title_styles()
	{

		$title_styles = array();

		if (mixtape_qodef_options()->getOptionValue('side_area_title_color') !== '') {
			$title_styles['color'] = mixtape_qodef_options()->getOptionValue('side_area_title_color');
		}

		if (mixtape_qodef_options()->getOptionValue('side_area_title_fontsize') !== '') {
			$title_styles['font-size'] = mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('side_area_title_fontsize')) . 'px';
		}

		if (mixtape_qodef_options()->getOptionValue('side_area_title_lineheight') !== '') {
			$title_styles['line-height'] = mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('side_area_title_lineheight')) . 'px';
		}

		if (mixtape_qodef_options()->getOptionValue('side_area_title_texttransform') !== '') {
			$title_styles['text-transform'] = mixtape_qodef_options()->getOptionValue('side_area_title_texttransform');
		}

		if (mixtape_qodef_options()->getOptionValue('side_area_title_google_fonts') !== '-1') {
			$title_styles['font-family'] = mixtape_qodef_get_formatted_font_family(mixtape_qodef_options()->getOptionValue('side_area_title_google_fonts')) . ', sans-serif';
		}

		if (mixtape_qodef_options()->getOptionValue('side_area_title_fontstyle') !== '') {
			$title_styles['font-style'] = mixtape_qodef_options()->getOptionValue('side_area_title_fontstyle');
		}

		if (mixtape_qodef_options()->getOptionValue('side_area_title_fontweight') !== '') {
			$title_styles['font-weight'] = mixtape_qodef_options()->getOptionValue('side_area_title_fontweight');
		}

		if (mixtape_qodef_options()->getOptionValue('side_area_title_letterspacing') !== '') {
			$title_styles['letter-spacing'] = mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('side_area_title_letterspacing')) . 'px';
		}

		if (!empty($title_styles)) {

			echo mixtape_qodef_dynamic_css('.qodef-side-menu-title h4, .qodef-side-menu-title h5', $title_styles);

		}

	}

	add_action('mixtape_qodef_style_dynamic', 'mixtape_qodef_side_area_title_styles');

}

if (!function_exists('mixtape_qodef_side_area_text_styles')) {

	function mixtape_qodef_side_area_text_styles()
	{
		$text_styles = array();

		if (mixtape_qodef_options()->getOptionValue('side_area_text_google_fonts') !== '-1') {
			$text_styles['font-family'] = mixtape_qodef_get_formatted_font_family(mixtape_qodef_options()->getOptionValue('side_area_text_google_fonts')) . ', sans-serif';
		}

		if (mixtape_qodef_options()->getOptionValue('side_area_text_fontsize') !== '') {
			$text_styles['font-size'] = mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('side_area_text_fontsize')) . 'px';
		}

		if (mixtape_qodef_options()->getOptionValue('side_area_text_lineheight') !== '') {
			$text_styles['line-height'] = mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('side_area_text_lineheight')) . 'px';
		}

		if (mixtape_qodef_options()->getOptionValue('side_area_text_letterspacing') !== '') {
			$text_styles['letter-spacing'] = mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('side_area_text_letterspacing')) . 'px';
		}

		if (mixtape_qodef_options()->getOptionValue('side_area_text_fontweight') !== '') {
			$text_styles['font-weight'] = mixtape_qodef_options()->getOptionValue('side_area_text_fontweight');
		}

		if (mixtape_qodef_options()->getOptionValue('side_area_text_fontstyle') !== '') {
			$text_styles['font-style'] = mixtape_qodef_options()->getOptionValue('side_area_text_fontstyle');
		}

		if (mixtape_qodef_options()->getOptionValue('side_area_text_texttransform') !== '') {
			$text_styles['text-transform'] = mixtape_qodef_options()->getOptionValue('side_area_text_texttransform');
		}

		if (mixtape_qodef_options()->getOptionValue('side_area_text_color') !== '') {
			$text_styles['color'] = mixtape_qodef_options()->getOptionValue('side_area_text_color');
		}

		if (!empty($text_styles)) {

			echo mixtape_qodef_dynamic_css('.qodef-side-menu .widget, .qodef-side-menu .widget.widget_search form, .qodef-side-menu .widget.widget_search form input[type="text"], .qodef-side-menu .widget.widget_search form input[type="submit"], .qodef-side-menu .widget h6, .qodef-side-menu .widget h6 a, .qodef-side-menu .widget p, .qodef-side-menu .widget li a, .qodef-side-menu .widget.widget_rss li a.rsswidget, .qodef-side-menu #wp-calendar caption,.qodef-side-menu .widget li, .qodef-side-menu .widget.widget_archive select, .qodef-side-menu .widget.widget_categories select, .qodef-side-menu .widget.widget_text select, .qodef-side-menu .widget.widget_search form input[type="submit"], .qodef-side-menu #wp-calendar th, .qodef-side-menu #wp-calendar td', $text_styles);

		}

	}

	add_action('mixtape_qodef_style_dynamic', 'mixtape_qodef_side_area_text_styles');

}

if (!function_exists('mixtape_qodef_side_area_link_styles')) {

	function mixtape_qodef_side_area_link_styles()
	{
		$link_styles = array();

		if (mixtape_qodef_options()->getOptionValue('sidearea_link_font_family') !== '-1') {
			$link_styles['font-family'] = mixtape_qodef_get_formatted_font_family(mixtape_qodef_options()->getOptionValue('sidearea_link_font_family')) . ',sans-serif';
		}

		if (mixtape_qodef_options()->getOptionValue('sidearea_link_font_size') !== '') {
			$link_styles['font-size'] = mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('sidearea_link_font_size')) . 'px';
		}

		if (mixtape_qodef_options()->getOptionValue('sidearea_link_line_height') !== '') {
			$link_styles['line-height'] = mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('sidearea_link_line_height')) . 'px';
		}

		if (mixtape_qodef_options()->getOptionValue('sidearea_link_letter_spacing') !== '') {
			$link_styles['letter-spacing'] = mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('sidearea_link_letter_spacing')) . 'px';
		}

		if (mixtape_qodef_options()->getOptionValue('sidearea_link_font_weight') !== '') {
			$link_styles['font-weight'] = mixtape_qodef_options()->getOptionValue('sidearea_link_font_weight');
		}

		if (mixtape_qodef_options()->getOptionValue('sidearea_link_font_style') !== '') {
			$link_styles['font-style'] = mixtape_qodef_options()->getOptionValue('sidearea_link_font_style');
		}

		if (mixtape_qodef_options()->getOptionValue('sidearea_link_text_transform') !== '') {
			$link_styles['text-transform'] = mixtape_qodef_options()->getOptionValue('sidearea_link_text_transform');
		}

		if (mixtape_qodef_options()->getOptionValue('sidearea_link_color') !== '') {
			$link_styles['color'] = mixtape_qodef_options()->getOptionValue('sidearea_link_color');
		}

		if (!empty($link_styles)) {

			echo mixtape_qodef_dynamic_css('.qodef-side-menu .widget li a, .qodef-side-menu .widget a:not(.qbutton)', $link_styles);

		}

		if (mixtape_qodef_options()->getOptionValue('sidearea_link_hover_color') !== '') {
			echo mixtape_qodef_dynamic_css('.qodef-side-menu .widget a:hover, .qodef-side-menu .widget.widget_archive li:hover, .qodef-side-menu .widget.widget_categories li:hover,  .qodef-side-menu .widget_rss li a.rsswidget:hover', array(
				'color' => mixtape_qodef_options()->getOptionValue('sidearea_link_hover_color')
			));
		}

	}

	add_action('mixtape_qodef_style_dynamic', 'mixtape_qodef_side_area_link_styles');

}

if (!function_exists('mixtape_qodef_side_area_border_styles')) {

	function mixtape_qodef_side_area_border_styles()
	{

		if (mixtape_qodef_options()->getOptionValue('side_area_enable_bottom_border') == 'yes') {

			if (mixtape_qodef_options()->getOptionValue('side_area_bottom_border_color') !== '') {

				echo mixtape_qodef_dynamic_css('.qodef-side-menu .widget', array(
					'border-bottom' => '1px solid ' . mixtape_qodef_options()->getOptionValue('side_area_bottom_border_color'),
					'margin-bottom' => '10px',
					'padding-bottom' => '10px',
				));

			}

		}

	}

	add_action('mixtape_qodef_style_dynamic', 'mixtape_qodef_side_area_border_styles');

}