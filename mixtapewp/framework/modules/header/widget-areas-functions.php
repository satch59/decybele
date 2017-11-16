<?php

if(!function_exists('mixtape_qodef_register_top_header_areas')) {
    /**
     * Registers widget areas for top header bar when it is enabled
     */
    function mixtape_qodef_register_top_header_areas() {
        $top_bar_layout  = mixtape_qodef_options()->getOptionValue('top_bar_layout');
            register_sidebar(array(
                'name'          => esc_html__('Top Bar Left', 'mixtapewp'),
                'id'            => 'qodef-top-bar-left',
                'before_widget' => '<div id="%1$s" class="widget %2$s qodef-top-bar-widget">',
                'after_widget'  => '</div>'
            ));

            //register this widget area only if top bar layout is three columns
            if($top_bar_layout === 'three-columns') {
                register_sidebar(array(
                    'name'          => esc_html__('Top Bar Center', 'mixtapewp'),
                    'id'            => 'qodef-top-bar-center',
                    'before_widget' => '<div id="%1$s" class="widget %2$s qodef-top-bar-widget">',
                    'after_widget'  => '</div>'
                ));
            }

            register_sidebar(array(
                'name'          => esc_html__('Top Bar Right', 'mixtapewp'),
                'id'            => 'qodef-top-bar-right',
                'before_widget' => '<div id="%1$s" class="widget %2$s qodef-top-bar-widget">',
                'after_widget'  => '</div>'
            ));
    }

    add_action('widgets_init', 'mixtape_qodef_register_top_header_areas');
}

if(!function_exists('mixtape_qodef_header_widget_areas')) {
    /**
     * Registers widget areas for standard header type
     */
    function mixtape_qodef_header_widget_areas() {
            register_sidebar(array(
                'name'          => esc_html__('Header Widget Area', 'mixtapewp'),
                'id'            => 'qodef-header-widget-area',
                'before_widget' => '',
                'after_widget'  => '',
                'description'   => esc_html__('Widgets added here will appear in header', 'mixtapewp')
            ));

		register_sidebar(array(
			'name'          => esc_html__('Vertical Header Widget Area', 'mixtapewp'),
			'id'            => 'qodef-vertical-header-widget-area',
			'before_widget' => '<div id="%1$s" class="widget %2$s qodef-vertical-header-widget">',
			'after_widget'  => '</div>',
			'description'   => esc_html__('Widgets added here will appear in bottom of vertical header', 'mixtapewp')
		));
    }

    add_action('widgets_init', 'mixtape_qodef_header_widget_areas');
}


if(!function_exists('mixtape_qodef_register_mobile_header_areas')) {
    /**
     * Registers widget areas for mobile header
     */
    function mixtape_qodef_register_mobile_header_areas() {
        if(mixtape_qodef_is_responsive_on()) {
            register_sidebar(array(
                'name'          => esc_html__('Right From Mobile Logo', 'mixtapewp'),
                'id'            => 'qodef-right-from-mobile-logo',
                'before_widget' => '<div id="%1$s" class="widget %2$s qodef-right-from-mobile-logo">',
                'after_widget'  => '</div>',
                'description'   => esc_html__('Widgets added here will appear on the right hand side from the mobile logo', 'mixtapewp')
            ));
        }
    }

    add_action('widgets_init', 'mixtape_qodef_register_mobile_header_areas');
}

if(!function_exists('mixtape_qodef_register_sticky_header_areas')) {
	/**
	 * Registers widget area for sticky header
	 */
	function mixtape_qodef_register_sticky_header_areas() {
		$id = mixtape_qodef_get_page_id();
		if(in_array(mixtape_qodef_get_meta_field_intersect('header_behaviour',$id), array('sticky-header-on-scroll-up','sticky-header-on-scroll-down-up'))) {
			register_sidebar(array(
				'name'          => esc_html__('Sticky Header Widget Area', 'mixtapewp'),
				'id'            => 'qodef-sticky-header-widget-area',
				'before_widget' => '<div id="%1$s" class="widget %2$s qodef-sticky-right">',
				'after_widget'  => '</div>',
				'description'   => esc_html__('Widgets added here will appear on the right hand side from the sticky menu', 'mixtapewp')
			));
		}
	}

	add_action('widgets_init', 'mixtape_qodef_register_sticky_header_areas');
}