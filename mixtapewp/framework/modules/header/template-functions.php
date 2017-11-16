<?php

use MixtapeQode\Modules\Header\Lib\HeaderFactory;

if(!function_exists('mixtape_qodef_get_header')) {
	/**
	 * Loads header HTML based on header type option. Sets all necessary parameters for header
	 * and defines mixtape_qodef_header_type_parameters filter
	 */
	function mixtape_qodef_get_header() {
		$id = mixtape_qodef_get_page_id();

		//will be read from options
		$header_type     = mixtape_qodef_get_meta_field_intersect('header_type',$id);
		$header_behavior = mixtape_qodef_get_meta_field_intersect('header_behaviour',$id);

		if(HeaderFactory::getInstance()->validHeaderObject()) {
			$parameters = array(
				'hide_logo'          => mixtape_qodef_options()->getOptionValue('hide_logo') == 'yes' ? true : false,
				'show_sticky'        => in_array($header_behavior, array(
					'sticky-header-on-scroll-up',
					'sticky-header-on-scroll-down-up'
				)) ? true : false,
				'show_fixed_wrapper' => in_array($header_behavior, array('fixed-on-scroll')) ? true : false,
				'widget_area' => mixtape_qodef_get_header_widget_area()
			);

			$parameters = apply_filters('mixtape_qodef_header_type_parameters', $parameters, $header_type);

			HeaderFactory::getInstance()->getHeaderObject()->loadTemplate($parameters);
		}
	}
}

if(!function_exists('mixtape_qodef_get_header_top')) {
	/**
	 * Loads header top HTML and sets parameters for it
	 */
	function mixtape_qodef_get_header_top() {

		//generate column width class
		switch(mixtape_qodef_options()->getOptionValue('top_bar_layout')) {
			case ('two-columns'):
				$column_widht_class = '50-50';
				break;
			case ('three-columns'):
				$column_widht_class = mixtape_qodef_options()->getOptionValue('top_bar_column_widths');
				break;
		}

		$params = array(
			'column_widths'      => $column_widht_class,
			'show_widget_center' => mixtape_qodef_options()->getOptionValue('top_bar_layout') == 'three-columns' ? true : false,
			'show_header_top'    => mixtape_qodef_is_top_bar_enabled(),
			'top_bar_in_grid'    => mixtape_qodef_options()->getOptionValue('top_bar_in_grid') == 'yes' ? true : false
		);

		$params = apply_filters('mixtape_qodef_header_top_params', $params);

		mixtape_qodef_get_module_template_part('templates/parts/header-top', 'header', '', $params);
	}
}

if(!function_exists('mixtape_qodef_get_logo')) {
	/**
	 * Loads logo HTML
	 *
	 * @param $slug
	 */
	function mixtape_qodef_get_logo($slug = '') {
		$id = mixtape_qodef_get_page_id();
		$slug = $slug !== '' ? $slug : mixtape_qodef_get_meta_field_intersect('header_type');

		$logo_image_dark = mixtape_qodef_get_meta_field_intersect('logo_image_dark', $id);
		$logo_image_light = mixtape_qodef_get_meta_field_intersect('logo_image_light', $id);


		switch ($slug){
			case 'sticky':
				$logo_image = mixtape_qodef_get_meta_field_intersect('logo_image_sticky', $id);
				break;
			default:
				$logo_image = mixtape_qodef_get_meta_field_intersect('logo_image', $id);
				break;
		}

		//get logo image dimensions and set style attribute for image link.
		$logo_dimensions = mixtape_qodef_get_image_dimensions($logo_image);

		$logo_height = '';
		$logo_styles = '';
		if(is_array($logo_dimensions) && array_key_exists('height', $logo_dimensions)) {
			$logo_height = $logo_dimensions['height'];
			$logo_styles = 'height: '.intval($logo_height / 2).'px;'; //divided with 2 because of retina screens
		}

		$params = array(
			'logo_image'  => $logo_image,
			'logo_image_dark' => $logo_image_dark,
			'logo_image_light' => $logo_image_light,
			'logo_styles' => $logo_styles
		);

		mixtape_qodef_get_module_template_part('templates/parts/logo', 'header', $slug, $params);
	}
}

