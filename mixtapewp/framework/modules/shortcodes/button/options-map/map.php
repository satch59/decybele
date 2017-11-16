<?php

if(!function_exists('mixtape_qodef_button_map')) {
    function mixtape_qodef_button_map() {
        $panel = mixtape_qodef_add_admin_panel(array(
            'title' => esc_html__('Button', 'mixtapewp'),
            'name'  => 'panel_button',
            'page'  => '_elements_page'
        ));

        //Typography options
        mixtape_qodef_add_admin_section_title(array(
            'name' => 'typography_section_title',
            'title' => esc_html__('Typography', 'mixtapewp'),
            'parent' => $panel
        ));

        $typography_group = mixtape_qodef_add_admin_group(array(
            'name' => 'typography_group',
            'title' => esc_html__('Typography', 'mixtapewp'),
            'description' => esc_html__('Setup typography for all button types', 'mixtapewp'),
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
            'name'          => 'button_font_family',
            'default_value' => '',
            'label'         => esc_html__('Font Family', 'mixtapewp'),
        ));

        mixtape_qodef_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'selectsimple',
            'name'          => 'button_text_transform',
            'default_value' => '',
            'label'         => esc_html__('Text Transform', 'mixtapewp'),
            'options'       => mixtape_qodef_get_text_transform_array()
        ));

        mixtape_qodef_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'selectsimple',
            'name'          => 'button_font_style',
            'default_value' => '',
            'label'         => esc_html__('Font Style', 'mixtapewp'),
            'options'       => mixtape_qodef_get_font_style_array()
        ));

        mixtape_qodef_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'textsimple',
            'name'          => 'button_letter_spacing',
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
            'name'          => 'button_font_weight',
            'default_value' => '',
            'label'         => esc_html__('Font Weight', 'mixtapewp'),
            'options'       => mixtape_qodef_get_font_weight_array()
        ));

        //Outline type options
        mixtape_qodef_add_admin_section_title(array(
            'name' => 'type_section_title',
            'title' => esc_html__('Types', 'mixtapewp'),
            'parent' => $panel
        ));

        $outline_group = mixtape_qodef_add_admin_group(array(
            'name' => 'outline_group',
            'title' => esc_html__('Outline Type', 'mixtapewp'),
            'description' => esc_html__('Setup outline button type', 'mixtapewp'),
            'parent' => $panel
        ));

        $outline_row = mixtape_qodef_add_admin_row(array(
            'name' => 'outline_row',
            'next' => true,
            'parent' => $outline_group
        ));

        mixtape_qodef_add_admin_field(array(
            'parent'        => $outline_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_outline_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Color', 'mixtapewp'),
            'description'   => ''
        ));

        mixtape_qodef_add_admin_field(array(
            'parent'        => $outline_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_outline_hover_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Hover Color', 'mixtapewp'),
            'description'   => ''
        ));

        mixtape_qodef_add_admin_field(array(
            'parent'        => $outline_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_outline_hover_bg_color',
            'default_value' => '',
            'label'         => esc_html__('Hover Background Color', 'mixtapewp'),
            'description'   => ''
        ));

        mixtape_qodef_add_admin_field(array(
            'parent'        => $outline_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_outline_border_color',
            'default_value' => '',
            'label'         => esc_html__('Border Color', 'mixtapewp'),
            'description'   => ''
        ));

        $outline_row2 = mixtape_qodef_add_admin_row(array(
            'name' => 'outline_row2',
            'next' => true,
            'parent' => $outline_group
        ));

        mixtape_qodef_add_admin_field(array(
            'parent'        => $outline_row2,
            'type'          => 'colorsimple',
            'name'          => 'btn_outline_hover_border_color',
            'default_value' => '',
            'label'         => esc_html__('Hover Border Color', 'mixtapewp'),
            'description'   => ''
        ));

        //Solid type options
        $solid_group = mixtape_qodef_add_admin_group(array(
            'name' => 'solid_group',
            'title' => esc_html__('Solid Type', 'mixtapewp'),
            'description' => esc_html__('Setup solid button type', 'mixtapewp'),
            'parent' => $panel
        ));

        $solid_row = mixtape_qodef_add_admin_row(array(
            'name' => 'solid_row',
            'next' => true,
            'parent' => $solid_group
        ));

        mixtape_qodef_add_admin_field(array(
            'parent'        => $solid_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Color', 'mixtapewp'),
            'description'   => ''
        ));

        mixtape_qodef_add_admin_field(array(
            'parent'        => $solid_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_hover_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Hover Color', 'mixtapewp'),
            'description'   => ''
        ));

        mixtape_qodef_add_admin_field(array(
            'parent'        => $solid_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_bg_color',
            'default_value' => '',
            'label'         => esc_html__('Background Color', 'mixtapewp'),
            'description'   => ''
        ));

        mixtape_qodef_add_admin_field(array(
            'parent'        => $solid_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_hover_bg_color',
            'default_value' => '',
            'label'         => esc_html__('Hover Background Color', 'mixtapewp'),
            'description'   => ''
        ));

        $solid_row2 = mixtape_qodef_add_admin_row(array(
            'name' => 'solid_row2',
            'next' => true,
            'parent' => $solid_group
        ));

        mixtape_qodef_add_admin_field(array(
            'parent'        => $solid_row2,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_border_color',
            'default_value' => '',
            'label'         => esc_html__('Border Color', 'mixtapewp'),
            'description'   => ''
        ));

        mixtape_qodef_add_admin_field(array(
            'parent'        => $solid_row2,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_hover_border_color',
            'default_value' => '',
            'label'         => esc_html__('Hover Border Color', 'mixtapewp'),
            'description'   => ''
        ));
    }

    add_action('mixtape_qodef_options_elements_map', 'mixtape_qodef_button_map');
}