<?php 
namespace MixtapeQode\Modules\Shortcodes\AccordionTab;

use MixtapeQode\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
	* class Accordions
*/
class AccordionTab implements ShortcodeInterface{
	/**
	 * @var string
	 */
	private $base;
	function __construct() {
		$this->base = 'qodef_accordion_tab';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')){
			vc_map( array(
				"name" => esc_html__('Accordion Tab', 'mixtapewp'),
				"base" => $this->base,
				"as_parent" => array('except' => 'vc_row'),
				"as_child" => array('only' => 'qodef_accordion'),
				'is_container' => true,
				"category" => esc_html__('by SELECT', 'mixtapewp'),
				"icon" => "icon-wpb-accordion-section extended-custom-icon",
				"show_settings_on_create" => true,
				"js_view" => 'VcColumnView',
				"params" => array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Title', 'mixtapewp' ),
						'param_name' => 'title',
						'admin_label' => true,
						'value' => esc_html__( 'Section', 'mixtapewp' ),
						'description' => esc_html__( 'Enter accordion section title.', 'mixtapewp' )
					),
					array(
						'type' => 'el_id',
						'heading' => esc_html__( 'Section ID', 'mixtapewp' ),
						'param_name' => 'el_id',
						'description' => sprintf( esc_html__( 'Enter optional row ID. Make sure it is unique, and it is valid as w3c specification: %s (Must not have spaces)', 'mixtapewp' ), '<a target="_blank" href="http://www.w3schools.com/tags/att_global_id.asp">' . esc_html__( 'link', 'mixtapewp' ) . '</a>' ),
					),
					array(
						"type" => "dropdown",
						"class" => "",
						"heading" => esc_html__("Title Tag",'mixtapewp'),
						"param_name" => "title_tag",
						"value" => array(
							""   => "",
							"p"  => "p",
							"h2" => "h2",
							"h3" => "h3",
							"h4" => "h4",
							"h5" => "h5",
							"h6" => "h6",
						),
						"description" => ""
					)
				)

			));
		}
	}	
	public function render($atts, $content = null) {

		$default_atts = (array(
			'title'	=> esc_html__("Accordion Title",'mixtapewp'),
			'title_tag' => 'p',
			'el_id' => ''
		));
		
		$params = shortcode_atts($default_atts, $atts);
		extract($params);
		$params['content'] = $content;
		
		$output = '';
		
		$output .= mixtape_qodef_get_shortcode_module_template_part('templates/accordion-template','accordions', '',$params);

		return $output;
		
	}

}