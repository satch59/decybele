<?php
/**
 * Woocommerce helper functions
 */

if (!function_exists('mixtape_qodef_woocommerce_body_class')) {
	/**
	 * Function that adds class on body for Woocommerce
	 *
	 * @param $classes
	 * @return array
	 */
	function mixtape_qodef_woocommerce_body_class( $classes ) {
		if(mixtape_qodef_is_woocommerce_page()) {
			$classes[] = 'qodef-woocommerce-page';
			if (is_singular('product')) {
				$classes[] = 'qodef-woocommerce-single-page';
			}
		}
		return $classes;
	}

	add_filter('body_class', 'mixtape_qodef_woocommerce_body_class');

}

if(!function_exists('mixtape_qodef_woocommerce_columns_class')) {
	/**
	 * Function that adds number of columns class to header tag
	 *
	 * @param array array of classes from main filter
	 *
	 * @return array array of classes with added bottom header appearance class
	 */
	function mixtape_qodef_woocommerce_columns_class($classes) {

		if(in_array('woocommerce', $classes)) {

			$products_list_number = mixtape_qodef_options()->getOptionValue('qodef_woo_product_list_columns');
			$classes[] = $products_list_number;

		}

		return $classes;
	}

	add_filter('body_class', 'mixtape_qodef_woocommerce_columns_class');
}

if(!function_exists('mixtape_qodef_is_woocommerce_page')) {
	/**
	 * Function that checks if current page is woocommerce shop, product or product taxonomy
	 * @return bool
	 *
	 * @see is_woocommerce()
	 */
	function mixtape_qodef_is_woocommerce_page() {
		if (function_exists('is_woocommerce') && is_woocommerce()) {
			return is_woocommerce();
		} elseif (function_exists('is_cart') && is_cart()) {
			return is_cart();
		} elseif (function_exists('is_checkout') && is_checkout()) {
			return is_checkout();
		} elseif (function_exists('is_account_page') && is_account_page()) {
			return is_account_page();
		}
	}
}

if(!function_exists('mixtape_qodef_is_woocommerce_shop')) {
	/**
	 * Function that checks if current page is shop or product page
	 * @return bool
	 *
	 * @see is_shop()
	 */
	function mixtape_qodef_is_woocommerce_shop() {
		return function_exists('is_shop') && (is_shop() || is_product());
	}
}

if(!function_exists('mixtape_qodef_get_woo_shop_page_id')) {
	/**
	 * Function that returns shop page id that is set in WooCommerce settings page
	 * @return int id of shop page
	 */
	function mixtape_qodef_get_woo_shop_page_id() {
		if(mixtape_qodef_is_woocommerce_installed()) {
			return get_option('woocommerce_shop_page_id');
		}
	}
}

if(!function_exists('mixtape_qodef_is_product_category')) {
	function mixtape_qodef_is_product_category() {
		return function_exists('is_product_category') && is_product_category();
	}
}

if(!function_exists('mixtape_qodef_load_woo_assets')) {
	/**
	 * Function that checks whether WooCommerce assets needs to be loaded.
	 *
	 * @see mixtape_qodef_is_woocommerce_page()
	 * @see mixtape_qodef_has_woocommerce_shortcode()
	 * @see mixtape_qodef_has_woocommerce_widgets()
	 * @return bool
	 */

	function mixtape_qodef_load_woo_assets() {
		return mixtape_qodef_is_woocommerce_installed() && (mixtape_qodef_is_woocommerce_page() ||
			mixtape_qodef_has_woocommerce_shortcode() || mixtape_qodef_has_woocommerce_widgets());
	}
}

if(!function_exists('mixtape_qodef_has_woocommerce_shortcode')) {
	/**
	 * Function that checks if current page has at least one of WooCommerce shortcodes added
	 * @return bool
	 */
	function mixtape_qodef_has_woocommerce_shortcode() {
		$woocommerce_shortcodes = array(
			'woocommerce_order_tracking',
			'add_to_cart',
			'product',
			'products',
			'product_categories',
			'product_category',
			'recent_products',
			'featured_products',
			'woocommerce_messages',
			'woocommerce_cart',
			'woocommerce_checkout',
			'woocommerce_my_account',
			'woocommerce_edit_address',
			'woocommerce_change_password',
			'woocommerce_view_order',
			'woocommerce_pay',
			'woocommerce_thankyou'
		);

		foreach($woocommerce_shortcodes as $woocommerce_shortcode) {
			$has_shortcode = mixtape_qodef_has_shortcode($woocommerce_shortcode);

			if($has_shortcode) {
				return true;
			}
		}

		return false;
	}
}

if(!function_exists('mixtape_qodef_has_woocommerce_widgets')) {
	/**
	 * Function that checks if current page has at least one of WooCommerce shortcodes added
	 * @return bool
	 */
	function mixtape_qodef_has_woocommerce_widgets() {
		$widgets_array = array(
			'qodef_woocommerce_dropdown_cart',
			'woocommerce_widget_cart',
			'woocommerce_layered_nav',
			'woocommerce_layered_nav_filters',
			'woocommerce_price_filter',
			'woocommerce_product_categories',
			'woocommerce_product_search',
			'woocommerce_product_tag_cloud',
			'woocommerce_products',
			'woocommerce_recent_reviews',
			'woocommerce_recently_viewed_products',
			'woocommerce_top_rated_products'
		);

		foreach($widgets_array as $widget) {
			$active_widget = is_active_widget(false, false, $widget);

			if($active_widget) {
				return true;
			}
		}

		return false;
	}
}

