<?php

if(!function_exists('mixtape_qodef_register_sidebars')) {
    /**
     * Function that registers theme's sidebars
     */
    function mixtape_qodef_register_sidebars() {

        register_sidebar(array(
            'name'			=> esc_html__('Sidebar','mixtapewp'),
            'id'			=> 'sidebar',
            'description'	=> esc_html__('Default Sidebar','mixtapewp'),
            'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
            'after_widget'	=> '</div>',
            'before_title'	=> '<h4 class="qodef-widget-title">',
            'after_title'	=> '</h4>'
        ));

    }

    add_action('widgets_init', 'mixtape_qodef_register_sidebars');
}

if(!function_exists('mixtape_qodef_add_support_custom_sidebar')) {
    /**
     * Function that adds theme support for custom sidebars. It also creates MixtapeQodeSidebar object
     */
    function mixtape_qodef_add_support_custom_sidebar() {
        add_theme_support('MixtapeQodeSidebar');
        if (get_theme_support('MixtapeQodeSidebar')) new MixtapeQodeSidebar();
    }

    add_action('after_setup_theme', 'mixtape_qodef_add_support_custom_sidebar');
}
