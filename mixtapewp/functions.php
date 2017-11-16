<?php
include_once get_template_directory().'/theme-includes.php';

if(!function_exists('mixtape_qodef_styles')) {
    /**
     * Function that includes theme's core styles
     */
    function mixtape_qodef_styles() {
        //include theme's core styles
        wp_enqueue_style('mixtape_qodef_default_style', QODE_ROOT.'/style.css');
        wp_enqueue_style('mixtape_qodef_modules_plugins', QODE_ASSETS_ROOT.'/css/plugins.min.css');
		wp_enqueue_style('wp-mediaelement');
        wp_enqueue_style('mixtape_qodef_modules', QODE_ASSETS_ROOT.'/css/modules.min.css');
        wp_enqueue_style('mixtape_qodef_blog', QODE_ASSETS_ROOT.'/css/blog.min.css');

		mixtape_qodef_icon_collections()->enqueueStyles();

        //define files afer which style dynamic needs to be included. It should be included last so it can override other files
        $style_dynamic_deps_array = array();

		//is woocommerce installed?
		if(mixtape_qodef_is_woocommerce_installed()) {
			if(mixtape_qodef_load_woo_assets()) {

				//include theme's woocommerce styles
				wp_enqueue_style('mixtape_qodef_woocommerce', QODE_ASSETS_ROOT.'/css/woocommerce.min.css');
                $style_dynamic_deps_array[] = 'mixtape_qodef_woocommerce';

				//is responsive option turned on?
				if(mixtape_qodef_options()->getOptionValue('responsiveness') == 'yes') {
					//include theme's woocommerce responsive styles
					wp_enqueue_style('mixtape_qodef_woocommerce_responsive', QODE_ASSETS_ROOT.'/css/woocommerce-responsive.min.css');
                    $style_dynamic_deps_array[] = 'mixtape_qodef_woocommerce_responsive';
				}
			}
		}

        //is responsive option turned on?
        if(mixtape_qodef_is_responsive_on()) {
            wp_enqueue_style('mixtape_qodef_modules_responsive', QODE_ASSETS_ROOT.'/css/modules-responsive.min.css');
            wp_enqueue_style('mixtape_qodef_blog_responsive', QODE_ASSETS_ROOT.'/css/blog-responsive.min.css');

            //include proper styles
            if(file_exists(QODE_ROOT_DIR.'/assets/css/style_dynamic_responsive.css') && mixtape_qodef_is_css_folder_writable() && !is_multisite()) {
                wp_enqueue_style('mixtape_qodef_style_dynamic_responsive', QODE_ASSETS_ROOT.'/css/style_dynamic_responsive.css', array(), filemtime(QODE_ROOT_DIR.'/assets/css/style_dynamic_responsive.css'));
            } elseif(file_exists(QODE_ROOT_DIR.'/assets/css/style_dynamic_responsive_ms_id_'. mixtape_qodef_get_multisite_blog_id() .'.css') && mixtape_qodef_is_css_folder_writable() && is_multisite()) {
                wp_enqueue_style('mixtape_qodef_style_dynamic_responsive', QODE_ASSETS_ROOT.'/css/style_dynamic_responsive_ms_id_'. mixtape_qodef_get_multisite_blog_id() .'.css', array(), filemtime(QODE_ROOT_DIR.'/assets/css/style_dynamic_responsive_ms_id_'. mixtape_qodef_get_multisite_blog_id() .'.css'));
            }
        }

        if(file_exists(QODE_ROOT_DIR.'/assets/css/style_dynamic.css') && mixtape_qodef_is_css_folder_writable() && !is_multisite()) {
            wp_enqueue_style('mixtape_qodef_style_dynamic', QODE_ASSETS_ROOT.'/css/style_dynamic.css', $style_dynamic_deps_array, filemtime(QODE_ROOT_DIR.'/assets/css/style_dynamic.css')); //it must be included after woocommerce styles so it can override it
        } else if(file_exists(QODE_ROOT_DIR.'/assets/css/style_dynamic_ms_id_'. mixtape_qodef_get_multisite_blog_id() .'.css') && mixtape_qodef_is_css_folder_writable() && is_multisite()) {
            wp_enqueue_style('mixtape_qodef_style_dynamic', QODE_ASSETS_ROOT.'/css/style_dynamic_ms_id_'. mixtape_qodef_get_multisite_blog_id() .'.css', $style_dynamic_deps_array, filemtime(QODE_ROOT_DIR.'/assets/css/style_dynamic_ms_id_'. mixtape_qodef_get_multisite_blog_id() .'.css')); //it must be included after woocommerce styles so it can override it
        }

        //include Visual Composer styles
        if(class_exists('WPBakeryVisualComposerAbstract')) {
            wp_enqueue_style('js_composer_front');
        }
    }

    add_action('wp_enqueue_scripts', 'mixtape_qodef_styles');
}

