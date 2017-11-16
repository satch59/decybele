<?php

if(!function_exists('mixtape_qodef_header_class')) {
    /**
     * Function that adds class to header based on theme options
     * @param array array of classes from main filter
     * @return array array of classes with added header class
     */
    function mixtape_qodef_header_class($classes) {
        $header_type = mixtape_qodef_get_meta_field_intersect('header_type', mixtape_qodef_get_page_id());

        $classes[] = 'qodef-'.$header_type;

        return $classes;
    }

    add_filter('body_class', 'mixtape_qodef_header_class');
}

if(!function_exists('mixtape_qodef_header_behaviour_class')) {
    /**
     * Function that adds behaviour class to header based on theme options
     * @param array array of classes from main filter
     * @return array array of classes with added behaviour class
     */
    function mixtape_qodef_header_behaviour_class($classes) {
		$id = mixtape_qodef_get_page_id();

        $classes[] = 'qodef-'.mixtape_qodef_get_meta_field_intersect('header_behaviour',$id);

        return $classes;
    }

    add_filter('body_class', 'mixtape_qodef_header_behaviour_class');
}

if(!function_exists('mixtape_qodef_menu_item_icon_position_class')) {
    /**
     * Function that adds menu item icon position class to header based on theme options
     * @param array array of classes from main filter
     * @return array array of classes with added menu item icon position class
     */
    function mixtape_qodef_menu_item_icon_position_class($classes) {

        if(mixtape_qodef_options()->getOptionValue('menu_item_icon_position') == 'top'){
            $classes[] = 'qodef-menu-with-large-icons';
        }

        return $classes;
    }

    add_filter('body_class', 'mixtape_qodef_menu_item_icon_position_class');
}

if(!function_exists('mixtape_qodef_mobile_header_class')) {
    function mixtape_qodef_mobile_header_class($classes) {
        $classes[] = 'qodef-default-mobile-header';

        $classes[] = 'qodef-sticky-up-mobile-header';

        return $classes;
    }

    add_filter('body_class', 'mixtape_qodef_mobile_header_class');
}

if(!function_exists('mixtape_qodef_header_class_first_level_bg_color')) {
    /**
     * Function that adds first level menu background color class to header tag
     * @param array array of classes from main filter
     * @return array array of classes with added first level menu background color class
     */
    function mixtape_qodef_header_class_first_level_bg_color($classes) {

        //check if first level hover background color is set
        if(mixtape_qodef_options()->getOptionValue('menu_hover_background_color') !== ''){
            $classes[]= 'qodef-menu-item-first-level-bg-color';
        }

        return $classes;
    }

    add_filter('body_class', 'mixtape_qodef_header_class_first_level_bg_color');
}

if(!function_exists('mixtape_qodef_menu_dropdown_appearance')) {
    /**
     * Function that adds menu dropdown appearance class to body tag
     * @param array array of classes from main filter
     * @return array array of classes with added menu dropdown appearance class
     */
    function mixtape_qodef_menu_dropdown_appearance($classes) {

        if(mixtape_qodef_options()->getOptionValue('menu_dropdown_appearance') !== 'default'){
            $classes[] = 'qodef-'.mixtape_qodef_options()->getOptionValue('menu_dropdown_appearance');
        }

        return $classes;
    }

    add_filter('body_class', 'mixtape_qodef_menu_dropdown_appearance');
}

if (!function_exists('mixtape_qodef_header_skin_class')) {

    function mixtape_qodef_header_skin_class( $classes ) {

        $id = mixtape_qodef_get_page_id();

		if(($meta_temp = get_post_meta($id, 'qodef_header_style_meta', true)) !== ''){
			$classes[] = 'qodef-' . $meta_temp;
		} else if ( mixtape_qodef_options()->getOptionValue('header_style') !== '' ) {
            $classes[] = 'qodef-' . mixtape_qodef_options()->getOptionValue('header_style');
        }

        return $classes;

    }

    add_filter('body_class', 'mixtape_qodef_header_skin_class');

}

if (!function_exists('mixtape_qodef_header_scroll_style_class')) {

	function mixtape_qodef_header_scroll_style_class( $classes ) {

		if (mixtape_qodef_get_meta_field_intersect('enable_header_style_on_scroll') == 'yes' ) {
			$classes[] = 'qodef-header-style-on-scroll';
		}

		return $classes;

	}

	add_filter('body_class', 'mixtape_qodef_header_scroll_style_class');

}

if(!function_exists('mixtape_qodef_header_global_js_var')) {
    function mixtape_qodef_header_global_js_var($global_variables) {

        $global_variables['qodefTopBarHeight'] = mixtape_qodef_get_top_bar_height();
        $global_variables['qodefStickyHeaderHeight'] = mixtape_qodef_get_sticky_header_height();
        $global_variables['qodefStickyHeaderTransparencyHeight'] = mixtape_qodef_get_sticky_header_height_of_complete_transparency();
        $global_variables['qodefStickyScrollAmount'] = mixtape_qodef_get_sticky_scroll_amount();

        return $global_variables;
    }

    add_filter('mixtape_qodef_js_global_variables', 'mixtape_qodef_header_global_js_var');
}

if(!function_exists('mixtape_qodef_header_per_page_js_var')) {
    function mixtape_qodef_header_per_page_js_var($perPageVars) {

        $perPageVars['qodefStickyScrollAmount'] = mixtape_qodef_get_sticky_scroll_amount_per_page();

        return $perPageVars;
    }

    add_filter('mixtape_qodef_per_page_js_vars', 'mixtape_qodef_header_per_page_js_var');
}

if(!function_exists('mixtape_qodef_get_top_bar_styles')) {
	/**
	 * Sets per page styles for header top bar
	 *
	 * @param $style
	 *
	 * @return array
	 */
	function mixtape_qodef_get_top_bar_styles($style) {
		$id            = mixtape_qodef_get_page_id();
		$class_prefix  = mixtape_qodef_get_unique_page_class();
		$top_bar_style = array();

		$top_bar_bg_color     = get_post_meta($id, 'qodef_top_bar_background_color_meta', true);

		$top_bar_selector = array(
			$class_prefix.' .qodef-top-bar'
		);

		if($top_bar_bg_color !== '') {
			$top_bar_transparency = get_post_meta($id, 'qodef_top_bar_background_transparency_meta', true);
			if($top_bar_transparency === '') {
				$top_bar_transparency = 1;
			}

			$top_bar_style['background-color'] = mixtape_qodef_rgba_color($top_bar_bg_color, $top_bar_transparency);
		}

		$current_style = mixtape_qodef_dynamic_css($top_bar_selector, $top_bar_style);
		$current_style = $current_style . $style;

		return $current_style;
	}

	add_filter('mixtape_qodef_add_page_custom_style', 'mixtape_qodef_get_top_bar_styles');
}
if(!function_exists('mixtape_qodef_top_bar_skin_class')) {
	/**
	 * @param $classes
	 *
	 * @return array
	 */
	function mixtape_qodef_top_bar_skin_class($classes) {
		$id = mixtape_qodef_get_page_id();
		$top_bar_skin = get_post_meta($id, 'qodef_top_bar_skin_meta', true);

		if($top_bar_skin !== '') {
			$classes[] = 'qodef-top-bar-'.$top_bar_skin;
		}

		return $classes;
	}

	add_filter('body_class', 'mixtape_qodef_top_bar_skin_class');
}