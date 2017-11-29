<?php

if(!function_exists('mixtape_qodef_map_content_bottom_meta_fields')) {

    function mixtape_qodef_map_content_bottom_meta_fields() {

		$content_bottom_meta_box = mixtape_qodef_add_meta_box(
			array(
				'scope' => array('page', 'post', 'event', 'album'),
				'title' => esc_html__('Content Bottom', 'mixtapewp'),
				'name' => 'content_bottom_meta'
			)
		);

			mixtape_qodef_add_meta_box_field(
				array(
					'name' => 'qodef_enable_content_bottom_area_meta',
					'type' => 'selectblank',
					'default_value' => '',
					'label' => esc_html__('Enable Content Bottom Area', 'mixtapewp'),
					'description' => esc_html__('This option will enable Content Bottom area on pages', 'mixtapewp'),
					'parent' => $content_bottom_meta_box,
					'options' => array(
						'no' => esc_html__('No', 'mixtapewp'),
						'yes' => esc_html__('Yes', 'mixtapewp')
					),
					'args' => array(
						'dependence' => true,
						'hide' => array(
							'' => '#qodef_qodef_show_content_bottom_meta_container',
							'no' => '#qodef_qodef_show_content_bottom_meta_container'
						),
						'show' => array(
							'yes' => '#qodef_qodef_show_content_bottom_meta_container'
						)
					)
				)
			);

			$show_content_bottom_meta_container = mixtape_qodef_add_admin_container(
				array(
					'parent' => $content_bottom_meta_box,
					'name' => 'qodef_show_content_bottom_meta_container',
					'hidden_property' => 'qodef_enable_content_bottom_area_meta',
					'hidden_value' => '',
					'hidden_values' => array('','no')
				)
			);

				mixtape_qodef_add_meta_box_field(
					array(
						'name' => 'qodef_content_bottom_sidebar_custom_display_meta',
						'type' => 'selectblank',
						'default_value' => '',
						'label' => esc_html__('Sidebar to Display', 'mixtapewp'),
						'description' => esc_html__('Choose a Content Bottom sidebar to display', 'mixtapewp'),
						'options' => mixtape_qodef_get_custom_sidebars(),
						'parent' => $show_content_bottom_meta_container
					)
				);

				mixtape_qodef_add_meta_box_field(
					array(
						'type' => 'selectblank',
						'name' => 'qodef_content_bottom_in_grid_meta',
						'default_value' => '',
						'label' => esc_html__('Display in Grid', 'mixtapewp'),
						'description' => esc_html__('Enabling this option will place Content Bottom in grid', 'mixtapewp'),
						'options' => array(
							'no' => esc_html__('No', 'mixtapewp'),
							'yes' => esc_html__('Yes', 'mixtapewp')
						),
						'parent' => $show_content_bottom_meta_container
					)
				);

				mixtape_qodef_add_meta_box_field(
					array(
						'type' => 'color',
						'name' => 'qodef_content_bottom_background_color_meta',
						'default_value' => '',
						'label' => esc_html__('Background Color', 'mixtapewp'),
						'description' => esc_html__('Choose a background color for Content Bottom area', 'mixtapewp'),
						'parent' => $show_content_bottom_meta_container
					)
				);
			}

    add_action('mixtape_qodef_meta_boxes_map', 'mixtape_qodef_map_content_bottom_meta_fields');
}
