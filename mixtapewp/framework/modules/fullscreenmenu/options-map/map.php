<?php

if ( ! function_exists('mixtape_qodef_fullscreen_menu_options_map')) {

	function mixtape_qodef_fullscreen_menu_options_map() {


		$fullscreen_panel = mixtape_qodef_add_admin_panel(
			array(
				'title' => esc_html__('Fullscreen Menu', 'mixtapewp'),
				'name' => 'fullscreen_menu',
				'page' => '_header_page',
				'hidden_value' => '',
				'hidden_values' => array(
					'header-standard'
				)
			)
		);

		$full_screen_general_container = mixtape_qodef_add_admin_container_no_style(
			array(
				'name' => 'qodef_full_screen_general_container',
				'hidden_property' => 'header_type',
				'hidden_value' => 'header-vertical',
				'parent' => $fullscreen_panel,
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $full_screen_general_container,
				'type' => 'select',
				'name' => 'fullscreen_menu_animation_style',
				'default_value' => 'fade-push-text-right',
				'label' => esc_html__('Fullscreen Menu Overlay Animation', 'mixtapewp'),
				'description' => esc_html__('Choose animation type for fullscreen menu overlay', 'mixtapewp'),
				'options' => array(
					'fade-push-text-right' => esc_html__('Fade Push Text Right', 'mixtapewp'),
					'fade-push-text-top' => esc_html__('Fade Push Text Top', 'mixtapewp'),
					'fade-text-scaledown' => esc_html__('Fade Text Scaledown', 'mixtapewp')
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $full_screen_general_container,
				'type' => 'yesno',
				'name' => 'fullscreen_in_grid',
				'default_value' => 'yes',
				'label' => esc_html__('Fullscreen Menu in Grid', 'mixtapewp'),
				'description' => esc_html__('Enabling this option will put fullscreen menu content in grid', 'mixtapewp'),
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $full_screen_general_container,
				'type' => 'selectblank',
				'name' => 'fullscreen_alignment',
				'default_value' => '',
				'label' => esc_html__('Fullscreen Menu Alignment', 'mixtapewp'),
				'description' => esc_html__('Choose alignment for fullscreen menu content', 'mixtapewp'),
				'options' => array(
					"left" => esc_html__("Left", 'mixtapewp'),
					"center" => esc_html__("Center", 'mixtapewp'),
					"right" => esc_html__("Right", 'mixtapewp')
				)
			)
		);

		$background_group = mixtape_qodef_add_admin_group(
			array(
				'parent' => $full_screen_general_container,
				'name' => 'background_group',
				'title' => esc_html__('Background', 'mixtapewp'),
				'description' => esc_html__('Select a background color and transparency for Fullscreen Menu (0 = fully transparent, 1 = opaque)', 'mixtapewp')

			)
		);

		$background_group_row = mixtape_qodef_add_admin_row(
			array(
				'parent' => $background_group,
				'name' => 'background_group_row'
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $background_group_row,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_background_color',
				'default_value' => '',
				'label' => esc_html__('Background Color', 'mixtapewp')
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $background_group_row,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_background_transparency',
				'default_value' => '',
				'label' => esc_html__('Transparency (values:0-1)', 'mixtapewp')
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $full_screen_general_container,
				'type' => 'image',
				'name' => 'fullscreen_menu_background_image',
				'default_value' => '',
				'label' => esc_html__('Background Image', 'mixtapewp'),
				'description' => esc_html__('Choose a background image for Fullscreen Menu background', 'mixtapewp')
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $full_screen_general_container,
				'type' => 'image',
				'name' => 'fullscreen_menu_pattern_image',
				'default_value' => '',
				'label' => esc_html__('Pattern Background Image', 'mixtapewp'),
				'description' => esc_html__('Choose a pattern image for Fullscreen Menu background', 'mixtapewp')
			)
		);

//1st level style group
		$first_level_style_group = mixtape_qodef_add_admin_group(
			array(
				'parent' => $fullscreen_panel,
				'name' => 'first_level_style_group',
				'title' => esc_html__('1st Level Style', 'mixtapewp'),
				'description' => esc_html__('Define styles for 1st level in Fullscreen Menu', 'mixtapewp')
			)
		);

		$first_level_style_row1 = mixtape_qodef_add_admin_row(
			array(
				'parent' => $first_level_style_group,
				'name' => 'first_level_style_row1'
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $first_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_color',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'mixtapewp'),
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $first_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_hover_color',
				'default_value' => '',
				'label' => esc_html__('Hover Text Color', 'mixtapewp'),
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $first_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_active_color',
				'default_value' => '',
				'label' => esc_html__('Active Text Color', 'mixtapewp'),
			)
		);

		$first_level_style_row2 = mixtape_qodef_add_admin_row(
			array(
				'parent' => $first_level_style_group,
				'name' => 'first_level_style_row2'
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $first_level_style_row2,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_hover_background_color',
				'default_value' => '',
				'label' => esc_html__('Background Hover Color', 'mixtapewp'),
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $first_level_style_row2,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_active_background_color',
				'default_value' => '',
				'label' => esc_html__('Background Active Color', 'mixtapewp'),
			)
		);

		$first_level_style_row3 = mixtape_qodef_add_admin_row(
			array(
				'parent' => $first_level_style_group,
				'name' => 'first_level_style_row3'
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $first_level_style_row3,
				'type' => 'fontsimple',
				'name' => 'fullscreen_menu_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'mixtapewp'),
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $first_level_style_row3,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_fontsize',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'mixtapewp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $first_level_style_row3,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_lineheight',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'mixtapewp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$first_level_style_row4 = mixtape_qodef_add_admin_row(
			array(
				'parent' => $first_level_style_group,
				'name' => 'first_level_style_row4'
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $first_level_style_row4,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'mixtapewp'),
				'options' => mixtape_qodef_get_font_style_array()
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $first_level_style_row4,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'mixtapewp'),
				'options' => mixtape_qodef_get_font_weight_array()
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $first_level_style_row4,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_letterspacing',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing', 'mixtapewp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $first_level_style_row4,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_texttransform',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'mixtapewp'),
				'options' => mixtape_qodef_get_text_transform_array()
			)
		);

//2nd level style group
		$second_level_style_group = mixtape_qodef_add_admin_group(
			array(
				'parent' => $fullscreen_panel,
				'name' => 'second_level_style_group',
				'title' => esc_html__('2nd Level Style', 'mixtapewp'),
				'description' => esc_html__('Define styles for 2nd level in Fullscreen Menu', 'mixtapewp')
			)
		);

		$second_level_style_row1 = mixtape_qodef_add_admin_row(
			array(
				'parent' => $second_level_style_group,
				'name' => 'second_level_style_row1'
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $second_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_color_2nd',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'mixtapewp'),
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $second_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_hover_color_2nd',
				'default_value' => '',
				'label' => esc_html__('Hover Text Color', 'mixtapewp'),
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $second_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_hover_background_color_2nd',
				'default_value' => '',
				'label' => esc_html__('Background Hover Color', 'mixtapewp'),
			)
		);

		$second_level_style_row2 = mixtape_qodef_add_admin_row(
			array(
				'parent' => $second_level_style_group,
				'name' => 'second_level_style_row2'
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $second_level_style_row2,
				'type' => 'fontsimple',
				'name' => 'fullscreen_menu_google_fonts_2nd',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'mixtapewp'),
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $second_level_style_row2,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_fontsize_2nd',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'mixtapewp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $second_level_style_row2,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_lineheight_2nd',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'mixtapewp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_style_row3 = mixtape_qodef_add_admin_row(
			array(
				'parent' => $second_level_style_group,
				'name' => 'second_level_style_row3'
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $second_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_fontstyle_2nd',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'mixtapewp'),
				'options' => mixtape_qodef_get_font_style_array()
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $second_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_fontweight_2nd',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'mixtapewp'),
				'options' => mixtape_qodef_get_font_weight_array()
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $second_level_style_row3,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_letterspacing_2nd',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing', 'mixtapewp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $second_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_texttransform_2nd',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'mixtapewp'),
				'options' => mixtape_qodef_get_text_transform_array()
			)
		);

		$third_level_style_group = mixtape_qodef_add_admin_group(
			array(
				'parent' => $fullscreen_panel,
				'name' => 'third_level_style_group',
				'title' => esc_html__('3rd Level Style', 'mixtapewp'),
				'description' => esc_html__('Define styles for 3rd level in Fullscreen Menu', 'mixtapewp')
			)
		);

		$third_level_style_row1 = mixtape_qodef_add_admin_row(
			array(
				'parent' => $third_level_style_group,
				'name' => 'third_level_style_row1'
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $third_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_color_3rd',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'mixtapewp'),
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $third_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_hover_color_3rd',
				'default_value' => '',
				'label' => esc_html__('Hover Text Color', 'mixtapewp'),
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $third_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_hover_background_color_3rd',
				'default_value' => '',
				'label' => esc_html__('Background Hover Color', 'mixtapewp'),
			)
		);

		$third_level_style_row2 = mixtape_qodef_add_admin_row(
			array(
				'parent' => $third_level_style_group,
				'name' => 'second_level_style_row2'
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $third_level_style_row2,
				'type' => 'fontsimple',
				'name' => 'fullscreen_menu_google_fonts_3rd',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'mixtapewp'),
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $third_level_style_row2,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_fontsize_3rd',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'mixtapewp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $third_level_style_row2,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_lineheight_3rd',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'mixtapewp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$third_level_style_row3 = mixtape_qodef_add_admin_row(
			array(
				'parent' => $third_level_style_group,
				'name' => 'second_level_style_row3'
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $third_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_fontstyle_3rd',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'mixtapewp'),
				'options' => mixtape_qodef_get_font_style_array()
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $third_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_fontweight_3rd',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'mixtapewp'),
				'options' => mixtape_qodef_get_font_weight_array()
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $third_level_style_row3,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_letterspacing_3rd',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing', 'mixtapewp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $third_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_texttransform_3rd',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'mixtapewp'),
				'options' => mixtape_qodef_get_text_transform_array()
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $fullscreen_panel,
				'type' => 'select',
				'name' => 'fullscreen_menu_icon_size',
				'label' => esc_html__('Fullscreen Menu Icon Size', 'mixtapewp'),
				'description' => esc_html__('Choose predefined size for Fullscreen Menu icon', 'mixtapewp'),
				'default_value' => 'normal',
				'options' => array(
					'normal' => esc_html__('Normal', 'mixtapewp'),
					'medium' => esc_html__('Medium', 'mixtapewp'),
					'large' => esc_html__('Large', 'mixtapewp')
				)

			)
		);

		$icon_colors_group = mixtape_qodef_add_admin_group(
			array(
				'parent' => $fullscreen_panel,
				'name' => 'fullscreen_menu_icon_colors_group',
				'title' => esc_html__('Full Screen Menu Icon Style', 'mixtapewp'),
				'description' => esc_html__('Define styles for Fullscreen Menu Icon', 'mixtapewp')
			)
		);

		$icon_colors_row1 = mixtape_qodef_add_admin_row(
			array(
				'parent' => $icon_colors_group,
				'name' => 'icon_colors_row1'
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $icon_colors_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_icon_color',
				'label' => esc_html__('Color', 'mixtapewp'),
			)
		);
		mixtape_qodef_add_admin_field(
			array(
				'parent' => $icon_colors_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_icon_hover_color',
				'label' => esc_html__('Hover Color', 'mixtapewp'),
			)
		);
		$icon_colors_row2 = mixtape_qodef_add_admin_row(
			array(
				'parent' => $icon_colors_group,
				'name' => 'icon_colors_row2',
				'next' => true
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $icon_colors_row2,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_light_icon_color',
				'label' => esc_html__('Light Menu Icon Color', 'mixtapewp'),
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $icon_colors_row2,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_light_icon_hover_color',
				'label' => esc_html__('Light Menu Icon Hover Color', 'mixtapewp'),
			)
		);

		$icon_colors_row3 = mixtape_qodef_add_admin_row(
			array(
				'parent' => $icon_colors_group,
				'name' => 'icon_colors_row3',
				'next' => true
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $icon_colors_row3,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_dark_icon_color',
				'label' => esc_html__('Dark Menu Icon Color', 'mixtapewp'),
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $icon_colors_row3,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_dark_icon_hover_color',
				'label' => esc_html__('Dark Menu Icon Hover Color', 'mixtapewp'),
			)
		);

		$icon_colors_row4 = mixtape_qodef_add_admin_row(
			array(
				'parent' => $icon_colors_group,
				'name' => 'icon_colors_row4',
				'next' => true
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $icon_colors_row4,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_icon_background_color',
				'label' => esc_html__('Background Color', 'mixtapewp'),
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $icon_colors_row4,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_icon_background_hover_color',
				'label' => esc_html__('Background Hover Color', 'mixtapewp'),
			)
		);

		$icon_spacing_group = mixtape_qodef_add_admin_group(
			array(
				'parent' => $fullscreen_panel,
				'name' => 'icon_spacing_group',
				'title' => esc_html__('Full Screen Menu Icon Spacing', 'mixtapewp'),
				'description' => esc_html__('Define padding and margin for full screen menu icon', 'mixtapewp')
			)
		);

		$icon_spacing_row = mixtape_qodef_add_admin_row(
			array(
				'parent' => $icon_spacing_group,
				'name' => 'icon_spacing_row'
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $icon_spacing_row,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_icon_padding_left',
				'default_value' => '',
				'label' => esc_html__('Padding Left', 'mixtapewp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $icon_spacing_row,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_icon_padding_right',
				'default_value' => '',
				'label' => esc_html__('Padding Right', 'mixtapewp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $icon_spacing_row,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_icon_margin_left',
				'default_value' => '',
				'label' => esc_html__('Margin Left', 'mixtapewp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $icon_spacing_row,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_icon_margin_right',
				'default_value' => '',
				'label' => esc_html__('Margin Right', 'mixtapewp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

	}

	add_action('mixtape_qodef_options_map', 'mixtape_qodef_fullscreen_menu_options_map');

}