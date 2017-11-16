<?php

require_once QODE_FRAMEWORK_ROOT_DIR."/lib/qodef.kses.php";
require_once QODE_FRAMEWORK_ROOT_DIR."/lib/qodef.layout-part1.php";
require_once QODE_FRAMEWORK_ROOT_DIR."/lib/qodef.layout-part2.php";
require_once QODE_FRAMEWORK_ROOT_DIR."/lib/qodef.layout-part3.php";
require_once QODE_FRAMEWORK_ROOT_DIR."/lib/qodef.optionsapi.php";
require_once QODE_FRAMEWORK_ROOT_DIR."/lib/qodef.framework.php";
require_once QODE_FRAMEWORK_ROOT_DIR."/lib/qodef.functions.php";
require_once QODE_FRAMEWORK_ROOT_DIR."/lib/qodef.common.php";
require_once QODE_FRAMEWORK_ROOT_DIR."/lib/qodef.icons/qodef.icons.php";
require_once QODE_FRAMEWORK_ROOT_DIR."/admin/options/qodef-options-setup.php";
require_once QODE_FRAMEWORK_ROOT_DIR."/admin/meta-boxes/qodef-meta-boxes-setup.php";
require_once QODE_FRAMEWORK_ROOT_DIR."/modules/qodef-modules-loader.php";

if(!function_exists('mixtape_qodef_admin_scripts_init')) {
	/**
	 * Function that registers all scripts that are necessary for our back-end
	 */
	function mixtape_qodef_admin_scripts_init() {

        /**
         * @see QodeSkinAbstract::registerScripts - hooked with 10
         * @see QodeSkinAbstract::registerStyles - hooked with 10
         */
        do_action('mixtape_qodef_admin_scripts_init');
	}

	add_action('admin_init', 'mixtape_qodef_admin_scripts_init');
}

if(!function_exists('mixtape_qodef_enqueue_admin_styles')) {
	/**
	 * Function that enqueues styles for options page
	 */
	function mixtape_qodef_enqueue_admin_styles() {
		wp_enqueue_style('wp-color-picker');

        /**
         * @see QodeSkinAbstract::enqueueStyles - hooked with 10
         */
        do_action('mixtape_qodef_enqueue_admin_styles');
	}
}

if(!function_exists('mixtape_qodef_enqueue_admin_scripts')) {
	/**
	 * Function that enqueues styles for options page
	 */
	function mixtape_qodef_enqueue_admin_scripts() {
		wp_enqueue_script('wp-color-picker');
		wp_enqueue_script('jquery-ui-datepicker');
		wp_enqueue_script('jquery-ui-accordion');
		wp_enqueue_script('common');
		wp_enqueue_script('wp-lists');
		wp_enqueue_script('postbox');
		wp_enqueue_media();
		wp_enqueue_script("qodef-dependence", get_template_directory_uri().'/framework/admin/assets/js/qodef-ui/qodef-dependence.js', array(), false, true);
        wp_enqueue_script("qodef-twitter-connect", get_template_directory_uri().'/framework/admin/assets/js/qodef-twitter-connect.js', array(), false, true);

        /**
         * @see QodeSkinAbstract::enqueueScripts - hooked with 10
         */
        do_action('mixtape_qodef_enqueue_admin_scripts');
	}
}

if(!function_exists('mixtape_qodef_enqueue_meta_box_styles')) {
	/**
	 * Function that enqueues styles for meta boxes
	 */
	function mixtape_qodef_enqueue_meta_box_styles() {
		global $post;

		wp_enqueue_style( 'wp-color-picker' );

		if($post->post_type == 'event' || $post->post_type == 'album'){
			wp_enqueue_style("qodef-jquery-ui", get_template_directory_uri().'/framework/admin/assets/css/jquery-ui/jquery-ui.css');
		}

        /**
         * @see QodeSkinAbstract::enqueueStyles - hooked with 10
         */
        do_action('mixtape_qodef_enqueue_meta_box_styles');
	}
}

