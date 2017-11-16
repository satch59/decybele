<?php
namespace MixtapeQode\Modules\Shortcodes\Counter;

use MixtapeQode\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class Counter
 */
class Counter implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'qodef_counter';

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
			'name'              => esc_html__('Counter', 'mixtapewp'),
			'base'              => $this->getBase(),
			'category'          => esc_html__('by SELECT', 'mixtapewp'),
			'admin_enqueue_css' => array(mixtape_qodef_get_skin_uri().'/assets/css/qodef-vc-extend.css'),
			'icon'              => 'icon-wpb-counter extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params' => array(
				array(
					'type'         => 'dropdown',
					'admin_label'  => true,
					'heading'      => esc_html__('Type', 'mixtapewp'),
					'param_name'   => 'type',
					'value'        => array(
						esc_html__('Zero Counter', 'mixtapewp') => 'zero',
						esc_html__('Random Counter', 'mixtapewp') => 'random'
					),
					'save_always' => true,
					'description' => ''
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Position', 'mixtapewp'),
					'param_name' => 'position',
					'value'      => array(
						esc_html__('Left', 'mixtapewp')   => 'left',
						esc_html__('Right', 'mixtapewp')  => 'right',
						esc_html__('Center', 'mixtapewp') => 'center'
					),
					'save_always' => true,
					'description' => ''
				),
				array(
					'type'        => 'textfield',
					'admin_label' => true,
					'heading'     => esc_html__('Digit', 'mixtapewp'),
					'param_name'  => 'digit',
					'description' => ''
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Digit Font Size (px)', 'mixtapewp'),
					'param_name'  => 'font_size',
					'description' => '',
					'group'       => esc_html__('Design Options', 'mixtapewp'),
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__('Digit Color', 'mixtapewp'),
					'param_name'  => 'digit_color',
					'admin_label' => true,
					'group'       => esc_html__('Design Options', 'mixtapewp')
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Title', 'mixtapewp'),
					'param_name'  => 'title',
					'admin_label' => true,
					'description' => ''
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__('Title Color', 'mixtapewp'),
					'param_name'  => 'title_color',
					'admin_label' => true,
					'group'       => esc_html__('Design Options', 'mixtapewp')
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Title Tag', 'mixtapewp'),
					'param_name' => 'title_tag',
					'value' => array(
						''   => '',
						'h2' => 'h2',
						'h3' => 'h3',
						'h4' => 'h4',
						'h5' => 'h5',
						'h6' => 'h6',
					),
					'description' => ''
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Text', 'mixtapewp'),
					'param_name'  => 'text',
					'admin_label' => true,
					'description' => ''
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__('Text Color', 'mixtapewp'),
					'param_name'  => 'text_color',
					'admin_label' => true,
					'group'       => esc_html__('Design Options', 'mixtapewp')
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Padding Bottom(px)', 'mixtapewp'),
					'param_name'  => 'padding_bottom',
					'description' => '',
					'group'       => esc_html__('Design Options', 'mixtapewp'),
				),
				array(
					'type'       => 'dropdown',
					'param_name' => 'border',
					'heading'    => esc_html__('Enable Right Border', 'mixtapewp'),
					'value' => array(
						esc_html__('No', 'mixtapewp')   => 'no',
						esc_html__('Yes', 'mixtapewp')  => 'yes'
					)
				)
			)
		) );

	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @param $content string shortcode content
	 * @return string
	 */
	public function render($atts, $content = null) {
		$args = array(
			'type'            => '',
			'position'        => 'left',
			'digit'           => '',
			'digit_color'     => '',
			'underline_digit' => '',
			'title'           => '',
			'title_tag'       => 'h6',
			'title_color'     => '',
			'font_size'       => '',
			'text'            => '',
			'text_color'      => '',
			'padding_bottom'  => '',
			'border'          => ''
		);

		$params = shortcode_atts($args, $atts);

		//get correct heading value. If provided heading isn't valid get the default one
		$headings_array      = array('h2', 'h3', 'h4', 'h5', 'h6');
		$params['title_tag'] = (in_array($params['title_tag'], $headings_array)) ? $params['title_tag'] : $args['title_tag'];

		$params['counter_holder_classes'] = $this->getCounterHolderClasses($params);
		$params['counter_holder_styles']  = $this->getCounterHolderStyle($params);
		$params['counter_styles']         = $this->getCounterStyle($params);
		$params['title_styles']           = $this->getTitleStyle($params);
		$params['text_styles']            = $this->getTextStyle($params);

		//Get HTML from template
		$html = mixtape_qodef_get_shortcode_module_template_part('templates/counter-template', 'counter', '', $params);

		return $html;

	}

	/**
	 * Return Counter holder classes
	 *
	 * @param $params
	 * @return string
	 */
	private function getCounterHolderClasses($params) {
		$classes = array();

		$classes[] = 'qodef-counter-' . $params['position'];

		if ( $params['border'] === 'yes' ) {
			$classes[] = 'qodef-counter-with-border';
		}


		return implode(' ', $classes);
	}

	/**
	 * Return Counter holder styles
	 *
	 * @param $params
	 * @return string
	 */
	private function getCounterHolderStyle($params) {
		$counterHolderStyle = array();

		if ($params['padding_bottom'] !== '') {

			$counterHolderStyle[] = 'padding-bottom: ' . $params['padding_bottom'] . 'px';

		}

		return implode(';', $counterHolderStyle);
	}

	/**
	 * Return Counter styles
	 *
	 * @param $params
	 * @return string
	 */
	private function getCounterStyle($params) {
		$counterStyle = array();

		if ($params['font_size'] !== '') {
			$counterStyle[] = 'font-size: ' . $params['font_size'] . 'px';
		}
		if ($params['digit_color'] !== '') {
			$counterStyle[] = 'color: ' . $params['digit_color'];
		}

		return implode(';', $counterStyle);
	}

	/**
	 * Return Text styles
	 *
	 * @param $params
	 * @return string
	 */
	private function getTextStyle($params) {
		$text_style = array();

		if ($params['text_color'] !== '') {
			$text_style[] = 'color: ' . $params['text_color'];
		}

		return implode(';', $text_style);
	}

	/**
	 * Return Title styles
	 *
	 * @param $params
	 * @return string
	 */
	private function getTitleStyle($params) {
		$title_style = array();

		if ($params['title_color'] !== '') {
			$title_style[] = 'color: ' . $params['title_color'];
		}

		return implode(';', $title_style);
	}
}