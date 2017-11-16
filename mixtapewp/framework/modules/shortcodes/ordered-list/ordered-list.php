<?php
namespace MixtapeQode\Modules\Shortcodes\OrderedList;

use MixtapeQode\Modules\Shortcodes\Lib\ShortcodeInterface;

class OrderedList implements ShortcodeInterface{
	private $base;
	function __construct() {
		$this->base = 'qodef_list_ordered';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	public function vcMap() {

		vc_map( array(
			'name' => esc_html__('List - Ordered', 'mixtapewp'),
			'base' => $this->base,
			'icon' => 'icon-wpb-ordered-list extended-custom-icon',
			'category' => esc_html__('by SELECT', 'mixtapewp'),
			'allowed_container_element' => 'vc_row',
			'params' => array(
				array(
					'type'			=> 'textarea_html',
					'admin_label'	=> true,
					'heading'		=> esc_html__('Content', 'mixtapewp'),
					'param_name'	=> 'content',
					'value'			=> '<ol><li>Lorem Ipsum</li><li>Lorem Ipsum</li><li>Lorem Ipsum</li></ol>'
				)
			)
		) );
	}

	public function render($atts, $content = null) {
		$content = preg_replace('#^<\/p>|<p>$#', '', $content);
		$html = '<div class= "qodef-ordered-list" >' . do_shortcode($content) . '</div>';
        return $html;
	}
}