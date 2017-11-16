<?php

if ( ! function_exists('mixtape_qodef_header_options_map') ) {

	function mixtape_qodef_header_options_map() {

		mixtape_qodef_add_admin_page(
			array(
				'slug' => '_header_page',
				'title' => esc_html__('Header', 'mixtapewp'),
				'icon' => 'fa fa-header'
			)
		);

		$panel_header = mixtape_qodef_add_admin_panel(
			array(
				'page' => '_header_page',
				'name' => 'panel_header',
				'title' => esc_html__('Header', 'mixtapewp')
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'radiogroup',
				'name' => 'header_type',
				'default_value' => 'header-standard',
				'label' => esc_html__('Choose Header Type', 'mixtapewp'),
				'description' => esc_html__('Select the type of header you would like to use', 'mixtapewp'),
				'options' => array(
					'header-standard' => array(
						'image' => QODE_ROOT . '/framework/admin/assets/img/header-standard.png',
						'label' => esc_html__('Header Standard', 'mixtapewp')
					),
					'header-vertical' => array(
						'image' => QODE_ROOT . '/framework/admin/assets/img/header-vertical.png',
						'label' => esc_html__('Header Vertical', 'mixtapewp')
					),
					'header-full-screen' => array(
						'image' => QODE_ROOT . '/framework/admin/assets/img/header-full-screen.png',
						'label' => esc_html__('Header Full Screen', 'mixtapewp')
					)
				),
				'args' => array(
					'use_images' => true,
					'hide_labels' => true,
					'dependence' => true,
					'show' => array(
						'header-standard'		=> '#qodef_panel_header_standard,#qodef_header_behaviour,#qodef_panel_fixed_header,#qodef_panel_sticky_header,#qodef_panel_main_menu',
						'header-vertical'		=> '#qodef_panel_header_vertical,#qodef_fullscreen_menu',
						'header-full-screen'	=> '#qodef_panel_header_full_screen,#qodef_fullscreen_menu, #qodef_qodef_full_screen_general_container',
					),
					'hide' => array(
						'header-standard'		=> '#qodef_panel_header_vertical,#qodef_panel_header_full_screen,#qodef_fullscreen_menu, #qodef_qodef_full_screen_general_container',
						'header-vertical'		=> '#qodef_panel_header_standard,#qodef_header_behaviour,#qodef_panel_fixed_header,#qodef_panel_sticky_header,#qodef_panel_main_menu,#qodef_panel_header_full_screen, #qodef_qodef_full_screen_general_container',
						'header-full-screen'	=> '#qodef_panel_header_standard,#qodef_header_behaviour,#qodef_panel_fixed_header,#qodef_panel_sticky_header,#qodef_panel_main_menu,#qodef_panel_header_vertical'

					)
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'select',
				'name' => 'header_behaviour',
				'default_value' => 'sticky-header-on-scroll-up',
				'label' => esc_html__('Choose Header behaviour', 'mixtapewp'),
				'description' => esc_html__('Select the behaviour of header when you scroll down to page', 'mixtapewp'),
				'options' => array(
					'no-behavior' => esc_html__('No Behavior', 'mixtapewp'),
					'sticky-header-on-scroll-up' => esc_html__('Sticky on scrol up', 'mixtapewp'),
					'sticky-header-on-scroll-down-up' => esc_html__('Sticky on scrol up/down', 'mixtapewp'),
					'fixed-on-scroll' => esc_html__('Fixed on scroll', 'mixtapewp')
				),
                'hidden_property' => 'header_type',
                'hidden_value' => '',
                'hidden_values' => array('header-vertical','header-full-screen'),
				'args' => array(
					'dependence' => true,
					'show' => array(
						'sticky-header-on-scroll-up' => '#qodef_panel_sticky_header',
						'sticky-header-on-scroll-down-up' => '#qodef_panel_sticky_header',
						'fixed-on-scroll' => '#qodef_panel_fixed_header'
					),
					'hide' => array(
						'sticky-header-on-scroll-up' => '#qodef_panel_fixed_header',
						'sticky-header-on-scroll-down-up' => '#qodef_panel_fixed_header',
						'fixed-on-scroll' => '#qodef_panel_sticky_header',
					)
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'name' => 'top_bar',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__('Top Bar', 'mixtapewp'),
				'description' => esc_html__('Enabling this option will show top bar area', 'mixtapewp'),
				'parent' => $panel_header,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#qodef_top_bar_container"
				)
			)
		);

		$top_bar_container = mixtape_qodef_add_admin_container(array(
			'name' => 'top_bar_container',
			'parent' => $panel_header,
			'hidden_property' => 'top_bar',
			'hidden_value' => 'no'
		));

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $top_bar_container,
				'type' => 'select',
				'name' => 'top_bar_layout',
				'default_value' => 'three-columns',
				'label' => esc_html__('Choose top bar layout', 'mixtapewp'),
				'description' => esc_html__('Select the layout for top bar', 'mixtapewp'),
				'options' => array(
					'two-columns' => esc_html__('Two columns', 'mixtapewp'),
					'three-columns' => esc_html__('Three columns', 'mixtapewp')
				),
				'args' => array(
					"dependence" => true,
					"hide" => array(
						"two-columns" => "#qodef_top_bar_layout_container",
						"three-columns" => ""
					),
					"show" => array(
						"two-columns" => "",
						"three-columns" => "#qodef_top_bar_layout_container"
					)
				)
			)
		);

		$top_bar_layout_container = mixtape_qodef_add_admin_container(array(
			'name' => 'top_bar_layout_container',
			'parent' => $top_bar_container,
			'hidden_property' => 'top_bar_layout',
			'hidden_value' => '',
			'hidden_values' => array("two-columns"),
		));

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $top_bar_layout_container,
				'type' => 'select',
				'name' => 'top_bar_column_widths',
				'default_value' => '30-30-30',
				'label' => esc_html__('Choose column widths', 'mixtapewp'),
				'description' => '',
				'options' => array(
					'30-30-30' => '33% - 33% - 33%',
					'25-50-25' => '25% - 50% - 25%'
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'name' => 'top_bar_in_grid',
				'type' => 'yesno',
				'default_value' => 'yes',
				'label' => esc_html__('Top Bar in grid', 'mixtapewp'),
				'description' => esc_html__('Set top bar content to be in grid', 'mixtapewp'),
				'parent' => $top_bar_container,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#qodef_top_bar_in_grid_container"
				)
			)
		);

		$top_bar_in_grid_container = mixtape_qodef_add_admin_container(array(
			'name' => 'top_bar_in_grid_container',
			'parent' => $top_bar_container,
			'hidden_property' => 'top_bar_in_grid',
			'hidden_value' => 'no'
		));

		mixtape_qodef_add_admin_field(array(
			'name' => 'top_bar_grid_background_color',
			'type' => 'color',
			'label' => esc_html__('Grid Background Color', 'mixtapewp'),
			'description' => esc_html__('Set grid background color for top bar', 'mixtapewp'),
			'parent' => $top_bar_in_grid_container
		));


		mixtape_qodef_add_admin_field(array(
			'name' => 'top_bar_grid_background_transparency',
			'type' => 'text',
			'label' => esc_html__('Grid Background Transparency', 'mixtapewp'),
			'description' => esc_html__('Set grid background transparency for top bar', 'mixtapewp'),
			'parent' => $top_bar_in_grid_container,
			'args' => array('col_width' => 3)
		));

		mixtape_qodef_add_admin_field(array(
			'name' => 'top_bar_background_color',
			'type' => 'color',
			'label' => esc_html__('Background Color', 'mixtapewp'),
			'description' => esc_html__('Set background color for top bar', 'mixtapewp'),
			'parent' => $top_bar_container
		));

		mixtape_qodef_add_admin_field(array(
			'name' => 'top_bar_background_transparency',
			'type' => 'text',
			'label' => esc_html__('Background Transparency', 'mixtapewp'),
			'description' => esc_html__('Set background transparency for top bar', 'mixtapewp'),
			'parent' => $top_bar_container,
			'args' => array('col_width' => 3)
		));

		mixtape_qodef_add_admin_field(array(
			'name' => 'top_bar_height',
			'type' => 'text',
			'label' => esc_html__('Top bar height', 'mixtapewp'),
			'description' => esc_html__('Enter top bar height (Default is 40px)', 'mixtapewp'),
			'parent' => $top_bar_container,
			'args' => array(
				'col_width' => 2,
				'suffix' => 'px'
			)
		));

		mixtape_qodef_add_admin_field(array(
			'name' => 'hide_top_bar_on_responsive',
			'type' => 'yesno',
			'default_value' => 'yes',
			'label' => esc_html__('Hide Top Bar on Responsive', 'mixtapewp'),
			'description' => esc_html__('Enabling this option you will hide top header area on responsive', 'mixtapewp'),
			'parent' => $top_bar_container,
		));
		
		mixtape_qodef_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'select',
				'name' => 'header_style',
				'default_value' => '',
				'label' => esc_html__('Header Skin', 'mixtapewp'),
				'description' => esc_html__('Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'mixtapewp'),
				'options' => array(
					'' => '',
					'light-header' => esc_html__('Light', 'mixtapewp'),
					'dark-header' => esc_html__('Dark', 'mixtapewp')
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'yesno',
				'name' => 'enable_header_style_on_scroll',
				'default_value' => 'no',
				'label' => esc_html__('Enable Header Style on Scroll', 'mixtapewp'),
				'description' => esc_html__('Enabling this option, header will change style depending on row settings for dark/light style', 'mixtapewp'),
			)
		);


		$panel_header_standard = mixtape_qodef_add_admin_panel(
			array(
				'page' => '_header_page',
				'name' => 'panel_header_standard',
				'title' => esc_html__('Header Standard', 'mixtapewp'),
				'hidden_property' => 'header_type',
				'hidden_value' => '',
				'hidden_values' => array(
                    'header-vertical',
					'header-full-screen'
				)
			)
		);

		mixtape_qodef_add_admin_section_title(
			array(
				'parent' => $panel_header_standard,
				'name' => 'menu_area_title',
				'title' => esc_html__('Menu Area', 'mixtapewp')
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $panel_header_standard,
				'type' => 'yesno',
				'name' => 'menu_area_in_grid_header_standard',
				'default_value' => 'no',
				'label' => esc_html__('Header in grid', 'mixtapewp'),
				'description' => esc_html__('Set header content to be in grid', 'mixtapewp')
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $panel_header_standard,
				'type' => 'color',
				'name' => 'menu_area_background_color_header_standard',
				'default_value' => '',
				'label' => esc_html__('Background color', 'mixtapewp'),
				'description' => esc_html__('Set background color for header', 'mixtapewp')
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $panel_header_standard,
				'type' => 'text',
				'name' => 'menu_area_background_transparency_header_standard',
				'default_value' => '',
				'label' => esc_html__('Background transparency', 'mixtapewp'),
				'description' => esc_html__('Set background transparency for header', 'mixtapewp'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'        => $panel_header_standard,
				'type'          => 'yesno',
				'name'          => 'border_bottom_header_standard',
				'default_value' => 'yes',
				'label'         => esc_html__('Enable Border Bottom', 'mixtapewp'),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_border_bottom_header_standard_container'
				)
			)
		);

		$border_bottom_header_standard_container = mixtape_qodef_add_admin_container(
			array(
				'parent'          => $panel_header_standard,
				'name'            => 'border_bottom_header_standard_container',
				'hidden_property' => 'border_bottom_header_standard',
				'hidden_value'    => 'no'
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'        => $border_bottom_header_standard_container,
				'type'          => 'color',
				'name'          => 'border_bottom_color_header_standard',
				'default_value' => '',
				'label'         => esc_html__('Border Bottom Color', 'mixtapewp'),
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $border_bottom_header_standard_container,
				'type' => 'text',
				'name' => 'border_bottom_transparency_header_standard',
				'default_value' => '',
				'label' => esc_html__('Border Bottom Transparency','mixtapewp'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $panel_header_standard,
				'type' => 'text',
				'name' => 'menu_area_height_header_standard',
				'default_value' => '',
				'label' => esc_html__('Height', 'mixtapewp'),
				'description' => esc_html__('Enter header height (default is 85px)', 'mixtapewp'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

        $panel_header_vertical = mixtape_qodef_add_admin_panel(
            array(
                'page' => '_header_page',
                'name' => 'panel_header_vertical',
                'title' => esc_html__('Header Vertical', 'mixtapewp'),
                'hidden_property' => 'header_type',
                'hidden_value' => '',
                'hidden_values' => array(
                    'header-standard',
					'header-full-screen'
                )
            )
        );

            mixtape_qodef_add_admin_field(array(
                'name' => 'vertical_header_background_color',
                'type' => 'color',
                'label' => esc_html__('Background Color', 'mixtapewp'),
                'description' => esc_html__('Set background color for vertical menu', 'mixtapewp'),
                'parent' => $panel_header_vertical
            ));

            mixtape_qodef_add_admin_field(array(
                'name' => 'vertical_header_transparency',
                'type' => 'text',
                'label' => esc_html__('Transparency', 'mixtapewp'),
                'description' => esc_html__('Enter transparency for vertical menu (value from 0 to 1)', 'mixtapewp'),
                'parent' => $panel_header_vertical,
                'args' => array(
                    'col_width' => 1
                )
            ));

            mixtape_qodef_add_admin_field(
                array(
                    'name' => 'vertical_header_background_image',
                    'type' => 'image',
                    'default_value' => '',
                    'label' => esc_html__('Background Image', 'mixtapewp'),
                    'description' => esc_html__('Set background image for vertical menu', 'mixtapewp'),
                    'parent' => $panel_header_vertical
                )
            );


		$panel_header_full_screen = mixtape_qodef_add_admin_panel(
			array(
				'page' => '_header_page',
				'name' => 'panel_header_full_screen',
				'title' => esc_html__('Header Full Screen', 'mixtapewp'),
				'hidden_property' => 'header_type',
				'hidden_value' => '',
				'hidden_values' => array(
					'header-standard',
					'header-vertical'
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $panel_header_full_screen,
				'type' => 'yesno',
				'name' => 'menu_area_in_grid_header_full_screen',
				'default_value' => 'yes',
				'label' => esc_html__('Header in grid', 'mixtapewp'),
				'description' => esc_html__('Set header content to be in grid', 'mixtapewp')
			)
		);



		mixtape_qodef_add_admin_field(
			array(
				'parent' => $panel_header_full_screen,
				'type' => 'color',
				'name' => 'menu_area_background_color_header_full_screen',
				'default_value' => '',
				'label' => esc_html__('Background color', 'mixtapewp'),
				'description' => esc_html__('Set background color for header', 'mixtapewp')
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $panel_header_full_screen,
				'type' => 'text',
				'name' => 'menu_area_background_transparency_header_full_screen',
				'default_value' => '',
				'label' => esc_html__('Background transparency', 'mixtapewp'),
				'description' => esc_html__('Set background transparency for header', 'mixtapewp'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'        => $panel_header_full_screen,
				'type'          => 'yesno',
				'name'          => 'border_bottom_header_full_screen',
				'default_value' => 'no',
				'label'         => esc_html__('Enable Border Bottom', 'mixtapewp'),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_border_bottom_header_full_screen_container'
				)
			)
		);

		$border_bottom_header_full_screen_container = mixtape_qodef_add_admin_container(
			array(
				'parent'          => $panel_header_full_screen,
				'name'            => 'border_bottom_header_full_screen_container',
				'hidden_property' => 'border_bottom_header_full_screen',
				'hidden_value'    => 'no'
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'        => $border_bottom_header_full_screen_container,
				'type'          => 'color',
				'name'          => 'border_bottom_color_header_full_screen',
				'default_value' => '',
				'label'         => esc_html__('Border Color', 'mixtapewp'),
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $border_bottom_header_full_screen_container,
				'type' => 'text',
				'name' => 'border_bottom_transparency_header_full_screen',
				'default_value' => '',
				'label' => esc_html__('Border Bottom Transparency', 'mixtapewp'),
				'args' => array(
					'col_width' => 3,
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $panel_header_full_screen,
				'type' => 'text',
				'name' => 'menu_area_height_header_full_screen',
				'default_value' => '',
				'label' => esc_html__('Height', 'mixtapewp'),
				'description' => esc_html__('Enter header height (default is 85px)', 'mixtapewp'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);


		$panel_sticky_header = mixtape_qodef_add_admin_panel(
			array(
				'title' => esc_html__('Sticky Header', 'mixtapewp'),
				'name' => 'panel_sticky_header',
				'page' => '_header_page',
				'hidden_property' => 'header_behaviour',
				'hidden_values' => array(
					'fixed-on-scroll'
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'name' => 'scroll_amount_for_sticky',
				'type' => 'text',
				'label' => esc_html__('Scroll Amount for Sticky', 'mixtapewp'),
				'description' => esc_html__('Enter scroll amount for Sticky Menu to appear (deafult is header height)', 'mixtapewp'),
				'parent' => $panel_sticky_header,
				'args' => array(
					'col_width' => 2,
					'suffix' => 'px'
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'name' => 'sticky_header_in_grid',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__('Sticky Header in grid', 'mixtapewp'),
				'description' => esc_html__('Set sticky header content to be in grid', 'mixtapewp'),
				'parent' => $panel_sticky_header,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#qodef_sticky_header_in_grid_container"
				)
			)
		);

		$sticky_header_in_grid_container = mixtape_qodef_add_admin_container(array(
			'name' => 'sticky_header_in_grid_container',
			'parent' => $panel_sticky_header,
			'hidden_property' => 'sticky_header_in_grid',
			'hidden_value' => 'no'
		));

		mixtape_qodef_add_admin_field(array(
			'name' => 'sticky_header_grid_background_color',
			'type' => 'color',
			'label' => esc_html__('Grid Background Color', 'mixtapewp'),
			'description' => esc_html__('Set grid background color for sticky header', 'mixtapewp'),
			'parent' => $sticky_header_in_grid_container
		));

		mixtape_qodef_add_admin_field(array(
			'name' => 'sticky_header_grid_transparency',
			'type' => 'text',
			'label' => esc_html__('Sticky Header Grid Transparency', 'mixtapewp'),
			'description' => esc_html__('Enter transparency for sticky header grid (value from 0 to 1)', 'mixtapewp'),
			'parent' => $sticky_header_in_grid_container,
			'args' => array(
				'col_width' => 1
			)
		));

		mixtape_qodef_add_admin_field(array(
			'name' => 'sticky_header_background_color',
			'type' => 'color',
			'label' => esc_html__('Background Color', 'mixtapewp'),
			'description' => esc_html__('Set background color for sticky header', 'mixtapewp'),
			'parent' => $panel_sticky_header
		));

		mixtape_qodef_add_admin_field(array(
			'name' => 'sticky_header_transparency',
			'type' => 'text',
			'label' => esc_html__('Sticky Header Transparency', 'mixtapewp'),
			'description' => esc_html__('Enter transparency for sticky header (value from 0 to 1)', 'mixtapewp'),
			'parent' => $panel_sticky_header,
			'args' => array(
				'col_width' => 1
			)
		));

		mixtape_qodef_add_admin_field(array(
			'name' => 'sticky_header_height',
			'type' => 'text',
			'label' => esc_html__('Sticky Header Height', 'mixtapewp'),
			'description' => esc_html__('Enter height for sticky header (default is 85px)', 'mixtapewp'),
			'parent' => $panel_sticky_header,
			'args' => array(
				'col_width' => 2,
				'suffix' => 'px'
			)
		));

		$group_sticky_header_menu = mixtape_qodef_add_admin_group(array(
			'title' => esc_html__('Sticky Header Menu', 'mixtapewp'),
			'name' => 'group_sticky_header_menu',
			'parent' => $panel_sticky_header,
			'description' => esc_html__('Define styles for sticky menu items', 'mixtapewp'),
		));

		$row1_sticky_header_menu = mixtape_qodef_add_admin_row(array(
			'name' => 'row1',
			'parent' => $group_sticky_header_menu
		));

		mixtape_qodef_add_admin_field(array(
			'name' => 'sticky_color',
			'type' => 'colorsimple',
			'label' => esc_html__('Text Color', 'mixtapewp'),
			'description' => '',
			'parent' => $row1_sticky_header_menu
		));

		mixtape_qodef_add_admin_field(array(
			'name' => 'sticky_hovercolor',
			'type' => 'colorsimple',
			'label' => esc_html__('Hover/Active color', 'mixtapewp'),
			'description' => '',
			'parent' => $row1_sticky_header_menu
		));

		$row2_sticky_header_menu = mixtape_qodef_add_admin_row(array(
			'name' => 'row2',
			'parent' => $group_sticky_header_menu
		));

		mixtape_qodef_add_admin_field(
			array(
				'name' => 'sticky_google_fonts',
				'type' => 'fontsimple',
				'label' => esc_html__('Font Family', 'mixtapewp'),
				'default_value' => '-1',
				'parent' => $row2_sticky_header_menu,
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'type' => 'textsimple',
				'name' => 'sticky_fontsize',
				'label' => esc_html__('Font Size', 'mixtapewp'),
				'default_value' => '',
				'parent' => $row2_sticky_header_menu,
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'type' => 'textsimple',
				'name' => 'sticky_lineheight',
				'label' => esc_html__('Line height', 'mixtapewp'),
				'default_value' => '',
				'parent' => $row2_sticky_header_menu,
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'type' => 'selectblanksimple',
				'name' => 'sticky_texttransform',
				'label' => esc_html__('Text transform', 'mixtapewp'),
				'default_value' => '',
				'options' => mixtape_qodef_get_text_transform_array(),
				'parent' => $row2_sticky_header_menu
			)
		);

		$row3_sticky_header_menu = mixtape_qodef_add_admin_row(array(
			'name' => 'row3',
			'parent' => $group_sticky_header_menu
		));

		mixtape_qodef_add_admin_field(
			array(
				'type' => 'selectblanksimple',
				'name' => 'sticky_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'mixtapewp'),
				'options' => mixtape_qodef_get_font_style_array(),
				'parent' => $row3_sticky_header_menu
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'type' => 'selectblanksimple',
				'name' => 'sticky_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'mixtapewp'),
				'options' => mixtape_qodef_get_font_weight_array(),
				'parent' => $row3_sticky_header_menu
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'type' => 'textsimple',
				'name' => 'sticky_letterspacing',
				'label' => esc_html__('Letter Spacing', 'mixtapewp'),
				'default_value' => '',
				'parent' => $row3_sticky_header_menu,
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$panel_fixed_header = mixtape_qodef_add_admin_panel(
			array(
				'title' => esc_html__('Fixed Header', 'mixtapewp'),
				'name' => 'panel_fixed_header',
				'page' => '_header_page',
				'hidden_property' => 'header_behaviour',
				'hidden_values' => array('sticky-header-on-scroll-up', 'sticky-header-on-scroll-down-up')
			)
		);

		mixtape_qodef_add_admin_field(array(
			'name' => 'fixed_header_grid_background_color',
			'type' => 'color',
			'default_value' => '',
			'label' => esc_html__('Grid Background Color', 'mixtapewp'),
			'description' => esc_html__('Set grid background color for fixed header', 'mixtapewp'),
			'parent' => $panel_fixed_header
		));

		mixtape_qodef_add_admin_field(array(
			'name' => 'fixed_header_grid_transparency',
			'type' => 'text',
			'default_value' => '',
			'label' => esc_html__('Header Transparency Grid', 'mixtapewp'),
			'description' => esc_html__('Enter transparency for fixed header grid (value from 0 to 1)', 'mixtapewp'),
			'parent' => $panel_fixed_header,
			'args' => array(
				'col_width' => 1
			)
		));

		mixtape_qodef_add_admin_field(array(
			'name' => 'fixed_header_background_color',
			'type' => 'color',
			'default_value' => '',
			'label' => esc_html__('Background Color', 'mixtapewp'),
			'description' => esc_html__('Set background color for fixed header', 'mixtapewp'),
			'parent' => $panel_fixed_header
		));

		mixtape_qodef_add_admin_field(array(
			'name' => 'fixed_header_transparency',
			'type' => 'text',
			'label' => esc_html__('Header Transparency', 'mixtapewp'),
			'description' => esc_html__('Enter transparency for fixed header (value from 0 to 1)', 'mixtapewp'),
			'parent' => $panel_fixed_header,
			'args' => array(
				'col_width' => 1
			)
		));


		$panel_main_menu = mixtape_qodef_add_admin_panel(
			array(
				'title' => esc_html__('Main Menu', 'mixtapewp'),
				'name' => 'panel_main_menu',
				'page' => '_header_page',
                'hidden_property' => 'header_type',
                'hidden_values' => array(
					'header-vertical',
					'header-full-screen'
				)
			)
		);

		mixtape_qodef_add_admin_section_title(
			array(
				'parent' => $panel_main_menu,
				'name' => 'main_menu_area_title',
				'title' => esc_html__('Main Menu General Settings', 'mixtapewp')
			)
		);


		mixtape_qodef_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'select',
				'name' => 'menu_item_icon_position',
				'default_value' => 'left',
				'label' => esc_html__('Icon Position in 1st Level Menu', 'mixtapewp'),
				'description' => esc_html__('Choose position of icon selected in Appearance->Menu->Menu Structure', 'mixtapewp'),
				'options' => array(
					'left' => esc_html__('Left', 'mixtapewp'),
					'top' => esc_html__('Top', 'mixtapewp')
				),
				'args' => array(
					'dependence' => true,
					'hide' => array(
						'left' => '#qodef_menu_item_icon_position_container'
					),
					'show' => array(
						'top' => '#qodef_menu_item_icon_position_container'
					)
				)
			)
		);

		$menu_item_icon_position_container = mixtape_qodef_add_admin_container(
			array(
				'parent' => $panel_main_menu,
				'name' => 'menu_item_icon_position_container',
				'hidden_property' => 'menu_item_icon_position',
				'hidden_value' => 'left'
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $menu_item_icon_position_container,
				'type' => 'text',
				'name' => 'menu_item_icon_size',
				'default_value' => '',
				'label' => esc_html__('Icon Size', 'mixtapewp'),
				'description' => esc_html__('Choose position of icon selected in Appearance->Menu->Menu Structure', 'mixtapewp'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'select',
				'name' => 'menu_item_style',
				'default_value' => 'small_item',
				'label' => esc_html__('Item Height in 1st Level Menu', 'mixtapewp'),
				'description' => esc_html__('Choose menu item height', 'mixtapewp'),
				'options' => array(
					'small_item' => esc_html__('Small', 'mixtapewp'),
					'large_item' => esc_html__('Big', 'mixtapewp')
				)
			)
		);

		$drop_down_group = mixtape_qodef_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'drop_down_group',
				'title' => esc_html__('Main Dropdown Menu', 'mixtapewp'),
				'description' => esc_html__('Choose a color and transparency for the main menu background (0 = fully transparent, 1 = opaque)', 'mixtapewp')
			)
		);

		$drop_down_row1 = mixtape_qodef_add_admin_row(
			array(
				'parent' => $drop_down_group,
				'name' => 'drop_down_row1',
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $drop_down_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_background_color',
				'default_value' => '',
				'label' => esc_html__('Background Color', 'mixtapewp'),
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $drop_down_row1,
				'type' => 'textsimple',
				'name' => 'dropdown_background_transparency',
				'default_value' => '',
				'label' => esc_html__('Transparency', 'mixtapewp'),
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $drop_down_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_separator_color',
				'default_value' => '',
				'label' => esc_html__('Item Bottom Separator Color', 'mixtapewp'),
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $drop_down_row1,
				'type' => 'yesnosimple',
				'name' => 'enable_dropdown_separator_full_width',
				'default_value' => 'yes',
				'label' => esc_html__('Item Separator Full Width', 'mixtapewp'),
			)
		);

		$drop_down_padding_group = mixtape_qodef_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'drop_down_padding_group',
				'title' => esc_html__('Main Dropdown Menu Padding', 'mixtapewp'),
				'description' => esc_html__('Choose a top/bottom padding for dropdown menu', 'mixtapewp')
			)
		);

		$drop_down_padding_row = mixtape_qodef_add_admin_row(
			array(
				'parent' => $drop_down_padding_group,
				'name' => 'drop_down_padding_row',
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $drop_down_padding_row,
				'type' => 'textsimple',
				'name' => 'dropdown_top_padding',
				'default_value' => '',
				'label' => esc_html__('Top Padding', 'mixtapewp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $drop_down_padding_row,
				'type' => 'textsimple',
				'name' => 'dropdown_bottom_padding',
				'default_value' => '',
				'label' => esc_html__('Bottom Padding', 'mixtapewp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'select',
				'name' => 'menu_dropdown_appearance',
				'default_value' => 'default',
				'label' => esc_html__('Main Dropdown Menu Appearance', 'mixtapewp'),
				'description' => esc_html__('Choose appearance for dropdown menu', 'mixtapewp'),
				'options' => array(
					'dropdown-default' => esc_html__('Default', 'mixtapewp'),
					'dropdown-slide-from-bottom' => esc_html__('Slide From Bottom', 'mixtapewp'),
					'dropdown-slide-from-top' => esc_html__('Slide From Top', 'mixtapewp'),
					'dropdown-animate-height' => esc_html__('Animate Height', 'mixtapewp'),
					'dropdown-slide-from-left' => esc_html__('Slide From Left', 'mixtapewp')
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'text',
				'name' => 'dropdown_top_position',
				'default_value' => '',
				'label' => esc_html__('Dropdown position', 'mixtapewp'),
				'description' => esc_html__('Enter value in percentage of entire header height', 'mixtapewp'),
				'args' => array(
					'col_width' => 3,
					'suffix' => '%'
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'yesno',
				'name' => 'enable_wide_menu_background',
				'default_value' => 'no',
				'label' => esc_html__('Enable Full Width Background for Wide Dropdown Type', 'mixtapewp'),
				'description' => esc_html__('Enabling this option will show full width background  for wide dropdown type', 'mixtapewp'),
			)
		);

		$first_level_group = mixtape_qodef_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'first_level_group',
				'title' => esc_html__('1st Level Menu', 'mixtapewp'),
				'description' => esc_html__('Define styles for 1st level in Top Navigation Menu', 'mixtapewp')
			)
		);

		$first_level_row1 = mixtape_qodef_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row1'
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'colorsimple',
				'name' => 'menu_color',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'mixtapewp'),
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'colorsimple',
				'name' => 'menu_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Hover Text Color', 'mixtapewp'),
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'colorsimple',
				'name' => 'menu_activecolor',
				'default_value' => '',
				'label' => esc_html__('Active Text Color', 'mixtapewp'),
			)
		);

		$first_level_row2 = mixtape_qodef_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row2',
				'next' => true
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'colorsimple',
				'name' => 'menu_text_background_color',
				'default_value' => '',
				'label' => esc_html__('Text Background Color', 'mixtapewp'),
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'colorsimple',
				'name' => 'menu_hover_background_color',
				'default_value' => '',
				'label' => esc_html__('Hover Text Background Color', 'mixtapewp'),
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'colorsimple',
				'name' => 'menu_active_background_color',
				'default_value' => '',
				'label' => esc_html__('Active Text Background Color', 'mixtapewp'),
			)
		);

		$first_level_row3 = mixtape_qodef_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row3',
				'next' => true
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $first_level_row3,
				'type' => 'colorsimple',
				'name' => 'menu_light_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Light Menu Hover Text Color', 'mixtapewp')
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $first_level_row3,
				'type' => 'colorsimple',
				'name' => 'menu_light_activecolor',
				'default_value' => '',
				'label' => esc_html__('Light Menu Active Text Color', 'mixtapewp'),
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $first_level_row3,
				'type' => 'colorsimple',
				'name' => 'menu_light_border_color',
				'default_value' => '',
				'label' => esc_html__('Light Menu Border Hover/Active Color', 'mixtapewp'),
			)
		);

		$first_level_row4 = mixtape_qodef_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row4',
				'next' => true
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $first_level_row4,
				'type' => 'colorsimple',
				'name' => 'menu_dark_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Dark Menu Hover Text Color', 'mixtapewp'),
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $first_level_row4,
				'type' => 'colorsimple',
				'name' => 'menu_dark_activecolor',
				'default_value' => '',
				'label' => esc_html__('Dark Menu Active Text Color', 'mixtapewp'),
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $first_level_row4,
				'type' => 'colorsimple',
				'name' => 'menu_dark_border_color',
				'default_value' => '',
				'label' => esc_html__('Dark Menu Border Hover/Active Color', 'mixtapewp'),
			)
		);

		$first_level_row5 = mixtape_qodef_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row5',
				'next' => true
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $first_level_row5,
				'type' => 'fontsimple',
				'name' => 'menu_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'mixtapewp'),
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $first_level_row5,
				'type' => 'textsimple',
				'name' => 'menu_fontsize',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'mixtapewp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $first_level_row5,
				'type' => 'textsimple',
				'name' => 'menu_hover_background_color_transparency',
				'default_value' => '',
				'label' => esc_html__('Hover Background Color Transparency', 'mixtapewp')
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $first_level_row5,
				'type' => 'textsimple',
				'name' => 'menu_active_background_color_transparency',
				'default_value' => '',
				'label' => esc_html__('Active Background Color Transparency', 'mixtapewp'),
			)
		);

		$first_level_row6 = mixtape_qodef_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row6',
				'next' => true
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $first_level_row6,
				'type' => 'selectblanksimple',
				'name' => 'menu_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'mixtapewp'),
				'options' => mixtape_qodef_get_font_style_array()
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $first_level_row6,
				'type' => 'selectblanksimple',
				'name' => 'menu_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'mixtapewp'),
				'options' => mixtape_qodef_get_font_weight_array()
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $first_level_row6,
				'type' => 'textsimple',
				'name' => 'menu_letterspacing',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing', 'mixtapewp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $first_level_row6,
				'type' => 'selectblanksimple',
				'name' => 'menu_texttransform',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'mixtapewp'),
				'options' => mixtape_qodef_get_text_transform_array()
			)
		);

		$first_level_row7 = mixtape_qodef_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row7',
				'next' => true
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $first_level_row7,
				'type' => 'textsimple',
				'name' => 'menu_lineheight',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'mixtapewp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $first_level_row7,
				'type' => 'textsimple',
				'name' => 'menu_padding_left_right',
				'default_value' => '',
				'label' => esc_html__('Padding Left/Right', 'mixtapewp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $first_level_row7,
				'type' => 'textsimple',
				'name' => 'menu_margin_left_right',
				'default_value' => '',
				'label' => esc_html__('Margin Left/Right', 'mixtapewp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_group = mixtape_qodef_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'second_level_group',
				'title' => esc_html__('2nd Level Menu', 'mixtapewp'),
				'description' => esc_html__('Define styles for 2nd level in Top Navigation Menu', 'mixtapewp')
			)
		);

		$second_level_row1 = mixtape_qodef_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row1'
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_color',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'mixtapewp')
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Color', 'mixtapewp')
			)
		);

		$second_level_row2 = mixtape_qodef_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row2',
				'next' => true
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'fontsimple',
				'name' => 'dropdown_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'mixtapewp')
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_fontsize',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'mixtapewp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_lineheight',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'mixtapewp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_padding_top_bottom',
				'default_value' => '',
				'label' => esc_html__('Padding Top/Bottom', 'mixtapewp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_row3 = mixtape_qodef_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row3',
				'next' => true
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $second_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font style', 'mixtapewp'),
				'options' => mixtape_qodef_get_font_style_array()
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $second_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font weight', 'mixtapewp'),
				'options' => mixtape_qodef_get_font_weight_array()
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $second_level_row3,
				'type' => 'textsimple',
				'name' => 'dropdown_letterspacing',
				'default_value' => '',
				'label' => esc_html__('Letter spacing', 'mixtapewp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $second_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_texttransform',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'mixtapewp'),
				'options' => mixtape_qodef_get_text_transform_array()
			)
		);

		$second_level_wide_group = mixtape_qodef_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'second_level_wide_group',
				'title' => esc_html__('2nd Level Wide Menu', 'mixtapewp'),
				'description' => esc_html__('Define styles for 2nd level in Wide Menu', 'mixtapewp')
			)
		);

		$second_level_wide_row1 = mixtape_qodef_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name' => 'second_level_wide_row1'
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $second_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_color',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'mixtapewp')
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $second_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Color', 'mixtapewp')
			)
		);

		$second_level_wide_row2 = mixtape_qodef_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name' => 'second_level_wide_row2',
				'next' => true
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $second_level_wide_row2,
				'type' => 'fontsimple',
				'name' => 'dropdown_wide_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'mixtapewp')
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $second_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_fontsize',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'mixtapewp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $second_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_lineheight',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'mixtapewp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $second_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_padding_top_bottom',
				'default_value' => '',
				'label' => esc_html__('Padding Top/Bottom', 'mixtapewp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_wide_row3 = mixtape_qodef_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name' => 'second_level_wide_row3',
				'next' => true
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $second_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font style', 'mixtapewp'),
				'options' => mixtape_qodef_get_font_style_array()
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $second_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font weight', 'mixtapewp'),
				'options' => mixtape_qodef_get_font_weight_array()
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $second_level_wide_row3,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_letterspacing',
				'default_value' => '',
				'label' => esc_html__('Letter spacing', 'mixtapewp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $second_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_texttransform',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'mixtapewp'),
				'options' => mixtape_qodef_get_text_transform_array()
			)
		);

		$third_level_group = mixtape_qodef_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'third_level_group',
				'title' => esc_html__('3nd Level Menu', 'mixtapewp'),
				'description' => esc_html__('Define styles for 3nd level in Top Navigation Menu', 'mixtapewp')
			)
		);

		$third_level_row1 = mixtape_qodef_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name' => 'third_level_row1'
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_color_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'mixtapewp')
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_hovercolor_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Color', 'mixtapewp')
			)
		);

		$third_level_row2 = mixtape_qodef_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name' => 'third_level_row2',
				'next' => true
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'fontsimple',
				'name' => 'dropdown_google_fonts_thirdlvl',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'mixtapewp')
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_fontsize_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'mixtapewp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_lineheight_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'mixtapewp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$third_level_row3 = mixtape_qodef_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name' => 'third_level_row3',
				'next' => true
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $third_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_fontstyle_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font style', 'mixtapewp'),
				'options' => mixtape_qodef_get_font_style_array()
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $third_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_fontweight_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font weight', 'mixtapewp'),
				'options' => mixtape_qodef_get_font_weight_array()
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $third_level_row3,
				'type' => 'textsimple',
				'name' => 'dropdown_letterspacing_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Letter spacing', 'mixtapewp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $third_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_texttransform_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'mixtapewp'),
				'options' => mixtape_qodef_get_text_transform_array()
			)
		);


		/***********************************************************/
		$third_level_wide_group = mixtape_qodef_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'third_level_wide_group',
				'title' => esc_html__('3rd Level Wide Menu', 'mixtapewp'),
				'description' => esc_html__('Define styles for 3rd level in Wide Menu', 'mixtapewp')
			)
		);

		$third_level_wide_row1 = mixtape_qodef_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name' => 'third_level_wide_row1'
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $third_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_color_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'mixtapewp')
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $third_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_hovercolor_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Color', 'mixtapewp')
			)
		);

		$third_level_wide_row2 = mixtape_qodef_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name' => 'third_level_wide_row2',
				'next' => true
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $third_level_wide_row2,
				'type' => 'fontsimple',
				'name' => 'dropdown_wide_google_fonts_thirdlvl',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'mixtapewp')
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $third_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_fontsize_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'mixtapewp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $third_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_lineheight_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'mixtapewp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$third_level_wide_row3 = mixtape_qodef_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name' => 'third_level_wide_row3',
				'next' => true
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $third_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_fontstyle_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font style', 'mixtapewp'),
				'options' => mixtape_qodef_get_font_style_array()
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $third_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_fontweight_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font weight', 'mixtapewp'),
				'options' => mixtape_qodef_get_font_weight_array()
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $third_level_wide_row3,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_letterspacing_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Letter spacing', 'mixtapewp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $third_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_texttransform_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'mixtapewp'),
				'options' => mixtape_qodef_get_text_transform_array()
			)
		);
	}

	add_action( 'mixtape_qodef_options_map', 'mixtape_qodef_header_options_map', 3);

}