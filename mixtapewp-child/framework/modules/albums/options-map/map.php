<?php

if ( ! function_exists('mixtape_qodef_albums_options_map') ) {

	function mixtape_qodef_albums_options_map() {

		mixtape_qodef_add_admin_page(array(
			'slug'  => '_albums',
			'title' => esc_html__('Albums','mixtapewp'),
			'icon'  => 'fa fa-music'
		));

		$panel = mixtape_qodef_add_admin_panel(array(
			'title' => esc_html__('Albums','mixtapewp'),
			'name'  => 'panel_albums',
			'page'  => '_albums'
		));

		mixtape_qodef_add_admin_field(
			array(
				'name'			=> 'album_type',
				'type'			=> 'select',
				'label'			=> esc_html__('Album Type', 'mixtapewp'),
				'default_value'	=> 'comprehensive',
				'options' => array(
					'comprehensive' => esc_html__('Album Comprehensive','mixtapewp'),
					'minimal'		=> esc_html__('Album Minimal','mixtapewp'),
					'compact'		=> esc_html__('Album Compact','mixtapewp')
				),
				'parent'      => $panel
			)
		);

		mixtape_qodef_add_admin_field(array(
			'name'          => 'album_comments',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Comments','mixtapewp'),
			'description'   => esc_html__('Enabling this option will show comments on your album.','mixtapewp'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		mixtape_qodef_add_admin_field(array(
			'name'          => 'album_pagination',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Navigation','mixtapewp'),
			'description'   => esc_html__('Enabling this option will turn on album navigation functionality.','mixtapewp'),
			'parent'        => $panel,
			'default_value' => 'yes',
		));

	}

	add_action( 'mixtape_qodef_options_map', 'mixtape_qodef_albums_options_map', 12);

}