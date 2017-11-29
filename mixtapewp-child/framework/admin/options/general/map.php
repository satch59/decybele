<?php

if ( ! function_exists('mixtape_qodef_general_options_map') ) {
    /**
     * General options page
     */
    function mixtape_qodef_general_options_map() {

        mixtape_qodef_add_admin_page(
            array(
                'slug'  => '',
                'title' => esc_html__('General', 'mixtapewp'),
                'icon'  => 'fa fa-institution'
            )
        );

        $panel_design_style = mixtape_qodef_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_design_style',
                'title' => esc_html__('Design Style', 'mixtapewp')
            )
        );

        mixtape_qodef_add_admin_field(
            array(
                'name'          => 'google_fonts',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'mixtapewp'),
                'description'   => esc_html__('Choose a default Google font for your site', 'mixtapewp'),
                'parent' => $panel_design_style
            )
        );

        mixtape_qodef_add_admin_field(
            array(
                'name'          => 'additional_google_fonts',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Additional Google Fonts', 'mixtapewp'),
                'description'   => '',
                'parent'        => $panel_design_style,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#qodef_additional_google_fonts_container"
                )
            )
        );

        $additional_google_fonts_container = mixtape_qodef_add_admin_container(
            array(
                'parent'            => $panel_design_style,
                'name'              => 'additional_google_fonts_container',
                'hidden_property'   => 'additional_google_fonts',
                'hidden_value'      => 'no'
            )
        );

        mixtape_qodef_add_admin_field(
            array(
                'name'          => 'additional_google_font1',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'mixtapewp'),
                'description'   => esc_html__('Choose additional Google font for your site', 'mixtapewp'),
                'parent'        => $additional_google_fonts_container
            )
        );

        mixtape_qodef_add_admin_field(
            array(
                'name'          => 'additional_google_font2',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'mixtapewp'),
                'description'   => esc_html__('Choose additional Google font for your site', 'mixtapewp'),
                'parent'        => $additional_google_fonts_container
            )
        );

        mixtape_qodef_add_admin_field(
            array(
                'name'          => 'additional_google_font3',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'mixtapewp'),
                'description'   => esc_html__('Choose additional Google font for your site', 'mixtapewp'),
                'parent'        => $additional_google_fonts_container
            )
        );

        mixtape_qodef_add_admin_field(
            array(
                'name'          => 'additional_google_font4',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'mixtapewp'),
                'description'   => esc_html__('Choose additional Google font for your site', 'mixtapewp'),
                'parent'        => $additional_google_fonts_container
            )
        );

        mixtape_qodef_add_admin_field(
            array(
                'name'          => 'additional_google_font5',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'mixtapewp'),
                'description'   => esc_html__('Choose additional Google font for your site', 'mixtapewp'),
                'parent'        => $additional_google_fonts_container
            )
        );

        mixtape_qodef_add_admin_field(
            array(
                'name'          => 'first_color',
                'type'          => 'color',
                'label'         => esc_html__('First Main Color', 'mixtapewp'),
                'description'   => esc_html__('Choose the most dominant theme color. Default color is #ab2eba', 'mixtapewp'),
                'parent'        => $panel_design_style
            )
        );

        mixtape_qodef_add_admin_field(
            array(
                'name'          => 'page_background_color',
                'type'          => 'color',
                'label'         => esc_html__('Page Background Color', 'mixtapewp'),
                'description'   => esc_html__('Choose the background color for page content. Default color is #ffffff', 'mixtapewp'),
                'parent'        => $panel_design_style
            )
        );

        mixtape_qodef_add_admin_field(
            array(
                'name'          => 'selection_color',
                'type'          => 'color',
                'label'         => esc_html__('Text Selection Color', 'mixtapewp'),
                'description'   => esc_html__('Choose the color users see when selecting text', 'mixtapewp'),
                'parent'        => $panel_design_style
            )
        );

        mixtape_qodef_add_admin_field(
            array(
                'name'          => 'boxed',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Boxed Layout', 'mixtapewp'),
                'description'   => '',
                'parent'        => $panel_design_style,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#qodef_boxed_container"
                )
            )
        );

        $boxed_container = mixtape_qodef_add_admin_container(
            array(
                'parent'            => $panel_design_style,
                'name'              => 'boxed_container',
                'hidden_property'   => 'boxed',
                'hidden_value'      => 'no'
            )
        );

        mixtape_qodef_add_admin_field(
            array(
                'name'          => 'page_background_color_in_box',
                'type'          => 'color',
                'label'         => esc_html__('Page Background Color', 'mixtapewp'),
                'description'   => esc_html__('Choose the page background color outside box.', 'mixtapewp'),
                'parent'        => $boxed_container
            )
        );

        mixtape_qodef_add_admin_field(
            array(
                'name'          => 'boxed_background_image',
                'type'          => 'image',
                'label'         => esc_html__('Background Image', 'mixtapewp'),
                'description'   => esc_html__('Choose an image to be displayed in background', 'mixtapewp'),
                'parent'        => $boxed_container
            )
        );

		mixtape_qodef_add_admin_field(
			array(
				'name'          => 'boxed_background_image_repeating',
				'type'          => 'select',
				'default_value' => 'no',
				'label'         => esc_html__('Use Background Image as Pattern', 'mixtapewp'),
				'description'   => esc_html__('Set this option to "yes" to use the background image as repeating pattern', 'mixtapewp'),
				'parent'        => $boxed_container,
				'options'       => array(
					'no'	=>	'No',
					'yes'	=>	'Yes'
				)
			)
		);

        mixtape_qodef_add_admin_field(
            array(
                'name'          => 'boxed_background_image_attachment',
                'type'          => 'select',
                'default_value' => 'fixed',
                'label'         => esc_html__('Background Image Behaviour', 'mixtapewp'),
                'description'   => esc_html__('Choose background image behaviour', 'mixtapewp'),
                'parent'        => $boxed_container,
                'options'       => array(
                    'fixed'     => esc_html__('Fixed', 'mixtapewp'),
                    'scroll'    => esc_html__('Scroll', 'mixtapewp')
                )
            )
        );

        mixtape_qodef_add_admin_field(
            array(
                'name'          => 'initial_content_width',
                'type'          => 'select',
                'default_value' => 'grid-1300',
                'label'         => esc_html__('Initial Width of Content', 'mixtapewp'),
                'description'   => esc_html__('Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'mixtapewp'),
                'parent'        => $panel_design_style,
                'options'       => array(
                    "grid-1300" => "1300px - ". esc_html__("default", 'mixtapewp'),
                    "grid-1200" => "1200px",
                    "grid-1000" => "1000px",
                    "grid-800"  => "800px"
                )
            )
        );

        mixtape_qodef_add_admin_field(
            array(
                'name'          => 'preload_pattern_image',
                'type'          => 'image',
                'label'         => esc_html__('Preload Pattern Image', 'mixtapewp'),
                'description'   => esc_html__('Choose preload pattern image to be displayed until images are loaded ', 'mixtapewp'),
                'parent'        => $panel_design_style
            )
        );

        mixtape_qodef_add_admin_field(
            array(
                'name' => 'element_appear_amount',
                'type' => 'text',
                'label' => esc_html__('Element Appearance', 'mixtapewp'),
                'description' => esc_html__('For animated elements, set distance (related to browser bottom) to start the animation', 'mixtapewp'),
                'parent' => $panel_design_style,
                'args' => array(
                    'col_width' => 2,
                    'suffix' => 'px'
                )
            )
        );

		mixtape_qodef_add_admin_field(
			array(
				'name'          => 'content_grid_lines',
				'type'          => 'select',
				'default_value' => 'none',
				'label'         => esc_html__('Grid Lines in Page Background', 'mixtapewp'),
				'description'   => esc_html__('If you would like to enable a set of lines in the page background, choose how many lines you would like to display. The lines will be placed on the page grid.', 'mixtapewp'),
				'parent'        => $panel_design_style,
				'options'       => array(
					"none" => esc_html__("None", 'mixtapewp'),
					"2" => "2 lines",
					"3" => "3 lines",
					"4" => "4 lines",
					"5" => "5 lines",
					"6" => "6 lines"
				)
			)
		);

        $panel_settings = mixtape_qodef_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_settings',
                'title' => esc_html__('Settings', 'mixtapewp')
            )
        );

        mixtape_qodef_add_admin_field(
            array(
                'name'          => 'smooth_scroll',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Smooth Scroll', 'mixtapewp'),
                'description'   => esc_html__('Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices)', 'mixtapewp'),
                'parent'        => $panel_settings
            )
        );

        mixtape_qodef_add_admin_field(
            array(
                'name'          => 'smooth_page_transitions',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Smooth Page Transitions', 'mixtapewp'),
                'description'   => esc_html__('Enabling this option will perform a smooth transition between pages when clicking on links.', 'mixtapewp'),
                'parent'        => $panel_settings,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#qodef_page_transitions_container"
                )
            )
        );

        $page_transitions_container = mixtape_qodef_add_admin_container(
            array(
                'parent'            => $panel_settings,
                'name'              => 'page_transitions_container',
                'hidden_property'   => 'smooth_page_transitions',
                'hidden_value'      => 'no'
            )
        );

        mixtape_qodef_add_admin_field(
            array(
                'name'          => 'smooth_pt_bgnd_color',
                'type'          => 'color',
                'label'         => esc_html__('Page Loader Background Color', 'mixtapewp'),
                //'description'   => 'Enabling this option will perform a smooth transition between pages when clicking on links.',
                'parent'        => $page_transitions_container
            )
        );

        $group_pt_spinner_animation = mixtape_qodef_add_admin_group(array(
            'name'          => 'group_pt_spinner_animation',
            'title'         => esc_html__('Loader Style', 'mixtapewp'),
            'description'   => esc_html__('Define styles for loader spinner animation', 'mixtapewp'),
            'parent'        => $page_transitions_container
        ));

        $row_pt_spinner_animation = mixtape_qodef_add_admin_row(array(
            'name'      => 'row_pt_spinner_animation',
            'parent'    => $group_pt_spinner_animation
        ));

        mixtape_qodef_add_admin_field(array(
            'type'          => 'selectsimple',
            'name'          => 'smooth_pt_spinner_type',
            'default_value' => '',
            'label'         => esc_html__('Spinner Type', 'mixtapewp'),
            'parent'        => $row_pt_spinner_animation,
            'options'       => array(
                "pulse" => esc_html__("Pulse", 'mixtapewp'),
                "double_pulse" => esc_html__("Double Pulse", 'mixtapewp'),
                "cube" => esc_html__("Cube", 'mixtapewp'),
                "rotating_cubes" => esc_html__("Rotating Cubes", 'mixtapewp'),
                "stripes" =>esc_html__( "Stripes", 'mixtapewp'),
                "wave" => esc_html__("Wave", 'mixtapewp'),
                "two_rotating_circles" => esc_html__("2 Rotating Circles", 'mixtapewp'),
                "five_rotating_circles" => esc_html__("5 Rotating Circles", 'mixtapewp'),
                "atom" => esc_html__("Atom", 'mixtapewp'),
                "clock" => esc_html__("Clock", 'mixtapewp'),
                "mitosis" => esc_html__("Mitosis", 'mixtapewp'),
                "lines" => esc_html__("Lines", 'mixtapewp'),
                "fussion" => esc_html__("Fussion", 'mixtapewp'),
                "wave_circles" => esc_html__("Wave Circles", 'mixtapewp'),
                "pulse_circles" => esc_html__("Pulse Circles", 'mixtapewp')
            )
        ));

        mixtape_qodef_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'smooth_pt_spinner_color',
            'default_value' => '',
            'label'         => esc_html__('Spinner Color', 'mixtapewp'),
            'parent'        => $row_pt_spinner_animation
        ));

        mixtape_qodef_add_admin_field(
            array(
                'name'          => 'show_back_button',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label'         => esc_html__('Show "Back To Top Button"', 'mixtapewp'),
                'description'   => esc_html__('Enabling this option will display a Back to Top button on every page', 'mixtapewp'),
                'parent'        => $panel_settings
            )
        );

        mixtape_qodef_add_admin_field(
            array(
                'name'          => 'responsiveness',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label'         => esc_html__('Responsiveness', 'mixtapewp'),
                'description'   => esc_html__('Enabling this option will make all pages responsive', 'mixtapewp'),
                'parent'        => $panel_settings
            )
        );

        $panel_custom_code = mixtape_qodef_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_custom_code',
                'title' => esc_html__('Custom Code', 'mixtapewp')
            )
        );

        mixtape_qodef_add_admin_field(
            array(
                'name'          => 'custom_css',
                'type'          => 'textarea',
                'label'         => esc_html__('Custom CSS', 'mixtapewp'),
                'description'   => esc_html__('Enter your custom CSS here', 'mixtapewp'),
                'parent'        => $panel_custom_code
            )
        );

        mixtape_qodef_add_admin_field(
            array(
                'name'          => 'custom_js',
                'type'          => 'textarea',
                'label'         => esc_html__('Custom JS', 'mixtapewp'),
                'description'   => esc_html__('Enter your custom Javascript here', 'mixtapewp'),
                'parent'        => $panel_custom_code
            )
        );

		$panel_google_api = mixtape_qodef_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_google_api',
				'title' => esc_html__('Google API', 'mixtapewp')
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'name'        => 'google_maps_api_key',
				'type'        => 'text',
				'label'       => esc_html__('Google Maps Api Key', 'mixtapewp'),
				'description' => esc_html__('Insert your Google Maps API key here. For instructions on how to create a Google Maps API key, please refer to our documentation.', 'mixtapewp'),
				'parent'      => $panel_google_api
			)
		);

    }

    add_action( 'mixtape_qodef_options_map', 'mixtape_qodef_general_options_map', 1);

}