<?php

if ( ! function_exists('mixtape_qodef_pricing_table_options_map') ) {
	/**
	 * Add Pricing Table options to elements page
	 */
	function mixtape_qodef_pricing_table_options_map() {

		$panel_pricing_table = mixtape_qodef_add_admin_panel(
			array(
				'page' => '_elements_page',
				'name' => 'panel_pricing_table',
				'title' => esc_html__('Pricing Table', 'mixtapewp')
			)
		);

	}

	add_action( 'mixtape_qodef_options_elements_map', 'mixtape_qodef_pricing_table_options_map');

}