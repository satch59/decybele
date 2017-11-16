<?php
namespace MixtapeQode\Modules\Shortcodes\Process;

use MixtapeQode\Modules\Shortcodes\Lib\ShortcodeInterface;

class ProcessItem implements ShortcodeInterface {
	private $base;

	public function __construct() {
		$this->base = 'qodef_process_item';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map(array(
			'name'                    => esc_html__('Process Item', 'mixtapewp'),
			'base'                    => $this->getBase(),
			'as_child'                => array('only' => 'qodef_process_holder'),
			'category'                => esc_html__('by SELECT', 'mixtapewp'),
			'icon'                    => 'icon-wpb-process-item extended-custom-icon',
			'show_settings_on_create' => true,
			'params'                  => array(
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Number', 'mixtapewp'),
					'param_name'  => 'number',
					'admin_label' => true
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Title', 'mixtapewp'),
					'param_name'  => 'title',
					'admin_label' => true
				),
				array(
					'type'        => 'textarea',
					'heading'     => esc_html__('Text', 'mixtapewp'),
					'param_name'  => 'text',
					'admin_label' => true
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('Highlight Item?', 'mixtapewp'),
					'param_name'  => 'highlighted',
					'value'       => array(
                        esc_html__('No', 'mixtapewp')  => 'no',
                        esc_html__('Yes', 'mixtapewp') => 'yes'
					),
					'admin_label' => true
				)
			)
		));
	}

	public function render($atts, $content = null) {
		$default_atts = array(
			'number'     => '',
			'title'     => '',
			'text'      => '',
			'highlighted' => 'no'
		);

		$params = shortcode_atts($default_atts, $atts);

		$params['item_classes'] = array(
			'qodef-process-item-holder'
		);

		if($params['highlighted'] === 'yes') {
			$params['item_classes'][] = 'qodef-pi-highlighted';
		}

		return mixtape_qodef_get_shortcode_module_template_part('templates/process-item-template', 'process', '', $params);
	}

}