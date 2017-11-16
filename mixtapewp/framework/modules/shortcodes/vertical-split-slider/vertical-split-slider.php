<?php
namespace MixtapeQode\Modules\Shortcodes\VerticalSplitSlider;

use MixtapeQode\Modules\Shortcodes\Lib\ShortcodeInterface;

class VerticalSplitSlider implements ShortcodeInterface{
	private $base;
	function __construct() {
		$this->base = 'qodef_vertical_split_slider';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
			'name'						=> esc_html__('Vertical Split Slider', 'mixtapewp'),
			'base'						=> $this->base,
			'icon'						=> 'icon-wpb-vertical-split-slider extended-custom-icon',
			'category'					=> esc_html__('by SELECT', 'mixtapewp'),
			'as_parent'					=> array('only' => 'qodef_vertical_split_slider_left_panel,qodef_vertical_split_slider_right_panel'),
			'js_view'					=> 'VcColumnView',
			'show_settings_on_create'	=> false,
			'params'					=> array()
		));
	}

	public function render($atts, $content = null) {
	
		$args = array();
		$params = shortcode_atts($args, $atts);
		extract($params);

		$html						= '';

		$html .= '<div class="qodef-vertical-split-slider">';
			$html .= do_shortcode($content);
		$html .= '</div>';

		return $html;

	}

}