if(!function_exists('mixtape_qodef_google_fonts_styles')) {
	/**
	 * Function that includes google fonts defined anywhere in the theme
	 */
    function mixtape_qodef_google_fonts_styles() {
        $font_simple_field_array = mixtape_qodef_options()->getOptionsByType('fontsimple');
        if(!(is_array($font_simple_field_array) && count($font_simple_field_array) > 0)) {
            $font_simple_field_array = array();
        }

        $font_field_array = mixtape_qodef_options()->getOptionsByType('font');
        if(!(is_array($font_field_array) && count($font_field_array) > 0)) {
            $font_field_array = array();
        }

        $available_font_options = array_merge($font_simple_field_array, $font_field_array);
        $font_weight_str        = '100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic';

        //define available font options array
        $fonts_array = array();
        foreach($available_font_options as $font_option) {
            //is font set and not set to default and not empty?
            $font_option_value = mixtape_qodef_options()->getOptionValue($font_option);
            if(mixtape_qodef_is_font_option_valid($font_option_value) && !mixtape_qodef_is_native_font($font_option_value)) {
                $font_option_string = $font_option_value.':'.$font_weight_str;
                if(!in_array($font_option_string, $fonts_array)) {
                    $fonts_array[] = $font_option_string;
                }
            }
        }

        wp_reset_postdata();

        $fonts_array         = array_diff($fonts_array, array('-1:'.$font_weight_str));
        $google_fonts_string = implode('|', $fonts_array);

        //default fonts should be separated with %7C because of HTML validation
        $default_font_string = 'Poppins:'.$font_weight_str;
        $protocol = is_ssl() ? 'https:' : 'http:';

        //is google font option checked anywhere in theme?
        if (count($fonts_array) > 0) {

            //include all checked fonts
            $fonts_full_list = $default_font_string . '|' . str_replace('+', ' ', $google_fonts_string);
            $fonts_full_list_args = array(
                'family' => urlencode($fonts_full_list),
                'subset' => urlencode('latin,latin-ext'),
            );

            $mixtape_qodef_fonts = add_query_arg( $fonts_full_list_args, $protocol.'//fonts.googleapis.com/css' );
            wp_enqueue_style( 'mixtape_qodef_google_fonts', esc_url_raw($mixtape_qodef_fonts), array(), '1.0.0' );

        } else {
            //include default google font that theme is using
            $default_fonts_args = array(
                'family' => urlencode($default_font_string),
                'subset' => urlencode('latin,latin-ext'),
            );
            $mixtape_qodef_fonts = add_query_arg( $default_fonts_args, $protocol.'//fonts.googleapis.com/css' );
            wp_enqueue_style( 'mixtape_qodef_google_fonts', esc_url_raw($mixtape_qodef_fonts), array(), '1.0.0' );
        }

    }

	add_action('wp_enqueue_scripts', 'mixtape_qodef_google_fonts_styles');
}

if(!function_exists('mixtape_qodef_scripts')) {
    /**
     * Function that includes all necessary scripts
     */
    function mixtape_qodef_scripts() {
        global $wp_scripts;

        //init theme core scripts
		wp_enqueue_script( 'jquery-ui-core');
		wp_enqueue_script( 'jquery-ui-tabs');
		wp_enqueue_script( 'jquery-ui-accordion');
		wp_enqueue_script( 'wp-mediaelement');

        wp_enqueue_script('mixtape_qodef_third_party', QODE_ASSETS_ROOT.'/js/third-party.min.js', array('jquery'), false, true);
        wp_enqueue_script('isotope', QODE_ASSETS_ROOT.'/js/jquery.isotope.min.js', array('jquery'), false, true);

		if(mixtape_qodef_is_smoth_scroll_enabled()) {
			wp_enqueue_script("mixtape_qodef_smooth_page_scroll", QODE_ASSETS_ROOT . "/js/smoothPageScroll.js", array(), false, true);
		}

        //include google map api script
		if(mixtape_qodef_options()->getOptionValue('google_maps_api_key') != '') {
			$google_maps_api_key = mixtape_qodef_options()->getOptionValue('google_maps_api_key');
			wp_enqueue_script('google_map_api', '//maps.googleapis.com/maps/api/js?key=' . $google_maps_api_key, array(), false, true);
		} else {
			wp_enqueue_script('google_map_api', '//maps.googleapis.com/maps/api/js', array(), false, true);
		}

        wp_enqueue_script('mixtape_qodef_modules', QODE_ASSETS_ROOT.'/js/modules.min.js', array('jquery'), false, true);

        wp_enqueue_script('mixtape_qodef_blog', QODE_ASSETS_ROOT.'/js/blog.min.js', array('jquery'), false, true);

        //include comment reply script
        $wp_scripts->add_data('comment-reply', 'group', 1);
        if(is_singular() && comments_open() && get_option( 'thread_comments' )) {
            wp_enqueue_script("comment-reply");
        }

        //include Visual Composer script
        if(class_exists('WPBakeryVisualComposerAbstract')) {
            wp_enqueue_script('wpb_composer_front_js');
        }
    }

    add_action('wp_enqueue_scripts', 'mixtape_qodef_scripts');
}


