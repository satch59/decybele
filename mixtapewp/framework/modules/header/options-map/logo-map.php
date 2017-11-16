<?php

if ( ! function_exists('mixtape_qodef_logo_options_map') ) {

	function mixtape_qodef_logo_options_map() {

		mixtape_qodef_add_admin_page(
			array(
				'slug' => '_logo_page',
				'title' => esc_html__('Logo', 'mixtapewp'),
				'icon' => 'fa fa-coffee'
			)
		);

		$panel_logo = mixtape_qodef_add_admin_panel(
			array(
				'page' => '_logo_page',
				'name' => 'panel_logo',
				'title' => esc_html__('Logo', 'mixtapewp')
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $panel_logo,
				'type' => 'yesno',
				'name' => 'hide_logo',
				'default_value' => 'no',
				'label' => esc_html__('Hide Logo', 'mixtapewp'),
				'description' => esc_html__('Enabling this option will hide logo image', 'mixtapewp'),
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "#qodef_hide_logo_container",
					"dependence_show_on_yes" => ""
				)
			)
		);

		$hide_logo_container = mixtape_qodef_add_admin_container(
			array(
				'parent' => $panel_logo,
				'name' => 'hide_logo_container',
				'hidden_property' => 'hide_logo',
				'hidden_value' => 'yes'
			)
		);

		mixtape_qodef_add_admin_section_title(
			array(
				'parent' => $hide_logo_container,
				'name'   => 'default_logo_title',
				'title'  => esc_html__('Header Logo', 'mixtapewp')
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'name' => 'logo_image',
				'type' => 'image',
				'default_value' => QODE_ASSETS_ROOT."/img/logo.png",
				'label' => esc_html__('Logo Image - Default', 'mixtapewp'),
				'description' => esc_html__('Choose a default logo image to display ', 'mixtapewp'),
				'parent' => $hide_logo_container
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'name' => 'logo_image_dark',
				'type' => 'image',
				'default_value' => QODE_ASSETS_ROOT."/img/logo_dark.png",
				'label' => esc_html__('Logo Image - Dark', 'mixtapewp'),
				'description' => esc_html__('Choose a default logo image to display ', 'mixtapewp'),
				'parent' => $hide_logo_container
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'name' => 'logo_image_light',
				'type' => 'image',
				'default_value' => QODE_ASSETS_ROOT."/img/logo_light.png",
				'label' => esc_html__('Logo Image - Light', 'mixtapewp'),
				'description' => esc_html__('Choose a default logo image to display ', 'mixtapewp'),
				'parent' => $hide_logo_container
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'name' => 'logo_image_sticky',
				'type' => 'image',
				'default_value' => QODE_ASSETS_ROOT."/img/logo.png",
				'label' => esc_html__('Logo Image - Sticky', 'mixtapewp'),
				'description' => esc_html__('Choose a default logo image to display ', 'mixtapewp'),
				'parent' => $hide_logo_container
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'name' => 'logo_image_mobile',
				'type' => 'image',
				'default_value' => QODE_ASSETS_ROOT."/img/logo.png",
				'label' => esc_html__('Logo Image - Mobile', 'mixtapewp'),
				'description' => esc_html__('Choose a default logo image to display ', 'mixtapewp'),
				'parent' => $hide_logo_container
			)
		);

	}

	add_action( 'mixtape_qodef_options_map', 'mixtape_qodef_logo_options_map', 2);

}