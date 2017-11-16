<?php

/*** Gallery Post Format ***/
if(!function_exists('mixtape_qodef_map_post_format_gallery_meta_fields')) {

    function mixtape_qodef_map_post_format_gallery_meta_fields() {

		$gallery_post_format_meta_box = mixtape_qodef_add_meta_box(
			array(
				'scope' =>	array('post'),
				'title' => esc_html__('Gallery Post Format', 'mixtapewp'),
				'name' 	=> 'post_format_gallery_meta'
			)
		);

		mixtape_qodef_add_multiple_images_field(
			array(
				'name'        => 'qodef_post_gallery_images_meta',
				'label'       => esc_html__('Gallery Images', 'mixtapewp'),
				'description' => esc_html__('Choose your gallery images', 'mixtapewp'),
				'parent'      => $gallery_post_format_meta_box,
			)
		);
	}

    add_action('mixtape_qodef_meta_boxes_map', 'mixtape_qodef_map_post_format_gallery_meta_fields');
}