if(!function_exists('mixtape_qodef_is_ajax_enabled')) {
    /**
     * Function that checks if ajax is enabled
     */
    function mixtape_qodef_is_ajax_enabled() {

		return false;
                
    }
}

if(!function_exists('mixtape_qodef_ajax_meta')) {
    /**
     * Function that echoes meta data for ajax
     *
     * @since 4.3
     * @version 0.2
     */
    function mixtape_qodef_ajax_meta() {

        ?>

        <div class="qodef-seo-title"><?php echo wp_get_document_title(); ?></div>

        <?php
    }

    add_action('mixtape_qodef_ajax_meta', 'mixtape_qodef_ajax_meta');
}


//defined content width variable
if (!isset( $content_width )) $content_width = 1060;

if(!function_exists('mixtape_qodef_theme_setup')) {
    /**
     * Function that adds various features to theme. Also defines image sizes that are used in a theme
     */
    function mixtape_qodef_theme_setup() {
        //add support for feed links
        add_theme_support('automatic-feed-links');

        //add support for post formats
        add_theme_support('post-formats', array('gallery', 'link', 'quote', 'video', 'audio'));

        //add theme support for post thumbnails
        add_theme_support('post-thumbnails');

        //add theme support for title tag
		add_theme_support('title-tag');

        //define thumbnail sizes
        add_image_size('mixtape_qodef_square', 550, 550, true);
        add_image_size('mixtape_qodef_landscape', 800, 600, true);
        add_image_size('mixtape_qodef_portrait', 600, 800, true);
        add_image_size('mixtape_qodef_large_width', 1000, 500, true);
        add_image_size('mixtape_qodef_large_height', 500, 1000, true);
        add_image_size('mixtape_qodef_large_width_height', 1000, 1000, true);

        load_theme_textdomain( 'mixtapewp', get_template_directory().'/languages' );
    }

    add_action('after_setup_theme', 'mixtape_qodef_theme_setup');
}


if(!function_exists('mixtape_qodef_rgba_color')) {
    /**
     * Function that generates rgba part of css color property
     *
     * @param $color string hex color
     * @param $transparency float transparency value between 0 and 1
     *
     * @return string generated rgba string
     */
    function mixtape_qodef_rgba_color($color, $transparency) {
        if($color !== '' && $transparency !== '') {
            $rgba_color = '';

            $rgb_color_array = mixtape_qodef_hex2rgb($color);
            $rgba_color .= 'rgba('.implode(', ', $rgb_color_array).', '.$transparency.')';

            return $rgba_color;
        }
    }
}

if(!function_exists('mixtape_qodef_header_meta')) {
    /**
     * Function that echoes meta data if our seo is enabled
     */
    function mixtape_qodef_header_meta() { ?>

        <meta charset="<?php bloginfo('charset'); ?>"/>
        <meta name="format-detection" content="telephone=no">
        <link rel="profile" href="http://gmpg.org/xfn/11"/>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>

    <?php }

    add_action('mixtape_qodef_header_meta', 'mixtape_qodef_header_meta');
}

if(!function_exists('mixtape_qodef_user_scalable_meta')) {
    /**
     * Function that outputs user scalable meta if responsiveness is turned on
     * Hooked to mixtape_qodef_header_meta action
     */
    function mixtape_qodef_user_scalable_meta() {
        //is responsiveness option is chosen?
        if(mixtape_qodef_is_responsive_on()) { ?>
            <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
        <?php } else { ?>
            <meta name="viewport" content="width=1200,user-scalable=yes">
        <?php }
    }

    add_action('mixtape_qodef_header_meta', 'mixtape_qodef_user_scalable_meta');
}

