<?php
namespace MixtapeQode\Modules\Shortcodes\ImageWithTextOver;

use MixtapeQode\Modules\Shortcodes\Lib\ShortcodeInterface;

class ImageWithTextOver implements ShortcodeInterface{

	private $base;

	/**
	 * Image Gallery constructor.
	 */
	public function __construct() {
		$this->base = 'qodef_image_with_text_over';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	/**
	 * Maps shortcode to Visual Composer. Hooked on vc_before_init
	 */
	public function vcMap() {
		vc_map(array(
			'name'                      => esc_html__('Image With Text Over', 'mixtapewp'),
			'base'                      => $this->getBase(),
			'category'                  => esc_html__('by SELECT', 'mixtapewp'),
			'icon'                      => 'icon-wpb-image-with-title extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array(
				array(
					'type'			=> 'attach_image',
					'param_name'	=> 'image',
					'heading'		=> esc_html__('Image',  'mixtapewp'),
					'description'	=> esc_html__('Select images from media library',  'mixtapewp')
				),
				array(
					'type'			=> 'textfield',
					'param_name'	=> 'title',
					'heading'		=> esc_html__('Title',  'mixtapewp')
				),
				array(
					'type'			=> 'textfield',
					'param_name'	=> 'subtitle',
					'heading'		=> esc_html__('Subtitle',  'mixtapewp')
				),
				array(
					'type' => 'dropdown',
					'admin_label' => true,
					'heading' => esc_html__('Show Button', 'mixtapewp'),
					'param_name' => 'show_button',
					'value' => array(
						esc_html__('Default', 'mixtapewp') => '',
						esc_html__('Yes', 'mixtapewp') => 'yes',
						esc_html__('No', 'mixtapewp') => 'no'
					),
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Button Text', 'mixtapewp'),
					'param_name' => 'button_text',
					'dependency' => array('element' => 'show_button',  'value' => 'yes')
				),
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Button Link', 'mixtapewp'),
					'param_name' => 'button_link',
					'dependency' => array('element' => 'show_button',  'value' => 'yes')
				),
                array(
                    'type'       => 'dropdown',
                    'heading'    => esc_html__('Button Target', 'mixtapewp'),
                    'param_name' => 'button_target',
                    'value'      => array(
                        'Self'  => '_self',
                        'Blank' => '_blank'
                    ),
                    'dependency' => array('element' => 'show_button', 'value' => 'yes'),
                )
			)
		));

	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @param $content string shortcode content
	 * @return string
	 */
	public function render($atts, $content = null) {
		$args = array(
			'image'	                => '',
			'title'		            => '',
			'subtitle'		            => '',
			'show_button'           => '',
			'button_text'           => '',
			'button_link'           => '',
			'button_target'         => '',
		);

		$params = shortcode_atts($args, $atts);

		$html = mixtape_qodef_get_shortcode_module_template_part('templates/image-with-text-over', 'image-with-text-over', '', $params);

		return $html;

	}
}