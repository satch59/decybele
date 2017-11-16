<?php

/*** Audio Post Format ***/

if(!function_exists('mixtape_qodef_map_post_format_audio_meta_fields')) {

    function mixtape_qodef_map_post_format_audio_meta_fields() {

		$audio_post_format_meta_box = mixtape_qodef_add_meta_box(
			array(
				'scope' =>	array('post'),
				'title' => esc_html__('Audio Post Format', 'mixtapewp'),
				'name' 	=> 'post_format_audio_meta'
			)
		);

		mixtape_qodef_add_meta_box_field(
			array(
				'name'        => 'qodef_audio_post_type_meta',
				'type'        => 'select',
				'label'       => esc_html__('Audio Type', 'mixtapewp'),
				'description' => esc_html__('Choose audio type', 'mixtapewp'),
				'parent'      => $audio_post_format_meta_box,
				'default_value' => 'self',
				'options'     => array(
					'self'			=> esc_html__('Self Hosted', 'mixtapewp'),
					'soundcloud'	=> esc_html__('Soundcloud', 'mixtapewp')
				),
				'args' => array(
					'dependence' => true,
					'hide' => array(
						'self'		=> '#qodef_qodef_audio_soundcloud_container',
						'soundcloud' => '#qodef_qodef_audio_self_hosted_container'
					),
					'show' => array(
						'self'		=> '#qodef_qodef_audio_self_hosted_container',
						'soundcloud' => '#qodef_qodef_audio_soundcloud_container'
					)
				)
			)
		);

		$qodef_audio_self_hosted_container = mixtape_qodef_add_admin_container(
			array(
				'parent' => $audio_post_format_meta_box,
				'name' => 'qodef_audio_self_hosted_container',
				'hidden_property' => 'qodef_audio_post_type_meta',
				'hidden_value' => 'soundcloud'
			)
		);

		$qodef_audio_soundcloud_container = mixtape_qodef_add_admin_container(
			array(
				'parent' => $audio_post_format_meta_box,
				'name' => 'qodef_audio_soundcloud_container',
				'hidden_property' => 'qodef_audio_post_type_meta',
				'hidden_value' => 'self'
			)
		);


		mixtape_qodef_add_meta_box_field(
			array(
				'name'        => 'qodef_post_audio_link_meta',
				'type'        => 'text',
				'label'       => esc_html__('Self Hosted Link', 'mixtapewp'),
				'description' => esc_html__('Enter audio link', 'mixtapewp'),
				'parent'      => $qodef_audio_self_hosted_container,

			)
		);

		mixtape_qodef_add_meta_box_field(
			array(
				'name'        => 'qodef_post_audio_soundcloud_link_meta',
				'type'        => 'text',
				'label'       => esc_html__('Soundcloud Link', 'mixtapewp'),
				'description' => esc_html__('Enter soundcloud link', 'mixtapewp'),
				'parent'      => $qodef_audio_soundcloud_container,

			)
		);
    }

    add_action('mixtape_qodef_meta_boxes_map', 'mixtape_qodef_map_post_format_audio_meta_fields');
}
