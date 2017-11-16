<?php

if ( ! function_exists('mixtape_qodef_page_options_map') ) {

    function mixtape_qodef_page_options_map() {

        mixtape_qodef_add_admin_page(
            array(
                'slug'  => '_page_page',
                'title' => esc_html__('Page', 'mixtapewp'),
                'icon'  => 'fa fa-file-o'
            )
        );

        $custom_sidebars = mixtape_qodef_get_custom_sidebars();

        $panel_sidebar = mixtape_qodef_add_admin_panel(
            array(
                'page'  => '_page_page',
                'name'  => 'panel_sidebar',
                'title' => esc_html__('Design Style', 'mixtapewp')
            )
        );

        mixtape_qodef_add_admin_field(array(
            'name'        => 'page_sidebar_layout',
            'type'        => 'select',
            'label'       => esc_html__('Sidebar Layout', 'mixtapewp'),
            'description' => esc_html__('Choose a sidebar layout for pages', 'mixtapewp'),
            'default_value' => 'default',
            'parent'      => $panel_sidebar,
            'options'     => array(
                'default'			=> esc_html__('No Sidebar', 'mixtapewp'),
                'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'mixtapewp'),
                'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'mixtapewp'),
                'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'mixtapewp'),
                'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'mixtapewp')
            )
        ));


        if(count($custom_sidebars) > 0) {
            mixtape_qodef_add_admin_field(array(
                'name' => 'page_custom_sidebar',
                'type' => 'selectblank',
                'label' => esc_html__('Sidebar to Display', 'mixtapewp'),
                'description' => esc_html__('Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'mixtapewp'),
                'parent' => $panel_sidebar,
                'options' => $custom_sidebars
            ));
        }
    }

    add_action( 'mixtape_qodef_options_map', 'mixtape_qodef_page_options_map', 9);

}