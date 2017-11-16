<?php

if ( ! function_exists('mixtape_qodef_title_options_map') ) {

	function mixtape_qodef_title_options_map() {

		mixtape_qodef_add_admin_page(
			array(
				'slug' => '_title_page',
				'title' => esc_html__('Title', 'mixtapewp'),
				'icon' => 'fa fa-list-alt'
			)
		);

		$panel_title = mixtape_qodef_add_admin_panel(
			array(
				'page' => '_title_page',
				'name' => 'panel_title',
				'title' => esc_html__('Title Settings', 'mixtapewp')
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'name' => 'show_title_area',
				'type' => 'yesno',
				'default_value' => 'yes',
				'label' => esc_html__('Show Title Area', 'mixtapewp'),
				'description' => esc_html__('This option will enable/disable Title Area', 'mixtapewp'),
				'parent' => $panel_title,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#qodef_show_title_area_container"
				)
			)
		);

		$show_title_area_container = mixtape_qodef_add_admin_container(
			array(
				'parent' => $panel_title,
				'name' => 'show_title_area_container',
				'hidden_property' => 'show_title_area',
				'hidden_value' => 'no'
			)
		);

		
		mixtape_qodef_add_admin_field(
			array(
				'name' => 'title_in_grid',
				'type' => 'yesno',
				'default_value' => 'yes',
				'label' => esc_html__('Title Area in Grid', 'mixtapewp'),
				'description' => esc_html__('Set title content to be in grid', 'mixtapewp'),
				'parent' => $show_title_area_container,
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'name' => 'title_breadcrumbs',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__('Show breadcrumbs', 'mixtapewp'),
				'description' => esc_html__('Show breadcrumbs above title', 'mixtapewp'),
				'parent' => $show_title_area_container,
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'name' => 'title_area_animation',
				'type' => 'select',
				'default_value' => 'no',
				'label' => esc_html__('Animations', 'mixtapewp'),
				'description' => esc_html__('Choose an animation for Title Area', 'mixtapewp'),
				'parent' => $show_title_area_container,
				'options' => array(
					'no' => esc_html__('No Animation', 'mixtapewp'),
					'right-left' => esc_html__('Text right to left', 'mixtapewp'),
					'left-right' => esc_html__('Text left to right', 'mixtapewp')
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'name' => 'title_area_vertial_alignment',
				'type' => 'select',
				'default_value' => 'header_bottom',
				'label' => esc_html__('Vertical Alignment', 'mixtapewp'),
				'description' => esc_html__('Specify title vertical alignment', 'mixtapewp'),
				'parent' => $show_title_area_container,
				'options' => array(
					'header_bottom' => esc_html__('From Bottom of Header', 'mixtapewp'),
					'window_top' => esc_html__('From Window Top', 'mixtapewp')
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'name' => 'title_area_content_alignment',
				'type' => 'select',
				'default_value' => 'left',
				'label' => esc_html__('Horizontal Alignment', 'mixtapewp'),
				'description' => esc_html__('Specify title horizontal alignment', 'mixtapewp'),
				'parent' => $show_title_area_container,
				'options' => array(
					'left' => esc_html__('Left', 'mixtapewp'),
					'center' => esc_html__('Center', 'mixtapewp'),
					'right' => esc_html__('Right', 'mixtapewp')
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'name'			=> 'title_area_text_size',
				'type'			=> 'select',
				'default_value'	=> 'small',
				'label'			=> esc_html__('Text Size', 'mixtapewp'),
				'description'	=> esc_html__('Choose a default Title size', 'mixtapewp'),
				'parent'		=> $show_title_area_container,
				'options'		=> array(
						'small'     => esc_html__('Small', 'mixtapewp'),
						'medium'    => esc_html__('Medium', 'mixtapewp'),
						'large'     => esc_html__('Large', 'mixtapewp'),
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'name' => 'title_area_background_color',
				'type' => 'color',
				'label' => esc_html__('Background Color', 'mixtapewp'),
				'description' => esc_html__('Choose a background color for Title Area', 'mixtapewp'),
				'parent' => $show_title_area_container
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'name' => 'title_area_background_image',
				'type' => 'image',
				'label' => esc_html__('Background Image', 'mixtapewp'),
				'description' => esc_html__('Choose an Image for Title Area', 'mixtapewp'),
				'parent' => $show_title_area_container
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'name' => 'title_area_background_image_responsive',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__('Background Responsive Image', 'mixtapewp'),
				'description' => esc_html__('Enabling this option will make Title background image responsive', 'mixtapewp'),
				'parent' => $show_title_area_container,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "#qodef_title_area_background_image_responsive_container",
					"dependence_show_on_yes" => ""
				)
			)
		);

		$title_area_background_image_responsive_container = mixtape_qodef_add_admin_container(
			array(
				'parent' => $show_title_area_container,
				'name' => 'title_area_background_image_responsive_container',
				'hidden_property' => 'title_area_background_image_responsive',
				'hidden_value' => 'yes'
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'name' => 'title_area_background_image_parallax',
				'type' => 'select',
				'default_value' => 'no',
				'label' => esc_html__('Background Image in Parallax', 'mixtapewp'),
				'description' => esc_html__('Enabling this option will make Title background image parallax', 'mixtapewp'),
				'parent' => $title_area_background_image_responsive_container,
				'options' => array(
					'no' => esc_html__('No', 'mixtapewp'),
					'yes' => esc_html__('Yes', 'mixtapewp'),
					'yes_zoom' => esc_html__('Yes, with zoom out', 'mixtapewp')
				)
			)
		);

		mixtape_qodef_add_admin_field(array(
			'name' => 'title_area_height',
			'type' => 'text',
			'label' => esc_html__('Height', 'mixtapewp'),
			'description' => esc_html__('Set a height for Title Area', 'mixtapewp'),
			'parent' => $title_area_background_image_responsive_container,
			'args' => array(
				'col_width' => 2,
				'suffix' => 'px'
			)
		));

		mixtape_qodef_add_admin_field(
			array(
				'name' => 'title_area_border_bottom',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__('Enable Border Bottom', 'mixtapewp'),
				'description' => esc_html__('This option will display Border Bottom in Title Area', 'mixtapewp'),
				'parent' => $show_title_area_container
			)
		);

		$panel_typography = mixtape_qodef_add_admin_panel(
			array(
				'page' => '_title_page',
				'name' => 'panel_title_typography',
				'title' => esc_html__('Typography', 'mixtapewp')
			)
		);

		$group_page_title_styles = mixtape_qodef_add_admin_group(array(
			'name'			=> 'group_page_title_styles',
			'title'			=> esc_html__('Title', 'mixtapewp'),
			'description'	=> esc_html__('Define styles for page title', 'mixtapewp'),
			'parent'		=> $panel_typography
		));

		$row_page_title_styles_1 = mixtape_qodef_add_admin_row(array(
			'name'		=> 'row_page_title_styles_1',
			'parent'	=> $group_page_title_styles
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'page_title_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Color', 'mixtapewp'),
			'parent'		=> $row_page_title_styles_1
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_title_fontsize',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Size', 'mixtapewp'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_title_styles_1
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_title_lineheight',
			'default_value'	=> '',
			'label'			=> esc_html__('Line Height', 'mixtapewp'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_title_styles_1
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_title_texttransform',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Transform', 'mixtapewp'),
			'options'		=> mixtape_qodef_get_text_transform_array(),
			'parent'		=> $row_page_title_styles_1
		));

		$row_page_title_styles_2 = mixtape_qodef_add_admin_row(array(
			'name'		=> 'row_page_title_styles_2',
			'parent'	=> $group_page_title_styles,
			'next'		=> true
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'fontsimple',
			'name'			=> 'page_title_google_fonts',
			'default_value'	=> '-1',
			'label'			=> esc_html__('Font Family', 'mixtapewp'),
			'parent'		=> $row_page_title_styles_2
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_title_fontstyle',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Style', 'mixtapewp'),
			'options'		=> mixtape_qodef_get_font_style_array(),
			'parent'		=> $row_page_title_styles_2
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_title_fontweight',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Weight', 'mixtapewp'),
			'options'		=> mixtape_qodef_get_font_weight_array(),
			'parent'		=> $row_page_title_styles_2
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_title_letter_spacing',
			'default_value'	=> '',
			'label'			=> esc_html__('Letter Spacing', 'mixtapewp'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_title_styles_2
		));

		$group_page_subtitle_styles = mixtape_qodef_add_admin_group(array(
			'name'			=> 'group_page_subtitle_styles',
			'title'			=> esc_html__('Subtitle', 'mixtapewp'),
			'description'	=> esc_html__('Define styles for page subtitle', 'mixtapewp'),
			'parent'		=> $panel_typography
		));

		$row_page_subtitle_styles_1 = mixtape_qodef_add_admin_row(array(
			'name'		=> 'row_page_subtitle_styles_1',
			'parent'	=> $group_page_subtitle_styles
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'page_subtitle_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Color', 'mixtapewp'),
			'parent'		=> $row_page_subtitle_styles_1
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_subtitle_fontsize',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Size', 'mixtapewp'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_subtitle_styles_1
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_subtitle_lineheight',
			'default_value'	=> '',
			'label'			=> esc_html__('Line Height', 'mixtapewp'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_subtitle_styles_1
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_subtitle_texttransform',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Transform', 'mixtapewp'),
			'options'		=> mixtape_qodef_get_text_transform_array(),
			'parent'		=> $row_page_subtitle_styles_1
		));

		$row_page_subtitle_styles_2 = mixtape_qodef_add_admin_row(array(
			'name'		=> 'row_page_subtitle_styles_2',
			'parent'	=> $group_page_subtitle_styles,
			'next'		=> true
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'fontsimple',
			'name'			=> 'page_subtitle_google_fonts',
			'default_value'	=> '-1',
			'label'			=> esc_html__('Font Family', 'mixtapewp'),
			'parent'		=> $row_page_subtitle_styles_2
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_subtitle_fontstyle',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Style', 'mixtapewp'),
			'options'		=> mixtape_qodef_get_font_style_array(),
			'parent'		=> $row_page_subtitle_styles_2
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_subtitle_fontweight',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Weight', 'mixtapewp'),
			'options'		=> mixtape_qodef_get_font_weight_array(),
			'parent'		=> $row_page_subtitle_styles_2
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_subtitle_letter_spacing',
			'default_value'	=> '',
			'label'			=> esc_html__('Letter Spacing', 'mixtapewp'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_subtitle_styles_2
		));

		$group_page_breadcrumbs_styles = mixtape_qodef_add_admin_group(array(
			'name'			=> 'group_page_breadcrumbs_styles',
			'title'			=> esc_html__('Breadcrumbs', 'mixtapewp'),
			'description'	=> esc_html__('Define styles for page breadcrumbs', 'mixtapewp'),
			'parent'		=> $panel_typography
		));

		$row_page_breadcrumbs_styles_1 = mixtape_qodef_add_admin_row(array(
			'name'		=> 'row_page_breadcrumbs_styles_1',
			'parent'	=> $group_page_breadcrumbs_styles
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'page_breadcrumb_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Color', 'mixtapewp'),
			'parent'		=> $row_page_breadcrumbs_styles_1
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_breadcrumb_fontsize',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Size', 'mixtapewp'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_breadcrumbs_styles_1
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_breadcrumb_lineheight',
			'default_value'	=> '',
			'label'			=> esc_html__('Line Height', 'mixtapewp'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_breadcrumbs_styles_1
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_breadcrumb_texttransform',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Transform', 'mixtapewp'),
			'options'		=> mixtape_qodef_get_text_transform_array(),
			'parent'		=> $row_page_breadcrumbs_styles_1
		));

		$row_page_breadcrumbs_styles_2 = mixtape_qodef_add_admin_row(array(
			'name'		=> 'row_page_breadcrumbs_styles_2',
			'parent'	=> $group_page_breadcrumbs_styles,
			'next'		=> true
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'fontsimple',
			'name'			=> 'page_breadcrumb_google_fonts',
			'default_value'	=> '-1',
			'label'			=> esc_html__('Font Family', 'mixtapewp'),
			'parent'		=> $row_page_breadcrumbs_styles_2
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_breadcrumb_fontstyle',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Style', 'mixtapewp'),
			'options'		=> mixtape_qodef_get_font_style_array(),
			'parent'		=> $row_page_breadcrumbs_styles_2
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_breadcrumb_fontweight',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Weight', 'mixtapewp'),
			'options'		=> mixtape_qodef_get_font_weight_array(),
			'parent'		=> $row_page_breadcrumbs_styles_2
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_breadcrumb_letter_spacing',
			'default_value'	=> '',
			'label'			=> esc_html__('Letter Spacing', 'mixtapewp'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_breadcrumbs_styles_2
		));

		$row_page_breadcrumbs_styles_3 = mixtape_qodef_add_admin_row(array(
			'name'		=> 'row_page_breadcrumbs_styles_3',
			'parent'	=> $group_page_breadcrumbs_styles,
			'next'		=> true
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'page_breadcrumb_hovercolor',
			'default_value'	=> '',
			'label'			=> esc_html__('Hover/Active Color', 'mixtapewp'),
			'parent'		=> $row_page_breadcrumbs_styles_3
		));

	}

	add_action( 'mixtape_qodef_options_map', 'mixtape_qodef_title_options_map', 6);

}