if(!function_exists('mixtape_qodef_get_page_id')) {
	/**
	 * Function that returns current page / post id.
	 * Checks if current page is woocommerce page and returns that id if it is.
	 * Checks if current page is any archive page (category, tag, date, author etc.) and returns -1 because that isn't
	 * page that is created in WP admin.
	 *
	 * @return int
	 *
	 * @version 0.1
	 *
	 * @see mixtape_qodef_is_woocommerce_installed()
	 * @see mixtape_qodef_is_woocommerce_shop()
	 */
	function mixtape_qodef_get_page_id() {
		if(mixtape_qodef_is_woocommerce_installed() && mixtape_qodef_is_woocommerce_shop()) {
			return mixtape_qodef_get_woo_shop_page_id();
		}

		if(is_archive() || is_search() || is_404() || (is_home() && is_front_page())) {
			return -1;
		}

		return get_queried_object_id();
	}
}


if(!function_exists('mixtape_qodef_is_default_wp_template')) {
    /**
     * Function that checks if current page archive page, search, 404 or default home blog page
     * @return bool
     *
     * @see is_archive()
     * @see is_search()
     * @see is_404()
     * @see is_front_page()
     * @see is_home()
     */
    function mixtape_qodef_is_default_wp_template() {
        return is_archive() || is_search() || is_404() || (is_front_page() && is_home());
    }
}

if(!function_exists('mixtape_qodef_get_page_template_name')) {
    /**
     * Returns current template file name without extension
     * @return string name of current template file
     */
    function mixtape_qodef_get_page_template_name() {
        $file_name = '';

        if(!mixtape_qodef_is_default_wp_template()) {
            $file_name_without_ext = preg_replace('/\\.[^.\\s]{3,4}$/', '', basename(get_page_template()));

            if($file_name_without_ext !== '') {
                $file_name = $file_name_without_ext;
            }
        }

        return $file_name;
    }
}

if(!function_exists('mixtape_qodef_has_shortcode')) {
    /**
     * Function that checks whether shortcode exists on current page / post
     *
     * @param string shortcode to find
     * @param string content to check. If isn't passed current post content will be used
     *
     * @return bool whether content has shortcode or not
     */
    function mixtape_qodef_has_shortcode($shortcode, $content = '') {
        $has_shortcode = false;

        if($shortcode) {
            //if content variable isn't past
            if($content == '') {
                //take content from current post
                $page_id = mixtape_qodef_get_page_id();
                if(!empty($page_id)) {
                    $current_post = get_post($page_id);

                    if(is_object($current_post) && property_exists($current_post, 'post_content')) {
                        $content = $current_post->post_content;
                    }
                }
            }

            //does content has shortcode added?
            if(stripos($content, '['.$shortcode) !== false) {
                $has_shortcode = true;
            }
        }

        return $has_shortcode;
    }
}

if(!function_exists('mixtape_qodef_rewrite_rules_on_theme_activation')) {
    /**
     * Function that flushes rewrite rules on deactivation
     */
    function mixtape_qodef_rewrite_rules_on_theme_activation() {
        flush_rewrite_rules();
    }

    add_action('after_switch_theme', 'mixtape_qodef_rewrite_rules_on_theme_activation');
}

if(!function_exists('mixtape_qodef_get_dynamic_sidebar')) {
    /**
     * Return Custom Widget Area content
     *
     * @return string
     */
    function mixtape_qodef_get_dynamic_sidebar($index = 1) {
        ob_start();
        dynamic_sidebar($index);
        $sidebar_contents = ob_get_clean();

        return $sidebar_contents;
    }
}

if(!function_exists('mixtape_qodef_get_sidebar')) {
    /**
     * Return Sidebar
     *
     * @return string
     */
    function mixtape_qodef_get_sidebar() {

        $id = mixtape_qodef_get_page_id();

        $sidebar = "sidebar";
        $custom_sidebars = mixtape_qodef_get_custom_sidebars();

        if (get_post_meta($id, 'qodef_custom_sidebar_meta', true) != '' && array_key_exists(get_post_meta($id, 'qodef_custom_sidebar_meta', true), $custom_sidebars)) {
            $sidebar = get_post_meta($id, 'qodef_custom_sidebar_meta', true);
        } else {
            if (is_single() && mixtape_qodef_options()->getOptionValue('blog_single_custom_sidebar') != '') {
                $sidebar = esc_attr(mixtape_qodef_options()->getOptionValue('blog_single_custom_sidebar'));
            } elseif ((is_archive() || (is_home() && is_front_page())) && mixtape_qodef_options()->getOptionValue('blog_custom_sidebar') != '') {
                $sidebar = esc_attr(mixtape_qodef_options()->getOptionValue('blog_custom_sidebar'));
            } elseif (is_page() && mixtape_qodef_options()->getOptionValue('page_custom_sidebar') != '') {
                $sidebar = esc_attr(mixtape_qodef_options()->getOptionValue('page_custom_sidebar'));
            }
        }

        return $sidebar;
    }
}



