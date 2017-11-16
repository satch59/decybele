<?php
namespace MixtapeQode\Modules\Shortcodes\BoxedIcon;

use MixtapeQode\Modules\Shortcodes\Lib\ShortcodeInterface;

class BoxedIcon implements ShortcodeInterface{
	private $base;

	function __construct() {
		$this->base = 'qodef_boxed_icon';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')){
			vc_map(
				array(
					'name' => esc_html__('Boxed Icon', 'mixtapewp'),
					'base' => $this->base,
					'as_child' => array('only' => 'qodef_boxed_icons'),
					'as_parent' => array('except' => 'vc_row, vc_accordion'),
					'content_element' => true,
					'category' => esc_html__('by SELECT', 'mixtapewp'),
					'icon' => 'icon-wpb-boxed-icon extended-custom-icon',
					'params' => array_merge(
						array(
							array(
								'type' => 'colorpicker',
								'heading' => esc_html__('Background Color', 'mixtapewp'),
								'param_name' => 'background_color',
								'value' => '',
							)
						),
						mixtape_qodef_icon_collections()->getVCParamsArray(array(),'',true),
						array(
							array(
								'type'       => 'attach_image',
								'heading'    => esc_html__('Custom Icon', 'mixtapewp'),
								'param_name' => 'custom_icon'
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Icon Title', 'mixtapewp'),
								'param_name' => 'icon_title',
								'group'      => esc_html__('Icon Settings', 'mixtapewp'),
								'admin_label' => true
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon Title Color', 'mixtapewp'),
								'param_name' => 'icon_title_color',
								'dependency' => array('element' => 'icon_title', 'not_empty' => true),
								'group'      => esc_html__('Icon Settings', 'mixtapewp'),
							),
							array(
								'type'        => 'dropdown',
								'heading'     => esc_html__('Icon Size', 'mixtapewp'),
								'param_name'  => 'icon_size',
								'value'       => array(
									esc_html__('Tiny' , 'mixtapewp')      => 'qodef-icon-tiny',
									esc_html__('Small', 'mixtapewp')      => 'qodef-icon-small',
									esc_html__('Medium', 'mixtapewp')     => 'qodef-icon-medium',
									esc_html__('Large', 'mixtapewp')      => 'qodef-icon-large',
									esc_html__('Very Large', 'mixtapewp') => 'qodef-icon-huge'
								),
								'admin_label' => true,
								'save_always' => true,
								'group'       => esc_html__('Icon Settings', 'mixtapewp'),
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Custom Icon Size (px)', 'mixtapewp'),
								'param_name' => 'custom_icon_size',
								'group'      => esc_html__('Icon Settings', 'mixtapewp')
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon Color', 'mixtapewp'),
								'param_name' => 'icon_color',
								'group'      => esc_html__('Icon Settings', 'mixtapewp')
							),
							array(
								'type'       => 'colorpicker',
								'heading'    => esc_html__('Icon Hover Color', 'mixtapewp'),
								'param_name' => 'icon_hover_color',
								'group'      => esc_html__('Icon Settings', 'mixtapewp')
							),
							array(
								'type'        => 'textfield',
								'heading'     => esc_html__('Link', 'mixtapewp'),
								'param_name'  => 'link',
								'value'       => '',
								'admin_label' => true
							),
							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__('Target', 'mixtapewp'),
								'param_name' => 'target',
								'value'      => array(
									esc_html__('Self', 'mixtapewp')  => '_self',
									esc_html__('Blank', 'mixtapewp') => '_blank'
								),
								'dependency' => array('element' => 'link', 'not_empty' => true),
							)
						)
					)
				)
			);			
		}
	}

	public function render($atts, $content = null) {
		$args = array(
			'background_color'	=> '',
			'custom_icon'		=> '',
			'icon_title'		=> '',
			'icon_title_color'		=> '',
			'icon_size'			=> '',
			'custom_icon_size'	=> '',
			'icon_color'		=> '',
			'icon_hover_color'	=> '',
			'link'				=> '',
			'target'			=> '_self',
		);

		$args = array_merge($args, mixtape_qodef_icon_collections()->getShortcodeParams());
		$params = shortcode_atts($args, $atts);
		extract($params);
		$params['icon_parameters'] = $this->getIconParameters($params);
		$params['holder_style'] = $this->getHolderStyle($params);
		$params['icon_title_style'] = $this->getTitleStyle($params);
		$html = mixtape_qodef_get_shortcode_module_template_part('templates/boxed-icon-template', 'boxed-icons', '', $params);

		return $html;
	}

	private function getIconParameters($params) {
		$params_array = array();

		if(empty($params['custom_icon'])) {
			$iconPackName = mixtape_qodef_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);

			$params_array['icon_pack']   = $params['icon_pack'];
			$params_array[$iconPackName] = $params[$iconPackName];

			if(!empty($params['icon_size'])) {
				$params_array['size'] = $params['icon_size'];
			}

			if(!empty($params['custom_icon_size'])) {
				$params_array['custom_size'] = $params['custom_icon_size'];
			}



			$params_array['icon_color'] = $params['icon_color'];

			if(!empty($params['icon_hover_color'])) {
				$params_array['hover_icon_color'] = $params['icon_hover_color'];
			}
		}

		return $params_array;
	}

	private function getHolderStyle($params) {
		$style = array();

		if($params['background_color'] != '') {
			$style[] = 'background-color:'.$params['background_color'];
		}

		return $style;
	}

	private function getTitleStyle($params) {
		$style = array();

		if($params['icon_title_color'] != '') {
			$style[] = 'color:'.$params['icon_title_color'];
		}

		return $style;
	}

}
