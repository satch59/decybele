<?php

if(mixtape_qodef_visual_composer_installed()) {

	if(!function_exists('mixtape_qodef_bandsintown_events')) {
		function mixtape_qodef_bandsintown_events() {
			vc_map(array(
				'name'                    => esc_html__('Bandsintown Events', 'mixtapewp'),
				'base'                    => 'bandsintown_events',
				'category'                =>  esc_html__('by SELECT', 'mixtapewp'),
				'icon'                    => 'icon-wpb-bandsintown-events extended-custom-icon',
				'show_settings_on_create' => true,
				'params'                  => array(
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__('Artist', 'mixtapewp'),
						'param_name'  => 'artist',
						'admin_label' => true
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__('Display Limit', 'mixtapewp'),
						'param_name'  => 'display_limit',
						'admin_label' => true
					)
				)
			));
		}

		add_action('vc_before_init', 'mixtape_qodef_bandsintown_events');
	}

}

