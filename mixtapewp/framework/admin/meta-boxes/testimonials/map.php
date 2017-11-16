<?php

//Testimonials

if(!function_exists('mixtape_qodef_map_testimonials_meta_fields')) {

    function mixtape_qodef_map_testimonials_meta_fields() {

        $testimonial_meta_box = mixtape_qodef_add_meta_box(
            array(
                'scope' => array('testimonials'),
                'title' => esc_html__('Testimonial', 'mixtapewp'),
                'name' => 'testimonial_meta'
            )
        );

            mixtape_qodef_add_meta_box_field(
                array(
                    'name'        	=> 'qodef_testimonial_title',
                    'type'        	=> 'text',
                    'label'       	=> esc_html__('Title', 'mixtapewp'),
                    'description' 	=> esc_html__('Enter testimonial title', 'mixtapewp'),
                    'parent'      	=> $testimonial_meta_box,
                )
            );


            mixtape_qodef_add_meta_box_field(
                array(
                    'name'        	=> 'qodef_testimonial_author',
                    'type'        	=> 'text',
                    'label'       	=> esc_html__('Author', 'mixtapewp'),
                    'description' 	=> esc_html__('Enter author name', 'mixtapewp'),
                    'parent'      	=> $testimonial_meta_box,
                )
            );

            mixtape_qodef_add_meta_box_field(
                array(
                    'name'        	=> 'qodef_testimonial_author_position',
                    'type'        	=> 'text',
                    'label'       	=> esc_html__('Job Position', 'mixtapewp'),
                    'description' 	=> esc_html__('Enter job position', 'mixtapewp'),
                    'parent'      	=> $testimonial_meta_box,
                )
            );

            mixtape_qodef_add_meta_box_field(
                array(
                    'name'        	=> 'qodef_testimonial_text',
                    'type'        	=> 'text',
                    'label'       	=> esc_html__('Text', 'mixtapewp'),
                    'description' 	=> esc_html__('Enter testimonial text', 'mixtapewp'),
                    'parent'      	=> $testimonial_meta_box,
                )
            );
        }

    add_action('mixtape_qodef_meta_boxes_map', 'mixtape_qodef_map_testimonials_meta_fields');
}