<?php

if(!function_exists('mixtape_qodef_map_general_meta_fields')) {

    function mixtape_qodef_map_general_meta_fields() {

		$general_meta_box = mixtape_qodef_add_meta_box(
		    array(
		        'scope' => array('page', 'post', 'event', 'album'),
		        'title' => esc_html__('General', 'mixtapewp'),
		        'name' => 'general_meta'
		    )
		);

			mixtape_qodef_add_meta_box_field(
				array(
					'name' => 'qodef_first_color_meta',
					'type' => 'color',
					'default_value' => '',
					'label' => esc_html__('First Main Color', 'mixtapewp'),
					'description' => esc_html__('Choose background color for page content', 'mixtapewp'),
					'parent' => $general_meta_box
				)
			);

		    mixtape_qodef_add_meta_box_field(
		        array(
		            'name' => 'qodef_page_background_color_meta',
		            'type' => 'color',
		            'default_value' => '',
		            'label' => esc_html__('Page Background Color', 'mixtapewp'),
		            'description' => esc_html__('Choose background color for page content', 'mixtapewp'),
		            'parent' => $general_meta_box
		        )
		    );

			$content_background_image_group = mixtape_qodef_add_admin_group(array(
				'name'   => 'qodef_content_background_image_group',
				'parent' => $general_meta_box,
				'title'  => esc_html__('Page Background Image', 'mixtapewp')
			));

			$content_background_image_row1 = mixtape_qodef_add_admin_row(array(
				'name'   => 'qodef_content_background_image_row1',
				'parent' => $content_background_image_group
			));

			mixtape_qodef_add_meta_box_field(array(
				'name'   => 'qodef_page_background_image_meta',
				'type'   => 'imagesimple',
				'label'  => esc_html__('Background Image', 'mixtapewp'),
				'parent' => $content_background_image_row1
			));

			mixtape_qodef_add_meta_box_field(array(
				'name'          => 'qodef_page_background_image_repeat_meta',
				'type'          => 'yesnosimple',
				'default_value' => 'no',
				'label'         => esc_html__('Repeat Background Image?', 'mixtapewp'),
				'parent'        => $content_background_image_row1
			));

			mixtape_qodef_add_meta_box_field(
				array(
					'name' => 'qodef_page_background_image_vertical_position_meta',
					'type' => 'selectsimple',
					'default_value' => 'center',
					'label' => esc_html__('Background Image Vertical Position', 'mixtapewp'),
					'options'       => array(
						'center'	=> esc_html__('Center', 'mixtapewp'),
						'top'		=> esc_html__('Top', 'mixtapewp'),
						'bottom'   	=> esc_html__('Bottom', 'mixtapewp')
					),
					'parent' => $content_background_image_row1
				)
			);

			mixtape_qodef_add_meta_box_field(
				array(
					'name' => 'qodef_page_background_image_size_meta',
					'type' => 'selectsimple',
					'default_value' => 'contain',
					'label' => esc_html__('Background Image Size', 'mixtapewp'),
					'options'       => array(
						'contain'	=> esc_html__('Contain', 'mixtapewp'),
						'cover'		=> esc_html__('Cover', 'mixtapewp')
					),
					'parent' => $content_background_image_row1
				)
			);

		mixtape_qodef_add_meta_box_field(
				array(
					'name' => 'qodef_page_padding_meta',
					'type' => 'text',
					'default_value' => '',
					'label' => esc_html__('Page Padding', 'mixtapewp'),
					'description' => esc_html__('Insert padding in format 10px 10px 10px 10px', 'mixtapewp'),
					'parent' => $general_meta_box
				)
			);

			mixtape_qodef_add_meta_box_field(array(
				'name'          => 'qodef_overlapping_content_enable_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Enable Overlapping Content', 'mixtapewp'),
				'description'   => esc_html__('Enabling this option will make content overlap title area', 'mixtapewp'),
				'parent'        => $general_meta_box
			));

		    mixtape_qodef_add_meta_box_field(
		        array(
		            'name' => 'qodef_page_slider_meta',
		            'type' => 'text',
		            'default_value' => '',
		            'label' => esc_html__('Slider Shortcode', 'mixtapewp'),
		            'description' => esc_html__('Paste your slider shortcode here', 'mixtapewp'),
		            'parent' => $general_meta_box
		        )
		    );

			$boxed_option      = mixtape_qodef_options()->getOptionValue('boxed');
			$boxed_default_dependency = array(
				'' => '#qodef_boxed_container'
			);

			$boxed_show_array = array(
				'yes' => '#qodef_boxed_container'
			);

			$boxed_hide_array = array(
				'no' => '#qodef_boxed_container'
			);

			if($boxed_option === 'yes') {
				$boxed_show_array = array_merge($boxed_show_array, $boxed_default_dependency);
				$temp_boxed_no = array(
					'hidden_value' => 'no'
				);
			} else {
				$boxed_hide_array = array_merge($boxed_hide_array, $boxed_default_dependency);
				$temp_boxed_no = array(
					'hidden_values'   => array('','no')
				);
			}

			mixtape_qodef_add_meta_box_field(
				array(
					'name'          => 'qodef_boxed_meta',
					'type'          => 'select',
					'label'         => esc_html__('Boxed Layout', 'mixtapewp'),
					'description'   => '',
					'parent'        => $general_meta_box,
					'default_value' => '',
					'options'     => array(
						''		=> esc_html__('Default', 'mixtapewp'),
						'yes'	=> esc_html__('Yes', 'mixtapewp'),
						'no'	=> esc_html__('No', 'mixtapewp')
					),
					'args' => array(
						"dependence" => true,
						'show'       => $boxed_show_array,
						'hide'       => $boxed_hide_array
					)
				)
			);

			$boxed_container = mixtape_qodef_add_admin_container_no_style(
				array_merge(
					array(
						'parent'            => $general_meta_box,
						'name'              => 'boxed_container',
						'hidden_property'   => 'qodef_boxed_meta'
					),
					$temp_boxed_no
				)
			);

			mixtape_qodef_add_meta_box_field(
				array(
					'name'          => 'qodef_page_background_color_in_box_meta',
					'type'          => 'color',
					'label'         => esc_html__('Page Background Color', 'mixtapewp'),
					'description'   => esc_html__('Choose the page background color outside box.', 'mixtapewp'),
					'parent'        => $boxed_container
				)
			);

			mixtape_qodef_add_meta_box_field(
				array(
					'name'          => 'qodef_boxed_background_image_meta',
					'type'          => 'image',
					'label'         => esc_html__('Background Image', 'mixtapewp'),
					'description'   => esc_html__('Choose an image to be displayed in background', 'mixtapewp'),
					'parent'        => $boxed_container
				)
			);

			mixtape_qodef_add_meta_box_field(
				array(
					'name'          => 'qodef_boxed_background_image_repeating_meta',
					'type'          => 'select',
					'default_value' => 'no',
					'label'         => esc_html__('Use Background Image as Pattern', 'mixtapewp'),
					'description'   => esc_html__('Set this option to "yes" to use the background image as repeating pattern', 'mixtapewp'),
					'parent'        => $boxed_container,
					'options'       => array(
						'no'	=>	esc_html__('No', 'mixtapewp'),
						'yes'	=>	esc_html__('Yes', 'mixtapewp')

					)
				)
			);

			mixtape_qodef_add_meta_box_field(
				array(
					'name'          => 'qodef_boxed_background_image_attachment_meta',
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

			mixtape_qodef_add_meta_box_field(
				array(
					'name'          => 'qodef_content_grid_lines_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__('Grid Lines in Page Background', 'mixtapewp'),
					'description'   => esc_html__('If you would like to enable a set of lines in the page background, choose how many lines you would like to display. The lines will be placed on the page grid.', 'mixtapewp'),
					'parent'        => $general_meta_box,
					'options'       => array(
						"" => "",
						"none" => esc_html__("None", 'mixtapewp'),
						"2" => "2 lines",
						"3" => "3 lines",
						"4" => "4 lines",
						"5" => "5 lines",
						"6" => "6 lines"
					)
				)
			);
		}

    add_action('mixtape_qodef_meta_boxes_map', 'mixtape_qodef_map_general_meta_fields');
}