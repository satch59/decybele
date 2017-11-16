<?php
namespace MixtapeQode\Modules\Shortcodes\ElementsHolderItem;

use MixtapeQode\Modules\Shortcodes\Lib\ShortcodeInterface;

class ElementsHolderItem implements ShortcodeInterface{
	private $base;

	function __construct() {
		$this->base = 'qodef_elements_holder_item';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')){
			vc_map( 
				array(
					'name' => esc_html__('Elements Holder Item', 'mixtapewp'),
					'base' => $this->base,
					'as_child' => array('only' => 'qodef_elements_holder'),
					'as_parent' => array('except' => ''),
					'content_element' => true,
					'category' => esc_html__('by SELECT', 'mixtapewp'),
					'icon' => 'icon-wpb-elements-holder-item extended-custom-icon',
					'show_settings_on_create' => true,
					'js_view' => 'VcColumnView',
					'params' => array(
						array(
							'type' => 'colorpicker',
							'heading' => esc_html__('Background Color', 'mixtapewp'),
							'param_name' => 'background_color',
							'value' => '',
							'description' => ''
						),
						array(
							'type' => 'attach_image',
							'heading' => esc_html__('Background Image', 'mixtapewp'),
							'param_name' => 'background_image',
							'value' => '',
							'description' => ''
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__('Padding', 'mixtapewp'),
							'param_name' => 'item_padding',
							'value' => '',
							'description' => esc_html__('Please insert padding in format 0px 10px 0px 10px', 'mixtapewp')
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Horizontal Alignment', 'mixtapewp'),
							'param_name' => 'horizontal_aligment',
							'value' => array(
                                esc_html__('Left', 'mixtapewp')    	=> 'left',
                                esc_html__('Right', 'mixtapewp')    => 'right',
                                esc_html__('Center', 'mixtapewp')   => 'center'
							),
							'description' => ''
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Vertical Alignment', 'mixtapewp'),
							'param_name' => 'vertical_alignment',
							'value' => array(
                                esc_html__('Middle', 'mixtapewp')    => 'middle',
                                esc_html__('Top', 'mixtapewp')    	 => 'top',
                                esc_html__('Bottom', 'mixtapewp')    => 'bottom'
							),
							'description' => ''
						),
						array(
							'type' => 'dropdown',
							'heading' => 'Animation Name',
							'param_name' => 'animation_name',
							'value' => array(
                                esc_html__('No Animation', 'mixtapewp')			=> '',
                                esc_html__('Flip In', 'mixtapewp')				=> 'flip-in',
                                esc_html__('Grow In', 'mixtapewp')				=> 'grow-in',
                                esc_html__('X Rotate', 'mixtapewp')				=> 'x-rotate',
                                esc_html__('Z Rotate', 'mixtapewp')				=> 'z-rotate',
                                esc_html__('Y Translate', 'mixtapewp')			=> 'y-translate',
                                esc_html__('Fade In', 'mixtapewp')				=> 'fade-in',
                                esc_html__('Fade In Down', 'mixtapewp')			=> 'fade-in-down',
                                esc_html__('Fade In Left X Rotate', 'mixtapewp') => 'fade-in-left-x-rotate'
							),
							'description' => ''
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__('Animation Delay (ms)', 'mixtapewp'),
							'param_name' => 'animation_delay',
							'value' => '',
							'description' => '',
							'dependency' => array('element' => 'animation_name', 'not_empty' => true)
						),
						array(
							'type' => 'textfield',
							'group' => esc_html__('Width & Responsiveness', 'mixtapewp'),
							'heading' => esc_html__('Padding on screen size between 1280px-1440px', 'mixtapewp'),
							'param_name' => 'item_padding_1280_1440',
							'value' => '',
							'description' => esc_html__('Please insert padding in format 0px 10px 0px 10px', 'mixtapewp')
						),
						array(
							'type' => 'textfield',
							'group' => esc_html__('Width & Responsiveness', 'mixtapewp'),
							'heading' => esc_html__('Padding on screen size between 1024px-1280px', 'mixtapewp'),
							'param_name' => 'item_padding_1024_1280',
							'value' => '',
							'description' => esc_html__('Please insert padding in format 0px 10px 0px 10px', 'mixtapewp')
						),
						array(
							'type' => 'textfield',
							'group' => esc_html__('Width & Responsiveness', 'mixtapewp'),
							'heading' => esc_html__('Padding on screen size between 768px-1024px', 'mixtapewp'),
							'param_name' => 'item_padding_768_1024',
							'value' => '',
							'description' => esc_html__('Please insert padding in format 0px 10px 0px 10px', 'mixtapewp')
						),
						array(
							'type' => 'textfield',
							'group' => esc_html__('Width & Responsiveness', 'mixtapewp'),
							'heading' => esc_html__('Padding on screen size between 600px-768px', 'mixtapewp'),
							'param_name' => 'item_padding_600_768',
							'value' => '',
							'description' => esc_html__('Please insert padding in format 0px 10px 0px 10px', 'mixtapewp')
						),
						array(
							'type' => 'textfield',
							'group' => esc_html__('Width & Responsiveness', 'mixtapewp'),
							'heading' => esc_html__('Padding on screen size between 480px-600px', 'mixtapewp'),
							'param_name' => 'item_padding_480_600',
							'value' => '',
							'description' => esc_html__('Please insert padding in format 0px 10px 0px 10px', 'mixtapewp')
						),
						array(
							'type' => 'textfield',
							'group' => esc_html__('Width & Responsiveness', 'mixtapewp'),
							'heading' => esc_html__('Padding on Screen Size Bellow 480px', 'mixtapewp'),
							'param_name' => 'item_padding_480',
							'value' => '',
							'description' => esc_html__('Please insert padding in format 0px 10px 0px 10px', 'mixtapewp')
						)
					)
				)
			);			
		}
	}

	public function render($atts, $content = null) {
		$args = array(
			'background_color' => '',
			'background_image' => '',
			'item_padding' => '',
			'horizontal_aligment' => '',
			'vertical_alignment' => '',
			'animation_name' => '',
			'animation_delay' => '',
			'item_padding_1280_1440'	=> '',
			'item_padding_1024_1280' => '',
			'item_padding_768_1024' => '',
			'item_padding_600_768' => '',
			'item_padding_480_600' => '',
			'item_padding_480' => ''
		);
		
		$params = shortcode_atts($args, $atts);
		extract($params);
		$params['content']= $content;

		$rand_class = 'qodef-elements-holder-custom-' . mt_rand(100000,1000000);

		$params['elements_holder_item_style'] = $this->getElementsHolderItemStyle($params);
		$params['elements_holder_item_content_style'] = $this->getElementsHolderItemContentStyle($params);
		$params['elements_holder_item_class'] = $this->getElementsHolderItemClass($params);
		$params['elements_holder_item_content_class'] = $rand_class;
		$params['elements_holder_item_data'] = $this->getData($params);

		$html = mixtape_qodef_get_shortcode_module_template_part('templates/elements-holder-item-template', 'elements-holder', '', $params);

		return $html;
	}


	/**
	 * Return Elements Holder Item style
	 *
	 * @param $params
	 * @return array
	 */
	private function getElementsHolderItemStyle($params) {

		$element_holder_item_style = array();

		if ($params['background_color'] !== '') {
			$element_holder_item_style[] = 'background-color: ' . $params['background_color'];
		}
		if ($params['background_image'] !== '') {
			$element_holder_item_style[] = 'background-image: url(' . wp_get_attachment_url($params['background_image']) . ')';
		}
		if ($params['animation_delay'] !== '') {
			$element_holder_item_style[] = 'transition-delay:' . $params['animation_delay'] .'ms;'. '-webkit-transition-delay:' . $params['animation_delay'] .'ms';
		}
		return implode(';', $element_holder_item_style);

	}

	/**
	 * Return Elements Holder Item Content style
	 *
	 * @param $params
	 * @return array
	 */
	private function getElementsHolderItemContentStyle($params) {

		$element_holder_item_content_style = array();

		if ($params['item_padding'] !== '') {
			$element_holder_item_content_style[] = 'padding: ' . $params['item_padding'];
		}

		return implode(';', $element_holder_item_content_style);

	}

	/**
	 * Return Elements Holder Item classes
	 *
	 * @param $params
	 * @return array
	 */
	private function getElementsHolderItemClass($params) {

		$element_holder_item_class = array();

		if ($params['vertical_alignment'] !== '') {
			$element_holder_item_class[] = 'qodef-vertical-alignment-'. $params['vertical_alignment'];
		}

		if ($params['horizontal_aligment'] !== '') {
			$element_holder_item_class[] = 'qodef-horizontal-alignment-'. $params['horizontal_aligment'];
		}

		if ($params['animation_name'] !== '') {
			$element_holder_item_class[] = 'qodef-'. $params['animation_name'];
		}


		return implode(' ', $element_holder_item_class);

	}

	private function getData($params) {
		$data = array();

		if($params['animation_name'] !== '') {
			$data['data-animation'] = 'qodef-'.$params['animation_name'];
		}

        $data['data-item-class'] = $params['elements_holder_item_content_class'];
        
        if ($params['item_padding_1280_1440'] !== '') {
            $data['data-1280-1440'] = $params['item_padding_1280_1440'];
        }

        if ($params['item_padding_1024_1280'] !== '') {
            $data['data-1024-1280'] = $params['item_padding_1024_1280'];
        }

        if ($params['item_padding_768_1024'] !== '') {
            $data['data-768-1024'] = $params['item_padding_768_1024'];
        }

        if ($params['item_padding_600_768'] !== '') {
            $data['data-600-768'] = $params['item_padding_600_768'];
        }

        if ($params['item_padding_480_600'] !== '') {
            $data['data-480-600'] = $params['item_padding_480_600'];
        }

        if ($params['item_padding_480'] !== '') {
            $data['data-480'] = $params['item_padding_480'];
        }

		return $data;
	}
}
