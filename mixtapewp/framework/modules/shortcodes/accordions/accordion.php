<?php
namespace MixtapeQode\Modules\Shortcodes\Accordion;

use MixtapeQode\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
	* class Accordions
*/
class Accordion implements ShortcodeInterface{
	/**
	 * @var string
	 */
	private $base;

	function __construct() {
		$this->base = 'qodef_accordion';
		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return	$this->base;
	}

	public function vcMap() {

		vc_map( array(
			'name' => esc_html__('Accordion', 'mixtapewp'),
			'base' => $this->base,
			'as_parent' => array('only' => 'qodef_accordion_tab'),
			'content_element' => true,
			'category' => esc_html__('by SELECT', 'mixtapewp'),
			'icon' => 'icon-wpb-accordion extended-custom-icon',
			'show_settings_on_create' => true,
			'js_view' => 'VcColumnView',
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra class name', 'mixtapewp' ),
					'param_name' => 'el_class',
					'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'mixtapewp' )
				),
				array(
					'type' => 'dropdown',
					'class' => '',
					'heading' => esc_html__('Style','mixtapewp'),
					'param_name' => 'style',
					'value' => array(
						esc_html__('Accordion','mixtapewp')   => 'accordion',
						esc_html__('Toggle','mixtapewp')      => 'toggle'
					),
					'save_always' => true,
					'description' => ''
				)
			)
		) );
	}
	public function render($atts, $content = null) {
		$default_atts=(array(
			'el_class'	=> '',
			'style'		=> 'accordion'
		));
		$params = shortcode_atts($default_atts, $atts);
		extract($params);
		
 		$acc_class = $this->getAccordionClasses($params);
		$params['acc_class'] = $acc_class;
		$params['content'] = $content;
		
		$output = '';
		
		$output .= mixtape_qodef_get_shortcode_module_template_part('templates/accordion-holder-template','accordions', '', $params);

		return $output;
	}

	/**
	   * Generates accordion classes
	   *
	   * @param $params
	   *
	   * @return string
	*/
	private function getAccordionClasses($params){
		
		$acc_class = array();
		$style = $params['style'];
		switch($style) {
			case 'toggle':
				$acc_class[] = 'qodef-toggle';
				$acc_class[] = 'qodef-initial';
				break;
			default:
				$acc_class[] = 'qodef-accordion';
				$acc_class[] = 'qodef-initial';
		}

		if(!empty($params['el_class'])) {
			$acc_class[] = $params['el_class'];
		}

		return implode(' ',$acc_class);
	}
}
