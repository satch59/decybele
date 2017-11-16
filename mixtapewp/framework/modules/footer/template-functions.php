<?php

if (!function_exists('mixtape_qodef_register_footer_sidebar')) {

	function mixtape_qodef_register_footer_sidebar() {

		register_sidebar(array(
			'name' => esc_html__('Footer Column 1', 'mixtapewp'),
			'id' => 'footer_column_1',
			'description' => esc_html__('Footer Column 1', 'mixtapewp'),
			'before_widget' => '<div id="%1$s" class="widget qodef-footer-column-1 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="qodef-footer-widget-title">',
			'after_title' => '</h4>'
		));

		register_sidebar(array(
			'name' => esc_html__('Footer Column 2', 'mixtapewp'),
			'id' => 'footer_column_2',
			'description' => esc_html__('Footer Column 2', 'mixtapewp'),
			'before_widget' => '<div id="%1$s" class="widget qodef-footer-column-2 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="qodef-footer-widget-title">',
			'after_title' => '</h4>'
		));

		register_sidebar(array(
			'name' => esc_html__('Footer Column 3', 'mixtapewp'),
			'id' => 'footer_column_3',
			'description' => esc_html__('Footer Column 3', 'mixtapewp'),
			'before_widget' => '<div id="%1$s" class="widget qodef-footer-column-3 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="qodef-footer-widget-title">',
			'after_title' => '</h4>'
		));

		register_sidebar(array(
			'name' => esc_html__('Footer Column 4', 'mixtapewp'),
			'id' => 'footer_column_4',
			'description' => esc_html__('Footer Column 4', 'mixtapewp'),
			'before_widget' => '<div id="%1$s" class="widget qodef-footer-column-4 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="qodef-footer-widget-title">',
			'after_title' => '</h4>'
		));

		register_sidebar(array(
			'name' => esc_html__('Footer Bottom', 'mixtapewp'),
			'id' => 'footer_text',
			'description' => esc_html__('Footer Bottom', 'mixtapewp'),
			'before_widget' => '<div id="%1$s" class="widget qodef-footer-text %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="qodef-footer-widget-title">',
			'after_title' => '</h4>'
		));

		register_sidebar(array(
			'name' => esc_html__('Footer Bottom Left', 'mixtapewp'),
			'id' => 'footer_bottom_left',
			'description' => esc_html__('Footer Bottom Left', 'mixtapewp'),
			'before_widget' => '<div id="%1$s" class="widget qodef-footer-bottom-left %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="qodef-footer-widget-title">',
			'after_title' => '</h4>'
		));

		register_sidebar(array(
			'name' => esc_html__('Footer Bottom Right', 'mixtapewp'),
			'id' => 'footer_bottom_right',
			'description' => esc_html__('Footer Bottom Right', 'mixtapewp'),
			'before_widget' => '<div id="%1$s" class="widget qodef-footer-bottom-left %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="qodef-footer-widget-title">',
			'after_title' => '</h4>'
		));

	}

	add_action('widgets_init', 'mixtape_qodef_register_footer_sidebar');

}

if (!function_exists('mixtape_qodef_get_footer')) {
	/**
	 * Loads footer HTML
	 */
	function mixtape_qodef_get_footer() {

		$parameters = array();
		$id = mixtape_qodef_get_page_id();
		$parameters['footer_classes'] = mixtape_qodef_get_footer_classes($id);
		$parameters['display_footer_top'] = mixtape_qodef_show_footer_top();
		$parameters['display_footer_bottom'] = mixtape_qodef_show_footer_bottom();

		mixtape_qodef_get_module_template_part('templates/footer', 'footer', '', $parameters);

	}

}

if (!function_exists('mixtape_qodef_get_content_bottom_area')) {
	/**
	 * Loads content bottom area HTML with all needed parameters
	 */
	function mixtape_qodef_get_content_bottom_area() {

		$parameters = array();

		//Current page id
		$id = mixtape_qodef_get_page_id();

		//is content bottom area enabled for current page?
		$parameters['content_bottom_area'] = mixtape_qodef_get_meta_field_intersect('enable_content_bottom_area');
		if ($parameters['content_bottom_area'] == 'yes') {
			//Sidebar for content bottom area
			$parameters['content_bottom_area_sidebar'] = mixtape_qodef_get_meta_field_intersect('content_bottom_sidebar_custom_display');
			//Content bottom area in grid
			$parameters['content_bottom_area_in_grid'] = mixtape_qodef_get_meta_field_intersect('content_bottom_in_grid');
			//Content bottom area background color
			$parameters['content_bottom_background_color'] = 'background-color: '.mixtape_qodef_get_meta_field_intersect('content_bottom_background_color');
		}

		mixtape_qodef_get_module_template_part('templates/parts/content-bottom-area', 'footer', '', $parameters);

	}

}

if (!function_exists('mixtape_qodef_get_footer_top')) {
	/**
	 * Return footer top HTML
	 */
	function mixtape_qodef_get_footer_top() {

		$parameters = array();

		$parameters['footer_in_grid'] = (mixtape_qodef_options()->getOptionValue('footer_in_grid') == 'yes') ? true : false;
		$parameters['footer_top_classes'] = mixtape_qodef_footer_top_classes();
		$parameters['footer_top_columns'] = mixtape_qodef_options()->getOptionValue('footer_top_columns');

		mixtape_qodef_get_module_template_part('templates/parts/footer-top', 'footer', '', $parameters);

	}
	
}

