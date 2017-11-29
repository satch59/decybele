<?php

/*** Quote Post Format ***/

if(!function_exists('mixtape_qodef_map_post_format_quote_meta_fields')) {

    function mixtape_qodef_map_post_format_quote_meta_fields() {

		$quote_post_format_meta_box = mixtape_qodef_add_meta_box(
			array(
				'scope' =>	array('post'),
				'title' => esc_html__('Quote Post Format', 'mixtapewp'),
				'name' 	=> 'post_format_quote_meta'
			)
		);

		mixtape_qodef_add_meta_box_field(
			array(
				'name'        => 'qodef_post_quote_text_meta',
				'type'        => 'text',
				'label'       => esc_html__('Quote Text', 'mixtapewp'),
				'description' => esc_html__('Enter Quote text', 'mixtapewp'),
				'parent'      => $quote_post_format_meta_box,

			)
		);

	    mixtape_qodef_add_meta_box_field(
		    array(
			    'name'        => 'qodef_post_quote_image_meta',
			    'type'        => 'image',
			    'label'       => esc_html__('Quote Background Image', 'mixtapewp'),
			    'description' => esc_html__('Upload an image. If left empty default image will be used.', 'mixtapewp'),
			    'parent'      => $quote_post_format_meta_box,
		    )
	    );
	}

    add_action('mixtape_qodef_meta_boxes_map', 'mixtape_qodef_map_post_format_quote_meta_fields');
}
