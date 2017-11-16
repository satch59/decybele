<?php
if ( ! function_exists('mixtape_qodef_contact_form_map') ) {
	/**
	 * Map Contact Form 7 shortcode
	 * Hooks on vc_after_init action
	 */
	function mixtape_qodef_contact_form_map()
	{

		vc_add_param('contact-form-7', array(
			'type' => 'dropdown',
			'heading' =>  esc_html__('Style', 'mixtapewp'),
			'param_name' => 'html_class',
			'value' => array(
				esc_html__('Default', 'mixtapewp') => 'default',
				esc_html__('Custom Style 1', 'mixtapewp') => 'cf7_custom_style_1',
				esc_html__('Custom Style 2', 'mixtapewp') => 'cf7_custom_style_2',
				esc_html__('Custom Style 3', 'mixtapewp') => 'cf7_custom_style_3',
				esc_html__('Custom Style 4', 'mixtapewp') => 'cf7_custom_style_4',
				esc_html__('Custom Style 5', 'mixtapewp') => 'cf7_custom_style_5',
				esc_html__('Custom Style 6', 'mixtapewp') => 'cf7_custom_style_6'
			),
			'description' => esc_html__('You can style each form element individually in Select Options > Contact Form 7', 'mixtapewp')
		));

	}
	add_action('vc_after_init', 'mixtape_qodef_contact_form_map');
}
?>