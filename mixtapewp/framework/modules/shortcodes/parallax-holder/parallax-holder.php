<?php
namespace MixtapeQode\Modules\Shortcodes\ParallaxHolder;

use MixtapeQode\Modules\Shortcodes\Lib\ShortcodeInterface;

class ParallaxHolder implements ShortcodeInterface{
	private $base;
	function __construct() {
		$this->base = 'qodef_parallax_holder';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
			'name' => esc_html__('Parallax Holder', 'mixtapewp'),
			'base' => $this->base,
			'icon' => 'icon-wpb-parallax-holder extended-custom-icon',
			'category' => esc_html__('by SELECT', 'mixtapewp'),
			'as_parent' => array('except' => ''),
			'js_view' => 'VcColumnView',
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Y Axis Translation', 'mixtapewp'),
					'admin_label' => true,
					'param_name' => 'y_axis_translation',
					'value' => '-200',
					'description' => esc_html__('Enter the value in pixels. Negative value changes parallax direction.', 'mixtapewp')
				),
			)
		));
	}

	public function render($atts, $content = null) {
	
		$args = array(
			'y_axis_translation' => '-200',
		);
		$params = shortcode_atts($args, $atts);
		extract($params);

		$html= '';
		$y_absolute = mixtape_qodef_filter_px($y_axis_translation);
		$smoothness = 20; //1 is for linear, non-animated parallax

		$parallax = '{&quot;y&quot;: '.$y_absolute.', &quot;smoothness&quot;: '.$smoothness.'}';

		$html .= '<div class="qodef-parallax-holder" data-parallax="'.$parallax.'">'; 
			$html .= do_shortcode($content);
		$html .= '</div>';

		return $html;

	}

}
