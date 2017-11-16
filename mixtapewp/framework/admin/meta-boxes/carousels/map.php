<?php

//Carousels

if(!function_exists('mixtape_qodef_map_carousels_meta_fields')) {

    function mixtape_qodef_map_carousels_meta_fields() {

        $carousel_meta_box = mixtape_qodef_add_meta_box(
            array(
                'scope' => array('carousels'),
                'title' => esc_html__('Carousel', 'mixtapewp'),
                'name' => 'carousel_meta'
            )
        );

            mixtape_qodef_add_meta_box_field(
                array(
                    'name'        => 'qodef_carousel_image',
                    'type'        => 'image',
                    'label'       => esc_html__('Carousel Image', 'mixtapewp'),
                    'description' => esc_html__('Choose carousel image (min width needs to be 215px)', 'mixtapewp'),
                    'parent'      => $carousel_meta_box
                )
            );

            mixtape_qodef_add_meta_box_field(
                array(
                    'name'        => 'qodef_carousel_hover_image',
                    'type'        => 'image',
                    'label'       => esc_html__('Carousel Hover Image', 'mixtapewp'),
                    'description' => esc_html__('Choose carousel hover image (min width needs to be 215px)', 'mixtapewp'),
                    'parent'      => $carousel_meta_box
                )
            );

            mixtape_qodef_add_meta_box_field(
                array(
                    'name'        => 'qodef_carousel_item_link',
                    'type'        => 'text',
                    'label'       => esc_html__('Link', 'mixtapewp'),
                    'description' => esc_html__('Enter the URL to which you want the image to link to (e.g. http://www.example.com)', 'mixtapewp'),
                    'parent'      => $carousel_meta_box
                )
            );

            mixtape_qodef_add_meta_box_field(
                array(
                    'name'        => 'qodef_carousel_item_target',
                    'type'        => 'selectblank',
                    'label'       => esc_html__('Target', 'mixtapewp'),
                    'description' => esc_html__('Specify where to open the linked document', 'mixtapewp'),
                    'parent'      => $carousel_meta_box,
                    'options' => array(
                    	'_self' => esc_html__('Self', 'mixtapewp'),
                    	'_blank' => esc_html__('Blank', 'mixtapewp')
                	)
                )
            );
        }

    add_action('mixtape_qodef_meta_boxes_map', 'mixtape_qodef_map_carousels_meta_fields');
}
