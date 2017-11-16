<?php
namespace MixtapeQode\Modules\Shortcodes\Counter;

use MixtapeQode\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class Countdown
 */
class Countdown implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'qodef_countdown';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase()
	{
		return $this->base;
	}

	/**
	 * Maps shortcode to Visual Composer. Hooked on vc_before_init
	 *
	 * @see qodef_core_get_carousel_slider_array_vc()
	 */
	public function vcMap() {

		vc_map( array(
			'name' => esc_html__('Countdown', 'mixtapewp'),
			'base' => $this->getBase(),
			'category' => esc_html__('by SELECT', 'mixtapewp'),
			'admin_enqueue_css' => array(mixtape_qodef_get_skin_uri().'/assets/css/qodef-vc-extend.css'),
			'icon' => 'icon-wpb-countdown extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params' => array(
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Year', 'mixtapewp'),
					'param_name' => 'year',
					'value' => array(
						'' => '',
						'2017' => '2017',
						'2018' => '2018',
						'2019' => '2019',
						'2020' => '2020',
						'2021' => '2021',
						'2022' => '2022'
					),
					'admin_label' => true,
					'save_always' => true
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Month', 'mixtapewp'),
					'param_name' => 'month',
					'value' => array(
						'' => '',
						esc_html__('January', 'mixtapewp') => '1',
						esc_html__('February', 'mixtapewp') => '2',
						esc_html__('March', 'mixtapewp') => '3',
						esc_html__('April', 'mixtapewp') => '4',
						esc_html__('May', 'mixtapewp') => '5',
						esc_html__('June', 'mixtapewp') => '6',
						esc_html__('July', 'mixtapewp') => '7',
						esc_html__('August', 'mixtapewp') => '8',
						esc_html__('September', 'mixtapewp') => '9',
						esc_html__('October', 'mixtapewp') => '10',
						esc_html__('November', 'mixtapewp') => '11',
						esc_html__('December', 'mixtapewp') => '12'
					),
					'admin_label' => true,
					'save_always' => true
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Day', 'mixtapewp'),
					'param_name' => 'day',
					'value' => array(
						'' => '',
						'1' => '1',
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
						'6' => '6',
						'7' => '7',
						'8' => '8',
						'9' => '9',
						'10' => '10',
						'11' => '11',
						'12' => '12',
						'13' => '13',
						'14' => '14',
						'15' => '15',
						'16' => '16',
						'17' => '17',
						'18' => '18',
						'19' => '19',
						'20' => '20',
						'21' => '21',
						'22' => '22',
						'23' => '23',
						'24' => '24',
						'25' => '25',
						'26' => '26',
						'27' => '27',
						'28' => '28',
						'29' => '29',
						'30' => '30',
						'31' => '31',
					),
					'admin_label' => true,
					'save_always' => true
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Hour', 'mixtapewp'),
					'param_name' => 'hour',
					'value' => array(
						'' => '',
						'0' => '0',
						'1' => '1',
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
						'6' => '6',
						'7' => '7',
						'8' => '8',
						'9' => '9',
						'10' => '10',
						'11' => '11',
						'12' => '12',
						'13' => '13',
						'14' => '14',
						'15' => '15',
						'16' => '16',
						'17' => '17',
						'18' => '18',
						'19' => '19',
						'20' => '20',
						'21' => '21',
						'22' => '22',
						'23' => '23',
						'24' => '24'
					),
					'admin_label' => true,
					'save_always' => true
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Minute', 'mixtapewp'),
					'param_name' => 'minute',
					'value' => array(
						'' => '',
						'0' => '0',
						'1' => '1',
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
						'6' => '6',
						'7' => '7',
						'8' => '8',
						'9' => '9',
						'10' => '10',
						'11' => '11',
						'12' => '12',
						'13' => '13',
						'14' => '14',
						'15' => '15',
						'16' => '16',
						'17' => '17',
						'18' => '18',
						'19' => '19',
						'20' => '20',
						'21' => '21',
						'22' => '22',
						'23' => '23',
						'24' => '24',
						'25' => '25',
						'26' => '26',
						'27' => '27',
						'28' => '28',
						'29' => '29',
						'30' => '30',
						'31' => '31',
						'32' => '32',
						'33' => '33',
						'34' => '34',
						'35' => '35',
						'36' => '36',
						'37' => '37',
						'38' => '38',
						'39' => '39',
						'40' => '40',
						'41' => '41',
						'42' => '42',
						'43' => '43',
						'44' => '44',
						'45' => '45',
						'46' => '46',
						'47' => '47',
						'48' => '48',
						'49' => '49',
						'50' => '50',
						'51' => '51',
						'52' => '52',
						'53' => '53',
						'54' => '54',
						'55' => '55',
						'56' => '56',
						'57' => '57',
						'58' => '58',
						'59' => '59',
						'60' => '60',
					),
					'admin_label' => true,
					'save_always' => true
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Month Label', 'mixtapewp'),
					'param_name' => 'month_label',
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Day Label', 'mixtapewp'),
					'param_name' => 'day_label',
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Hour Label', 'mixtapewp'),
					'param_name' => 'hour_label',
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Minute Label', 'mixtapewp'),
					'param_name' => 'minute_label',
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Second Label', 'mixtapewp'),
					'param_name' => 'second_label',
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Digit Font Size (px)', 'mixtapewp'),
					'param_name' => 'digit_font_size',
					'description' => '',
					'group' => esc_html__('Design Options', 'mixtapewp')
				),
                array(
                    'type'        => 'colorpicker',
                    'heading'     => esc_html__('Digit Color', 'mixtapewp'),
                    'param_name'  => 'digit_color',
                    'admin_label' => true,
                    'group'       => esc_html__('Design Options', 'mixtapewp')
                ),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Label Font Size (px)', 'mixtapewp'),
					'param_name' => 'label_font_size',
					'description' => '',
					'group' => esc_html__('Design Options', 'mixtapewp')
				),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Label Color', 'mixtapewp'),
                    'param_name' => 'label_color',
                    'admin_label' => true,
                    'description' => '',
                    'group'       => esc_html__('Design Options', 'mixtapewp')
                ),
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
	public function render($atts, $content = null)
	{

		$args = array(
			'year' => '',
			'month' => '', 
			'day' => '',
			'hour' => '',
			'minute' => '',
			'month_label' => 'Months',
			'day_label' => 'Days',
			'hour_label' => 'Hours',
			'minute_label' => 'Minutes',
			'second_label' => 'Seconds',
			'digit_font_size' => '',
            'digit_color' => '',
			'label_font_size' => '',
            'label_color' => ''
		);

		$params = shortcode_atts($args, $atts);

		$params['id'] = mt_rand(1000, 9999);

		//Get HTML from template
		$html = mixtape_qodef_get_shortcode_module_template_part('templates/countdown-template', 'countdown', '', $params);

		return $html;

	}

}