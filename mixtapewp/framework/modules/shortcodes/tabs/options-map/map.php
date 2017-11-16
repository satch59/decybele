<?php

if(!function_exists('mixtape_qodef_tabs_map')) {
    function mixtape_qodef_tabs_map() {
		
        $panel = mixtape_qodef_add_admin_panel(array(
            'title' => esc_html__('Tabs', 'mixtapewp'),
            'name'  => 'panel_tabs',
            'page'  => '_elements_page'
        ));

        //Typography options
        mixtape_qodef_add_admin_section_title(array(
            'name' => 'typography_section_title',
            'title' => esc_html__('Tabs Navigation Typography', 'mixtapewp'),
            'parent' => $panel
        ));

        $typography_group = mixtape_qodef_add_admin_group(array(
            'name' => 'typography_group',
            'title' => esc_html__('Tabs Navigation Typography', 'mixtapewp'),
			'description' => esc_html__('Setup typography for tabs navigation', 'mixtapewp'),
            'parent' => $panel
        ));

        $typography_row = mixtape_qodef_add_admin_row(array(
            'name' => 'typography_row',
            'next' => true,
            'parent' => $typography_group
        ));

        mixtape_qodef_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'fontsimple',
            'name'          => 'tabs_font_family',
            'default_value' => '',
            'label'         => esc_html__('Font Family', 'mixtapewp'),
        ));

        mixtape_qodef_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'selectsimple',
            'name'          => 'tabs_text_transform',
            'default_value' => '',
            'label'         => esc_html__('Text Transform', 'mixtapewp'),
            'options'       => mixtape_qodef_get_text_transform_array()
        ));

        mixtape_qodef_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'selectsimple',
            'name'          => 'tabs_font_style',
            'default_value' => '',
            'label'         => esc_html__('Font Style', 'mixtapewp'),
            'options'       => mixtape_qodef_get_font_style_array()
        ));

        mixtape_qodef_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'textsimple',
            'name'          => 'tabs_letter_spacing',
            'default_value' => '',
            'label'         => esc_html__('Letter Spacing', 'mixtapewp'),
            'args'          => array(
                'suffix' => 'px'
            )
        ));

        $typography_row2 = mixtape_qodef_add_admin_row(array(
            'name' => 'typography_row2',
            'next' => true,
            'parent' => $typography_group
        ));		
		
        mixtape_qodef_add_admin_field(array(
            'parent'        => $typography_row2,
            'type'          => 'selectsimple',
            'name'          => 'tabs_font_weight',
            'default_value' => '',
            'label'         => esc_html__('Font Weight', 'mixtapewp'),
            'options'       => mixtape_qodef_get_font_weight_array()
        ));
		
		//Initial Tab Color Styles
		
		mixtape_qodef_add_admin_section_title(array(
            'name' => 'tab_color_section_title',
            'title' => esc_html__('Tab Navigation Color Styles', 'mixtapewp'),
            'parent' => $panel
        ));
		$tabs_color_group = mixtape_qodef_add_admin_group(array(
            'name' => 'tabs_color_group',
            'title' => esc_html__('Tab Navigation Color Styles', 'mixtapewp'),
			'description' => esc_html__('Set color styles for tab navigation', 'mixtapewp'),
            'parent' => $panel
        ));
		$tabs_color_row = mixtape_qodef_add_admin_row(array(
            'name' => 'tabs_color_row',
            'next' => true,
            'parent' => $tabs_color_group
        ));

        mixtape_qodef_add_admin_field(array(
            'parent'        => $tabs_color_row,
            'type'          => 'colorsimple',
            'name'          => 'tabs_color',
            'default_value' => '',
            'label'         => esc_html__('Color', 'mixtapewp')
        ));
		mixtape_qodef_add_admin_field(array(
            'parent'        => $tabs_color_row,
            'type'          => 'colorsimple',
            'name'          => 'tabs_back_color',
            'default_value' => '',
            'label'         => esc_html__('Background Color', 'mixtapewp')
        ));
		mixtape_qodef_add_admin_field(array(
            'parent'        => $tabs_color_row,
            'type'          => 'colorsimple',
            'name'          => 'tabs_border_color',
            'default_value' => '',
            'label'         => esc_html__('Border Color', 'mixtapewp')
        ));
		
		//Active Tab Color Styles
		
		$active_tabs_color_group = mixtape_qodef_add_admin_group(array(
            'name' => 'active_tabs_color_group',
            'title' => esc_html__('Active and Hover Navigation Color Styles', 'mixtapewp'),
			'description' => esc_html__('Set color styles for active and hover tabs', 'mixtapewp'),
            'parent' => $panel
        ));
		$active_tabs_color_row = mixtape_qodef_add_admin_row(array(
            'name' => 'active_tabs_color_row',
            'next' => true,
            'parent' => $active_tabs_color_group
        ));

        mixtape_qodef_add_admin_field(array(
            'parent'        => $active_tabs_color_row,
            'type'          => 'colorsimple',
            'name'          => 'tabs_color_active',
            'default_value' => '',
            'label'         => esc_html__('Color', 'mixtapewp')
        ));
		mixtape_qodef_add_admin_field(array(
            'parent'        => $active_tabs_color_row,
            'type'          => 'colorsimple',
            'name'          => 'tabs_back_color_active',
            'default_value' => '',
            'label'         => esc_html__('Background Color', 'mixtapewp')
        ));
		mixtape_qodef_add_admin_field(array(
            'parent'        => $active_tabs_color_row,
            'type'          => 'colorsimple',
            'name'          => 'tabs_border_color_active',
            'default_value' => '',
            'label'         => esc_html__('Border Color', 'mixtapewp')
        ));
        
    }

    add_action('mixtape_qodef_options_elements_map', 'mixtape_qodef_tabs_map');
}