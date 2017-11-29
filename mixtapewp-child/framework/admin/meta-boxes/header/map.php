<?php

if(!function_exists('mixtape_qodef_map_header_meta_fields')) {

    function mixtape_qodef_map_header_meta_fields() {

		$header_meta_box = mixtape_qodef_add_meta_box(
		    array(
		        'scope' => array('page', 'post', 'event', 'album'),
		        'title' => esc_html__('Header', 'mixtapewp'),
		        'name' => 'header_meta'
		    )
		);

		$temp_holder_show		= '';
		$temp_holder_hide		= '';
		$temp_array_standard	= array();
		$temp_array_vertical	= array();
		$temp_array_full_screen	= array();
		$temp_array_behaviour	= array();
		switch (mixtape_qodef_options()->getOptionValue('header_type')) {

			case 'header-standard':
				$temp_holder_show = '#qodef_qodef_header_standard_type_meta_container,#qodef_qodef_header_behaviour_meta_container';
				$temp_holder_hide = '#qodef_qodef_header_vertical_type_meta_container,#qodef_qodef_header_full_screen_type_meta_container';

				$temp_array_standard = array(
					'hidden_value' => 'default',
					'hidden_values' => array('header-vertical','header-full-screen')
				);
				$temp_array_vertical = array(
					'hidden_values' => array('','header-standard','header-full-screen')
				);
				$temp_array_full_screen = array(
					'hidden_values' => array('','header-standard', 'header-vertical')
				);
				$temp_array_behaviour = array(
					'hidden_value' => 'header-vertical'
				);
				break;

			case 'header-vertical':
				$temp_holder_show = '#qodef_qodef_header_vertical_type_meta_container';
				$temp_holder_hide = '#qodef_qodef_header_standard_type_meta_container,#qodef_qodef_header_full_screen_type_meta_container,#qodef_qodef_header_behaviour_meta_container';

				$temp_array_standard = array(
					'hidden_values' => array('', 'header-vertical', 'header-full-screen','header-full-screen')
				);
				$temp_array_vertical = array(
					'hidden_value' => 'default',
					'hidden_values' => array('header-standard','header-full-screen')
				);
				$temp_array_full_screen = array(
					'hidden_values' => array('','header-standard', 'header-vertical')
				);
				$temp_array_behaviour = array(
					'hidden_value' => 'default',
					'hidden_values' => array('','header-vertical')
				);
				break;
			case 'header-full-screen':
				$temp_holder_show = '#qodef_qodef_header_full_screen_type_meta_container,#qodef_qodef_header_behaviour_meta_container';
				$temp_holder_hide = '#qodef_qodef_header_standard_type_meta_container,#qodef_qodef_header_vertical_type_meta_container';
				$temp_array_standard = array(
					'hidden_values' => array('', 'header-vertical', 'header-full-screen')
				);

				$temp_array_vertical = array(
					'hidden_values' => array('', 'header-standard','header-full-screen')
				);
				$temp_array_full_screen = array(
					'hidden_value' => 'default',
					'hidden_values' => array('header-standard','header-vertical')
				);

				$temp_array_behaviour = array(
					'hidden_value' => 'header-vertical'
				);
				break;
		}



		mixtape_qodef_add_meta_box_field(
			array(
				'name' => 'qodef_header_type_meta',
				'type' => 'select',
				'default_value' => '',
				'label' => esc_html__('Choose Header Type', 'mixtapewp'),
				'description' => esc_html__('Select header type layout', 'mixtapewp'),
				'parent' => $header_meta_box,
				'options' => array(
					'' 						=> esc_html__('Default', 'mixtapewp'),
					'header-standard'		=> esc_html__('Standard Header Layout', 'mixtapewp'),
					'header-vertical'		=> esc_html__('Vertical Header Layout', 'mixtapewp'),
					'header-full-screen'	=> esc_html__('Full Screen Header Layout', 'mixtapewp'),
				),
				'args' => array(
					"dependence" => true,
					"hide" => array(
						"" => $temp_holder_hide,
						'header-standard'		=> '#qodef_qodef_header_vertical_type_meta_container,#qodef_qodef_header_full_screen_type_meta_container',
						'header-vertical'		=> '#qodef_qodef_header_standard_type_meta_container,#qodef_qodef_header_full_screen_type_meta_container, #qodef_qodef_header_behaviour_meta_container, #qodef_qodef_header_behaviour_meta',
						'header-full-screen'	=> '#qodef_qodef_header_standard_type_meta_container,#qodef_qodef_header_vertical_type_meta_container',

					),
					"show" => array(
						'' => $temp_holder_show,
						'header-standard'		=> '#qodef_qodef_header_standard_type_meta_container, #qodef_qodef_header_behaviour_meta_container, #qodef_qodef_header_behaviour_meta',
						'header-vertical'		=> '#qodef_qodef_header_vertical_type_meta_container',
						'header-full-screen'	=> '#qodef_qodef_header_full_screen_type_meta_container, #qodef_qodef_header_behaviour_meta_container, #qodef_qodef_header_behaviour_meta',
					)
				)
			)
		);

		mixtape_qodef_add_meta_box_field(
			array_merge(
				array(
					'parent'          => $header_meta_box,
					'type'            => 'select',
					'name'            => 'qodef_header_behaviour_meta',
					'default_value'   => '',
					'label'           => esc_html__('Choose Header behaviour', 'mixtapewp'),
					'description'     => esc_html__('Select the behaviour of header when you scroll down to page', 'mixtapewp'),
					'options'         => array(
						''                                => '',
						'no-behavior'                     => esc_html__('No Behavior', 'mixtapewp'),
						'sticky-header-on-scroll-up'      => esc_html__('Sticky on scrol up', 'mixtapewp'),
						'sticky-header-on-scroll-down-up' => esc_html__('Sticky on scrol up/down', 'mixtapewp'),
						'fixed-on-scroll'                 => esc_html__('Fixed on scroll', 'mixtapewp')
					),
					'hidden_property' => 'qodef_header_type_meta',
					'hidden_value'    => '',
//					'args'            => array(
//						'dependence' => true,
//						'show'       => array(
//							''                                => '',
//							'sticky-header-on-scroll-up'      => '',
//							'sticky-header-on-scroll-down-up' => '#qodef_qodef_sticky_amount_container_meta_container',
//							'no-behavior'                     => ''
//						),
//						'hide'       => array(
//							''                                => '#qodef_qodef_sticky_amount_container_meta_container',
//							'sticky-header-on-scroll-up'      => '#qodef_qodef_sticky_amount_container_meta_container',
//							'sticky-header-on-scroll-down-up' => '',
//							'no-behavior'                     => '#qodef_qodef_sticky_amount_container_meta_container'
//						)
//					)
				),
				$temp_array_behaviour
			)
		);

		mixtape_qodef_add_meta_box_field(
			array(
				'name' => 'qodef_header_style_meta',
				'type' => 'select',
				'default_value' => '',
				'label' => esc_html__('Header Skin', 'mixtapewp'),
				'description' => esc_html__('Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'mixtapewp'),
				'parent' => $header_meta_box,
				'options' => array(
					'' => '',
					'light-header' => esc_html__('Light', 'mixtapewp'),
					'dark-header' => esc_html__('Dark', 'mixtapewp')
				)
			)
		);

		mixtape_qodef_add_meta_box_field(
			array(
				'parent' => $header_meta_box,
				'type' => 'select',
				'name' => 'qodef_enable_header_style_on_scroll_meta',
				'default_value' => '',
				'label' => esc_html__('Enable Header Style on Scroll', 'mixtapewp'),
				'description' => esc_html__('Enabling this option, header will change style depending on row settings for dark/light style', 'mixtapewp'),
				'options' => array(
					'' => '',
					'no' => esc_html__('No', 'mixtapewp'),
					'yes' => esc_html__('Yes', 'mixtapewp')
				)
			)
		);



		$header_standard_type_meta_container = mixtape_qodef_add_admin_container(
			array_merge(
				array(
					'parent' => $header_meta_box,
					'name' => 'qodef_header_standard_type_meta_container',
					'hidden_property' => 'qodef_header_type_meta',

				),
				$temp_array_standard
			)
		);

		mixtape_qodef_add_meta_box_field(
			array(
				'name' => 'qodef_menu_area_background_color_header_standard_meta',
				'type' => 'color',
				'label' => esc_html__('Background Color', 'mixtapewp'),
				'description' => esc_html__('Choose a background color for header area', 'mixtapewp'),
				'parent' => $header_standard_type_meta_container
			)
		);

		mixtape_qodef_add_meta_box_field(
			array(
				'name' => 'qodef_menu_area_background_transparency_header_standard_meta',
				'type' => 'text',
				'label' => esc_html__('Background Transparency', 'mixtapewp'),
				'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'mixtapewp'),
				'parent' => $header_standard_type_meta_container,
				'args' => array(
					'col_width' => 2
				)
			)
		);

		mixtape_qodef_add_meta_box_field(array(
			'name'          => 'qodef_border_bottom_header_standard_meta',
			'type'          => 'select',
			'label'         => esc_html__('Enable Border Bottom', 'mixtapewp'),
			'parent'        => $header_standard_type_meta_container,
			'default_value' => '',
			'options'       => array(
				''    => '',
				'no'  => esc_html__('No', 'mixtapewp'),
				'yes' => esc_html__('Yes', 'mixtapewp')
			),
			'args'          => array(
				'dependence' => true,
				'hide'       => array(
					''    => '#qodef_standard_border_bottom_color_container',
					'no'  => '#qodef_standard_border_bottom_color_container',
					'yes' => ''
				),
				'show'       => array(
					''    => '',
					'no'  => '',
					'yes' => '#qodef_standard_border_bottom_color_container'
				)
			)
		));

		$border_bottom_color_standard_container = mixtape_qodef_add_admin_container(array(
			'type'            => 'container',
			'name'            => 'standard_border_bottom_color_container',
			'parent'          => $header_standard_type_meta_container,
			'hidden_property' => 'qodef_border_bottom_header_standard_meta',
			'hidden_value'    => 'no',
			'hidden_values'   => array('', 'no')
		));

		mixtape_qodef_add_meta_box_field(
			array(
				'name' => 'qodef_border_bottom_color_header_standard_meta',
				'type' => 'color',
				'label' => esc_html__('Border Bottom Color', 'mixtapewp'),
				'description' => esc_html__('Choose a border bottom color for header area', 'mixtapewp'),
				'parent' => $border_bottom_color_standard_container
			)
		);

		mixtape_qodef_add_meta_box_field(
			array(
				'name' => 'qodef_border_bottom_transparency_header_standard_meta',
				'type' => 'text',
				'label' => esc_html__('Border Bottom Transparency', 'mixtapewp'),
				'description' => esc_html__('Choose a transparency for the header border bottom color (0 = fully transparent, 1 = opaque)', 'mixtapewp'),
				'parent' => $border_bottom_color_standard_container,
				'args' => array(
					'col_width' => 2
				)
			)
		);


		mixtape_qodef_add_meta_box_field(array(
			'name'          => 'qodef_menu_area_in_grid_header_standard_meta',
			'type'          => 'select',
			'label'         => esc_html__('Header In Grid', 'mixtapewp'),
			'description'   => esc_html__('Set header content to be in grid', 'mixtapewp'),
			'parent'        => $header_standard_type_meta_container,
			'default_value' => '',
			'options'       => array(
				''    => esc_html__('Default', 'mixtapewp'),
				'no'  => esc_html__('No', 'mixtapewp'),
				'yes' => esc_html__('Yes', 'mixtapewp')
			)
			)
		);

		$header_vertical_type_meta_container = mixtape_qodef_add_admin_container(
			array_merge(
				array(
					'parent' => $header_meta_box,
					'name' => 'qodef_header_vertical_type_meta_container',
					'hidden_property' => 'qodef_header_type_meta',
					'hidden_values' => array('header-standard')
				),
				$temp_array_vertical
			)
		);

		mixtape_qodef_add_meta_box_field(array(
			'name'        => 'qodef_vertical_header_background_color_meta',
			'type'        => 'color',
			'label'       => esc_html__('Background Color', 'mixtapewp'),
			'description' => esc_html__('Set background color for vertical menu', 'mixtapewp'),
			'parent'      => $header_vertical_type_meta_container
		));

		mixtape_qodef_add_meta_box_field(array(
			'name'        => 'qodef_vertical_header_transparency_meta',
			'type'        => 'text',
			'label'       => esc_html__('Background Transparency', 'mixtapewp'),
			'description' => esc_html__('Enter transparency for vertical menu (value from 0 to 1)', 'mixtapewp'),
			'parent'      => $header_vertical_type_meta_container,
			'args'        => array(
				'col_width' => 1
			)
		));

		mixtape_qodef_add_meta_box_field(
			array(
				'name'          => 'qodef_vertical_header_background_image_meta',
				'type'          => 'image',
				'default_value' => '',
				'label'         => esc_html__('Background Image', 'mixtapewp'),
				'description'   => esc_html__('Set background image for vertical menu', 'mixtapewp'),
				'parent'        => $header_vertical_type_meta_container
			)
		);

		mixtape_qodef_add_meta_box_field(
			array(
				'name' => 'qodef_disable_vertical_header_background_image_meta',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__('Disable Background Image', 'mixtapewp'),
				'description' => esc_html__('Enabling this option will hide background image in Vertical Menu', 'mixtapewp'),
				'parent' => $header_vertical_type_meta_container
			)
		);

		$header_full_screen_type_meta_container = mixtape_qodef_add_admin_container(
			array_merge(
				array(
					'parent' => $header_meta_box,
					'name' => 'qodef_header_full_screen_type_meta_container',
					'hidden_property' => 'qodef_header_type_meta',

				),
				$temp_array_full_screen
			)
		);

		mixtape_qodef_add_meta_box_field(
			array(
				'name' => 'qodef_menu_area_background_color_header_full_screen_meta',
				'type' => 'color',
				'label' => esc_html__('Background Color', 'mixtapewp'),
				'description' => esc_html__('Choose a background color for Full Screen header area', 'mixtapewp'),
				'parent' => $header_full_screen_type_meta_container
			)
		);

		mixtape_qodef_add_meta_box_field(
			array(
				'name' => 'qodef_menu_area_background_transparency_header_full_screen_meta',
				'type' => 'text',
				'label' => esc_html__('Background Transparency', 'mixtapewp'),
				'description' => esc_html__('Choose a transparency for the Full Screen header background color (0 = fully transparent, 1 = opaque)', 'mixtapewp'),
				'parent' => $header_full_screen_type_meta_container,
				'args' => array(
					'col_width' => 2
				)
			)
		);

		mixtape_qodef_add_meta_box_field(array(
			'name'          => 'qodef_border_bottom_header_full_screen_meta',
			'type'          => 'select',
			'label'         => esc_html__('Enable Border Bottom', 'mixtapewp'),
			'parent'        => $header_full_screen_type_meta_container,
			'default_value' => '',
			'options'       => array(
				''    => '',
				'no'  => esc_html__('No', 'mixtapewp'),
				'yes' => esc_html__('Yes', 'mixtapewp')
			),
			'args'          => array(
				'dependence' => true,
				'hide'       => array(
					''    => '#qodef_full_screen_border_bottom_container',
					'no'  => '#qodef_full_screen_border_bottom_container',
					'yes' => ''
				),
				'show'       => array(
					''    => '',
					'no'  => '',
					'yes' => '#qodef_full_screen_border_bottom_container'
				)
			)
		));

		$border_bottom_color_full_screen = mixtape_qodef_add_admin_container(array(
			'type'            => 'container',
			'name'            => 'full_screen_border_bottom_container',
			'parent'          => $header_full_screen_type_meta_container,
			'hidden_property' => 'qodef_border_bottom_header_full_screen_meta',
			'hidden_value'    => 'no',
			'hidden_values'   => array('', 'no')
		));

		mixtape_qodef_add_meta_box_field(
			array(
				'name' => 'qodef_border_bottom_color_header_full_screen_meta',
				'type' => 'color',
				'label' => esc_html__('Border Bottom Color', 'mixtapewp'),
				'description' => esc_html__('Choose a border bottom color for Full Screen header area', 'mixtapewp'),
				'parent' => $border_bottom_color_full_screen
			)
		);

		mixtape_qodef_add_meta_box_field(
			array(
				'name' => 'qodef_border_bottom_transparency_header_full_screen_meta',
				'type' => 'text',
				'label' => esc_html__('Border Bottom Transparency', 'mixtapewp'),
				'description' => esc_html__('Choose a transparency for the Full Screen header border bottom color (0 = fully transparent, 1 = opaque)', 'mixtapewp'),
				'parent' => $border_bottom_color_full_screen,
				'args' => array(
					'col_width' => 2
				)
			)
		);

		mixtape_qodef_add_meta_box_field(array(
				'name'          => 'qodef_menu_area_in_grid_header_full_screen_meta',
				'type'          => 'select',
				'label'         => esc_html__('Header In Grid', 'mixtapewp'),
				'description'   => esc_html__('Set header content to be in grid for the Full Screen header', 'mixtapewp'),
				'parent'        => $header_full_screen_type_meta_container,
				'default_value' => '',
				'options'       => array(
					''    => esc_html__('Default', 'mixtapewp'),
					'no'  => esc_html__('No', 'mixtapewp'),
					'yes' => esc_html__('Yes', 'mixtapewp')
				)
			)
		);

		$header_behaviour_meta_container = mixtape_qodef_add_admin_container(
			array_merge(
				array(
					'parent' => $header_meta_box,
					'name' => 'qodef_header_behaviour_meta_container',
					'hidden_property' => 'qodef_header_type_meta',
				),
				$temp_array_behaviour
			)
		);

		mixtape_qodef_add_meta_box_field(
			array(
				'name'            => 'qodef_scroll_amount_for_sticky_meta',
				'type'            => 'text',
				'label'           => esc_html__('Scroll amount for sticky header appearance', 'mixtapewp'),
				'description'     => esc_html__('Define scroll amount for sticky header appearance', 'mixtapewp'),
				'parent'          => $header_behaviour_meta_container,
				'args'            => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);

		mixtape_qodef_add_meta_box_field(
			array(
				'name'            => 'qodef_sticky_header_in_grid_meta',
				'type'            => 'select',
				'label'           => esc_html__('Sticky Header in grid', 'mixtapewp'),
				'description'     => esc_html__('Set sticky header content to be in grid', 'mixtapewp'),
				'parent'          => $header_behaviour_meta_container,
				'options'       => array(
					''    => esc_html__('Default', 'mixtapewp'),
					'no'  => esc_html__('No', 'mixtapewp'),
					'yes' => esc_html__('Yes', 'mixtapewp')
				)
			)
		);

		mixtape_qodef_add_meta_box_field(
			array(
				'name'            => 'qodef_sticky_header_background_color_meta',
				'type'            => 'color',
				'label'           => esc_html__('Sticky Header Background Color', 'mixtapewp'),
				'description'     => esc_html__('Set background color for sticky header', 'mixtapewp'),
				'parent'          => $header_behaviour_meta_container,
			)
		);

		mixtape_qodef_add_meta_box_field(
			array(
				'name' => 'qodef_show_header_widget_area_meta',
				'type' => 'yesno',
				'default_value' => 'yes',
				'label' => esc_html__('Show Header Widget Area', 'mixtapewp'),
				'description' => esc_html__('Enabling this option will show widget area in header', 'mixtapewp'),
				'parent' => $header_meta_box
			)
		);

		$mixtape_custom_sidebars = mixtape_qodef_get_custom_sidebars();
		if(count($mixtape_custom_sidebars) > 0) {
			mixtape_qodef_add_meta_box_field(array(
				'name' => 'qodef_custom_header_sidebar_meta',
				'type' => 'selectblank',
				'label' => esc_html__('Choose Custom Widget Area in Header', 'mixtapewp'),
				'description' => esc_html__('Choose custom widget area to display in header area"', 'mixtapewp'),
				'parent' => $header_meta_box,
				'options' => $mixtape_custom_sidebars
			));
		}
		if(count($mixtape_custom_sidebars) > 0) {
			mixtape_qodef_add_meta_box_field(array(
				'name' => 'qodef_custom_sticky_header_sidebar_meta',
				'type' => 'selectblank',
				'label' => esc_html__('Choose Custom Widget Area in Sticky Header', 'mixtapewp'),
				'description' => esc_html__('Choose custom widget area to display in sticky header area"', 'mixtapewp'),
				'parent' => $header_meta_box,
				'options' => $mixtape_custom_sidebars
			));
		}
		mixtape_qodef_add_admin_section_title(array(
			'name'   => 'top_bar_section_title',
			'parent' => $header_meta_box,
			'title'  => esc_html__('Top Bar', 'mixtapewp')
		));

		$top_bar_global_option      = mixtape_qodef_options()->getOptionValue('top_bar');
		$top_bar_default_dependency = array(
			'' => '#qodef_top_bar_container_no_style'
		);

		$top_bar_show_array = array(
			'yes' => '#qodef_top_bar_container_no_style'
		);

		$top_bar_hide_array = array(
			'no' => '#qodef_top_bar_container_no_style'
		);

		if($top_bar_global_option === 'yes') {
			$top_bar_show_array = array_merge($top_bar_show_array, $top_bar_default_dependency);
			$temp_top_no = array(
				'hidden_value' => 'no'
			);
		} else {
			$top_bar_hide_array = array_merge($top_bar_hide_array, $top_bar_default_dependency);
			$temp_top_no = array(
				'hidden_values'   => array('','no')
			);
		}


		mixtape_qodef_add_meta_box_field(array(
			'name'          => 'qodef_top_bar_meta',
			'type'          => 'select',
			'label'         => esc_html__('Enable Top Bar on This Page', 'mixtapewp'),
			'description'   => esc_html__('Enabling this option will enable top bar on this page', 'mixtapewp'),
			'parent'        => $header_meta_box,
			'default_value' => '',
			'options'       => array(
				''    => esc_html__('Default', 'mixtapewp'),
				'yes' => esc_html__('Yes', 'mixtapewp'),
				'no'  => esc_html__('No', 'mixtapewp')
			),
			'args' => array(
				"dependence" => true,
				'show'       => $top_bar_show_array,
				'hide'       => $top_bar_hide_array
			)
		));

		$top_bar_container = mixtape_qodef_add_admin_container_no_style(array_merge(array(
			'name'            => 'top_bar_container_no_style',
			'parent'          => $header_meta_box,
			'hidden_property' => 'qodef_top_bar_meta'
		),
			$temp_top_no));

		mixtape_qodef_add_meta_box_field(array(
			'name'    => 'qodef_top_bar_skin_meta',
			'type'    => 'select',
			'label'   => esc_html__('Top Bar Skin', 'mixtapewp'),
			'options' => array(
				''      => esc_html__('Default', 'mixtapewp'),
				'light' => esc_html__('Light', 'mixtapewp'),
				'dark'  => esc_html__('Dark', 'mixtapewp')
			),
			'parent'  => $top_bar_container
		));

		mixtape_qodef_add_meta_box_field(array(
			'name'   => 'qodef_top_bar_background_color_meta',
			'type'   => 'color',
			'label'  => esc_html__('Top Bar Background Color', 'mixtapewp'),
			'parent' => $top_bar_container
		));

		mixtape_qodef_add_meta_box_field(array(
			'name'        => 'qodef_top_bar_background_transparency_meta',
			'type'        => 'text',
			'label'       => esc_html__('Top Bar Background Color Transparency', 'mixtapewp'),
			'description' => esc_html__('Set top bar background color transparenct. Value should be between 0 and 1', 'mixtapewp'),
			'parent'      => $top_bar_container,
			'args'        => array(
				'col_width' => 3
			)
		));
	}

    add_action('mixtape_qodef_meta_boxes_map', 'mixtape_qodef_map_header_meta_fields');
}
