<?php

if ( ! function_exists('mixtape_qodef_call_to_action_options_map') ) {
	/**
	 * Add Call to Action options to elements page
	 */
	function mixtape_qodef_call_to_action_options_map() {

		$panel_call_to_action = mixtape_qodef_add_admin_panel(
			array(
				'page' => '_elements_page',
				'name' => 'panel_call_to_action',
				'title' => esc_html__('Call To Action', 'mixtapewp')
			)
		);

	}

	add_action( 'mixtape_qodef_options_elements_map', 'mixtape_qodef_call_to_action_options_map');

}