<?php
namespace MixtapeQode\Modules\Shortcodes\SectionSubtitle;

use MixtapeQode\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class SectionSubtitle
 */
class SectionSubtitle implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'qodef_section_title';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	public function vcMap() {

		vc_map( array(
				'name' => esc_html__('Section Title', 'mixtapewp'),
				'base' => $this->getBase(),
				'category' => esc_html__('by SELECT', 'mixtapewp'),
				'icon' => 'icon-wpb-section-subtitle extended-custom-icon',
				'allowed_container_element' => 'vc_row',
				'params' => array(
					array(
						'type'			=> 'textfield',
						'param_name'	=> 'before_text',
						'heading'		=> esc_html__('Before Title Text', 'mixtapewp'),
						'value'			=> '',
						'admin_label'	=> true
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'before_tag',
						'heading'     => esc_html__( 'Before Title Text Tag', 'mixtapewp' ),
						'value'  => array(
							esc_html__('Default', 'mixtapewp')  => '',
							'h1' => 'h1',
							'h2' => 'h2',
							'h3' => 'h3',
							'h4' => 'h4',
							'h5' => 'h5',
							'h6' => 'h6',
							'p'  => 'p'
						),
						'save_always' => true,
						'dependency'  => array( 'element' => 'before_text', 'not_empty' => true )
					),
					array(
						'type'        => 'colorpicker',
						'param_name'  => 'before_color',
						'heading'     => esc_html__('Before Text Color', 'mixtapewp'),
						'admin_label' => true,
						'dependency'  => array( 'element' => 'before_text', 'not_empty' => true )
					),
					array(
						'type'			=> 'textfield',
						'param_name'	=> 'before_margin',
						'heading'		=> esc_html__('Before Text Bottom Margin (px)', 'mixtapewp'),
						'admin_label'	=> true,
						'dependency'  => array( 'element' => 'before_text', 'not_empty' => true )
					),
					array(
						'type'			=> 'textfield',
						'param_name'	=> 'title_text',
						'heading'		=> esc_html__('Title Text', 'mixtapewp'),
						'admin_label'	=> true
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'title_tag',
						'heading'     => esc_html__( 'Title Tag', 'mixtapewp' ),
						'value'  => array(
							esc_html__('Default', 'mixtapewp')  => '',
							'h1' => 'h1',
							'h2' => 'h2',
							'h3' => 'h3',
							'h4' => 'h4',
							'h5' => 'h5',
							'h6' => 'h6'
						),
						'save_always' => true,
						'dependency'  => array( 'element' => 'title_text', 'not_empty' => true )
					),
					array(
						'type'        => 'colorpicker',
						'param_name'  => 'title_color',
						'heading'     => esc_html__('Title Color', 'mixtapewp'),
						'admin_label' => true
					),
					array(
						'type'			=> 'dropdown',
						'param_name'	=> 'text_align',
						'heading'		=> esc_html__('Text Align', 'mixtapewp'),
						'value'			=> array(
							''			=> '',
                            esc_html__('Left', 'mixtapewp')		=> 'left',
                            esc_html__('Center', 'mixtapewp')	=> 'center',
                            esc_html__('Right', 'mixtapewp')	=> 'right',
                            esc_html__('Justify', 'mixtapewp')	=> 'justify'
						)
					),
					array(
						'type'			=> 'dropdown',
						'param_name'	=> 'separator',
						'heading'		=> esc_html__('Enable Bottom Separator', 'mixtapewp'),
						'value'			=> array(
							esc_html__('Yes', 'mixtapewp')  => 'yes',
							esc_html__('No', 'mixtapewp')	=> 'no'
						)
					),
					array(
						'type'			=> 'textfield',
						'param_name'	=> 'separator_margin',
						'heading'		=> esc_html__('Separator Top Margin (px, em or %)', 'mixtapewp'),
					),
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
			'before_text'       => '',
			'before_tag'        => 'p',
			'before_color'	    => '',
			'before_margin'     => '',
			'title_text'        => '',
			'title_tag'         => 'h2',
			'title_color'       => '',
			'text_align'	    => '',
			'separator'         => 'yes',
			'separator_margin'  => ''
		);

		$params = shortcode_atts($args, $atts);

		$params['before_tag']   = ! empty( $params['before_tag'] ) ? $params['before_tag'] : $args['before_tag'];
		$params['title_tag']    = ! empty( $params['title_tag'] ) ? $params['title_tag'] : $args['title_tag'];
		$params['before_style'] = $this->getBeforeTextStyles($params);
		$params['title_style']  = $this->getTitleStyles($params);

		//Get HTML from template
		$html = mixtape_qodef_get_shortcode_module_template_part('templates/section-title-template', 'section-title', '', $params);

		return $html;

	}

	/**
	 * Return before text styles
	 *
	 * @param $params
	 * @return string
	 */
	private function getBeforeTextStyles($params) {
		$beforeStyles = array();

		if( ! empty($params['before_color']) ) {
			$beforeStyles[] = 'color:' . $params['before_color'];
		}

		if($params['before_margin'] !== '') {
			$beforeStyles[] = 'margin-bottom:' . mixtape_qodef_filter_px($params['before_margin']) . 'px';
		}

		return implode(';', $beforeStyles);
	}

	/**
	 * Return title styles
	 *
	 * @param $params
	 * @return string
	 */
	private function getTitleStyles($params) {
		$titleStyles = array();

		if( ! empty($params['text_align']) ) {
			$titleStyles[] = 'text-align:' . $params['text_align'];
		}

		if( ! empty($params['title_color']) ) {
			$titleStyles[] = 'color:' . $params['title_color'];
		}

		return implode(';', $titleStyles);
	}
}