<?php

if (!function_exists('mixtape_qodef_get_footer_classes')) {
	/**
	 * Return all footer classes
	 *
	 * @param $page_id
	 * @return string|void
	 */
	function mixtape_qodef_get_footer_classes($page_id) {

		$footer_classes                     = '';
		$footer_classes_array               = array();

		//is uncovering footer option set in theme options?
		if(mixtape_qodef_options()->getOptionValue('uncovering_footer') == 'yes') {
			$footer_classes_array[] = 'qodef-footer-uncover';
		}

		if(get_post_meta($page_id, 'qodef_disable_footer_meta', true) == 'yes' || is_404()){
			$footer_classes_array[] = 'qodef-disable-footer';
		}

		//is some class added to footer classes array?
		if(is_array($footer_classes_array) && count($footer_classes_array)) {
			//concat all classes and prefix it with class attribute
			$footer_classes = esc_attr(implode(' ', $footer_classes_array));
		}

		return $footer_classes;

	}

}

if (!function_exists('mixtape_qodef_footer_top_classes')) {
	/**
	 * Return classes for footer top
	 *
	 * @return string
	 */
	function mixtape_qodef_footer_top_classes() {

		$footer_top_classes = array();

		if(mixtape_qodef_options()->getOptionValue('footer_in_grid') != 'yes') {
			$footer_top_classes[] = 'qodef-footer-top-full';
		}

		//footer aligment
		if(mixtape_qodef_options()->getOptionValue('footer_top_columns_alignment') != '') {
			$footer_top_classes[] = 'qodef-footer-top-aligment-'.mixtape_qodef_options()->getOptionValue('footer_top_columns_alignment');
		}


		return implode(' ', $footer_top_classes);
	}
}

if(!function_exists('mixtape_qodef_footer_page_styles')) {
	/**
	 * @param $style
	 *
	 * @return array
	 */
	function mixtape_qodef_footer_page_styles($style) {
		$current_style = '';
		$id = mixtape_qodef_get_page_id();
		$page_prefix = mixtape_qodef_get_unique_page_class();

		$background_image = mixtape_qodef_get_meta_field_intersect('footer_background_image', $id);
		$background_color = mixtape_qodef_get_meta_field_intersect('footer_background_color', $id);


		if($background_image !== '') {
			$footer_bg_image_style_array['background-image'] = 'url('.$background_image.')';

			$current_style .= mixtape_qodef_dynamic_css('body'.$page_prefix.' footer', $footer_bg_image_style_array);
		}
		if($background_color !== ''){
			$footer_bg_color_style_array['background-color'] = $background_color;

			$current_style .= mixtape_qodef_dynamic_css('body'.$page_prefix.' footer', $footer_bg_color_style_array);
		}

		$current_style = $current_style . $style;

		return $current_style;
	}

	add_filter('mixtape_qodef_add_page_custom_style', 'mixtape_qodef_footer_page_styles');
}