if(!function_exists('mixtape_qodef_get_woocommerce_pages')) {
	/**
	 * Function that returns all url woocommerce pages
	 * @return array array of WooCommerce pages
	 *
	 * @version 0.1
	 */
	function mixtape_qodef_get_woocommerce_pages() {
		$woo_pages_array = array();

		if(mixtape_qodef_is_woocommerce_installed()) {
			if(get_option('woocommerce_shop_page_id') != '') {
				$woo_pages_array[] = get_permalink(get_option('woocommerce_shop_page_id'));
			}
			if(get_option('woocommerce_cart_page_id') != '') {
				$woo_pages_array[] = get_permalink(get_option('woocommerce_cart_page_id'));
			}
			if(get_option('woocommerce_checkout_page_id') != '') {
				$woo_pages_array[] = get_permalink(get_option('woocommerce_checkout_page_id'));
			}
			if(get_option('woocommerce_pay_page_id') != '') {
				$woo_pages_array[] = get_permalink(get_option(' woocommerce_pay_page_id '));
			}
			if(get_option('woocommerce_thanks_page_id') != '') {
				$woo_pages_array[] = get_permalink(get_option(' woocommerce_thanks_page_id '));
			}
			if(get_option('woocommerce_myaccount_page_id') != '') {
				$woo_pages_array[] = get_permalink(get_option(' woocommerce_myaccount_page_id '));
			}
			if(get_option('woocommerce_edit_address_page_id') != '') {
				$woo_pages_array[] = get_permalink(get_option(' woocommerce_edit_address_page_id '));
			}
			if(get_option('woocommerce_view_order_page_id') != '') {
				$woo_pages_array[] = get_permalink(get_option(' woocommerce_view_order_page_id '));
			}
			if(get_option('woocommerce_terms_page_id') != '') {
				$woo_pages_array[] = get_permalink(get_option(' woocommerce_terms_page_id '));
			}

			$woo_products = get_posts(array('post_type'      => 'product',
				'post_status'    => 'publish',
				'posts_per_page' => '-1'
			));

			foreach($woo_products as $product) {
				$woo_pages_array[] = get_permalink($product->get_id());
			}
		}

		return $woo_pages_array;
	}

}

if(!function_exists('mixtape_qodef_woocommerce_share')) {
    /**
     * Function that social share for product page
     * Return array array of WooCommerce pages
     */
    function mixtape_qodef_woocommerce_share()
    {
        if (mixtape_qodef_is_woocommerce_installed()) {

            if (mixtape_qodef_options()->getOptionValue('enable_social_share') == 'yes'
                && mixtape_qodef_options()->getOptionValue('enable_social_share_on_product') == 'yes') :
                echo mixtape_qodef_get_social_share_html();
            endif;
        }
    }

}


if(!function_exists('mixtape_qodef_woocommerce_add_meta_box')) {
	/**
	 * Function that adds meta box field to product needed for masonry layout
	 */
	function mixtape_qodef_woocommerce_add_meta_box() {
		$meta_box = mixtape_qodef_add_meta_box(array(
			'scope' => 'product',
			'title' => esc_html__('Product Masonry Settings','mixtapewp'),
			'name'  => 'product-settings-meta-box'
		));

		mixtape_qodef_add_meta_box_field(array(
			'name'        => 'shop_masonry_dimensions',
			'type'        => 'select',
			'label'       => esc_html__('Dimensions for Masonry','mixtapewp'),
			'description' => esc_html__('Choose image dimensions for Masonry Shop list','mixtapewp'),
			'parent'      => $meta_box,
			'options'     => array(
				'default'            => esc_html__('Default','mixtapewp'),
				'large_width'        => esc_html__('Large width','mixtapewp'),
				'large_height'       => esc_html__('Large height','mixtapewp'),
				'large_width_height' => esc_html__('Large width/height','mixtapewp')
			)
		));
	}

	add_action('mixtape_qodef_meta_boxes_map', 'mixtape_qodef_woocommerce_add_meta_box');
}

if(!function_exists('mixtape_qodef_woocommerce_login_holder')) {
    /**
     * Function that is used for styling heading in Login Form
     * Return class for div holder
     */
    function mixtape_qodef_woocommerce_login_holder()
    {
        echo "<div class='qodef-my-account-login'>";
    }

    add_action('woocommerce_before_customer_login_form', 'mixtape_qodef_woocommerce_login_holder');

}

if(!function_exists('mixtape_qodef_woocommerce_login_holder_close')) {
    /**
     * Function that is used for styling heading in Login Form
     * Return closed div
     */
    function mixtape_qodef_woocommerce_login_holder_close()
    {
        echo "</div>";
    }

    add_action('woocommerce_after_customer_login_form', 'mixtape_qodef_woocommerce_login_holder_close');

}