if(!function_exists('mixtape_qodef_enqueue_meta_box_scripts')) {
	/**
	 * Function that enqueues scripts for meta boxes
	 */
	function mixtape_qodef_enqueue_meta_box_scripts() {
		wp_enqueue_script('wp-color-picker');
		wp_enqueue_script('jquery-ui-datepicker');
		wp_enqueue_script('jquery-ui-accordion');
		wp_enqueue_script('common');
		wp_enqueue_script('wp-lists');
		wp_enqueue_script('postbox');
		wp_enqueue_media();
		wp_enqueue_script('qodef-dependence');

        /**
         * @see QodeSkinAbstract::enqueueScripts - hooked with 10
         */
        do_action('mixtape_qodef_enqueue_meta_box_scripts');
	}
}

if(!function_exists('mixtape_qodef_enqueue_nav_menu_script')) {
	/**
	 * Function that enqueues styles and scripts necessary for menu administration page.
	 * It checks $hook variable
	 * @param $hook string current page hook to check
	 */
	function mixtape_qodef_enqueue_nav_menu_script($hook) {
		if($hook == 'nav-menus.php') {
			wp_enqueue_script('qodef-nav-menu', get_template_directory_uri().'/framework/admin/assets/js/qodef-nav-menu.js');
			wp_enqueue_style('qodef-nav-menu', get_template_directory_uri().'/framework/admin/assets/css/qodef-nav-menu.css');
		}
	}

	add_action('admin_enqueue_scripts', 'mixtape_qodef_enqueue_nav_menu_script');
}


if(!function_exists('mixtape_qodef_enqueue_widgets_admin_script')) {
	/**
	 * Function that enqueues styles and scripts for admin widgets page.
	 * @param $hook string current page hook to check
	 */
	function mixtape_qodef_enqueue_widgets_admin_script($hook) {
		if($hook == 'widgets.php') {
			wp_enqueue_script('qodef-dependence');
		}
	}

	add_action('admin_enqueue_scripts', 'mixtape_qodef_enqueue_widgets_admin_script');
}


if(!function_exists('mixtape_qodef_enqueue_styles_slider_taxonomy')) {
	/**
	 * Enqueue styles when on slider taxonomy page in admin
	 */
	function mixtape_qodef_enqueue_styles_slider_taxonomy() {
		if(isset($_GET['taxonomy']) && $_GET['taxonomy'] == 'slides_category') {
			mixtape_qodef_enqueue_admin_styles();
		}
	}

	add_action('admin_print_scripts-edit-tags.php', 'mixtape_qodef_enqueue_styles_slider_taxonomy');
}

if(!function_exists('mixtape_qodef_init_theme_options_array')) {
	/**
	 * Function that merges $mixtape_qodef_options and default options array into one array.
	 *
	 * @see array_merge()
	 */
	function mixtape_qodef_init_theme_options_array() {
        global $mixtape_qodef_options, $mixtape_qodef_Framework;

		$db_options = get_option('qodef_options_mixtape');

		//does qodef_options exists in db?
		if(is_array($db_options)) {
			//merge with default options
			$mixtape_qodef_options  = array_merge($mixtape_qodef_Framework->qodefOptions->options, get_option('qodef_options_mixtape'));
		} else {
			//options don't exists in db, take default ones
			$mixtape_qodef_options = $mixtape_qodef_Framework->qodefOptions->options;
		}
	}

	add_action('mixtape_qodef_after_options_map', 'mixtape_qodef_init_theme_options_array', 0);
}

if(!function_exists('mixtape_qodef_init_theme_options')) {
	/**
	 * Function that sets $mixtape_qodef_options variable if it does'nt exists
	 */
	function mixtape_qodef_init_theme_options() {
		global $mixtape_qodef_options;
		global $mixtape_qodef_Framework;
		if(isset($mixtape_qodef_options['reset_to_defaults'])) {
			if( $mixtape_qodef_options['reset_to_defaults'] == 'yes' ) delete_option( "qodef_options_mixtape");
		}

		if (!get_option("qodef_options_mixtape")) {
			add_option( "qodef_options_mixtape",
				$mixtape_qodef_Framework->qodefOptions->options
			);

			$mixtape_qodef_options = $mixtape_qodef_Framework->qodefOptions->options;
		}
	}
}

