<?php
namespace MixtapeQode\Modules\Shortcodes\UnorderedList;

use MixtapeQode\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class unordered List
 */
class UnorderedList implements ShortcodeInterface{

	private $base;

	function __construct() {
		$this->base='qodef_unordered_list';
		
		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**\
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	public function vcMap() {

		vc_map( array(
			'name' => esc_html__('List - Unordered', 'mixtapewp'),
			'base' => $this->base,
			'icon' => 'icon-wpb-unordered-list extended-custom-icon',
			'category' => esc_html__('by SELECT', 'mixtapewp'),
			'allowed_container_element' => 'vc_row',
			'params' => array(
				array(
					'type'			=> 'dropdown',
					'admin_label'	=> true,
					'heading'		=> esc_html__('Style', 'mixtapewp'),
					'param_name'	=> 'style',
					'value'			=> array(
                        esc_html__('Circle', 'mixtapewp') => 'circle',
                        esc_html__('Line', 'mixtapewp')	 => 'line',
                        esc_html__('Arrow', 'mixtapewp')  => 'arrow'
					)
				),
				array(
					'type'			=> 'dropdown',
					'admin_label'	=> true,
					'heading'		=> esc_html__('Animate List', 'mixtapewp'),
					'param_name'	=> 'animate',
					'value'			=> array(
                        esc_html__('No', 'mixtapewp') => 'no',
                        esc_html__('Yes', 'mixtapewp') => 'yes'
					)
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Font Weight', 'mixtapewp'),
					'param_name' => 'font_weight',
					'value' => array(
                        esc_html__('Default', 'mixtapewp')  => '',
                        esc_html__('Light', 'mixtapewp')    => 'light',
                        esc_html__('Normal', 'mixtapewp')   => 'normal',
                        esc_html__('Bold', 'mixtapewp')     => 'bold'
					),
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Padding left (px)', 'mixtapewp'),
					'param_name' => 'padding_left',
					'value' => ''
				),
				array(
					'type' => 'textarea_html',
					'heading' => esc_html__('Content', 'mixtapewp'),
					'param_name' => 'content',
					'value' => '<ul><li>Lorem Ipsum</li><li>Lorem Ipsum</li><li>Lorem Ipsum</li></ul>',
					'description' => ''
				)
			)
		) );
	}

	public function render($atts, $content = null) {
		$args = array(
            'style' => '',
            'animate' => '',
            'font_weight' => '',
            'padding_left' => ''
        );
		$params = shortcode_atts($args, $atts);
		
		//Extract params for use in method
		extract($params);
		
		$list_item_classes = "";

        if ($style != '') {
			$list_item_classes .= ' qodef-'.$style;
        }

		if ($animate == 'yes') {
			$list_item_classes .= ' qodef-animate-list';
		}
		
		$list_style = '';
		if($padding_left != '') {
			$list_style .= 'padding-left: ' . $padding_left .'px;';
		}
		$content = preg_replace('#^<\/p>|<p>$#', '', $content);
        $html = '<div class="qodef-unordered-list '.$list_item_classes.'" '.  mixtape_qodef_get_inline_style($list_style).'>'.do_shortcode($content).'</div>';
        return $html;
	}
}