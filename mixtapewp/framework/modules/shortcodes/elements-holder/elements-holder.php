<?php
namespace MixtapeQode\Modules\Shortcodes\ElementsHolder;

use MixtapeQode\Modules\Shortcodes\Lib\ShortcodeInterface;

class ElementsHolder implements ShortcodeInterface{
	private $base;
	function __construct() {
		$this->base = 'qodef_elements_holder';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
			'name' => esc_html__('Elements Holder', 'mixtapewp'),
			'base' => $this->base,
			'icon' => 'icon-wpb-elements-holder extended-custom-icon',
			'category' => esc_html__('by SELECT', 'mixtapewp'),
			'as_parent' => array('only' => 'qodef_elements_holder_item'),
			'js_view' => 'VcColumnView',
			'params' => array(
				array(
					'type' => 'colorpicker',
					'class' => '',
					'heading' => esc_html__('Background Color', 'mixtapewp'),
					'param_name' => 'background_color',
					'value' => '',
					'description' => ''
				),
				array(
					'type' => 'dropdown',
					'class' => '',
					'heading' => esc_html__('Columns', 'mixtapewp'),
					'admin_label' => true,
					'param_name' => 'number_of_columns',
					'value' => array(
                        esc_html__('1 Column', 'mixtapewp')      	=> 'one-column',
                        esc_html__('2 Columns', 'mixtapewp')    		=> 'two-columns',
                        esc_html__('2 Columns(33/66)', 'mixtapewp') 	=> 'two-columns-grid-33-66',
                        esc_html__('2 Columns(66/33)', 'mixtapewp')  => 'two-columns-grid-66-33',
                        esc_html__('3 Columns', 'mixtapewp')     	=> 'three-columns',
                        esc_html__('4 Columns', 'mixtapewp')    	 	=> 'four-columns',
                        esc_html__('5 Columns', 'mixtapewp')     	=> 'five-columns',
                        esc_html__('6 Columns', 'mixtapewp')     	=> 'six-columns'
					),
					'description' => ''
				),
				array(
					'type' => 'checkbox',
					'class' => '',
					'heading' => esc_html__('Items Float Left', 'mixtapewp'),
					'param_name' => 'items_float_left',
					'value' => array(esc_html__('Make Items Float Left?', 'mixtapewp') => 'yes'),
					'description' => ''
				),
				array(
					'type' => 'dropdown',
					'class' => '',
					'group' => esc_html__('Width & Responsiveness', 'mixtapewp'),
					'heading' => esc_html__('Switch to One Column', 'mixtapewp'),
					'param_name' => 'switch_to_one_column',
					'value' => array(
                        esc_html__('Default', 'mixtapewp')    		=> '',
                        esc_html__('Below 1280px', 'mixtapewp') 	=> '1280',
                        esc_html__('Below 1024px', 'mixtapewp')    	=> '1024',
                        esc_html__('Below 768px', 'mixtapewp')     	=> '768',
                        esc_html__('Below 600px', 'mixtapewp')    	=> '600',
                        esc_html__('Below 480px', 'mixtapewp')    	=> '480',
                        esc_html__('Never', 'mixtapewp')    			=> 'never'
					),
					'description' => esc_html__('Choose on which stage item will be in one column', 'mixtapewp')
				),
				array(
					'type' => 'dropdown',
					'class' => '',
					'group' => esc_html__('Width & Responsiveness', 'mixtapewp'),
					'heading' => esc_html__('Choose Alignment In Responsive Mode', 'mixtapewp'),
					'param_name' => 'alignment_one_column',
					'value' => array(
                        esc_html__('Default', 'mixtapewp')    	=> '',
                        esc_html__('Left', 'mixtapewp') 		=> 'left',
                        esc_html__('Center', 'mixtapewp')    	=> 'center',
                        esc_html__('Right', 'mixtapewp')     	=> 'right'
					),
					'description' => esc_html__('Alignment When Items are in One Column', 'mixtapewp')
				)
			)
		));
	}

	public function render($atts, $content = null) {
	
		$args = array(
			'number_of_columns' 		=> '',
			'switch_to_one_column'		=> '',
			'alignment_one_column' 		=> '',
			'items_float_left' 			=> '',
			'background_color' 			=> ''
		);
		$params = shortcode_atts($args, $atts);
		extract($params);

		$html						= '';

		$elements_holder_classes = array();
		$elements_holder_classes[] = 'qodef-elements-holder';
		$elements_holder_style = '';

		if($number_of_columns != ''){
			$elements_holder_classes[] .= 'qodef-'.$number_of_columns ;
		}

		if($switch_to_one_column != ''){
			$elements_holder_classes[] = 'qodef-responsive-mode-' . $switch_to_one_column ;
		} else {
			$elements_holder_classes[] = 'qodef-responsive-mode-768' ;
		}

		if($alignment_one_column != ''){
			$elements_holder_classes[] = 'qodef-one-column-alignment-' . $alignment_one_column ;
		}

		if($items_float_left !== ''){
			$elements_holder_classes[] = 'qodef-elements-items-float';
		}

		if($background_color != ''){
			$elements_holder_style .= 'background-color:'. $background_color . ';';
		}

		$elements_holder_class = implode(' ', $elements_holder_classes);

		$html .= '<div ' . mixtape_qodef_get_class_attribute($elements_holder_class) . ' ' . mixtape_qodef_get_inline_attr($elements_holder_style, 'style'). '>';
			$html .= do_shortcode($content);
		$html .= '</div>';

		return $html;

	}

}