if( !function_exists('mixtape_qodef_sidebar_columns_class') ) {

    /**
     * Return classes for columns holder when sidebar is active
     *
     * @return array
     */

    function mixtape_qodef_sidebar_columns_class() {

        $sidebar_class = array();
        $sidebar_layout = mixtape_qodef_sidebar_layout();

        switch($sidebar_layout):
            case 'sidebar-33-right':
                $sidebar_class[] = 'qodef-two-columns-66-33';
                break;
            case 'sidebar-25-right':
                $sidebar_class[] = 'qodef-two-columns-75-25';
                break;
            case 'sidebar-33-left':
                $sidebar_class[] = 'qodef-two-columns-33-66';
                break;
            case 'sidebar-25-left':
                $sidebar_class[] = 'qodef-two-columns-25-75';
                break;

        endswitch;

        $sidebar_class[] = 'clearfix';

        return mixtape_qodef_class_attribute($sidebar_class);

    }

}


if( !function_exists('mixtape_qodef_sidebar_layout') ) {

    /**
     * Function that check is sidebar is enabled and return type of sidebar layout
     */

    function mixtape_qodef_sidebar_layout() {

        $sidebar_layout = '';
        $page_id        = mixtape_qodef_get_page_id();

        $page_sidebar_meta = get_post_meta($page_id, 'qodef_sidebar_meta', true);

        if(($page_sidebar_meta !== '') && $page_id !== -1) {
            if($page_sidebar_meta == 'no-sidebar') {
                $sidebar_layout = '';
            } else {
                $sidebar_layout = $page_sidebar_meta;
            }
        } else {
            if(is_single() && mixtape_qodef_options()->getOptionValue('blog_single_sidebar_layout')) {
                $sidebar_layout = esc_attr(mixtape_qodef_options()->getOptionValue('blog_single_sidebar_layout'));
            } elseif((is_archive() || (is_home() && is_front_page())) && mixtape_qodef_options()->getOptionValue('archive_sidebar_layout')) {
                $sidebar_layout = esc_attr(mixtape_qodef_options()->getOptionValue('archive_sidebar_layout'));
            } elseif(is_page() && mixtape_qodef_options()->getOptionValue('page_sidebar_layout')) {
                $sidebar_layout = esc_attr(mixtape_qodef_options()->getOptionValue('page_sidebar_layout'));
            }
        }

        return $sidebar_layout;

    }

}


if( !function_exists('mixtape_qodef_page_custom_style') ) {

    /**
     * Function that print custom page style
     */

    function mixtape_qodef_page_custom_style() {
       $style = '';
       $style = apply_filters('mixtape_qodef_add_page_custom_style', $style);

		if($style !== '') {
			wp_add_inline_style('mixtape_qodef_modules', $style);
		}
    }
	add_action('wp_enqueue_scripts', 'mixtape_qodef_page_custom_style');
}

if( !function_exists('mixtape_qodef_vc_custom_style') ) {

    /**
     * Function that print custom page style
     */

    function mixtape_qodef_vc_custom_style() {
        if(mixtape_qodef_visual_composer_installed()) {
            $id = mixtape_qodef_get_page_id();
            if(is_page() || is_single()) {

                $shortcodes_custom_css = get_post_meta( $id, '_wpb_shortcodes_custom_css', true );
                if ( ! empty( $shortcodes_custom_css ) ) {
                    echo '<style type="text/css" data-type="vc_shortcodes-custom-css-'.esc_attr($id).'">';
                    echo get_post_meta( $id, '_wpb_shortcodes_custom_css', true );
                    echo '</style>';
                }

                $post_custom_css = get_post_meta( $id, '_wpb_post_custom_css', true );
                if ( ! empty( $post_custom_css ) ) {
                    echo '<style type="text/css" data-type="vc_custom-css-'.esc_attr($id).'">';
                    echo get_post_meta( $id, '_wpb_post_custom_css', true );
                    echo '</style>';
                }
            }
        }
    }
    
}


if(!function_exists('mixtape_qodef_get_unique_page_class')) {
	/**
	 * Returns unique page class based on post type and page id
	 *
	 * @return string
	 */
	function mixtape_qodef_get_unique_page_class() {
		$id = mixtape_qodef_get_page_id();
		$page_class = '';

		if(is_single()) {
			$page_class = '.postid-'.$id;
		} elseif($id === mixtape_qodef_get_woo_shop_page_id()) {
			$page_class = '.archive';
		} else {
			$page_class .= '.page-id-'.$id;
		}

		return $page_class;
	}
}