if(!function_exists('mixtape_qodef_register_theme_settings')) {
	/**
	 * Function that registers setting that will be used to store theme options
	 */
	function mixtape_qodef_register_theme_settings() {
		register_setting( 'mixtape_qodef_theme_menu', 'qodef_options' );
	}

	add_action('admin_init', 'mixtape_qodef_register_theme_settings');
}

if(!function_exists('mixtape_qodef_get_admin_tab')) {
	/**
	 * Helper function that returns current tab from url.
	 * @return null
	 */
	function mixtape_qodef_get_admin_tab(){
		return isset($_GET['page']) ? mixtape_qodef_strafter($_GET['page'],'tab') : NULL;
	}
}

if(!function_exists('mixtape_qodef_strafter')) {
	/**
	 * Function that returns string that comes after found string
	 * @param $string string where to search
	 * @param $substring string what to search for
	 * @return null|string string that comes after found string
	 */
	function mixtape_qodef_strafter($string, $substring) {
		$pos = strpos($string, $substring);
		if ($pos === false) {
			return NULL;
		}

		return(substr($string, $pos+strlen($substring)));
	}
}

if(!function_exists('mixtape_qodef_save_options')) {
	/**
	 * Function that saves theme options to db.
	 * It hooks to ajax wp_ajax_qodef_save_options action.
	 */
	function mixtape_qodef_save_options() {
		global $mixtape_qodef_options;
		if(current_user_can('administrator')) {
			$_REQUEST = stripslashes_deep($_REQUEST);

			unset($_REQUEST['action']);

			$mixtape_qodef_options = array_merge($mixtape_qodef_options, $_REQUEST);

			update_option('qodef_options_mixtape', $mixtape_qodef_options);

			do_action('mixtape_qodef_after_theme_option_save');
			echo "Saved";
		}
		die();
	}

	add_action('wp_ajax_mixtape_qodef_save_options', 'mixtape_qodef_save_options');
}

if(!function_exists('mixtape_qodef_meta_box_add')) {
	/**
	 * Function that adds all defined meta boxes.
	 * It loops through array of created meta boxes and adds them
	 */
	function mixtape_qodef_meta_box_add() {
		global $mixtape_qodef_Framework;


		foreach ($mixtape_qodef_Framework->qodefMetaBoxes->metaBoxes as $key=>$box ) {
			$hidden = false;
			if (!empty($box->hidden_property)) {
				foreach ($box->hidden_values as $value) {
					if (mixtape_qodef_option_get_value($box->hidden_property)==$value)
						$hidden = true;

				}
			}

			if(is_string($box->scope)) {
				$box->scope = array($box->scope);
			}

			if(is_array($box->scope) && count($box->scope)) {
				foreach($box->scope as $screen) {
					add_meta_box(
						'qodef-meta-box-'.$key,
						$box->title,
                        'mixtape_qodef_render_meta_box',
						$screen,
						'advanced',
						'high',
						array( 'box' => $box)
					);

					if ($hidden) {
						add_filter( 'postbox_classes_'.$screen.'_qodef-meta-box-'.$key, 'mixtape_qodef_meta_box_add_hidden_class');
					}
				}
			}

		}

		add_action('admin_enqueue_scripts', 'mixtape_qodef_enqueue_meta_box_styles');
		add_action('admin_enqueue_scripts', 'mixtape_qodef_enqueue_meta_box_scripts');
	}

	add_action('add_meta_boxes', 'mixtape_qodef_meta_box_add');
}

