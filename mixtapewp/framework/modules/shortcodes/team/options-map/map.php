<?php

if ( ! function_exists('mixtape_qodef_team_options_map') ) {
	/**
	 * Add Team options to elements page
	 */
	function mixtape_qodef_team_options_map() {

		$panel_team = mixtape_qodef_add_admin_panel(
			array(
				'page' => '_elements_page',
				'name' => 'panel_team',
				'title' => esc_html__('Team', 'mixtapewp')
			)
		);

	}

	add_action( 'mixtape_qodef_options_elements_map', 'mixtape_qodef_team_options_map');

}