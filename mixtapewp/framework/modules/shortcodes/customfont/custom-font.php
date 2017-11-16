<?php
namespace MixtapeQode\Modules\Shortcodes\CustomFont;

use MixtapeQode\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class CustomFont
 */
class CustomFont implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'qodef_custom_font';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	/**
	 * Maps shortcode to Visual Composer. Hooked on vc_before_init
	 *
	 * @see qodef_core_get_carousel_slider_array_vc()
	 */
	public function vcMap() {

		vc_map( array(
				'name' => esc_html__('Custom Font', 'mixtapewp'),
				'base' => $this->getBase(),
				'category' => esc_html__('by SELECT', 'mixtapewp'),
				'icon' => 'icon-wpb-custom-font extended-custom-icon',
				'allowed_container_element' => 'vc_row',
				'params' => array(
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Custom Font Tag", 'mixtapewp'),
						"param_name" => "custom_font_tag",
						"value" => array(
							"" => "",
							"h2" => "h2",
							"h3" => "h3",
							"h4" => "h4",
							"h5" => "h5",
							"h6" => "h6",
							"p" => "p",
							"div" => "div",
						)
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Font family", 'mixtapewp'),
						"param_name" => "font_family",
						"value" => ""
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Font size (px)", 'mixtapewp'),
						"param_name" => "font_size",
						"value" => ""
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Line height (px)", 'mixtapewp'),
						"param_name" => "line_height",
						"value" => ""
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Font Style", 'mixtapewp'),
						"param_name" => "font_style",
						"value" => mixtape_qodef_get_font_style_array(),
						"description" => ""
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Font weight", 'mixtapewp'),
						"param_name" => "font_weight",
						"value" => mixtape_qodef_get_font_weight_array(),
						"save_always" => true
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Letter Spacing (px/em)", 'mixtapewp'),
						"param_name" => "letter_spacing",
						"value" => ""
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Text transform", 'mixtapewp'),
						"param_name" => "text_transform",
						"value" => array_flip(mixtape_qodef_get_text_transform_array()),
						"description" => ""
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Text decoration", 'mixtapewp'),
						"param_name" => "text_decoration",
						"value" => array(
							esc_html__("None", 'mixtapewp') => "",
							esc_html__("Underline", 'mixtapewp') => "underline",
							esc_html__("Overline", 'mixtapewp') => "overline",
							esc_html__("Line Through", 'mixtapewp') => "line-through"
						),
						"description" => ""
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__("Color", 'mixtapewp'),
						"param_name" => "color",
						"description" => ""
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Text Align", 'mixtapewp'),
						"param_name" => "text_align",
						"value" => array(
							"" => "",
							esc_html__("Left", 'mixtapewp') => "left",
							esc_html__("Center", 'mixtapewp') => "center",
							esc_html__("Right", 'mixtapewp') => "right",
							esc_html__("Justify", 'mixtapewp') => "justify"
						),
						"description" => ""
					),
					array(
						"type" => "textarea",
						"heading" => esc_html__("Content", 'mixtapewp'),
						"param_name" => "content_custom_font",
						"value" => esc_html__("Custom Font Content", 'mixtapewp'),
						"description" => "",
						"save_always" => true
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Enable Type Out Effect", 'mixtapewp'),
						"param_name" => "type_out_effect",
						"value" => array(
							esc_html__("No", 'mixtapewp') => "no",
							esc_html__("Yes", 'mixtapewp') => "yes",
						),
						"description" => esc_html__("Adds a type out effect at the end of the custom font content.", 'mixtapewp')
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Typed Phrase 1", 'mixtapewp'),
						"param_name" => "typed_ending_1",
						"value" => "",
						"description" => "",
						'dependency' => Array('element' => 'type_out_effect', 'value' => array('yes'))
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Typed Phrase 2", 'mixtapewp'),
						"param_name" => "typed_ending_2",
						"value" => "",
						"description" => "",
						'dependency' => array('element' => 'typed_ending_1', 'not_empty' => true)
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Typed Phrase 3", 'mixtapewp'),
						"param_name" => "typed_ending_3",
						"value" => "",
						"description" => "",
						'dependency' => array('element' => 'typed_ending_2', 'not_empty' => true)
					)
				)
		) );
	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @return string
	 */
	public function render($atts, $content = null) {

		$args = array(
			'custom_font_tag' => 'div',
			'font_family' => '',
			'font_size' => '',
			'line_height' => '',
			'font_style' => '',
			'font_weight' => '',
			'letter_spacing' => '',
			'text_transform' => '',
			'text_decoration' => '',
			'text_align' => '',
			'color' => '',
			'content_custom_font' => '',
			'type_out_effect' => '',
			'typed_ending_1' => '',
			'typed_ending_2' => '',
			'typed_ending_3' => '',
		);

		$params = shortcode_atts($args, $atts);

		$params['custom_font_style'] = $this->getCustomFontStyle($params);
		$params['custom_font_tag'] = $this->getCustomFontTag($params,$args);
		$params['custom_font_data'] = $this->getCustomFontData($params,$args);

		//Get HTML from template
		$html = mixtape_qodef_get_shortcode_module_template_part('templates/custom-font-template', 'customfont', '', $params);

		return $html;

	}

	/**
	 * Return Style for Custom Font
	 *
	 * @param $params
	 * @return string
	 */
	private function getCustomFontStyle($params) {
		$custom_font_style = array();

		if ($params['font_family'] !== '') {
			$custom_font_style[] = 'font-family: '.$params['font_family'];
		}

		if ($params['font_size'] !== '') {
			$font_size = strstr($params['font_size'], 'px') ? $params['font_size'] : $params['font_size'].'px';
			$custom_font_style[] = 'font-size: '.$font_size;
		}

		if ($params['line_height'] !== '') {
			$line_height = strstr($params['line_height'], 'px') ? $params['line_height'] : $params['line_height'].'px';
			$custom_font_style[] = 'line-height: '.$line_height;
		}

		if ($params['font_style'] !== '') {
			$custom_font_style[] = 'font-style: '.$params['font_style'];
		}

		if ($params['font_weight'] !== '') {
			$custom_font_style[] = 'font-weight: '.$params['font_weight'];
		}

		if ($params['letter_spacing'] !== '') {
			if (strstr($params['letter_spacing'], 'em')) {
				$letter_spacing = $params['letter_spacing'];
			} else {
				$letter_spacing = strstr($params['letter_spacing'], 'px') ? $params['letter_spacing'] : $params['letter_spacing'].'px';
			}
			
			$custom_font_style[] = 'letter-spacing: '.$letter_spacing;
		}

		if ($params['text_transform'] !== '') {
			$custom_font_style[] = 'text-transform: '.$params['text_transform'];
		}

		if ($params['text_decoration'] !== '') {
			$custom_font_style[] = 'text-decoration: '.$params['text_decoration'];
		}

		if ($params['text_align'] !== '') {
			$custom_font_style[] = 'text-align: '.$params['text_align'];
		}

		if ($params['color'] !== '') {
			$custom_font_style[] = 'color: '.$params['color'];
		}

		return implode(';', $custom_font_style);
	}

	/**
	 * Return Custom Font Tag. If provided heading isn't valid get the default one
	 *
	 * @param $params
	 * @return string
	 */
	private function getCustomFontTag($params,$args) {
		$tag_array = array('h2', 'h3', 'h4', 'h5', 'h6','p','div');
		return (in_array($params['custom_font_tag'], $tag_array)) ? $params['custom_font_tag'] : $args['custom_font_tag'];
	}

	/**
	 * Return Custom Font Data Attr
	 *
	 * @param $params
	 * @return string
	 */
	private function getCustomFontData($params) {
		$data_array = array();

		if ($params['font_size'] !== '') {
			$data_array[] = 'data-font-size= '.$params['font_size'];
		}

		if ($params['line_height'] !== '') {
			$data_array[] = 'data-line-height= '.$params['line_height'];
		}
		return implode(' ', $data_array);
	}
}