if(!function_exists('mixtape_qodef_meta_box_save')) {
	/**
	 * Function that saves meta box to postmeta table
	 * @param $post_id int id of post that meta box is being saved
	 * @param $post WP_Post current post object
	 */
	function mixtape_qodef_meta_box_save( $post_id, $post ) {
		global $mixtape_qodef_Framework;
		global $mixtape_qodef_IconCollections;

		$nonces_array = array();
		$meta_boxes = mixtape_qodef_framework()->qodefMetaBoxes->getMetaBoxesByScope($post->post_type);

		if(is_array($meta_boxes) && count($meta_boxes)) {
			foreach($meta_boxes as $meta_box) {
				$nonces_array[] = 'qodef_themename_meta_box_'.$meta_box->name.'_save';
			}
		}

		if(is_array($nonces_array) && count($nonces_array)) {
			foreach($nonces_array as $nonce) {
				if(!isset($_POST[$nonce]) || !wp_verify_nonce($_POST[$nonce], $nonce)) {
					return;
				}
			}
		}

		$postTypes = array( "page", "post", "testimonials", "slides", "carousels", "product", "event", "album");

		if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return;
		}

		if (!isset( $_POST[ '_wpnonce' ])) {
			return;
		}

		if (!current_user_can('edit_post', $post_id)) {
			return;
		}

		if (!in_array($post->post_type, $postTypes)) {
			return;
		}

		foreach ($mixtape_qodef_Framework->qodefMetaBoxes->options as $key=>$box ) {

			if (isset($_POST[$key]) && trim($_POST[$key] !== '')) {

				$value = $_POST[$key];

				update_post_meta( $post_id, $key, $value );
			} else {
				delete_post_meta( $post_id, $key );
			}
		}

		$portfolios = false;
		if (isset($_POST['optionLabel'])) {
			foreach ($_POST['optionLabel'] as $key => $value) {
				$portfolios_val[$key] = array('optionLabel'=>$value,'optionValue'=>$_POST['optionValue'][$key],'optionUrl'=>$_POST['optionUrl'][$key],'optionlabelordernumber'=>$_POST['optionlabelordernumber'][$key]);
				$portfolios = true;

			}
		}

		if ($portfolios) {
			update_post_meta( $post_id,  'qodef_portfolios', $portfolios_val );
		} else {
			delete_post_meta( $post_id, 'qodef_portfolios' );
		}

		$portfolio_images = false;
		if (isset($_POST['portfolioimg'])) {
			foreach ($_POST['portfolioimg'] as $key => $value) {
				$portfolio_images_val[$key] = array('portfolioimg'=>$_POST['portfolioimg'][$key],'portfoliotitle'=>$_POST['portfoliotitle'][$key],'portfolioimgordernumber'=>$_POST['portfolioimgordernumber'][$key], 'portfoliovideotype'=>$_POST['portfoliovideotype'][$key], 'portfoliovideoid'=>$_POST['portfoliovideoid'][$key], 'portfoliovideoimage'=>$_POST['portfoliovideoimage'][$key], 'portfoliovideowebm'=>$_POST['portfoliovideowebm'][$key], 'portfoliovideomp4'=>$_POST['portfoliovideomp4'][$key], 'portfoliovideoogv'=>$_POST['portfoliovideoogv'][$key], 'portfolioimgtype'=>$_POST['portfolioimgtype'][$key] );
				$portfolio_images = true;
			}
		}


		if ($portfolio_images) {
			update_post_meta( $post_id,  'qodef_portfolio_images', $portfolio_images_val );
		} else {
			delete_post_meta( $post_id,  'qodef_portfolio_images' );
		}

		$slide_elements = false;
		if (isset($_POST['slideelementtype'])) {
			foreach ($_POST['slideelementtype'] as $key => $value) {
				$slide_elements_val[$key] = array(
					'slideelementtype'=>$value,
					'slideelementname'=>$_POST['slideelementname'][$key],
					'slideelementzindex'=>$_POST['slideelementzindex'][$key],
					'slideelementpivot'=>$_POST['slideelementpivot'][$key],
					'slideelementvisible'=>$_POST['slideelementvisible'][$key],
					'slideelementmargintop'=>$_POST['slideelementmargintop'][$key],
					'slideelementmarginbottom'=>$_POST['slideelementmarginbottom'][$key],
					'slideelementmarginleft'=>$_POST['slideelementmarginleft'][$key],
					'slideelementmarginright'=>$_POST['slideelementmarginright'][$key],

					'slideelementtext'=>$_POST['slideelementtext'][$key],
					'slideelementtextoptions'=>$_POST['slideelementtextoptions'][$key],
					'slideelementtextlink'=>$_POST['slideelementtextlink'][$key],
					'slideelementtexttarget'=>$_POST['slideelementtexttarget'][$key],
					'slideelementtextlinkhovercolor'=>$_POST['slideelementtextlinkhovercolor'][$key],
					'slideelementtextwidth'=>$_POST['slideelementtextwidth'][$key],
					'slideelementtextheight'=>$_POST['slideelementtextheight'][$key],
					'slideelementtextleft'=>$_POST['slideelementtextleft'][$key],
					'slideelementtexttop'=>$_POST['slideelementtexttop'][$key],
					'slideelementtextstyle'=>$_POST['slideelementtextstyle'][$key],
					'slideelementfontcolor'=>$_POST['slideelementfontcolor'][$key],
					'slideelementfontsize'=>$_POST['slideelementfontsize'][$key],
					'slideelementlineheight'=>$_POST['slideelementlineheight'][$key],
					'slideelementletterspacing'=>$_POST['slideelementletterspacing'][$key],
					'slideelementfontfamily'=>$_POST['slideelementfontfamily'][$key],
					'slideelementfontstyle'=>$_POST['slideelementfontstyle'][$key],
					'slideelementfontweight'=>$_POST['slideelementfontweight'][$key],
					'slideelementtexttransform'=>$_POST['slideelementtexttransform'][$key],
					'slideelementtextbgndcolor'=>$_POST['slideelementtextbgndcolor'][$key],
					'slideelementtextbgndtransparency'=>$_POST['slideelementtextbgndtransparency'][$key],
					'slideelementtextborderthickness'=>$_POST['slideelementtextborderthickness'][$key],
					'slideelementtextborderstyle'=>$_POST['slideelementtextborderstyle'][$key],
					'slideelementtextbordercolor'=>$_POST['slideelementtextbordercolor'][$key],

					'slideelementimageurl'=>$_POST['slideelementimageurl'][$key],
					'slideelementimageuploadheight'=>$_POST['slideelementimageuploadheight'][$key],
					'slideelementimageuploadwidth'=>$_POST['slideelementimageuploadwidth'][$key],
					'slideelementimagewidth'=>$_POST['slideelementimagewidth'][$key],
					'slideelementimageheight'=>$_POST['slideelementimageheight'][$key],
					'slideelementimageleft'=>$_POST['slideelementimageleft'][$key],
					'slideelementimagetop'=>$_POST['slideelementimagetop'][$key],
					'slideelementimagelink'=>$_POST['slideelementimagelink'][$key],
					'slideelementimagetarget'=>$_POST['slideelementimagetarget'][$key],
					'slideelementimageborderthickness'=>$_POST['slideelementimageborderthickness'][$key],
					'slideelementimageborderstyle'=>$_POST['slideelementimageborderstyle'][$key],
					'slideelementimagebordercolor'=>$_POST['slideelementimagebordercolor'][$key],

					'slideelementbuttontext'=>$_POST['slideelementbuttontext'][$key],
					'slideelementbuttonlink'=>$_POST['slideelementbuttonlink'][$key],
					'slideelementbuttontarget'=>$_POST['slideelementbuttontarget'][$key],
					'slideelementbuttontop'=>$_POST['slideelementbuttontop'][$key],
					'slideelementbuttonleft'=>$_POST['slideelementbuttonleft'][$key],
					'slideelementbuttonsize'=>$_POST['slideelementbuttonsize'][$key],
					'slideelementbuttontype'=>$_POST['slideelementbuttontype'][$key],
					'slideelementbuttoninline'=>$_POST['slideelementbuttoninline'][$key],
					'slideelementbuttonfontsize'=>$_POST['slideelementbuttonfontsize'][$key],
					'slideelementbuttonfontweight'=>$_POST['slideelementbuttonfontweight'][$key],
					'slideelementbuttonfontcolor'=>$_POST['slideelementbuttonfontcolor'][$key],
					'slideelementbuttonfonthovercolor'=>$_POST['slideelementbuttonfonthovercolor'][$key],
					'slideelementbuttonbgndcolor'=>$_POST['slideelementbuttonbgndcolor'][$key],
					'slideelementbuttonbgndhovercolor'=>$_POST['slideelementbuttonbgndhovercolor'][$key],
					'slideelementbuttonbordercolor'=>$_POST['slideelementbuttonbordercolor'][$key],
					'slideelementbuttonborderhovercolor'=>$_POST['slideelementbuttonborderhovercolor'][$key],
					'slideelementbuttoniconpack'=>$_POST['slideelementbuttoniconpack'][$key],

					'slideelementsectionlinkanchor'=>$_POST['slideelementsectionlinkanchor'][$key],
					'slideelementsectionlinktext'=>$_POST['slideelementsectionlinktext'][$key],

					'slideelementanimation'=>$_POST['slideelementanimation'][$key],
					'slideelementanimationdelay'=>$_POST['slideelementanimationdelay'][$key],
					'slideelementanimationduration'=>$_POST['slideelementanimationduration'][$key],
					'slideelementresponsive'=>$_POST['slideelementresponsive'][$key],
					'slideelementscalemobile'=>$_POST['slideelementscalemobile'][$key],
					'slideelementscaletabletp'=>$_POST['slideelementscaletabletp'][$key],
					'slideelementscaletabletl'=>$_POST['slideelementscaletabletl'][$key],
					'slideelementscalelaptop'=>$_POST['slideelementscalelaptop'][$key],
					'slideelementscaledesktop'=>$_POST['slideelementscaledesktop'][$key],
					'slideelementleftmobile'=>$_POST['slideelementleftmobile'][$key],
					'slideelementlefttabletp'=>$_POST['slideelementlefttabletp'][$key],
					'slideelementlefttabletl'=>$_POST['slideelementlefttabletl'][$key],
					'slideelementleftlaptop'=>$_POST['slideelementleftlaptop'][$key],
					'slideelementleftdesktop'=>$_POST['slideelementleftdesktop'][$key],
					'slideelementtopmobile'=>$_POST['slideelementtopmobile'][$key],
					'slideelementtoptabletp'=>$_POST['slideelementtoptabletp'][$key],
					'slideelementtoptabletl'=>$_POST['slideelementtoptabletl'][$key],
					'slideelementtoplaptop'=>$_POST['slideelementtoplaptop'][$key],
					'slideelementtopdesktop'=>$_POST['slideelementtopdesktop'][$key]
				);
				// handling various icon_packs
				foreach ($mixtape_qodef_IconCollections->iconCollections as $collection_key => $collection_object) {
					$slide_elements_val[$key]['slideelementbuttonicon_'.$collection_key] = $_POST['slideelementbuttonicon_'.$collection_key][$key];
				}
				$slide_elements = true;

			}
		}


		if ($slide_elements) {
			update_post_meta( $post_id,  'qodef_slide_elements', $slide_elements_val );
		} else {
			delete_post_meta( $post_id, 'qodef_slide_elements' );
		}

		// save post link twitter content
		if($post->post_type == 'post' && $_POST['post_format'] == 'link' && $_POST['qodef_post_link_link_meta'] != '') {
			$link = $_POST['qodef_post_link_link_meta'];

			if (defined('QODEF_TWITTER_FEED_VERSION') && strpos($link, 'twitter.com') && strpos($link, 'status')){
				$status_parts = explode('/', $link);
				$status_id = $status_parts[5];
				$twitter_api = QodefTwitterApi::getInstance();

				if($twitter_api->hasUserConnected()) {
					$response = $twitter_api->getTweetById($status_id, array());
					$tweet_data = array();
					foreach($response->data as $tweet) {

						$tweet_data['text'] =  $twitter_api->getHelper()->getTweetCleanText($tweet);
						$tweet_data['author'] =   $twitter_api->getHelper()->getTweetAuthor($tweet);
						$tweet_data['time'] =  $twitter_api->getHelper()->getTweetCreatedTime($tweet);
					}

					if(count($tweet_data) > 0){
						update_post_meta( $post_id,  'qodef_post_link_twitter_data_meta', $tweet_data );
					}
				}
				delete_post_meta( $post_id,  'qodef_post_link_instagram_data_meta');
			} else if(defined('QODEF_INSTAGRAM_FEED_VERSION') && strpos($link, 'instagram.com') && strpos($link, 'p')){

				$instagram_data = array();
				$instagram_api = QodefInstagramApi::getInstance();
				$instagram_post_data = $instagram_api->getPostById($link);
				$instagram_params = array('thumbnail_url','thumbnail_width','thumbnail_height','title');

				foreach( $instagram_params as $instagram_param )
				{
					if(!empty($instagram_post_data[$instagram_param])){
						$instagram_data[$instagram_param] = $instagram_post_data[$instagram_param];
					}
				}

				if(count($instagram_data) > 0) {
					update_post_meta( $post_id,  'qodef_post_link_instagram_data_meta', $instagram_data );
				}
				delete_post_meta( $post_id,  'qodef_post_link_twitter_data_meta');
			}
		} else {
			delete_post_meta( $post_id,  'qodef_post_link_twitter_data_meta');
			delete_post_meta( $post_id,  'qodef_post_link_instagram_data_meta');
		}

		// date and time for event
		if($post->post_type == 'event' && $_POST['qodef_event_item_date'] != '' && $_POST['qodef_event_item_time'] != '') {

			$date = $_POST['qodef_event_item_date'];
			$time = $_POST['qodef_event_item_time'];

			$date_time = date_i18n( 'Y-m-d' , strtotime( $date ) ).' '.date_i18n( 'H:i' , strtotime( $time ) );

			update_post_meta( $post_id,  'qodef_event_item_date_and_time', $date_time );
		} else {
			delete_post_meta( $post_id,  'qodef_event_item_date_and_time');
		}


	}

	add_action( 'save_post', 'mixtape_qodef_meta_box_save', 1, 2 );
}

