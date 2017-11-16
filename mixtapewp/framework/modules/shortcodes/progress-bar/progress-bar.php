<?php
namespace MixtapeQode\Modules\Shortcodes\ProgressBar;

use MixtapeQode\Modules\Shortcodes\Lib\ShortcodeInterface;

class ProgressBar implements ShortcodeInterface{
	private $base;
	
	function __construct() {
		$this->base = 'qodef_progress_bar';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {

		vc_map( array(
			'name' => esc_html__('Progress Bar', 'mixtapewp'),
			'base' => $this->base,
			'icon' => 'icon-wpb-progress-bar extended-custom-icon',
			'category' => esc_html__('by SELECT', 'mixtapewp'),
			'allowed_container_element' => 'vc_row',
			'params' => array(
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Title', 'mixtapewp'),
					'param_name' => 'title',
					'description' => ''
				),
				array(
					'type' => 'dropdown',
					'admin_label' => true,
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
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Percentage', 'mixtapewp'),
					'param_name' => 'percent',
					'description' => ''
				),	
				array(
					'type' => 'dropdown',
					'admin_label' => true,
					'heading' => esc_html__('Percentage Type', 'mixtapewp'),
					'param_name' => 'percentage_type',
					'value' => array(
                        esc_html__('Floating', 'mixtapewp')  => 'floating',
                        esc_html__('Static', 'mixtapewp') => 'static'
					),
					'dependency' => Array('element' => 'percent', 'not_empty' => true)
				),
				array(
                    'type'        => 'colorpicker',
                    'heading'     => esc_html__('Active Bar Color', 'mixtapewp'),
                    'param_name'  => 'active_bar_color',
                    'admin_label' => true
                ),
			)
		) );

	}

	public function render($atts, $content = null) {
		$args = array(
            'title' => '',
            'title_tag' => 'h6',
            'percent' => '100',
            'percentage_type' => 'floating',
            'active_bar_color' => '',
        );
		$params = shortcode_atts($args, $atts);

		//Extract params for use in method
		extract($params);
		$headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];
		
		$params['percentage_classes']  = $this->getPercentageClasses($params);
		$params['progress_bar_styles'] = $this->getProgressBarStyles($params);		

        //init variables
		$html = mixtape_qodef_get_shortcode_module_template_part('templates/progress-bar-template', 'progress-bar', '', $params);
		
        return $html;
		
	}
	/**
    * Generates css classes for progress bar
    *
    * @param $params
    *
    * @return array
    */
	private function getPercentageClasses($params){
		
		$percentClassesArray = array();
		
		if(!empty($params['percentage_type']) !=''){
			
			if($params['percentage_type'] == 'floating'){
				
				$percentClassesArray[]= 'qodef-floating';


			}
			elseif($params['percentage_type'] == 'static'){
				
				$percentClassesArray[] = 'qodef-static';
				
			}
		}
		return implode(' ', $percentClassesArray);
	}

	/**
     * Returns array of progress bar styles
     *
     * @param $params
     *
     * @return array
     */
    private function getProgressBarStyles($params) {
        $styles = array();

        if(!empty($params['active_bar_color'])) {
            $styles[] = 'background-color: '.$params['active_bar_color'];
        }

        return $styles;
    }
}