if(!function_exists('mixtape_qodef_get_main_menu')) {
	/**
	 * Loads main menu HTML
	 *
	 * @param string $additional_class addition class to pass to template
	 */
	function mixtape_qodef_get_main_menu($additional_class = 'qodef-default-nav') {
		mixtape_qodef_get_module_template_part('templates/parts/navigation', 'header', '', array('additional_class' => $additional_class));
	}
}

if(!function_exists('mixtape_qodef_get_full_screen_opener')) {
	/**
	 * Loads main menu HTML
	 *
	 * @param string $additional_class addition class to pass to template
	 */
	function mixtape_qodef_get_full_screen_opener() {
		mixtape_qodef_get_module_template_part('templates/parts/full-screen-opener', 'header', '');
	}
}

if(!function_exists('mixtape_qodef_get_sticky_menu')) {
	/**
	 * Loads sticky menu HTML
	 *
	 * @param string $additional_class addition class to pass to template
	 */
	function mixtape_qodef_get_sticky_menu($additional_class = 'qodef-default-nav') {
		mixtape_qodef_get_module_template_part('templates/parts/sticky-navigation', 'header', '', array('additional_class' => $additional_class));
	}
}

if(!function_exists('mixtape_qodef_get_divided_left_main_menu')) {
	/**
	 * Loads main menu HTML
	 *
	 * @param string $additional_class addition class to pass to template
	 */
	function mixtape_qodef_get_divided_left_main_menu($slug = '', $additional_class = 'qodef-default-nav') {
		mixtape_qodef_get_module_template_part('templates/parts/divided-left-navigation', 'header', $slug, array('additional_class' => $additional_class));
	}
}

if(!function_exists('mixtape_qodef_get_divided_right_main_menu')) {
	/**
	 * Loads main menu HTML
	 *
	 * @param string $additional_class addition class to pass to template
	 */
	function mixtape_qodef_get_divided_right_main_menu($slug = '', $additional_class = 'qodef-default-nav') {
		mixtape_qodef_get_module_template_part('templates/parts/divided-right-navigation', 'header', $slug, array('additional_class' => $additional_class));
	}
}

if(!function_exists('mixtape_qodef_get_vertical_main_menu')) {
	/**
	 * Loads vertical menu HTML
	 */
	function mixtape_qodef_get_vertical_main_menu() {
		mixtape_qodef_get_module_template_part('templates/parts/vertical-navigation', 'header', '');
	}
}



if(!function_exists('mixtape_qodef_get_sticky_header')) {
	/**
	 * Loads sticky header behavior HTML
	 */
	function mixtape_qodef_get_sticky_header($slug = '') {

		$parameters = array(
			'hide_logo'             => mixtape_qodef_options()->getOptionValue('hide_logo') == 'yes' ? true : false,
			'sticky_header_in_grid' => mixtape_qodef_get_meta_field_intersect('sticky_header_in_grid') == 'yes' ? true : false,
			'widget_area'			=> mixtape_qodef_get_sticky_header_widget_area()
		);

		mixtape_qodef_get_module_template_part('templates/behaviors/sticky-header', 'header', $slug, $parameters);
	}
}

if(!function_exists('mixtape_qodef_get_mobile_header')) {
	/**
	 * Loads mobile header HTML only if responsiveness is enabled
	 */
	function mixtape_qodef_get_mobile_header() {
		if(mixtape_qodef_is_responsive_on()) {
			$header_type = mixtape_qodef_get_meta_field_intersect('header_type');

			//this could be read from theme options
			$mobile_header_type = 'mobile-header';

			$parameters = array(
				'show_logo'              => mixtape_qodef_options()->getOptionValue('hide_logo') == 'yes' ? false : true,
				'menu_opener_icon'       => mixtape_qodef_icon_collections()->getMobileMenuIcon(mixtape_qodef_options()->getOptionValue('mobile_icon_pack'), true),
				'show_navigation_opener' => has_nav_menu('main-navigation')
			);

			mixtape_qodef_get_module_template_part('templates/types/'.$mobile_header_type, 'header', $header_type, $parameters);
		}
	}
}