if(!function_exists('mixtape_qodef_render_meta_box')) {
	/**
	 * Function that renders meta box
	 * @param $post WP_Post post object
	 * @param $metabox array array of current meta box parameters
	 */
	function mixtape_qodef_render_meta_box($post, $metabox) {?>

		<div class="qodef-meta-box qodef-page">
			<div class="qodef-meta-box-holder">

				<?php $metabox['args']['box']->render(); ?>
				<?php wp_nonce_field('qodef_themename_meta_box_'.$metabox['args']['box']->name.'_save', 'qodef_themename_meta_box_'.$metabox['args']['box']->name.'_save'); ?>

			</div>
		</div>

	<?php
	}
}

if(!function_exists('mixtape_qodef_meta_box_add_hidden_class')) {
	/**
	 * Function that adds class that will initially hide meta box
	 * @param array $classes array of classes
	 * @return array modified array of classes
	 */
	function mixtape_qodef_meta_box_add_hidden_class( $classes=array() ) {
		if( !in_array( 'qodef-meta-box-hidden', $classes ) )
			$classes[] = 'qodef-meta-box-hidden';

		return $classes;
	}

}

if(!function_exists('mixtape_qodef_remove_default_custom_fields')) {
	/**
	 * Function that removes default WordPress custom fields interface
	 */
	function mixtape_qodef_remove_default_custom_fields() {
		foreach ( array( 'normal', 'advanced', 'side' ) as $context ) {
			foreach ( array( "page", "post", "testimonials", "slides", "carousels", "event", "album" ) as $postType ) {
				remove_meta_box( 'postcustom', $postType, $context );
			}
		}
	}

	add_action('do_meta_boxes', 'mixtape_qodef_remove_default_custom_fields');
}


