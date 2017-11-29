<?php

if(!function_exists('mixtape_qodef_map_sidebar_meta_fields')) {

    function mixtape_qodef_map_sidebar_meta_fields() {

        $custom_sidebars = mixtape_qodef_get_custom_sidebars();

        $sidebar_meta_box = mixtape_qodef_add_meta_box(
            array(
                'scope' => array('page', 'post', 'event', 'album'),
                'title' => esc_html__('Sidebar', 'mixtapewp'),
                'name' => 'sidebar_meta'
            )
        );

            mixtape_qodef_add_meta_box_field(
                array(
                    'name'        => 'qodef_sidebar_meta',
                    'type'        => 'select',
                    'label'       => esc_html__('Layout', 'mixtapewp'),
                    'description' => esc_html__('Choose the sidebar layout', 'mixtapewp'),
                    'parent'      => $sidebar_meta_box,
                    'options'     => array(
        						''			        => esc_html__('Default', 'mixtapewp'),
        						'no-sidebar'		=> esc_html__('No Sidebar', 'mixtapewp'),
        						'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'mixtapewp'),
        						'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'mixtapewp'),
        						'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'mixtapewp'),
        						'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'mixtapewp'),
        					)
                )
            );

        if(count($custom_sidebars) > 0) {
            mixtape_qodef_add_meta_box_field(array(
                'name' => 'qodef_custom_sidebar_meta',
                'type' => 'selectblank',
                'label' => esc_html__('Choose Widget Area in Sidebar', 'mixtapewp'),
                'description' => esc_html__('Choose Custom Widget area to display in Sidebar"', 'mixtapewp'),
                'parent' => $sidebar_meta_box,
                'options' => $custom_sidebars
            ));
        }
    }

    add_action('mixtape_qodef_meta_boxes_map', 'mixtape_qodef_map_sidebar_meta_fields');
}
