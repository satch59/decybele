<?php

/*** Link Post Format ***/
if(!function_exists('mixtape_qodef_map_post_format_link_meta_fields')) {

    function mixtape_qodef_map_post_format_link_meta_fields() {

		$link_post_format_meta_box = mixtape_qodef_add_meta_box(
			array(
				'scope' => array('post'),
				'title' => esc_html__('Link Post Format', 'mixtapewp'),
				'name' => 'post_format_link_meta'
			)
		);

		mixtape_qodef_add_meta_box_field(
			array(
				'name'        => 'qodef_post_link_link_meta',
				'type'        => 'text',
				'label'       => esc_html__('Link', 'mixtapewp'),
				'description' => esc_html__('Enter link', 'mixtapewp'),
				'parent'      => $link_post_format_meta_box,

			)
		);

	    mixtape_qodef_add_meta_box_field(
		    array(
			    'name'        => 'qodef_post_link_image_meta',
			    'type'        => 'image',
			    'label'       => esc_html__('Link Background Image', 'mixtapewp'),
			    'description' => esc_html__('Upload an image. If left empty default image will be used.', 'mixtapewp'),
			    'parent'      => $link_post_format_meta_box,
		    )
	    );
	}

    add_action('mixtape_qodef_meta_boxes_map', 'mixtape_qodef_map_post_format_link_meta_fields');
}