if(!function_exists('mixtape_qodef_get_custom_sidebars')) {
	/**
	 * Function that returns all custom made sidebars.
	 *
	 * @uses get_option()
	 * @return array array of custom made sidebars where key and value are sidebar name
	 */
	function mixtape_qodef_get_custom_sidebars() {
		$custom_sidebars = get_option('qodef_sidebars');
		$formatted_array = array();

		if(is_array($custom_sidebars) && count($custom_sidebars)) {
			foreach ($custom_sidebars as $custom_sidebar) {
				$formatted_array[sanitize_title($custom_sidebar)] = $custom_sidebar;
			}
		}

		return $formatted_array;
	}
}

if(!function_exists('mixtape_qodef_generate_icon_pack_options')) {
    /**
     * Generates options HTML for each icon in given icon pack
     * Hooked to wp_ajax_update_admin_nav_icon_options action
     */
    function mixtape_qodef_generate_icon_pack_options() {
        global $mixtape_qodef_IconCollections;

        $html = '';
        $icon_pack = isset($_POST['icon_pack']) ? $_POST['icon_pack'] : '';
        $collections_object = $mixtape_qodef_IconCollections->getIconCollection($icon_pack);

        if($collections_object) {
            $icons = $collections_object->getIconsArray();
            if(is_array($icons) && count($icons)) {
                foreach ($icons as $key => $icon) {
                    $html .= '<option value="'.esc_attr($key).'">'.esc_html($key).'</option>';
                }
            }
        }

        print $html;
    }

    add_action('wp_ajax_update_admin_nav_icon_options', 'mixtape_qodef_generate_icon_pack_options');
}