if( !function_exists('mixtape_qodef_container_style') ) {

    /**
     * Function that return container style
     */

    function mixtape_qodef_container_style($style) {
        $id = mixtape_qodef_get_page_id();
        $class_prefix = mixtape_qodef_get_unique_page_class();

        $container_selector = array(
            $class_prefix.' .qodef-content .qodef-content-inner > .qodef-container',
            $class_prefix.' .qodef-content .qodef-content-inner > .qodef-full-width',
            $class_prefix.' .qodef-slider',
        );

        $container_class = array();
        $page_background_color = get_post_meta($id, "qodef_page_background_color_meta", true);

        if($page_background_color){
            $container_class['background-color'] = $page_background_color;
        }

        $current_style = mixtape_qodef_dynamic_css($container_selector, $container_class);
		$current_style = $current_style . $style;

        return $current_style;

    }
    add_filter('mixtape_qodef_add_page_custom_style', 'mixtape_qodef_container_style');
}

if( !function_exists('mixtape_qodef_page_background_image') ) {

    /**
     * Function that return container style
     */

    function mixtape_qodef_page_background_image($style) {
        $id = mixtape_qodef_get_page_id();
        $class_prefix = mixtape_qodef_get_unique_page_class();

        $container_selector = array(
            $class_prefix.' .qodef-content .qodef-content-inner > .qodef-container',
            $class_prefix.' .qodef-content .qodef-content-inner > .qodef-full-width'
        );

        $container_class = array();
        $page_background_image		= get_post_meta($id, "qodef_page_background_image_meta", true);
        $page_background_image_repeat		= get_post_meta($id, "qodef_page_background_image_repeat_meta", true);
        $page_background_image_position	= get_post_meta($id, "qodef_page_background_image_vertical_position_meta", true);
        $page_background_image_size	= get_post_meta($id, "qodef_page_background_image_size_meta", true);

        if($page_background_image){
            $container_class['background-image'] = 'url(' . $page_background_image . ')';

			if($page_background_image_repeat === 'yes') {
				$container_class['background-repeat'] = 'repeat';
			} else {
				$container_class['background-repeat'] = 'no-repeat';
			}

			if($page_background_image_size === 'cover') {
				$container_class['background-size'] = 'cover';
			} else {
				$container_class['background-size'] = 'contain';
			}

			if($page_background_image_position === 'top') {
				$container_class['background-position'] = 'top center';
			} elseif($page_background_image_position === 'bottom') {
				$container_class['background-position'] = 'bottom center';
			} else {
				$container_class['background-position'] = 'center center';
			}

        }

        $current_style = mixtape_qodef_dynamic_css($container_selector, $container_class);
		$current_style = $current_style . $style;

        return $current_style;

    }
    add_filter('mixtape_qodef_add_page_custom_style', 'mixtape_qodef_page_background_image');
}

if( !function_exists('mixtape_qodef_page_first_color') ) {

	/**
	 * Function that return container style
	 */

	function mixtape_qodef_page_first_color($style) {
		$id = mixtape_qodef_get_page_id();
		$first_color_selectors = mixtape_qodef_first_color_array();
		$prefix = mixtape_qodef_get_unique_page_class();
		$default_link_colors = array(
			$prefix . ' h1 a',
			$prefix . ' h2 a',
			$prefix . ' h3 a',
			$prefix . ' h4 a',
			$prefix . ' h5 a',
			$prefix . ' h6 a'
		);
		$current_style = '';

		$page_first_color = get_post_meta($id, "qodef_first_color_meta", true);
		if(!empty($page_first_color)){

			$color_selector = array_map('mixtape_qodef_add_prefix_to_first_color_selectors', $first_color_selectors['color']);
			$color_important_selector = array_map('mixtape_qodef_add_prefix_to_first_color_selectors', $first_color_selectors['color_important']);
			$background_color_selector = array_map('mixtape_qodef_add_prefix_to_first_color_selectors', $first_color_selectors['background_color']);
			$background_color_important_selector = array_map('mixtape_qodef_add_prefix_to_first_color_selectors', $first_color_selectors['background_color_important']);
			$border_color_selector = array_map('mixtape_qodef_add_prefix_to_first_color_selectors', $first_color_selectors['border']);
			$border_color_important_selector =array_map('mixtape_qodef_add_prefix_to_first_color_selectors', $first_color_selectors['border_important']);

			$color_style['color'] = $page_first_color;
			$default_link_color['color'] = 'inherit';
			$color_important_style['color'] = $page_first_color .'!important';
			$color_background_style['background-color'] = $page_first_color;
			$color_background_important_style['background-color'] = $page_first_color .'!important';
			$color_border_style['border-color'] = $page_first_color;
			$color_border_important_style['border-color'] = $page_first_color .'!important';

			$current_style .= mixtape_qodef_dynamic_css($color_selector, $color_style);
			$current_style .= mixtape_qodef_dynamic_css($color_important_selector, $color_important_style);
			$current_style .= mixtape_qodef_dynamic_css($background_color_selector, $color_background_style);
			$current_style .= mixtape_qodef_dynamic_css($background_color_important_selector, $color_background_important_style);
			$current_style .= mixtape_qodef_dynamic_css($border_color_selector, $color_border_style);
			$current_style .= mixtape_qodef_dynamic_css($border_color_important_selector, $color_border_important_style);
			$current_style .= mixtape_qodef_dynamic_css($default_link_colors, $default_link_color);

		}

		$current_style = $current_style . $style;

		return $current_style;

	}
	add_filter('mixtape_qodef_add_page_custom_style', 'mixtape_qodef_page_first_color');
}

