<?php

if ( ! function_exists('mixtape_qodef_woocommerce_options_map') ) {

	/**
	 * Add Woocommerce options page
	 */
	function mixtape_qodef_woocommerce_options_map() {

		mixtape_qodef_add_admin_page(
			array(
				'slug' => '_woocommerce_page',
				'title' => esc_html__('Woocommerce','mixtapewp'),
				'icon' => 'fa fa-shopping-cart'
			)
		);

		/**
		 * Product List Settings
		 */
		$panel_product_list = mixtape_qodef_add_admin_panel(
			array(
				'page' => '_woocommerce_page',
				'name' => 'panel_product_list',
				'title' => esc_html__('Product List','mixtapewp')
			)
		);

		mixtape_qodef_add_admin_field(array(
			'name'        	=> 'qodef_woo_products_list_full_width',
			'type'        	=> 'yesno',
			'label'       	=> esc_html__('Enable Full Width Template','mixtapewp'),
			'default_value'	=> 'no',
			'description' 	=> esc_html__('Enabling this option will enable full width template for shop page','mixtapewp'),
			'parent'      	=> $panel_product_list,
		));

		mixtape_qodef_add_admin_field(array(
			'name'        	=> 'qodef_woo_product_list_columns',
			'type'        	=> 'select',
			'label'       	=> esc_html__('Product List Columns','mixtapewp'),
			'default_value'	=> 'qodef-woocommerce-columns-3',
			'description' 	=> esc_html__('Choose number of columns for product listing and related products on single product','mixtapewp'),
			'options'		=> array(
				'qodef-woocommerce-columns-3' => esc_html__('3 Columns (2 with sidebar)','mixtapewp'),
				'qodef-woocommerce-columns-4' => esc_html__('4 Columns (3 with sidebar)','mixtapewp')
			),
			'parent'      	=> $panel_product_list,
		));

		mixtape_qodef_add_admin_field(array(
			'name'        	=> 'qodef_woo_products_per_page',
			'type'        	=> 'text',
			'label'       	=> esc_html__('Number of products per page','mixtapewp'),
			'default_value'	=> '',
			'description' 	=> esc_html__('Set number of products on shop page','mixtapewp'),
			'parent'      	=> $panel_product_list,
			'args' 			=> array(
				'col_width' => 3
			)
		));

		mixtape_qodef_add_admin_field(array(
			'name'        	=> 'qodef_products_list_title_tag',
			'type'        	=> 'select',
			'label'       	=> esc_html__('Products Title Tag','mixtapewp'),
			'default_value'	=> 'h5',
			'description' 	=> '',
			'options'		=> array(
				'h1' => 'h1',
				'h2' => 'h2',
				'h3' => 'h3',
				'h4' => 'h4',
				'h5' => 'h5',
				'h6' => 'h6',
			),
			'parent'      	=> $panel_product_list,
		));

		/**
		 * Single Product Settings
		 */
		$panel_single_product = mixtape_qodef_add_admin_panel(
			array(
				'page' => '_woocommerce_page',
				'name' => 'panel_single_product',
				'title' => esc_html__('Single Product','mixtapewp')
			)
		);

		mixtape_qodef_add_admin_field(array(
			'name'        	=> 'qodef_single_product_title_tag',
			'type'        	=> 'select',
			'label'       	=> esc_html__('Single Product Title Tag','mixtapewp'),
			'default_value'	=> 'h2',
			'description' 	=> '',
			'options'		=> array(
				'h1' => 'h1',
				'h2' => 'h2',
				'h3' => 'h3',
				'h4' => 'h4',
				'h5' => 'h5',
				'h6' => 'h6',
			),
			'parent'      	=> $panel_single_product,
		));

		mixtape_qodef_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'product_single_navigation',
				'default_value' => 'yes',
				'label' => esc_html__('Enable Prev/Next Single Product Navigation Links','mixtapewp'),
				'parent' => $panel_single_product,
				'description' => esc_html__('Enable navigation links through the products','mixtapewp'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_qodef_product_single_navigation_container'
				)
			)
		);

		$product_single_navigation_container = mixtape_qodef_add_admin_container(
			array(
				'name' => 'qodef_product_single_navigation_container',
				'hidden_property' => 'product_single_navigation',
				'hidden_value' => 'no',
				'parent' => $panel_single_product,
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'type'        => 'yesno',
				'name' => 'product_navigation_through_same_category',
				'default_value' => 'yes',
				'label'       => esc_html__('Enable Navigation Only in Current Category','mixtapewp'),
				'description' => esc_html__('Limit your navigation only through current category','mixtapewp'),
				'parent'      => $product_single_navigation_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);

	}

	add_action( 'mixtape_qodef_options_map', 'mixtape_qodef_woocommerce_options_map', 22);

}