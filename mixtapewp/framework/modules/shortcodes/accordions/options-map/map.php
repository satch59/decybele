<?php 
if(!function_exists('mixtape_qodef_accordions_map')) {
    /**
     * Add Accordion options to elements panel
     */
   function mixtape_qodef_accordions_map() {
		
       $panel = mixtape_qodef_add_admin_panel(array(
           'title' => esc_html__('Accordions','mixtapewp'),
           'name'  => 'panel_accordions',
           'page'  => '_elements_page'
       ));

       //Typography options
       mixtape_qodef_add_admin_section_title(array(
           'name' => 'typography_section_title',
           'title' => esc_html__('Typography','mixtapewp'),
           'parent' => $panel
       ));

       $typography_group = mixtape_qodef_add_admin_group(array(
           'name' => 'typography_group',
           'title' => esc_html__('Typography','mixtapewp'),
			     'description' => esc_html__('Setup typography for accordions navigation','mixtapewp'),
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
           'name'          => 'accordions_font_family',
           'default_value' => '',
           'label'         => esc_html__('Font Family','mixtapewp'),
       ));

       mixtape_qodef_add_admin_field(array(
           'parent'        => $typography_row,
           'type'          => 'selectsimple',
           'name'          => 'accordions_text_transform',
           'default_value' => '',
           'label'         => esc_html__('Text Transform','mixtapewp'),
           'options'       => mixtape_qodef_get_text_transform_array()
       ));

       mixtape_qodef_add_admin_field(array(
           'parent'        => $typography_row,
           'type'          => 'selectsimple',
           'name'          => 'accordions_font_style',
           'default_value' => '',
           'label'         => esc_html__('Font Style','mixtapewp'),
           'options'       => mixtape_qodef_get_font_style_array()
       ));

       mixtape_qodef_add_admin_field(array(
           'parent'        => $typography_row,
           'type'          => 'textsimple',
           'name'          => 'accordions_letter_spacing',
           'default_value' => '',
           'label'         => esc_html__('Letter Spacing','mixtapewp'),
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
           'name'          => 'accordions_font_weight',
           'default_value' => '',
           'label'         => esc_html__('Font Weight','mixtapewp'),
           'options'       => mixtape_qodef_get_font_weight_array()
       ));
		
		//Initial Accordion Color Styles
		
		mixtape_qodef_add_admin_section_title(array(
           'name' => 'accordion_color_section_title',
           'title' => esc_html__('Basic Accordions Color Styles','mixtapewp'),
           'parent' => $panel
       ));
		
		$accordions_color_group = mixtape_qodef_add_admin_group(array(
           'name' => 'accordions_color_group',
           'title' => esc_html__('Accordion Color Styles','mixtapewp'),
			'description' => esc_html__('Set color styles for accordion title','mixtapewp'),
           'parent' => $panel
       ));
		$accordions_color_row = mixtape_qodef_add_admin_row(array(
           'name' => 'accordions_color_row',
           'next' => true,
           'parent' => $accordions_color_group
       ));
		mixtape_qodef_add_admin_field(array(
           'parent'        => $accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_title_color',
           'default_value' => '',
           'label'         => esc_html__('Title Color','mixtapewp')
       ));
		mixtape_qodef_add_admin_field(array(
           'parent'        => $accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_icon_color',
           'default_value' => '',
           'label'         => esc_html__('Icon Color','mixtapewp')
       ));
		mixtape_qodef_add_admin_field(array(
           'parent'        => $accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_icon_back_color',
           'default_value' => '',
           'label'         => esc_html__('Icon Background Color','mixtapewp')
       ));
		
		$active_accordions_color_group = mixtape_qodef_add_admin_group(array(
           'name' => 'active_accordions_color_group',
           'title' => esc_html__('Active and Hover Accordion Color Styles','mixtapewp'),
			     'description' => esc_html__('Set color styles for active and hover accordions','mixtapewp'),
           'parent' => $panel
       ));
		$active_accordions_color_row = mixtape_qodef_add_admin_row(array(
           'name' => 'active_accordions_color_row',
           'next' => true,
           'parent' => $active_accordions_color_group
       ));
		mixtape_qodef_add_admin_field(array(
           'parent'        => $active_accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_title_color_active',
           'default_value' => '',
           'label'         => esc_html__('Title Color','mixtapewp')
       ));
		mixtape_qodef_add_admin_field(array(
           'parent'        => $active_accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_icon_color_active',
           'default_value' => '',
           'label'         => esc_html__('Icon Color','mixtapewp')
       ));
		mixtape_qodef_add_admin_field(array(
           'parent'        => $active_accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_icon_back_color_active',
           'default_value' => '',
           'label'         => esc_html__('Icon Background Color','mixtapewp')
       ));
       
   }
   add_action('mixtape_qodef_options_elements_map', 'mixtape_qodef_accordions_map');
}