if(!function_exists('mixtape_qodef_get_mobile_logo')) {
	/**
	 * Loads mobile logo HTML. It checks if mobile logo image is set and uses that, else takes normal logo image
	 *
	 * @param string $slug
	 */
	function mixtape_qodef_get_mobile_logo($slug = '') {

		$slug = $slug !== '' ? $slug : mixtape_qodef_get_meta_field_intersect('header_type');

		//check if mobile logo has been set and use that, else use normal logo
		if(mixtape_qodef_options()->getOptionValue('logo_image_mobile') !== '') {
			$logo_image = mixtape_qodef_options()->getOptionValue('logo_image_mobile');
		} else {
			$logo_image = mixtape_qodef_options()->getOptionValue('logo_image');
		}

		//get logo image dimensions and set style attribute for image link.
		$logo_dimensions = mixtape_qodef_get_image_dimensions($logo_image);

		$logo_height = '';
		$logo_styles = '';
		if(is_array($logo_dimensions) && array_key_exists('height', $logo_dimensions)) {
			$logo_height = $logo_dimensions['height'];
			$logo_styles = 'height: '.intval($logo_height / 2).'px'; //divided with 2 because of retina screens
		}

		//set parameters for logo
		$parameters = array(
			'logo_image'      => $logo_image,
			'logo_dimensions' => $logo_dimensions,
			'logo_height'     => $logo_height,
			'logo_styles'     => $logo_styles
		);

		mixtape_qodef_get_module_template_part('templates/parts/mobile-logo', 'header', $slug, $parameters);
	}
}

if(!function_exists('mixtape_qodef_get_mobile_nav')) {
	/**
	 * Loads mobile navigation HTML
	 */
	function mixtape_qodef_get_mobile_nav() {

		$slug = mixtape_qodef_get_meta_field_intersect('header_type');

		mixtape_qodef_get_module_template_part('templates/parts/mobile-navigation', 'header', $slug);
	}
}


if( !function_exists('mixtape_qodef_sticky_header_style') ) {

	/**
	 * Function that return sticky header style
	 */

	function mixtape_qodef_sticky_header_style($style) {
		$id = mixtape_qodef_get_page_id();
		$class_prefix = mixtape_qodef_get_unique_page_class();

		$header_selector = array(
			$class_prefix.' .qodef-page-header .qodef-sticky-header .qodef-sticky-holder'
		);

		$header_style = array();
		$header_background_color = get_post_meta($id, "qodef_sticky_header_background_color_meta", true);

		if($header_background_color){
			$header_style['background-color'] = $header_background_color;
		}

		$current_style = mixtape_qodef_dynamic_css($header_selector, $header_style);

		$current_style = $current_style . $style;

		return $current_style;

	}
	add_filter('mixtape_qodef_add_page_custom_style', 'mixtape_qodef_sticky_header_style');
}

if( !function_exists('mixtape_qodef_get_header_widget_area') ) {

	/**
	 * Function that return widget area
	 */

	function mixtape_qodef_get_header_widget_area() {

		$id = mixtape_qodef_get_page_id();
		$show_widget_area = get_post_meta($id, "qodef_show_header_widget_area_meta", true);
		$header_type     =  mixtape_qodef_get_meta_field_intersect('header_type');

		$widget_area = '';

		if($show_widget_area != 'no') {
			$custom_widget_area = get_post_meta($id, "qodef_custom_header_sidebar_meta", true);
			if ($custom_widget_area != '' && is_active_sidebar($custom_widget_area)) {
				$widget_area = $custom_widget_area;
			} else {
				switch($header_type){
					case 'header-vertical':
						$widget_area = 'qodef-vertical-header-widget-area';
						break;
					default:
						$widget_area = 'qodef-header-widget-area';
						break;
				}
			}
		}

		return $widget_area;
	}

}

if( !function_exists('mixtape_qodef_get_sticky_header_widget_area') ) {

	/**
	 * Function that return widget area
	 */

	function mixtape_qodef_get_sticky_header_widget_area() {

		$id = mixtape_qodef_get_page_id();
		$show_widget_area = get_post_meta($id, "qodef_show_header_widget_area_meta", true);

		$widget_area = '';
		if($show_widget_area != 'no') {
			$custom_widget_area = get_post_meta($id, "qodef_custom_sticky_header_sidebar_meta", true);
			if ($custom_widget_area != '' && is_active_sidebar($custom_widget_area)) {
				$widget_area = $custom_widget_area;
			} elseif(is_active_sidebar('qodef-sticky-header-widget-area')) {
				$widget_area = 'qodef-sticky-header-widget-area';
			}
		}

		return $widget_area;
	}

}