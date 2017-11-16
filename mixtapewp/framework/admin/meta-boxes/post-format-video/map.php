<?php

/*** Video Post Format ***/

if(!function_exists('mixtape_qodef_map_post_format_video_meta_fields')) {

    function mixtape_qodef_map_post_format_video_meta_fields() {


		$video_post_format_meta_box = mixtape_qodef_add_meta_box(
			array(
				'scope' =>	array('post'),
				'title' => esc_html__('Video Post Format', 'mixtapewp'),
				'name' 	=> 'post_format_video_meta'
			)
		);

		mixtape_qodef_add_meta_box_field(
			array(
				'name'        => 'qodef_video_type_meta',
				'type'        => 'select',
				'label'       => esc_html__('Video Type', 'mixtapewp'),
				'description' => esc_html__('Choose video type', 'mixtapewp'),
				'parent'      => $video_post_format_meta_box,
				'default_value' => 'youtube',
				'options'     => array(
					'youtube' => esc_html__('Youtube', 'mixtapewp'),
					'vimeo' => esc_html__('Vimeo', 'mixtapewp'),
					'self' => esc_html__('Self Hosted', 'mixtapewp')
				),
				'args' => array(
				'dependence' => true,
				'hide' => array(
					'youtube' => '#qodef_qodef_video_self_hosted_container',
					'vimeo' => '#qodef_qodef_video_self_hosted_container',
					'self' => '#qodef_qodef_video_embedded_container'
				),
				'show' => array(
					'youtube' => '#qodef_qodef_video_embedded_container',
					'vimeo' => '#qodef_qodef_video_embedded_container',
					'self' => '#qodef_qodef_video_self_hosted_container')
			)
			)
		);

		$qodef_video_embedded_container = mixtape_qodef_add_admin_container(
			array(
				'parent' => $video_post_format_meta_box,
				'name' => 'qodef_video_embedded_container',
				'hidden_property' => 'qodef_video_type_meta',
				'hidden_value' => 'self'
			)
		);

		$qodef_video_self_hosted_container = mixtape_qodef_add_admin_container(
			array(
				'parent' => $video_post_format_meta_box,
				'name' => 'qodef_video_self_hosted_container',
				'hidden_property' => 'qodef_video_type_meta',
				'hidden_values' => array('youtube', 'vimeo')
			)
		);

		mixtape_qodef_add_meta_box_field(
			array(
				'name'        => 'qodef_post_video_id_meta',
				'type'        => 'text',
				'label'       => esc_html__('Video ID', 'mixtapewp'),
				'description' => esc_html__('Enter Video ID', 'mixtapewp'),
				'parent'      => $qodef_video_embedded_container,

			)
		);

		mixtape_qodef_add_meta_box_field(
			array(
				'name'        => 'qodef_post_video_image_meta',
				'type'        => 'image',
				'label'       => esc_html__('Video Image', 'mixtapewp'),
				'description' => esc_html__('Upload video image', 'mixtapewp'),
				'parent'      => $qodef_video_self_hosted_container,

			)
		);

		mixtape_qodef_add_meta_box_field(
			array(
				'name'        => 'qodef_post_video_webm_link_meta',
				'type'        => 'text',
				'label'       => esc_html__('Video WEBM', 'mixtapewp'),
				'description' => esc_html__('Enter video URL for WEBM format', 'mixtapewp'),
				'parent'      => $qodef_video_self_hosted_container,

			)
		);

		mixtape_qodef_add_meta_box_field(
			array(
				'name'        => 'qodef_post_video_mp4_link_meta',
				'type'        => 'text',
				'label'       => esc_html__('Video MP4', 'mixtapewp'),
				'description' => esc_html__('Enter video URL for MP4 format', 'mixtapewp'),
				'parent'      => $qodef_video_self_hosted_container,

			)
		);

		mixtape_qodef_add_meta_box_field(
			array(
				'name'        => 'qodef_post_video_ogv_link_meta',
				'type'        => 'text',
				'label'       => esc_html__('Video OGV', 'mixtapewp'),
				'description' => esc_html__('Enter video URL for OGV format', 'mixtapewp'),
				'parent'      => $qodef_video_self_hosted_container,

			)
		);
	}

    add_action('mixtape_qodef_meta_boxes_map', 'mixtape_qodef_map_post_format_video_meta_fields');
}