if( !function_exists('mixtape_qodef_page_padding') ) {

    /**
     * Function that return container style
     */

    function mixtape_qodef_page_padding( $style ) {
		
		$id = mixtape_qodef_get_page_id();
		$class_prefix = mixtape_qodef_get_unique_page_class();


        $page_selector = array(
			$class_prefix . ' .qodef-content .qodef-content-inner > .qodef-container > .qodef-container-inner',
			$class_prefix . ' .qodef-content .qodef-content-inner > .qodef-full-width > .qodef-full-width-inner'
        );
        $page_css = array();

        $page_padding = get_post_meta($id, 'qodef_page_padding_meta', true);

        if($page_padding !== ''){
            $page_css['padding'] = $page_padding;
        }

        $current_style = mixtape_qodef_dynamic_css($page_selector, $page_css);

		$current_style = $current_style . $style;

        return $current_style;

    }
    add_filter('mixtape_qodef_add_page_custom_style', 'mixtape_qodef_page_padding');
}

if( !function_exists('mixtape_qodef_page_boxed_style') ) {

	/**
	 * Function that return container style
	 */

	function mixtape_qodef_page_boxed_style( $style ) {

		$id = mixtape_qodef_get_page_id();
		$class_prefix = mixtape_qodef_get_unique_page_class();

		$page_selector = array(
			$class_prefix . '.qodef-boxed .qodef-wrapper'
		);
		$page_css = array();

		$page_background_color 				= get_post_meta($id, 'qodef_page_background_color_in_box_meta', true);
		$page_background_image				= get_post_meta($id, 'qodef_boxed_background_image_meta', true);
		$page_background_image_repeating	= get_post_meta($id, 'qodef_boxed_background_image_repeating_meta', true);

		if($page_background_color !== ''){
			$page_css['background-color'] = $page_background_color;
		}
		if($page_background_image !== '' && $page_background_image_repeating != ''){
			$page_css['background-image'] = 'url(' .$page_background_image . ')';
			$page_css['background-repeat'] = $page_background_image_repeating;

			if($page_background_image_repeating == 'no') {
				$page_css['background-position']	= 'center 0';
				$page_css['background-repeat'] 		= 'no-repeat';
			} else {
				$page_css['background-position'] 	= '0 0';
				$page_css['background-repeat'] 		= 'repeat';
			}
		}

		$current_style = mixtape_qodef_dynamic_css($page_selector, $page_css);

		$current_style = $current_style . $style;

		return $current_style;

	}
	add_filter('mixtape_qodef_add_page_custom_style', 'mixtape_qodef_page_boxed_style');
}

if(!function_exists('mixtape_qodef_print_custom_css')) {
    /**
     * Prints out custom css from theme options
     */
    function mixtape_qodef_print_custom_css() {
        $custom_css = mixtape_qodef_options()->getOptionValue('custom_css');

        if($custom_css !== '') {
            wp_add_inline_style( 'mixtape_qodef_modules', $custom_css);
        }
    }

    add_action('wp_enqueue_scripts', 'mixtape_qodef_print_custom_css');
}

if(!function_exists('mixtape_qodef_print_custom_js')) {
    /**
     * Prints out custom css from theme options
     */
    function mixtape_qodef_print_custom_js() {
        $custom_js = mixtape_qodef_options()->getOptionValue('custom_js');

        if($custom_js !== '') {
			wp_add_inline_script('mixtape_qodef_modules', $custom_js);
        }

    }

	add_action('wp_enqueue_scripts', 'mixtape_qodef_print_custom_js');
}


