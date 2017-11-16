<?php

if(!function_exists('mixtape_qodef_map_title_meta_fields')) {

    function mixtape_qodef_map_title_meta_fields() {

        $title_meta_box = mixtape_qodef_add_meta_box(
            array(
                'scope' => array('page', 'post', 'event', 'album'),
                'title' => esc_html__('Title', 'mixtapewp'),
                'name' => 'title_meta'
            )
        );

            mixtape_qodef_add_meta_box_field(
                array(
                    'name' => 'qodef_show_title_area_meta',
                    'type' => 'select',
                    'default_value' => '',
                    'label' => esc_html__('Show Title Area', 'mixtapewp'),
                    'description' => esc_html__('Disabling this option will turn off page title area', 'mixtapewp'),
                    'parent' => $title_meta_box,
                    'options' => array(
                        '' => '',
                        'no' => esc_html__('No', 'mixtapewp'),
                        'yes' => esc_html__('Yes', 'mixtapewp')
                    ),
                    'args' => array(
                        "dependence" => true,
                        "hide" => array(
                            "" => "",
                            "no" => "#qodef_qodef_show_title_area_meta_container",
                            "yes" => ""
                        ),
                        "show" => array(
                            "" => "#qodef_qodef_show_title_area_meta_container",
                            "no" => "",
                            "yes" => "#qodef_qodef_show_title_area_meta_container"
                        )
                    )
                )
            );

            $show_title_area_meta_container = mixtape_qodef_add_admin_container(
                array(
                    'parent' => $title_meta_box,
                    'name' => 'qodef_show_title_area_meta_container',
                    'hidden_property' => 'qodef_show_title_area_meta',
                    'hidden_value' => 'no'
                )
            );

                mixtape_qodef_add_meta_box_field(
                    array(
                        'name' => 'qodef_title_in_grid_meta',
                        'type' => 'select',
                        'default_value' => '',
                        'label' => esc_html__('Title Area in Grid', 'mixtapewp'),
                        'description' => esc_html__('Choose wheter for title content to be in grid', 'mixtapewp'),
                        'parent' => $show_title_area_meta_container,
                        'options' => array(
                            '' => '',
                            'yes' => esc_html__('Yes', 'mixtapewp'),
                            'no' => esc_html__('No', 'mixtapewp')
                        )
                    )
                );

				mixtape_qodef_add_meta_box_field(
					array(
						'name' => 'qodef_title_breadcrumbs_meta',
						'type' => 'select',
						'default_value' => '',
						'label' => esc_html__('Show breadcrumbs', 'mixtapewp'),
						'description' => esc_html__('Show breadcrumbs above title', 'mixtapewp'),
						'parent' => $show_title_area_meta_container,
						'options' => array(
							'' => '',
							'yes' => esc_html__('Yes', 'mixtapewp'),
							'no' => esc_html__('No', 'mixtapewp')
						)
					)
				);

                mixtape_qodef_add_meta_box_field(
                    array(
                        'name' => 'qodef_title_area_animation_meta',
                        'type' => 'select',
                        'default_value' => '',
                        'label' => esc_html__('Animations', 'mixtapewp'),
                        'description' => esc_html__('Choose an animation for Title Area', 'mixtapewp'),
                        'parent' => $show_title_area_meta_container,
                        'options' => array(
                            '' => '',
                            'no' => esc_html__('No Animation', 'mixtapewp'),
                            'right-left' => esc_html__('Text right to left', 'mixtapewp'),
                            'left-right' => esc_html__('Text left to right', 'mixtapewp')
                        )
                    )
                );

                mixtape_qodef_add_meta_box_field(
                    array(
                        'name' => 'qodef_title_area_vertial_alignment_meta',
                        'type' => 'select',
                        'default_value' => '',
                        'label' => esc_html__('Vertical Alignment', 'mixtapewp'),
                        'description' => esc_html__('Specify title vertical alignment', 'mixtapewp'),
                        'parent' => $show_title_area_meta_container,
                        'options' => array(
                            '' => '',
                            'header_bottom' => esc_html__('From Bottom of Header', 'mixtapewp'),
                            'window_top' => esc_html__('From Window Top', 'mixtapewp')
                        )
                    )
                );

                mixtape_qodef_add_meta_box_field(
                    array(
                        'name' => 'qodef_title_area_content_alignment_meta',
                        'type' => 'select',
                        'default_value' => '',
                        'label' => esc_html__('Horizontal Alignment', 'mixtapewp'),
                        'description' => esc_html__('Specify title horizontal alignment', 'mixtapewp'),
                        'parent' => $show_title_area_meta_container,
                        'options' => array(
                            '' => '',
                            'left' => esc_html__('Left', 'mixtapewp'),
                            'center' => esc_html__('Center', 'mixtapewp'),
                            'right' => esc_html__('Right', 'mixtapewp')
                        )
                    )
                );

        		mixtape_qodef_add_meta_box_field(
        			array(
        				'name'			=> 'qodef_title_area_text_size_meta',
        				'type'			=> 'select',
        				'default_value'	=> '',
        				'label'			=> esc_html__('Text Size', 'mixtapewp'),
        				'description'	=> esc_html__('Choose a default Title size', 'mixtapewp'),
        				'parent'		=> $show_title_area_meta_container,
        				'options'		=> array(
        					'' => '',
        					'small'     => esc_html__('Small', 'mixtapewp'),
        					'medium'    => esc_html__('Medium', 'mixtapewp'),
        					'large'     => esc_html__('Large', 'mixtapewp')


        				)
        			)
        		);

                mixtape_qodef_add_meta_box_field(
                    array(
                        'name' => 'qodef_title_text_color_meta',
                        'type' => 'color',
                        'label' => esc_html__('Title Color', 'mixtapewp'),
                        'description' => esc_html__('Choose a color for title text', 'mixtapewp'),
                        'parent' => $show_title_area_meta_container
                    )
                );

                mixtape_qodef_add_meta_box_field(
                    array(
                        'name' => 'qodef_title_breadcrumb_color_meta',
                        'type' => 'color',
                        'label' => esc_html__('Breadcrumb Color', 'mixtapewp'),
                        'description' => esc_html__('Choose a color for breadcrumb text', 'mixtapewp'),
                        'parent' => $show_title_area_meta_container
                    )
                );

                mixtape_qodef_add_meta_box_field(
                    array(
                        'name' => 'qodef_title_area_background_color_meta',
                        'type' => 'color',
                        'label' => esc_html__('Background Color', 'mixtapewp'),
                        'description' => esc_html__('Choose a background color for Title Area', 'mixtapewp'),
                        'parent' => $show_title_area_meta_container
                    )
                );

                mixtape_qodef_add_meta_box_field(
                    array(
                        'name' => 'qodef_hide_background_image_meta',
                        'type' => 'yesno',
                        'default_value' => 'no',
                        'label' => esc_html__('Hide Background Image', 'mixtapewp'),
                        'description' => esc_html__('Enable this option to hide background image in Title Area', 'mixtapewp'),
                        'parent' => $show_title_area_meta_container,
                        'args' => array(
                            "dependence" => true,
                            "dependence_hide_on_yes" => "#qodef_qodef_hide_background_image_meta_container",
                            "dependence_show_on_yes" => ""
                        )
                    )
                );

                $hide_background_image_meta_container = mixtape_qodef_add_admin_container(
                    array(
                        'parent' => $show_title_area_meta_container,
                        'name' => 'qodef_hide_background_image_meta_container',
                        'hidden_property' => 'qodef_hide_background_image_meta',
                        'hidden_value' => 'yes'
                    )
                );

                mixtape_qodef_add_meta_box_field(
                    array(
                        'name' => 'qodef_title_area_background_image_meta',
                        'type' => 'image',
                        'label' => esc_html__('Background Image', 'mixtapewp'),
                        'description' => esc_html__('Choose an Image for Title Area', 'mixtapewp'),
                        'parent' => $hide_background_image_meta_container
                    )
                );

                mixtape_qodef_add_meta_box_field(
                    array(
                        'name' => 'qodef_title_area_background_image_responsive_meta',
                        'type' => 'select',
                        'default_value' => '',
                        'label' => esc_html__('Background Responsive Image', 'mixtapewp'),
                        'description' => esc_html__('Enabling this option will make Title background image responsive', 'mixtapewp'),
                        'parent' => $hide_background_image_meta_container,
                        'options' => array(
                            '' => '',
                            'no' => esc_html__('No', 'mixtapewp'),
                            'yes' => esc_html__('Yes', 'mixtapewp')
                        ),
                        'args' => array(
                            "dependence" => true,
                            "hide" => array(
                                "" => "",
                                "no" => "",
                                "yes" => "#qodef_qodef_title_area_background_image_responsive_meta_container, #qodef_qodef_title_area_height_meta"
                            ),
                            "show" => array(
                                "" => "#qodef_qodef_title_area_background_image_responsive_meta_container, #qodef_qodef_title_area_height_meta",
                                "no" => "#qodef_qodef_title_area_background_image_responsive_meta_container, #qodef_qodef_title_area_height_meta",
                                "yes" => ""
                            )
                        )
                    )
                );

                $title_area_background_image_responsive_meta_container = mixtape_qodef_add_admin_container(
                    array(
                        'parent' => $hide_background_image_meta_container,
                        'name' => 'qodef_title_area_background_image_responsive_meta_container',
                        'hidden_property' => 'qodef_title_area_background_image_responsive_meta',
                        'hidden_value' => 'yes'
                    )
                );

                    mixtape_qodef_add_meta_box_field(
                        array(
                            'name' => 'qodef_title_area_background_image_parallax_meta',
                            'type' => 'select',
                            'default_value' => '',
                            'label' => esc_html__('Background Image in Parallax', 'mixtapewp'),
                            'description' => esc_html__('Enabling this option will make Title background image parallax', 'mixtapewp'),
                            'parent' => $title_area_background_image_responsive_meta_container,
                            'options' => array(
                                '' => '',
                                'no' => esc_html__('No', 'mixtapewp'),
                                'yes' => esc_html__('Yes', 'mixtapewp'),
                                'yes_zoom' => esc_html__('Yes, with zoom out', 'mixtapewp')
                            )
                        )
                    );

                mixtape_qodef_add_meta_box_field(array(
                    'name' => 'qodef_title_area_height_meta',
                    'type' => 'text',
                    'label' => esc_html__('Height', 'mixtapewp'),
                    'description' => esc_html__('Set a height for Title Area', 'mixtapewp'),
                    'parent' => $show_title_area_meta_container,
                    'args' => array(
                        'col_width' => 2,
                        'suffix' => 'px'
                    )
                ));

        		mixtape_qodef_add_meta_box_field(
        			array(
        				'name' => 'qodef_title_area_border_bottom_meta',
        				'type' => 'select',
        				'default_value' => '',
        				'label' => esc_html__('Enable Border Bottom', 'mixtapewp'),
        				'description' => esc_html__('This option will display Border Bottom in Title Area', 'mixtapewp'),
        				'parent' => $show_title_area_meta_container,
        				'options' => array(
        					'' => '',
        					'no' => esc_html__('No', 'mixtapewp'),
        					'yes' => esc_html__('Yes', 'mixtapewp')
        				)
        			)
        		);

                mixtape_qodef_add_meta_box_field(array(
                    'name' => 'qodef_title_area_subtitle_meta',
                    'type' => 'text',
                    'default_value' => '',
                    'label' => esc_html__('Subtitle Text', 'mixtapewp'),
                    'description' => esc_html__('Enter your subtitle text', 'mixtapewp'),
                    'parent' => $show_title_area_meta_container,
                    'args' => array(
                        'col_width' => 6
                    )
                ));

                mixtape_qodef_add_meta_box_field(
                    array(
                        'name' => 'qodef_subtitle_color_meta',
                        'type' => 'color',
                        'label' => esc_html__('Subtitle Color', 'mixtapewp'),
                        'description' => esc_html__('Choose a color for subtitle text', 'mixtapewp'),
                        'parent' => $show_title_area_meta_container
                    )
                );
            }

    add_action('mixtape_qodef_meta_boxes_map', 'mixtape_qodef_map_title_meta_fields');
}
