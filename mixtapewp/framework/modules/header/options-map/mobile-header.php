<?php

if ( ! function_exists('mixtape_qodef_mobile_header_options_map') ) {

	function mixtape_qodef_mobile_header_options_map() {

		mixtape_qodef_add_admin_page(array(
			'slug'  => '_mobile_header',
			'title' => esc_html__('Mobile Header', 'mixtapewp'),
			'icon'  => 'fa fa-mobile'
		));

		$panel_mobile_header = mixtape_qodef_add_admin_panel(array(
			'title' => esc_html__('Mobile header', 'mixtapewp'),
			'name'  => 'panel_mobile_header',
			'page'  => '_mobile_header'
		));

		mixtape_qodef_add_admin_field(array(
			'name'        => 'mobile_header_height',
			'type'        => 'text',
			'label'       => esc_html__('Mobile Header Height', 'mixtapewp'),
			'description' => esc_html__('Enter height for mobile header in pixels', 'mixtapewp'),
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		mixtape_qodef_add_admin_field(array(
			'name'        => 'mobile_header_background_color',
			'type'        => 'color',
			'label'       => esc_html__('Mobile Header Background Color', 'mixtapewp'),
			'description' => esc_html__('Choose color for mobile header', 'mixtapewp'),
			'parent'      => $panel_mobile_header
		));

		mixtape_qodef_add_admin_field(array(
			'name'        => 'mobile_menu_background_color',
			'type'        => 'color',
			'label'       => esc_html__('Mobile Menu Background Color', 'mixtapewp'),
			'description' => esc_html__('Choose color for mobile menu', 'mixtapewp'),
			'parent'      => $panel_mobile_header
		));

		mixtape_qodef_add_admin_field(array(
			'name'        => 'mobile_menu_separator_color',
			'type'        => 'color',
			'label'       => esc_html__('Mobile Menu Item Separator Color', 'mixtapewp'),
			'description' => esc_html__('Choose color for mobile menu horizontal separators', 'mixtapewp'),
			'parent'      => $panel_mobile_header
		));

		mixtape_qodef_add_admin_field(array(
			'name'        => 'mobile_logo_height',
			'type'        => 'text',
			'label'       => esc_html__('Logo Height For Mobile Header', 'mixtapewp'),
			'description' => esc_html__('Define logo height for screen size smaller than 1000px', 'mixtapewp'),
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		mixtape_qodef_add_admin_field(array(
			'name'        => 'mobile_logo_height_phones',
			'type'        => 'text',
			'label'       => esc_html__('Logo Height For Mobile Devices', 'mixtapewp'),
			'description' => esc_html__('Define logo height for screen size smaller than 480px', 'mixtapewp'),
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		mixtape_qodef_add_admin_section_title(array(
			'parent' => $panel_mobile_header,
			'name'   => 'mobile_header_fonts_title',
			'title'  => esc_html__('Typography', 'mixtapewp')
		));

		mixtape_qodef_add_admin_field(array(
			'name'        => 'mobile_text_color',
			'type'        => 'color',
			'label'       => esc_html__('Navigation Text Color', 'mixtapewp'),
			'description' => esc_html__('Define color for mobile navigation text', 'mixtapewp'),
			'parent'      => $panel_mobile_header
		));

		mixtape_qodef_add_admin_field(array(
			'name'        => 'mobile_text_hover_color',
			'type'        => 'color',
			'label'       => esc_html__('Navigation Hover/Active Color', 'mixtapewp'),
			'description' => esc_html__('Define hover/active color for mobile navigation text', 'mixtapewp'),
			'parent'      => $panel_mobile_header
		));

		mixtape_qodef_add_admin_field(array(
			'name'        => 'mobile_font_family',
			'type'        => 'font',
			'label'       => esc_html__('Navigation Font Family', 'mixtapewp'),
			'description' => esc_html__('Define font family for mobile navigation text', 'mixtapewp'),
			'parent'      => $panel_mobile_header
		));

		mixtape_qodef_add_admin_field(array(
			'name'        => 'mobile_font_size',
			'type'        => 'text',
			'label'       => esc_html__('Navigation Font Size', 'mixtapewp'),
			'description' => esc_html__('Define font size for mobile navigation text', 'mixtapewp'),
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		mixtape_qodef_add_admin_field(array(
			'name'        => 'mobile_line_height',
			'type'        => 'text',
			'label'       => esc_html__('Navigation Line Height', 'mixtapewp'),
			'description' => esc_html__('Define line height for mobile navigation text', 'mixtapewp'),
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		mixtape_qodef_add_admin_field(array(
			'name'        => 'mobile_text_transform',
			'type'        => 'select',
			'label'       => esc_html__('Navigation Text Transform', 'mixtapewp'),
			'description' => esc_html__('Define text transform for mobile navigation text', 'mixtapewp'),
			'parent'      => $panel_mobile_header,
			'options'     => mixtape_qodef_get_text_transform_array(true)
		));

		mixtape_qodef_add_admin_field(array(
			'name'        => 'mobile_font_style',
			'type'        => 'select',
			'label'       => esc_html__('Navigation Font Style', 'mixtapewp'),
			'description' => esc_html__('Define font style for mobile navigation text', 'mixtapewp'),
			'parent'      => $panel_mobile_header,
			'options'     => mixtape_qodef_get_font_style_array(true)
		));

		mixtape_qodef_add_admin_field(array(
			'name'        => 'mobile_font_weight',
			'type'        => 'select',
			'label'       => esc_html__('Navigation Font Weight', 'mixtapewp'),
			'description' => esc_html__('Define font weight for mobile navigation text', 'mixtapewp'),
			'parent'      => $panel_mobile_header,
			'options'     => mixtape_qodef_get_font_weight_array(true)
		));

		mixtape_qodef_add_admin_section_title(array(
			'name' => 'mobile_opener_panel',
			'parent' => $panel_mobile_header,
			'title' => esc_html__('Mobile Menu Opener', 'mixtapewp')
		));

		mixtape_qodef_add_admin_field(array(
			'name'        => 'mobile_icon_pack',
			'type'        => 'select',
			'label'       => esc_html__('Mobile Navigation Icon Pack', 'mixtapewp'),
			'default_value' => 'font_awesome',
			'description' => esc_html__('Choose icon pack for mobile navigation icon', 'mixtapewp'),
			'parent'      => $panel_mobile_header,
			'options'     => mixtape_qodef_icon_collections()->getIconCollectionsExclude(array('linea_icons', 'simple_line_icons'))
		));

		mixtape_qodef_add_admin_field(array(
			'name'        => 'mobile_icon_color',
			'type'        => 'color',
			'label'       => esc_html__('Mobile Navigation Icon Color', 'mixtapewp'),
			'description' => esc_html__('Choose color for icon header', 'mixtapewp'),
			'parent'      => $panel_mobile_header
		));

		mixtape_qodef_add_admin_field(array(
			'name'        => 'mobile_icon_hover_color',
			'type'        => 'color',
			'label'       => esc_html__('Mobile Navigation Icon Hover Color', 'mixtapewp'),
			'description' => esc_html__('Choose hover color for mobile navigation icon ', 'mixtapewp'),
			'parent'      => $panel_mobile_header
		));

		mixtape_qodef_add_admin_field(array(
			'name'        => 'mobile_icon_size',
			'type'        => 'text',
			'label'       => esc_html__('Mobile Navigation Icon size', 'mixtapewp'),
			'description' => esc_html__('Choose size for mobile navigation icon ', 'mixtapewp'),
			'parent'      => $panel_mobile_header,
			'args' => array(
				'col_width' => 3,
				'suffix' => 'px'
			)
		));

	}

	add_action( 'mixtape_qodef_options_map', 'mixtape_qodef_mobile_header_options_map', 4);

}