if(!function_exists('mixtape_qodef_get_global_variables')) {
    /**
     * Function that generates global variables and put them in array so they could be used in the theme
     */
    function mixtape_qodef_get_global_variables() {

        $global_variables = array();
        $element_appear_amount = -150;

        $global_variables['qodefAddForAdminBar'] = is_admin_bar_showing() ? 32 : 0;
        $global_variables['qodefElementAppearAmount'] = mixtape_qodef_options()->getOptionValue('element_appear_amount') !== '' ? mixtape_qodef_options()->getOptionValue('element_appear_amount') : $element_appear_amount;
        $global_variables['qodefFinishedMessage'] = esc_html__('No more posts', 'mixtapewp');
        $global_variables['qodefMessage'] = esc_html__('Loading new posts...', 'mixtapewp');
        $global_variables['qodefAddingToCart'] = esc_html__('Adding to cart...', 'mixtapewp');

        $global_variables = apply_filters('mixtape_qodef_js_global_variables', $global_variables);

        wp_localize_script('mixtape_qodef_modules', 'qodefGlobalVars', array(
            'vars' => $global_variables
        ));

    }

    add_action('wp_enqueue_scripts', 'mixtape_qodef_get_global_variables');
}

if(!function_exists('mixtape_qodef_per_page_js_variables')) {
	/**
	 * Outputs global JS variable that holds page settings
	 */
	function mixtape_qodef_per_page_js_variables() {
        $per_page_js_vars = apply_filters('mixtape_qodef_per_page_js_vars', array());

        wp_localize_script('mixtape_qodef_modules', 'qodefPerPageVars', array(
            'vars' => $per_page_js_vars
        ));
    }

    add_action('wp_enqueue_scripts', 'mixtape_qodef_per_page_js_variables');
}

if(!function_exists('mixtape_qodef_content_elem_style_attr')) {
    /**
     * Defines filter for adding custom styles to content HTML element
     */
    function mixtape_qodef_content_elem_style_attr() {
        $styles = apply_filters('mixtape_qodef_content_elem_style_attr', array());

        mixtape_qodef_inline_style($styles);
    }
}

if(!function_exists('mixtape_qodef_is_woocommerce_installed')) {
    /**
     * Function that checks if woocommerce is installed
     * @return bool
     */
    function mixtape_qodef_is_woocommerce_installed() {
        return function_exists('is_woocommerce');
    }
}

if (!function_exists('mixtape_qodef_core_plugin_installed')) {
	//is Select Core installed?
	function mixtape_qodef_core_plugin_installed() {
		return defined('QODE_CORE_VERSION');
	}
}

if(!function_exists('mixtape_qodef_visual_composer_installed')) {
    /**
     * Function that checks if visual composer installed
     * @return bool
     */
    function mixtape_qodef_visual_composer_installed() {
        //is Visual Composer installed?
        if(class_exists('WPBakeryVisualComposerAbstract')) {
            return true;
        }

        return false;
    }
}

if(!function_exists('mixtape_qodef_contact_form_7_installed')) {
    /**
     * Function that checks if contact form 7 installed
     * @return bool
     */
    function mixtape_qodef_contact_form_7_installed() {
        //is Contact Form 7 installed?
        if(defined('WPCF7_VERSION')) {
            return true;
        }

        return false;
    }
}

if(!function_exists('mixtape_qodef_is_bandsintown_installed')) {
    /**
     * Function that checks if bandsintown installed
     * @return bool
     */
    function mixtape_qodef_is_bandsintown_installed() {
        //is Bandsintown installed?
        if(class_exists('Bandsintown_JS_Plugin')) {
            return true;
        }

        return false;
    }
}

if(!function_exists('mixtape_qodef_is_wpml_installed')) {
    /**
     * Function that checks if WPML plugin is installed
     * @return bool
     *
     * @version 0.1
     */
    function mixtape_qodef_is_wpml_installed() {
        return defined('ICL_SITEPRESS_VERSION');
    }
}

if(!function_exists('mixtape_qodef_max_image_width_srcset')) {
	/**
	 * Set max width for srcset to 1920
	 *
	 * @return int
	 */
	function mixtape_qodef_max_image_width_srcset() {
        return 1920;
    }

	add_filter('max_srcset_image_width', 'mixtape_qodef_max_image_width_srcset');
}

if(!function_exists('mixtape_qodef_add_grid_lines')) {
	/**
	 * Set max width for srcset to 1920
	 *
	 * @return html
	 */
	function mixtape_qodef_add_grid_lines() {
	    $id = mixtape_qodef_get_page_id();
        $number_of_lines = mixtape_qodef_get_meta_field_intersect('content_grid_lines',$id);

	    $html = '';
	    if($number_of_lines !== 'none'){
			$html .= '<div class="qodef-grid-lines-holder qodef-grid-columns-' . esc_html($number_of_lines) . '">';
			for ($i = 1; $i <= $number_of_lines; $i++) {
				$html .= '<div class="qodef-grid-line qodef-grid-column-' . $i . '"></div>';
			}
			$html .= '</div>';
		}

        print $html;
	}

	add_filter('mixtape_qodef_after_container_inner_open', 'mixtape_qodef_add_grid_lines');
}
