<?php

if ( ! function_exists('mixtape_qodef_search_options_map') ) {

	function mixtape_qodef_search_options_map() {

		mixtape_qodef_add_admin_page(
			array(
				'slug' => '_search_page',
				'title' => esc_html__('Search', 'mixtapewp'),
				'icon' => 'fa fa-search'
			)
		);

		$search_panel = mixtape_qodef_add_admin_panel(
			array(
				'title' => esc_html__('Search', 'mixtapewp'),
				'name' => 'search',
				'page' => '_search_page'
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'select',
				'name'			=> 'search_type',
				'default_value'	=> 'fullscreen-search',
				'label' 		=> esc_html__('Select Search Type', 'mixtapewp'),
				'description' 	=> esc_html__("Choose a type of Select search bar (Note: Slide From Header Bottom search type doesn't work with transparent header)", 'mixtapewp'),
				'options' 		=> array(
					'fullscreen-search' => esc_html__('Fullscreen Search', 'mixtapewp'),
				),
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'select',
				'name'			=> 'search_icon_pack',
				'default_value'	=> 'font_awesome',
				'label'			=> esc_html__('Search Icon Pack', 'mixtapewp'),
				'description'	=> esc_html__('Choose icon pack for search icon', 'mixtapewp'),
				'options'		=> mixtape_qodef_icon_collections()->getIconCollectionsExclude(array('linea_icons', 'simple_line_icons', 'dripicons', 'ion_icons'))
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'yesno',
				'name'			=> 'search_in_grid',
				'default_value'	=> 'yes',
				'label'			=> esc_html__('Search area in grid', 'mixtapewp'),
				'description'	=> esc_html__('Set search area to be in grid', 'mixtapewp'),
			)
		);

		mixtape_qodef_add_admin_section_title(
			array(
				'parent' 	=> $search_panel,
				'name'		=> 'initial_header_icon_title',
				'title'		=> esc_html__('Initial Search Icon in Header', 'mixtapewp')
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'text',
				'name'			=> 'header_search_icon_size',
				'default_value'	=> '',
				'label'			=> esc_html__('Icon Size', 'mixtapewp'),
				'description'	=> esc_html__('Set size for icon', 'mixtapewp'),
				'args'			=> array(
					'col_width' => 3,
					'suffix'	=> 'px'
				)
			)
		);

		$search_icon_color_group = mixtape_qodef_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Icon Colors', 'mixtapewp'),
				'description'	=> esc_html__('Define color style for icon', 'mixtapewp'),
				'name'		=> 'search_icon_color_group'
			)
		);

		$search_icon_color_row = mixtape_qodef_add_admin_row(
			array(
				'parent'	=> $search_icon_color_group,
				'name'		=> 'search_icon_color_row'
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'	=> $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_search_icon_color',
				'label'		=> esc_html__('Color', 'mixtapewp')
			)
		);
		mixtape_qodef_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_search_icon_hover_color',
				'label'		=> esc_html__('Hover Color', 'mixtapewp')
			)
		);
		mixtape_qodef_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_light_search_icon_color',
				'label'		=> esc_html__('Light Header Icon Color', 'mixtapewp')
			)
		);
		mixtape_qodef_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_light_search_icon_hover_color',
				'label'		=> esc_html__('Light Header Icon Hover Color', 'mixtapewp')
			)
		);

		$search_icon_color_row2 = mixtape_qodef_add_admin_row(
			array(
				'parent'	=> $search_icon_color_group,
				'name'		=> 'search_icon_color_row2',
				'next'		=> true
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $search_icon_color_row2,
				'type'		=> 'colorsimple',
				'name'		=> 'header_dark_search_icon_color',
				'label'		=> esc_html__('Dark Header Icon Color', 'mixtapewp')
			)
		);
		mixtape_qodef_add_admin_field(
			array(
				'parent' => $search_icon_color_row2,
				'type'		=> 'colorsimple',
				'name'		=> 'header_dark_search_icon_hover_color',
				'label'		=> esc_html__('Dark Header Icon Hover Color', 'mixtapewp')
			)
		);


		$search_icon_background_group = mixtape_qodef_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Icon Background Style', 'mixtapewp'),
				'description'	=> esc_html__('Define background style for icon', 'mixtapewp'),
				'name'		=> 'search_icon_background_group'
			)
		);

		$search_icon_background_row = mixtape_qodef_add_admin_row(
			array(
				'parent'	=> $search_icon_background_group,
				'name'		=> 'search_icon_background_row'
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $search_icon_background_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_background_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Background Color', 'mixtapewp'),
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $search_icon_background_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_background_hover_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Background Hover Color', 'mixtapewp'),
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'yesno',
				'name'			=> 'enable_search_icon_text',
				'default_value'	=> 'no',
				'label'			=> esc_html__('Enable Search Icon Text', 'mixtapewp'),
				'description'	=> esc_html__("Enable this option to show 'Search' text next to search icon in header", 'mixtapewp'),
				'args'			=> array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_enable_search_icon_text_container'
				)
			)
		);

		$enable_search_icon_text_container = mixtape_qodef_add_admin_container(
			array(
				'parent'			=> $search_panel,
				'name'				=> 'enable_search_icon_text_container',
				'hidden_property'	=> 'enable_search_icon_text',
				'hidden_value'		=> 'no'
			)
		);

		$enable_search_icon_text_group = mixtape_qodef_add_admin_group(
			array(
				'parent'	=> $enable_search_icon_text_container,
				'title'		=> esc_html__('Search Icon Text', 'mixtapewp'),
				'name'		=> 'enable_search_icon_text_group',
				'description'	=> esc_html__('Define Style for Search Icon Text', 'mixtapewp')
			)
		);

		$enable_search_icon_text_row = mixtape_qodef_add_admin_row(
			array(
				'parent'	=> $enable_search_icon_text_group,
				'name'		=> 'enable_search_icon_text_row'
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_text_color',
				'label'			=> esc_html__('Text Color', 'mixtapewp'),
				'default_value'	=> ''
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_text_color_hover',
				'label'			=> esc_html__('Text Hover Color', 'mixtapewp'),
				'default_value'	=> ''
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_text_fontsize',
				'label'			=> esc_html__('Font Size', 'mixtapewp'),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_text_lineheight',
				'label'			=> esc_html__('Line Height', 'mixtapewp'),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$enable_search_icon_text_row2 = mixtape_qodef_add_admin_row(
			array(
				'parent'	=> $enable_search_icon_text_group,
				'name'		=> 'enable_search_icon_text_row2',
				'next'		=> true
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_icon_text_texttransform',
				'label'			=> esc_html__('Text Transform', 'mixtapewp'),
				'default_value'	=> '',
				'options'		=> mixtape_qodef_get_text_transform_array()
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'fontsimple',
				'name'			=> 'search_icon_text_google_fonts',
				'label'			=> esc_html__('Font Family', 'mixtapewp'),
				'default_value'	=> '-1',
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_icon_text_fontstyle',
				'label'			=> esc_html__('Font Style', 'mixtapewp'),
				'default_value'	=> '',
				'options'		=> mixtape_qodef_get_font_style_array(),
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_icon_text_fontweight',
				'label'			=> esc_html__('Font Weight', 'mixtapewp'),
				'default_value'	=> '',
				'options'		=> mixtape_qodef_get_font_weight_array(),
			)
		);

		$enable_search_icon_text_row3 = mixtape_qodef_add_admin_row(
			array(
				'parent'	=> $enable_search_icon_text_group,
				'name'		=> 'enable_search_icon_text_row3',
				'next'		=> true
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row3,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_text_letterspacing',
				'label'			=> esc_html__('Letter Spacing', 'mixtapewp'),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$search_icon_spacing_group = mixtape_qodef_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Icon Spacing', 'mixtapewp'),
				'description'	=> esc_html__('Define padding and margins for Search icon', 'mixtapewp'),
				'name'		=> 'search_icon_spacing_group'
			)
		);

		$search_icon_spacing_row = mixtape_qodef_add_admin_row(
			array(
				'parent'	=> $search_icon_spacing_group,
				'name'		=> 'search_icon_spacing_row'
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $search_icon_spacing_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_padding_left',
				'default_value'	=> '',
				'label'			=> esc_html__('Padding Left', 'mixtapewp'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $search_icon_spacing_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_padding_right',
				'default_value'	=> '',
				'label'			=> esc_html__('Padding Right', 'mixtapewp'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $search_icon_spacing_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_margin_left',
				'default_value'	=> '',
				'label'			=> esc_html__('Margin Left', 'mixtapewp'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $search_icon_spacing_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_margin_right',
				'default_value'	=> '',
				'label'			=> esc_html__('Margin Right', 'mixtapewp'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		mixtape_qodef_add_admin_section_title(
			array(
				'parent' 	=> $search_panel,
				'name'		=> 'search_form_title',
				'title'		=> esc_html__('Search Bar', 'mixtapewp')
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'color',
				'name'			=> 'search_background_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Background Color', 'mixtapewp'),
				'description'	=> esc_html__('Choose a background color for Select search bar', 'mixtapewp')
			)
		);

		$search_input_text_group = mixtape_qodef_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Search Input Text', 'mixtapewp'),
				'description'	=> esc_html__('Define style for search text', 'mixtapewp'),
				'name'		=> 'search_input_text_group'
			)
		);

		$search_input_text_row = mixtape_qodef_add_admin_row(
			array(
				'parent'	=> $search_input_text_group,
				'name'		=> 'search_input_text_row'
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $search_input_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_text_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Text Color', 'mixtapewp'),
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $search_input_text_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_text_fontsize',
				'default_value'	=> '',
				'label'			=> esc_html__('Font Size', 'mixtapewp'),
				'args'			=> array(
					'suffix' => 'px'
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $search_input_text_row,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_text_texttransform',
				'default_value'	=> '',
				'label'			=> esc_html__('Text Transform', 'mixtapewp'),
				'options'		=> mixtape_qodef_get_text_transform_array()
			)
		);

		$search_input_text_row2 = mixtape_qodef_add_admin_row(
			array(
				'parent'	=> $search_input_text_group,
				'name'		=> 'search_input_text_row2'
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $search_input_text_row2,
				'type'			=> 'fontsimple',
				'name'			=> 'search_text_google_fonts',
				'default_value'	=> '-1',
				'label'			=> esc_html__('Font Family', 'mixtapewp'),
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $search_input_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_text_fontstyle',
				'default_value'	=> '',
				'label'			=> esc_html__('Font Style', 'mixtapewp'),
				'options'		=> mixtape_qodef_get_font_style_array(),
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $search_input_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_text_fontweight',
				'default_value'	=> '',
				'label'			=> esc_html__('Font Weight', 'mixtapewp'),
				'options'		=> mixtape_qodef_get_font_weight_array()
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $search_input_text_row2,
				'type'			=> 'textsimple',
				'name'			=> 'search_text_letterspacing',
				'default_value'	=> '',
				'label'			=> esc_html__('Letter Spacing', 'mixtapewp'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$search_label_text_group = mixtape_qodef_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Search Label Text', 'mixtapewp'),
				'description'	=> esc_html__('Define style for search label text', 'mixtapewp'),
				'name'		=> 'search_label_text_group'
			)
		);

		$search_label_text_row = mixtape_qodef_add_admin_row(
			array(
				'parent'	=> $search_label_text_group,
				'name'		=> 'search_label_text_row'
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $search_label_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_label_text_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Text Color', 'mixtapewp'),
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $search_label_text_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_label_text_fontsize',
				'default_value'	=> '',
				'label'			=> esc_html__('Font Size', 'mixtapewp'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $search_label_text_row,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_label_text_texttransform',
				'default_value'	=> '',
				'label'			=> esc_html__('Text Transform', 'mixtapewp'),
				'options'		=> mixtape_qodef_get_text_transform_array()
			)
		);

		$search_label_text_row2 = mixtape_qodef_add_admin_row(
			array(
				'parent'	=> $search_label_text_group,
				'name'		=> 'search_label_text_row2',
				'next'		=> true
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $search_label_text_row2,
				'type'			=> 'fontsimple',
				'name'			=> 'search_label_text_google_fonts',
				'default_value'	=> '-1',
				'label'			=> esc_html__('Font Family', 'mixtapewp'),
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $search_label_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_label_text_fontstyle',
				'default_value'	=> '',
				'label'			=> esc_html__('Font Style', 'mixtapewp'),
				'options'		=> mixtape_qodef_get_font_style_array()
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $search_label_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_label_text_fontweight',
				'default_value'	=> '',
				'label'			=> esc_html__('Font Weight', 'mixtapewp'),
				'options'		=> mixtape_qodef_get_font_weight_array()
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $search_label_text_row2,
				'type'			=> 'textsimple',
				'name'			=> 'search_label_text_letterspacing',
				'default_value'	=> '',
				'label'			=> esc_html__('Letter Spacing', 'mixtapewp'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$search_icon_group = mixtape_qodef_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Search Icon', 'mixtapewp'),
				'description'	=> esc_html__('Define style for search icon', 'mixtapewp'),
				'name'		=> 'search_icon_group'
			)
		);

		$search_icon_row = mixtape_qodef_add_admin_row(
			array(
				'parent'	=> $search_icon_group,
				'name'		=> 'search_icon_row'
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $search_icon_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Icon Color', 'mixtapewp'),
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $search_icon_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_hover_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Icon Hover Color', 'mixtapewp'),
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $search_icon_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_size',
				'default_value'	=> '',
				'label'			=> esc_html__('Icon Size', 'mixtapewp'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$search_close_icon_group = mixtape_qodef_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Search Close', 'mixtapewp'),
				'description'	=> esc_html__('Define style for search close icon', 'mixtapewp'),
				'name'		=> 'search_close_icon_group'
			)
		);

		$search_close_icon_row = mixtape_qodef_add_admin_row(
			array(
				'parent'	=> $search_close_icon_group,
				'name'		=> 'search_icon_row'
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $search_close_icon_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_close_color',
				'label'			=> esc_html__('Icon Color', 'mixtapewp'),
				'default_value'	=> ''
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $search_close_icon_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_close_hover_color',
				'label'			=> esc_html__('Icon Hover Color', 'mixtapewp'),
				'default_value'	=> ''
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $search_close_icon_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_close_size',
				'label'			=> esc_html__('Icon Size', 'mixtapewp'),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$search_bottom_border_group = mixtape_qodef_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Search Bottom Border', 'mixtapewp'),
				'description'	=> esc_html__('Define style for Search text input bottom border (for Fullscreen search type)', 'mixtapewp'),
				'name'		=> 'search_bottom_border_group'
			)
		);

		$search_bottom_border_row = mixtape_qodef_add_admin_row(
			array(
				'parent'	=> $search_bottom_border_group,
				'name'		=> 'search_icon_row'
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $search_bottom_border_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_border_color',
				'label'			=> esc_html__('Border Color', 'mixtapewp'),
				'default_value'	=> ''
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent'		=> $search_bottom_border_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_border_focus_color',
				'label'			=> esc_html__('Border Focus Color', 'mixtapewp'),
				'default_value'	=> ''
			)
		);

	}

	add_action('mixtape_qodef_options_map', 'mixtape_qodef_search_options_map', 14);

}