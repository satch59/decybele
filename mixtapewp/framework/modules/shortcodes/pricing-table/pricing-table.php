<?php
namespace MixtapeQode\Modules\Shortcodes\PricingTable;

use MixtapeQode\Modules\Shortcodes\Lib\ShortcodeInterface;

class PricingTable implements ShortcodeInterface{
	private $base;
	function __construct() {
		$this->base = 'qodef_pricing_table';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
			'name' => esc_html__('Pricing Table', 'mixtapewp'),
			'base' => $this->base,
			'icon' => 'icon-wpb-pricing-table extended-custom-icon',
			'category' => esc_html__('by SELECT', 'mixtapewp'),
			'allowed_container_element' => 'vc_row',
			'as_child' => array('only' => 'qodef_pricing_tables'),
			'params' => array(
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Title', 'mixtapewp'),
					'param_name' => 'title',
					'value' => esc_html__('Basic Plan', 'mixtapewp'),
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Price', 'mixtapewp'),
					'param_name' => 'price',
					'description' => esc_html__('Default value is 100', 'mixtapewp')
				),
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Currency', 'mixtapewp'),
					'param_name' => 'currency',
					'description' => esc_html__('Default mark is $', 'mixtapewp')
				),
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Price Period', 'mixtapewp'),
					'param_name' => 'price_period',
					'description' => esc_html__('Default label is "per month"', 'mixtapewp')
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
					'param_name' => 'link',
					'dependency' => array('element' => 'show_button',  'value' => 'yes')
				),
				array(
					'type' => 'dropdown',
					'admin_label' => true,
					'heading' => esc_html__('Active', 'mixtapewp'),
					'param_name' => 'active',
					'value' => array(
                        esc_html__('No', 'mixtapewp') => 'no',
                        esc_html__('Yes', 'mixtapewp') => 'yes'
					),
					'save_always' => true,
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Active text', 'mixtapewp'),
					'param_name' => 'active_text',
					'description' => esc_html__('Best choice', 'mixtapewp'),
					'dependency' => array('element' => 'active', 'value' => 'yes')
				),
				array(
					'type' => 'textarea_html',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__('Content', 'mixtapewp'),
					'param_name' => 'content',
					'value' => '<li>content content content</li><li>content content content</li><li>content content content</li>',
					'description' => ''
				)
			)
		));
	}

	public function render($atts, $content = null) {
	
		$args = array(
			'title'         			   => esc_html__('Basic Plan', 'mixtapewp'),
			'price'         			   => '100',
			'currency'      			   => '$',
			'price_period'  			   => esc_html__('Per Month', 'mixtapewp'),
			'active'        			   => 'no',
			'active_text'   			   => esc_html__('Best choice', 'mixtapewp'),
			'show_button'				   => 'yes',
			'link'          			   => '',
			'button_text'   			   => 'button'
		);
		$params = shortcode_atts($args, $atts);
		extract($params);

		$html						= '';
		$pricing_table_clasess		= 'qodef-price-table';
		
		if($active == 'yes') {
			$pricing_table_clasess .= ' qodef-active';
		}
		
		$params['pricing_table_classes'] = $pricing_table_clasess;
        $params['content'] = preg_replace('#^<\/p>|<p>$#', '', $content);
		
		$html .= mixtape_qodef_get_shortcode_module_template_part('templates/pricing-table-template','pricing-table', '', $params);
		return $html;

	}

}
