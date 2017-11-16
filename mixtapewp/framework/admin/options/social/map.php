<?php

if ( ! function_exists('mixtape_qodef_social_options_map') ) {

	function mixtape_qodef_social_options_map() {

		mixtape_qodef_add_admin_page(
			array(
				'slug'  => '_social_page',
				'title' => esc_html__('Social Networks', 'mixtapewp'),
				'icon'  => 'fa fa-share-alt'
			)
		);

		/**
		 * Enable Social Share
		 */
		$panel_social_share = mixtape_qodef_add_admin_panel(array(
			'page'  => '_social_page',
			'name'  => 'panel_social_share',
			'title' => esc_html__('Enable Social Share', 'mixtapewp')
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_social_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Social Share', 'mixtapewp'),
			'description'	=> esc_html__('Enabling this option will allow social share on networks of your choice', 'mixtapewp'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#qodef_panel_social_networks, #qodef_panel_show_social_share_on'
			),
			'parent'		=> $panel_social_share
		));

		$panel_show_social_share_on = mixtape_qodef_add_admin_panel(array(
			'page'  			=> '_social_page',
			'name'  			=> 'panel_show_social_share_on',
			'title' 			=> esc_html__('Show Social Share On', 'mixtapewp'),
			'hidden_property'	=> 'enable_social_share',
			'hidden_value'		=> 'no'
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_social_share_on_post',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Posts', 'mixtapewp'),
			'description'	=> esc_html__('Show Social Share on Blog Posts', 'mixtapewp'),
			'parent'		=> $panel_show_social_share_on
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_social_share_on_page',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Pages', 'mixtapewp'),
			'description'	=> esc_html__('Show Social Share on Pages', 'mixtapewp'),
			'parent'		=> $panel_show_social_share_on
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_social_share_on_attachment',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Media', 'mixtapewp'),
			'description'	=> esc_html__('Show Social Share for Images and Videos', 'mixtapewp'),
			'parent'		=> $panel_show_social_share_on
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_social_share_on_event',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Event', 'mixtapewp'),
			'description'	=> esc_html__('Show Social Share for Event', 'mixtapewp'),
			'parent'		=> $panel_show_social_share_on
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_social_share_on_album',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Compact Album', 'mixtapewp'),
			'description'	=> esc_html__('Show Social Share for Compact Album', 'mixtapewp'),
			'parent'		=> $panel_show_social_share_on
		));

		if(mixtape_qodef_is_woocommerce_installed()){
			mixtape_qodef_add_admin_field(array(
				'type'			=> 'yesno',
				'name'			=> 'enable_social_share_on_product',
				'default_value'	=> 'no',
				'label'			=> esc_html__('Product', 'mixtapewp'),
				'description'	=> esc_html__('Show Social Share for Product Items', 'mixtapewp'),
				'parent'		=> $panel_show_social_share_on
			));
		}

		/**
		 * Social Share Networks
		 */
		$panel_social_networks = mixtape_qodef_add_admin_panel(array(
			'page'  			=> '_social_page',
			'name'				=> 'panel_social_networks',
			'title'				=> esc_html__('Social Networks', 'mixtapewp'),
			'hidden_property'	=> 'enable_social_share',
			'hidden_value'		=> 'no'
		));

		/**
		 * Facebook
		 */
		mixtape_qodef_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'facebook_title',
			'title'		=> esc_html__('Share on Facebook', 'mixtapewp')
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_facebook_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'mixtapewp'),
			'description'	=> esc_html__('Enabling this option will allow sharing via Facebook', 'mixtapewp'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#qodef_enable_facebook_share_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_facebook_share_container = mixtape_qodef_add_admin_container(array(
			'name'		=> 'enable_facebook_share_container',
			'hidden_property'	=> 'enable_facebook_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'facebook_icon',
			'default_value'	=> '',
			'label'			=> esc_html__('Upload Icon', 'mixtapewp'),
			'parent'		=> $enable_facebook_share_container
		));

		/**
		 * Twitter
		 */
		mixtape_qodef_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'twitter_title',
			'title'		=> esc_html__('Share on Twitter', 'mixtapewp')
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_twitter_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'mixtapewp'),
			'description'	=> esc_html__('Enabling this option will allow sharing via Twitter', 'mixtapewp'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#qodef_enable_twitter_share_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_twitter_share_container = mixtape_qodef_add_admin_container(array(
			'name'		=> 'enable_twitter_share_container',
			'hidden_property'	=> 'enable_twitter_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'twitter_icon',
			'default_value'	=> '',
			'label'			=> esc_html__('Upload Icon', 'mixtapewp'),
			'parent'		=> $enable_twitter_share_container
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'text',
			'name'			=> 'twitter_via',
			'default_value'	=> '',
			'label'			=> esc_html__('Via', 'mixtapewp'),
			'parent'		=> $enable_twitter_share_container
		));

		/**
		 * Google Plus
		 */
		mixtape_qodef_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'google_plus_title',
			'title'		=> esc_html__('Share on Google Plus', 'mixtapewp')
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_google_plus_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'mixtapewp'),
			'description'	=> esc_html__('Enabling this option will allow sharing via Google Plus', 'mixtapewp'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#qodef_enable_google_plus_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_google_plus_container = mixtape_qodef_add_admin_container(array(
			'name'		=> 'enable_google_plus_container',
			'hidden_property'	=> 'enable_google_plus_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'google_plus_icon',
			'default_value'	=> '',
			'label'			=> esc_html__('Upload Icon', 'mixtapewp'),
			'parent'		=> $enable_google_plus_container
		));

		/**
		 * Linked In
		 */
		mixtape_qodef_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'linkedin_title',
			'title'		=> esc_html__('Share on LinkedIn', 'mixtapewp')
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_linkedin_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'mixtapewp'),
			'description'	=> esc_html__('Enabling this option will allow sharing via LinkedIn', 'mixtapewp'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#qodef_enable_linkedin_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_linkedin_container = mixtape_qodef_add_admin_container(array(
			'name'		=> 'enable_linkedin_container',
			'hidden_property'	=> 'enable_linkedin_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'linkedin_icon',
			'default_value'	=> '',
			'label'			=> esc_html__('Upload Icon', 'mixtapewp'),
			'parent'		=> $enable_linkedin_container
		));

		/**
		 * Tumblr
		 */
		mixtape_qodef_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'tumblr_title',
			'title'		=> esc_html__('Share on Tumblr', 'mixtapewp')
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_tumblr_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'mixtapewp'),
			'description'	=> esc_html__('Enabling this option will allow sharing via Tumblr', 'mixtapewp'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#qodef_enable_tumblr_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_tumblr_container = mixtape_qodef_add_admin_container(array(
			'name'		=> 'enable_tumblr_container',
			'hidden_property'	=> 'enable_tumblr_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'tumblr_icon',
			'default_value'	=> '',
			'label'			=> esc_html__('Upload Icon', 'mixtapewp'),
			'parent'		=> $enable_tumblr_container
		));

		/**
		 * Pinterest
		 */
		mixtape_qodef_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'pinterest_title',
			'title'		=> esc_html__('Share on Pinterest', 'mixtapewp')
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_pinterest_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'mixtapewp'),
			'description'	=> esc_html__('Enabling this option will allow sharing via Pinterest', 'mixtapewp'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#qodef_enable_pinterest_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_pinterest_container = mixtape_qodef_add_admin_container(array(
			'name'				=> 'enable_pinterest_container',
			'hidden_property'	=> 'enable_pinterest_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'pinterest_icon',
			'default_value'	=> '',
			'label'			=> esc_html__('Upload Icon', 'mixtapewp'),
			'parent'		=> $enable_pinterest_container
		));

		/**
		 * VK
		 */
		mixtape_qodef_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'vk_title',
			'title'		=> esc_html__('Share on VK', 'mixtapewp')
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_vk_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'mixtapewp'),
			'description'	=> esc_html__('Enabling this option will allow sharing via VK', 'mixtapewp'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#qodef_enable_vk_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_vk_container = mixtape_qodef_add_admin_container(array(
			'name'				=> 'enable_vk_container',
			'hidden_property'	=> 'enable_vk_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		mixtape_qodef_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'vk_icon',
			'default_value'	=> '',
			'label'			=> esc_html__('Upload Icon', 'mixtapewp'),
			'parent'		=> $enable_vk_container
		));

		if(defined('QODEF_TWITTER_FEED_VERSION')) {
            $twitter_panel = mixtape_qodef_add_admin_panel(array(
                'title' => esc_html__('Twitter', 'mixtapewp'),
                'name'  => 'panel_twitter',
                'page'  => '_social_page'
            ));

            mixtape_qodef_add_admin_twitter_button(array(
                'name'   => 'twitter_button',
                'parent' => $twitter_panel
            ));
        }

        if(defined('QODEF_INSTAGRAM_FEED_VERSION')) {
            $instagram_panel = mixtape_qodef_add_admin_panel(array(
                'title' => esc_html__('Instagram', 'mixtapewp'),
                'name'  => 'panel_instagram',
                'page'  => '_social_page'
            ));

            mixtape_qodef_add_admin_instagram_button(array(
                'name'   => 'instagram_button',
                'parent' => $instagram_panel
            ));
        }
	}

	add_action( 'mixtape_qodef_options_map', 'mixtape_qodef_social_options_map', 19);
}