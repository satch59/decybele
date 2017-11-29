<?php

if ( ! function_exists('mixtape_qodef_reset_options_map') ) {
	/**
	 * Reset options panel
	 */
	function mixtape_qodef_reset_options_map() {

		mixtape_qodef_add_admin_page(
			array(
				'slug'  => '_reset_page',
				'title' => esc_html__('Reset', 'mixtapewp'),
				'icon'  => 'fa fa-retweet'
			)
		);

		$panel_reset = mixtape_qodef_add_admin_panel(
			array(
				'page'  => '_reset_page',
				'name'  => 'panel_reset',
				'title' => esc_html__('Reset', 'mixtapewp')
			)
		);

		mixtape_qodef_add_admin_field(array(
			'type'	=> 'yesno',
			'name'	=> 'reset_to_defaults',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Reset to Defaults', 'mixtapewp'),
			'description'	=> esc_html__('This option will reset all Select Options values to defaults', 'mixtapewp'),
			'parent'		=> $panel_reset
		));

	}

	add_action( 'mixtape_qodef_options_map', 'mixtape_qodef_reset_options_map', 23 );

}