if (!function_exists('mixtape_qodef_get_footer_bottom')) {
	/**
	 * Return footer bottom HTML
	 */
	function mixtape_qodef_get_footer_bottom() {

		$parameters = array();

		$parameters['footer_in_grid'] = (mixtape_qodef_options()->getOptionValue('footer_in_grid') == 'yes') ? true : false;
		$parameters['footer_bottom_columns'] = mixtape_qodef_options()->getOptionValue('footer_bottom_columns');

		mixtape_qodef_get_module_template_part('templates/parts/footer-bottom', 'footer', '', $parameters);

	}

}

//Functions for loading sidebars

if (!function_exists('mixtape_qodef_get_footer_sidebar_25_25_50')) {

	function mixtape_qodef_get_footer_sidebar_25_25_50() {
		mixtape_qodef_get_module_template_part('templates/sidebars/sidebar-three-columns-25-25-50', 'footer');
	}

}

if (!function_exists('mixtape_qodef_get_footer_sidebar_50_25_25')) {

	function mixtape_qodef_get_footer_sidebar_50_25_25() {
		mixtape_qodef_get_module_template_part('templates/sidebars/sidebar-three-columns-50-25-25', 'footer');
	}

}

if (!function_exists('mixtape_qodef_get_footer_sidebar_four_columns')) {

	function mixtape_qodef_get_footer_sidebar_four_columns() {
		mixtape_qodef_get_module_template_part('templates/sidebars/sidebar-four-columns', 'footer');
	}

}

if (!function_exists('mixtape_qodef_get_footer_sidebar_three_columns')) {

	function mixtape_qodef_get_footer_sidebar_three_columns() {
		mixtape_qodef_get_module_template_part('templates/sidebars/sidebar-three-columns', 'footer');
	}

}

if (!function_exists('mixtape_qodef_get_footer_sidebar_two_columns')) {

	function mixtape_qodef_get_footer_sidebar_two_columns() {
		mixtape_qodef_get_module_template_part('templates/sidebars/sidebar-two-columns', 'footer');
	}

}

if (!function_exists('mixtape_qodef_get_footer_sidebar_one_column')) {

	function mixtape_qodef_get_footer_sidebar_one_column() {
		mixtape_qodef_get_module_template_part('templates/sidebars/sidebar-one-column', 'footer');
	}

}

if (!function_exists('mixtape_qodef_get_footer_bottom_sidebar_three_columns')) {

	function mixtape_qodef_get_footer_bottom_sidebar_three_columns() {
		mixtape_qodef_get_module_template_part('templates/sidebars/sidebar-bottom-three-columns', 'footer');
	}

}

if (!function_exists('mixtape_qodef_get_footer_bottom_sidebar_two_columns')) {

	function mixtape_qodef_get_footer_bottom_sidebar_two_columns() {
		mixtape_qodef_get_module_template_part('templates/sidebars/sidebar-bottom-two-columns', 'footer');
	}

}

if (!function_exists('mixtape_qodef_get_footer_bottom_sidebar_one_column')) {

	function mixtape_qodef_get_footer_bottom_sidebar_one_column() {
		mixtape_qodef_get_module_template_part('templates/sidebars/sidebar-bottom-one-column', 'footer');
	}

}

if(!function_exists('mixtape_qodef_show_footer_top')){
    /**
     * Check footer top showing
     * Function check value from options and checks if footer columns are empty.
     * return bool
     */
    function mixtape_qodef_show_footer_top(){
        $footer_top_flag = false;

        //check value from options and meta field on current page
        $option_flag = (mixtape_qodef_get_meta_field_intersect('show_footer_top') === 'yes') ? true : false;

        //check footer columns.If they are empty, disable footer top
        $columns_flag = false;
        for($i = 1; $i <= 4; $i++){
            $footer_columns_id = 'footer_column_'.$i;
            if(is_active_sidebar($footer_columns_id)) {
                $columns_flag = true;
                break;
            }
        }

        if($option_flag && $columns_flag){
            $footer_top_flag = true;
        }

        return $footer_top_flag;
    }
}
if(!function_exists('mixtape_qodef_show_footer_bottom')){
    /**
     * Check footer bottom showing
     * Function check value from options and checks if footer columns are empty.
     * return bool
     */
    function mixtape_qodef_show_footer_bottom(){
        $footer_bottom_flag = false;

        //check value from options and meta field on current page
        $option_flag = (mixtape_qodef_get_meta_field_intersect('show_footer_bottom') === 'yes') ? true : false;

        //check footer columns.If they are empty, disable footer bottom
        $columns_flag = false;
        if(is_active_sidebar('footer_text') || is_active_sidebar('footer_bottom_left') || is_active_sidebar('footer_bottom_right')) {
            $columns_flag = true;
        }

        if($option_flag && $columns_flag){
            $footer_bottom_flag = true;
        }

        return $footer_bottom_flag;
    }
}

