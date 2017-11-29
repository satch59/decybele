<?php

if ( ! function_exists('mixtape_qodef_sidebar_options_map') ) {

	function mixtape_qodef_sidebar_options_map() {

		mixtape_qodef_add_admin_page(
			array(
				'slug'  => '_sidebar_page',
				'title' => esc_html__('Sidebar', 'mixtapewp'),
				'icon'  => 'fa fa-indent'
			)
		);

		$panel_widgets = mixtape_qodef_add_admin_panel(
			array(
				'page'  => '_sidebar_page',
				'name'  => 'panel_widgets',
				'title' => esc_html__('Widgets', 'mixtapewp')
			)
		);

		/**
		 * Navigation style
		 */
		mixtape_qodef_add_admin_field(array(
			'type'			=> 'color',
			'name'			=> 'sidebar_background_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Sidebar Background Color', 'mixtapewp'),
			'description'	=> esc_html__('Choose background color for sidebar', 'mixtapewp'),
			'parent'		=> $panel_widgets
		));

		$group_sidebar_padding = mixtape_qodef_add_admin_group(array(
			'name'		=> 'group_sidebar_padding',
			'title'		=> esc_html__('Padding', 'mixtapewp'),
			'parent'	=> $panel_widgets
		));

		$row_sidebar_padding = mixtape_qodef_add_admin_row(array(
			'name'		=> 'row_sidebar_padding',
			'parent'	=> $group_sidebar_padding
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'sidebar_padding_top',
			'default_value'	=> '',
			'label'			=> esc_html__('Top Padding', 'mixtapewp'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_sidebar_padding
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'sidebar_padding_right',
			'default_value'	=> '',
			'label'			=> esc_html__('Right Padding', 'mixtapewp'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_sidebar_padding
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'sidebar_padding_bottom',
			'default_value'	=> '',
			'label'			=> esc_html__('Bottom Padding', 'mixtapewp'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_sidebar_padding
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'sidebar_padding_left',
			'default_value'	=> '',
			'label'			=> esc_html__('Left Padding', 'mixtapewp'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_sidebar_padding
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'select',
			'name'			=> 'sidebar_alignment',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Alignment', 'mixtapewp'),
			'description'	=> esc_html__('Choose text aligment', 'mixtapewp'),
			'options'		=> array(
				'left' => esc_html__('Left', 'mixtapewp'),
				'center' => esc_html__('Center', 'mixtapewp'),
				'right' => esc_html__('Right', 'mixtapewp')
			),
			'parent'		=> $panel_widgets
		));

	}

	add_action( 'mixtape_qodef_options_map', 'mixtape_qodef_sidebar_options_map', 10);

}