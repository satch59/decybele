<?php
namespace MixtapeQode\Modules\Shortcodes\Clients;

use MixtapeQode\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class Clients
 */

class Clients implements ShortcodeInterface{
	private $base;
	function __construct() {
		$this->base = 'qodef_clients';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
			'name' => esc_html__('Clients', 'mixtapewp'),
			'base' => $this->base,
			'as_parent' => array('only' => 'qodef_client'),
			'content_element' => true,
			'category' => esc_html__('by SELECT', 'mixtapewp'),
			'icon' => 'icon-wpb-clients extended-custom-icon',
			'show_settings_on_create' => true,
			'params' => array(
				array(
					'type' => 'dropdown',
					'admin_label' => true,
					'heading' => esc_html__('Columns', 'mixtapewp'),
					'param_name' => 'columns',
					'value' => array(
						esc_html__('Two', 'mixtapewp')       => 'two-columns',
						esc_html__('Three', 'mixtapewp')     => 'three-columns',
						esc_html__('Four', 'mixtapewp')      => 'four-columns',
						esc_html__('Five', 'mixtapewp')      => 'five-columns',
						esc_html__('Six', 'mixtapewp')       => 'six-columns'
					),
					'save_always' => true,
					'description' => ''
				)
			),
			'js_view' => 'VcColumnView'

		));
	}

	public function render($atts, $content = null) {
	
		$args = array(
			'columns' 			=> ''
		);
		$params = shortcode_atts($args, $atts);
		extract($params);
		$params['content']= $content;
		$html						= '';

		$html = mixtape_qodef_get_shortcode_module_template_part('templates/clients-template', 'clients', '', $params);

		return $html;

	}

}
