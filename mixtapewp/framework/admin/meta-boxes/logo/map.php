<?php

if (!function_exists('mixtape_qodef_logo_meta_box_map')) {
    function mixtape_qodef_logo_meta_box_map() {

        $logo_meta_box = mixtape_qodef_add_meta_box(
            array(
                'scope' => array('page', 'post', 'event', 'album'),
                'title' => esc_html__('Logo', 'mixtapewp'),
                'name'  => 'logo_meta'
            )
        );


        mixtape_qodef_add_meta_box_field(
            array(
                'name'          => 'qodef_logo_image_meta',
                'type'          => 'image',
                'label'         => esc_html__('Logo Image - Default', 'mixtapewp'),
                'description'   => esc_html__('Choose a default logo image to display ', 'mixtapewp'),
                'parent'        => $logo_meta_box
            )
        );

        mixtape_qodef_add_meta_box_field(
            array(
                'name'          => 'qodef_logo_image_dark_meta',
                'type'          => 'image',
                'label'         => esc_html__('Logo Image - Dark', 'mixtapewp'),
                'description'   => esc_html__('Choose a default logo image to display ', 'mixtapewp'),
                'parent'        => $logo_meta_box
            )
        );

        mixtape_qodef_add_meta_box_field(
            array(
                'name'          => 'qodef_logo_image_light_meta',
                'type'          => 'image',
                'label'         => esc_html__('Logo Image - Light', 'mixtapewp'),
                'description'   => esc_html__('Choose a default logo image to display ', 'mixtapewp'),
                'parent'        => $logo_meta_box
            )
        );

        mixtape_qodef_add_meta_box_field(
            array(
                'name'          => 'qodef_logo_image_sticky_meta',
                'type'          => 'image',
                'label'         => esc_html__('Logo Image - Sticky', 'mixtapewp'),
                'description'   => esc_html__('Choose a default logo image to display ', 'mixtapewp'),
                'parent'        => $logo_meta_box
            )
        );

        mixtape_qodef_add_meta_box_field(
            array(
                'name'          => 'qodef_logo_image_mobile_meta',
                'type'          => 'image',
                'label'         => esc_html__('Logo Image - Mobile', 'mixtapewp'),
                'description'   => esc_html__('Choose a default logo image to display ', 'mixtapewp'),
                'parent'        => $logo_meta_box
            )
        );
    }

    add_action('mixtape_qodef_meta_boxes_map', 'mixtape_qodef_logo_meta_box_map');
}