if(!function_exists('mixtape_qodef_admin_notice')) {
    /**
     * Prints admin notice. It checks if notice has been disabled and if it hasn't then it displays it
     * @param $id string id of notice. It will be used to store notice dismis
     * @param $message string message to show to the user
     * @param $class string HTML class of notice
     * @param bool $is_dismisable whether notice is dismisable or not
     */
    function mixtape_qodef_admin_notice($id, $message, $class, $is_dismisable = true) {
        $is_dismised = get_user_meta(get_current_user_id(), 'dismis_'.$id);

        //if notice isn't dismissed
        if(!$is_dismised && is_admin()) {
            echo '<div style="display: block;" class="'.esc_attr($class).' is-dismissible notice">';
            echo '<p>';

            echo wp_kses_post($message);

            if($is_dismisable) {
                echo '<strong style="display: block; margin-top: 7px;"><a href="'.esc_url(add_query_arg('qodef_dismis_notice', $id)).'">'.esc_html__('Dismiss this notice', 'mixtapewp').'</a></strong>';
            }

            echo '</p>';

            echo '</div>';
        }

    }
}

if(!function_exists('mixtape_qodef_save_dismisable_notice')) {
    /**
     * Updates user meta with dismisable notice. Hooks to admin_init action
     * in order to check this on every page request in admin
     */
    function mixtape_qodef_save_dismisable_notice() {
        if(is_admin() && !empty($_GET['qodef_dismis_notice'])) {
            $notice_id = sanitize_key($_GET['qodef_dismis_notice']);
            $current_user_id = get_current_user_id();

            update_user_meta($current_user_id, 'dismis_'.$notice_id, 1);
        }
    }

    add_action('admin_init', 'mixtape_qodef_save_dismisable_notice');
}

if(!function_exists('mixtape_qodef_hook_twitter_request_ajax')) {
    /**
     * Wrapper function for obtaining twitter request token.
     * Hooks to wp_ajax_qodef_twitter_obtain_request_token ajax action
     *
     * @see QodeTwitterApi::obtainRequestToken()
     */
    function mixtape_qodef_hook_twitter_request_ajax() {
        QodefTwitterApi::getInstance()->obtainRequestToken();
    }

    add_action('wp_ajax_qodef_twitter_obtain_request_token', 'mixtape_qodef_hook_twitter_request_ajax');
}
?>