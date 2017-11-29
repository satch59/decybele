<?php

if ( ! function_exists('mixtape_qodef_parallax_options_map') ) {
	/**
	 * Parallax options page
	 */
	function mixtape_qodef_parallax_options_map()
	{

		$panel_parallax = mixtape_qodef_add_admin_panel(
			array(
				'page'  => '_elements_page',
				'name'  => 'panel_parallax',
				'title' => esc_html__('Parallax', 'mixtapewp')
			)
		);

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'onoff',
			'name'			=> 'parallax_on_off',
			'default_value'	=> 'off',
			'label'			=> esc_html__('Parallax on touch devices', 'mixtapewp'),
			'description'	=> esc_html__('Enabling this option will allow parallax on touch devices', 'mixtapewp'),
			'parent'		=> $panel_parallax
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'text',
			'name'			=> 'parallax_min_height',
			'default_value'	=> '400',
			'label'			=> esc_html__('Parallax Min Height', 'mixtapewp'),
			'description'	=> esc_html__('Set a minimum height for parallax images on small displays (phones, tablets, etc.)', 'mixtapewp'),
			'args'			=> array(
				'col_width'	=> 3,
				'suffix'	=> 'px'
			),
			'parent'		=> $panel_parallax
		));

	}

	add_action( 'mixtape_qodef_options_elements_map', 'mixtape_qodef_parallax_options_map');

}