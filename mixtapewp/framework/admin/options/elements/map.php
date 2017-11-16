<?php

if ( ! function_exists('mixtape_qodef_load_elements_map') ) {
	/**
	 * Add Elements option page for shortcodes
	 */
	function mixtape_qodef_load_elements_map() {

		mixtape_qodef_add_admin_page(
			array(
				'slug' => '_elements_page',
				'title' => esc_html__('Elements', 'mixtapewp'),
				'icon' => 'fa fa-flag-o'
			)
		);

		do_action( 'mixtape_qodef_options_elements_map' );

	}

	add_action('mixtape_qodef_options_map', 'mixtape_qodef_load_elements_map', 8);

}