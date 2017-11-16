<?php

if ( ! function_exists('mixtape_qodef_error_404_options_map') ) {

	function mixtape_qodef_error_404_options_map() {

		mixtape_qodef_add_admin_page(array(
			'slug' => '__404_error_page',
			'title' => esc_html__('404 Error Page', 'mixtapewp'),
			'icon' => 'fa fa-exclamation-triangle'
		));

		$panel_404_options = mixtape_qodef_add_admin_panel(array(
			'page' => '__404_error_page',
			'name'	=> 'panel_404_options',
			'title'	=> esc_html__('404 Page Option', 'mixtapewp')
		));

		mixtape_qodef_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_title',
			'default_value' => '',
			'label' => esc_html__('Title', 'mixtapewp'),
			'description' => esc_html__('Enter title for 404 page', 'mixtapewp')
		));

		mixtape_qodef_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_text',
			'default_value' => '',
			'label' => esc_html__('Text', 'mixtapewp'),
			'description' => esc_html__('Enter text for 404 page', 'mixtapewp')
		));

		mixtape_qodef_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_back_to_home',
			'default_value' => '',
			'label' => esc_html__('Back to Home Button Label', 'mixtapewp'),
			'description' => esc_html__('Enter label for "Back to Home" button', 'mixtapewp')
		));

	}

	add_action( 'mixtape_qodef_options_map', 'mixtape_qodef_error_404_options_map', 20);

}