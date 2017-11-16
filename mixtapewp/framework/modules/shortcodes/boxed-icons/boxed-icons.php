<?php
namespace MixtapeQode\Modules\Shortcodes\BoxedIcons;

use MixtapeQode\Modules\Shortcodes\Lib\ShortcodeInterface;

class BoxedIcons implements ShortcodeInterface{
	private $base;
	function __construct() {
		$this->base = 'qodef_boxed_icons';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
			'name' => esc_html__('Boxed Icons', 'mixtapewp'),
			'base' => $this->base,
			'icon' => 'icon-wpb-boxed-icons extended-custom-icon',
			'category' => esc_html__('by SELECT', 'mixtapewp'),
			'as_parent' => array('only' => 'qodef_boxed_icon'),
			'js_view' => 'VcColumnView',
			'params' => array(
				array(
					'type' => 'dropdown',
					'param_name' => 'number_of_columns',
					'heading' => esc_html__('Columns', 'mixtapewp'),
					'value' => array(
						esc_html__('4 Columns', 'mixtapewp')	=> '4',
						esc_html__('8 Columns', 'mixtapewp')	=> '8'
					),
					'admin_label' => true
				),
				array(
					'type' => 'dropdown',
					'param_name' => 'skin',
					'heading' => esc_html__('Skin', 'mixtapewp'),
					'value' => array(
						esc_html__('Dark', 'mixtapewp')    => 'dark',
						esc_html__('Light', 'mixtapewp')   => 'light'
					)
				),
			)
		));
	}

	public function render($atts, $content = null) {
		$args = array(
			'number_of_columns'     => '4',
			'skin'                  => 'dark'
		);

		$params = shortcode_atts($args, $atts);
		extract($params);

		$html  = '';

		$classes = array('qodef-boxed-icons', 'clearfix');

		if( $params['skin'] === 'light' ) {
			$classes[] .= 'qodef-bi-skin-light' ;
		}

		if($params['number_of_columns'] != ''){
			$classes[] .= 'qodef-bi-' . $params['number_of_columns'] . '-columns' ;
		}

		$html .= '<div ' . mixtape_qodef_get_class_attribute($classes) . '>';
			$html .= do_shortcode($content);
		$html .= '</div>';

		return $html;

	}

}
