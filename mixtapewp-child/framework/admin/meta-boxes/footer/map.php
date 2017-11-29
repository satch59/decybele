<?php

if(!function_exists('mixtape_qodef_map_footer_meta_fields')) {

    function mixtape_qodef_map_footer_meta_fields() {

        $footer_meta_box = mixtape_qodef_add_meta_box(
            array(
                'scope' => array('page', 'post', 'event', 'album'),
                'title' => esc_html__('Footer', 'mixtapewp'),
                'name' => 'footer_meta'
            )
        );

            mixtape_qodef_add_meta_box_field(
                array(
                    'name' => 'qodef_disable_footer_meta',
                    'type' => 'yesno',
                    'default_value' => 'no',
                    'label' => esc_html__('Disable Footer for this Page', 'mixtapewp'),
                    'description' => esc_html__('Enabling this option will hide footer on this page', 'mixtapewp'),
                    'parent' => $footer_meta_box,
					'args'          => array(
						"dependence" => true,
						"dependence_hide_on_yes" => "#qodef_qodef_show_footer_meta_container",
						"dependence_show_on_yes" => ""
					)
                )
            );


			$show_footer_meta_container = mixtape_qodef_add_admin_container(
				array(
					'parent' => $footer_meta_box,
					'name' => 'qodef_show_footer_meta_container',
					'hidden_property' => 'qodef_disable_footer_meta',
					'hidden_value' => 'yes'
				)
			);

				mixtape_qodef_add_meta_box_field(
					array(
						'name'          => 'qodef_disable_footer_image_meta',
						'type'          => 'yesno',
						'default_value' => 'no',
						'label'         => esc_html__('Disable Footer Background Image for this Page', 'mixtapewp'),
						'description'   => esc_html__('Enabling this option will hide footer background image on this page', 'mixtapewp'),
						'parent'        => $show_footer_meta_container,
						'args'          => array(
							'dependence'             => true,
							'dependence_hide_on_yes' => '#qodef_qodef_show_footer_background_meta_container',
							'dependence_show_on_yes' => ''
						)
					)
				);

				$show_footer_background_meta_container = mixtape_qodef_add_admin_container(
					array(
						'parent' => $show_footer_meta_container,
						'name' => 'qodef_show_footer_background_meta_container',
						'hidden_property' => 'qodef_disable_footer_image_meta',
						'hidden_value' => 'yes'
					)
				);

				mixtape_qodef_add_meta_box_field(
					array(
						'name'            => 'qodef_footer_background_image_meta',
						'type'            => 'image',
						'label'           => esc_html__('Background Image', 'mixtapewp'),
						'description'     => esc_html__('Choose Background Image for Footer Area on this page', 'mixtapewp'),
						'parent'          => $show_footer_background_meta_container,
						'hidden_property' => 'qodef_enable_footer_image_meta',
						'hidden_value'    => 'yes'
					)
				);

				mixtape_qodef_add_meta_box_field(
					array(
						'name'        => 'qodef_footer_background_color_meta',
						'type'        => 'color',
						'label'       => esc_html__('Background Color', 'mixtapewp'),
						'description' => esc_html__('Choose Background Color for Footer Area on this page', 'mixtapewp'),
						'parent'      => $show_footer_meta_container
					)
				);

        }

    add_action('mixtape_qodef_meta_boxes_map', 'mixtape_qodef_map_footer_meta_fields');
}