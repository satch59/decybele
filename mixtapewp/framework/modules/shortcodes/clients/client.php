<?php
namespace MixtapeQode\Modules\Shortcodes\Client;

use MixtapeQode\Modules\Shortcodes\Lib\ShortcodeInterface;

class Client implements ShortcodeInterface{
	private $base;

	function __construct() {
		$this->base = 'qodef_client';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')){
			vc_map( 
				array(
					'name' => esc_html__('Client', 'mixtapewp'),
					'base' => $this->base,
					'content_element' => true,
					'icon' => 'icon-wpb-client extended-custom-icon',
					'as_child' => array('only' => 'qodef_clients'),
					'params' => array(
						array(
							'type' 			=> 'attach_image',
							'heading' 		=> esc_html__('Image', 'mixtapewp'),
							'param_name' 	=> 'image'
						),
						array(
							'type' 	     => 'dropdown',
							'heading'	 => esc_html__('Hover Type', 'mixtapewp'),
							'param_name' => 'hover_type',
							'value' 	 => array(
								esc_html__('Roll Over', 'mixtapewp')  => 'roll-over',
								esc_html__('Fade', 'mixtapewp') 		=> 'fade',
								esc_html__('Image Zoom', 'mixtapewp') => 'zoom'
							),
							'save_always' => true,
							'dependency' => Array('element' => 'image', 'not_empty' => true),
						),
						array(
							'type' 		 => 'attach_image',
							'heading'	 => esc_html__('Hover Image', 'mixtapewp'),
							'param_name' => 'hover_image',
							'dependency'  => Array('element' => 'hover_type', 'value' => array('roll-over','fade'))
						),
						array(
							'type'    		=> 'textfield',
							'heading' 		=> esc_html__('Link', 'mixtapewp'),
							'param_name' 	=> 'link'
						),
						array(
							'type' 			=> 'dropdown',
							'heading' 		=> esc_html__('Link Target', 'mixtapewp'),
							'param_name'	=> 'link_target',
							'value'			=> array(
								'' 							   => '',
								esc_html__('Self', 'mixtapewp')  => '_self',
								esc_html__('Blank', 'mixtapewp') => '_blank'
							)
						)
					)
				)
			);			
		}
	}

	public function render($atts, $content = null) {
		$args = array(
			'image' => '',
			'hover_image' => '',
			'hover_type' => '',
			'link' => '',
			'link_target' => ''
		);
		
		$params = shortcode_atts($args, $atts);
		extract($params);
		$params['content']= $content;


		if(is_numeric($params['image'])) {
			$params['image'] = wp_get_attachment_url($params['image']);
			$params['image_alt'] = esc_attr(get_post_meta($params['image'], '_wp_attachment_image_alt', true));
		}
		if(is_numeric($params['hover_image'])) {
			$params['hover_image'] = wp_get_attachment_url($params['hover_image']);
			$params['hover_image_alt'] = esc_attr(get_post_meta($params['hover_image'], '_wp_attachment_image_alt', true));
		}

		if($params['hover_type'] !== '') {
			$params['class'] = 'qodef-clients-' . $hover_type;
		} else {
			$params['class'] = 'qodef-hover-opacity';
		}

		if($params['link_target'] == ''){
			$params['link_target'] = '_self';
		}

		$html = mixtape_qodef_get_shortcode_module_template_part('templates/client-template', 'clients', '', $params);

		return $html;
	}

}
