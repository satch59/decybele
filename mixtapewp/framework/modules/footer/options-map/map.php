<?php

if ( ! function_exists('mixtape_qodef_footer_options_map') ) {
	/**
	 * Add footer options
	 */
	function mixtape_qodef_footer_options_map() {

		mixtape_qodef_add_admin_page(
			array(
				'slug' => '_footer_page',
				'title' => esc_html__('Footer', 'mixtapewp'),
				'icon' => 'fa fa-sort-amount-asc'
			)
		);

		$footer_panel = mixtape_qodef_add_admin_panel(
			array(
				'title' => esc_html__('Footer', 'mixtapewp'),
				'name' => 'footer',
				'page' => '_footer_page'
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'uncovering_footer',
				'default_value' => 'no',
				'label' => esc_html__('Uncovering Footer', 'mixtapewp'),
				'description' => esc_html__('Enabling this option will make Footer gradually appear on scroll', 'mixtapewp'),
				'parent' => $footer_panel,
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'name'        => 'footer_background_image',
				'type'        => 'image',
				'label'       => esc_html__('Background Image', 'mixtapewp'),
				'description' => esc_html__('Choose Background Image for Footer Area', 'mixtapewp'),
				'parent'      => $footer_panel
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'name' => 'footer_background_color',
				'type' => 'color',
				'label' => esc_html__('Background Color', 'mixtapewp'),
				'description' => esc_html__('Choose a background color for Footer Area', 'mixtapewp'),
				'parent' => $footer_panel
			)
		);


		mixtape_qodef_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'footer_in_grid',
				'default_value' => 'yes',
				'label' => esc_html__('Footer in Grid', 'mixtapewp'),
				'description' => esc_html__('Enabling this option will place Footer content in grid', 'mixtapewp'),
				'parent' => $footer_panel,
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'show_footer_top',
				'default_value' => 'yes',
				'label' => esc_html__('Show Footer Top', 'mixtapewp'),
				'description' => esc_html__('Enabling this option will show Footer Top area', 'mixtapewp'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_show_footer_top_container'
				),
				'parent' => $footer_panel,
			)
		);

		$show_footer_top_container = mixtape_qodef_add_admin_container(
			array(
				'name' => 'show_footer_top_container',
				'hidden_property' => 'show_footer_top',
				'hidden_value' => 'no',
				'parent' => $footer_panel
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_top_columns',
				'default_value' => '4',
				'label' => esc_html__('Footer Top Columns', 'mixtapewp'),
				'description' => esc_html__('Choose number of columns for Footer Top area', 'mixtapewp'),
				'options' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'5' => '3(25%+25%+50%)',
					'6' => '3(50%+25%+25%)',
					'4' => '4'
				),
				'parent' => $show_footer_top_container,
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_top_columns_alignment',
				'default_value' => '',
				'label' => esc_html__('Footer Top Columns Alignment', 'mixtapewp'),
				'description' => esc_html__('Text Alignment in Footer Columns', 'mixtapewp'),
				'options' => array(
					'left' => esc_html__('Left', 'mixtapewp'),
					'center' => esc_html__('Center', 'mixtapewp'),
					'right' => esc_html__('Right', 'mixtapewp')
				),
				'parent' => $show_footer_top_container,
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'show_footer_bottom',
				'default_value' => 'yes',
				'label' => esc_html__('Show Footer Bottom', 'mixtapewp'),
				'description' => esc_html__('Enabling this option will show Footer Bottom area', 'mixtapewp'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_show_footer_bottom_container'
				),
				'parent' => $footer_panel,
			)
		);

		$show_footer_bottom_container = mixtape_qodef_add_admin_container(
			array(
				'name' => 'show_footer_bottom_container',
				'hidden_property' => 'show_footer_bottom',
				'hidden_value' => 'no',
				'parent' => $footer_panel
			)
		);


		mixtape_qodef_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_bottom_columns',
				'default_value' => '3',
				'label' => esc_html__('Footer Bottom Columns', 'mixtapewp'),
				'description' => esc_html__('Choose number of columns for Footer Bottom area', 'mixtapewp'),
				'options' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3'
				),
				'parent' => $show_footer_bottom_container,
			)
		);

	}

	add_action( 'mixtape_qodef_options_map', 'mixtape_qodef_footer_options_map', 5);

}