<?php
namespace MixtapeQode\Modules\Shortcodes\CallToAction;

use MixtapeQode\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class CallToAction
 */
class CallToAction implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'qodef_call_to_action';

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

		$call_to_action_button_icons_array = array();
		$call_to_action_button_IconCollections = mixtape_qodef_icon_collections()->iconCollections;
		foreach($call_to_action_button_IconCollections as $collection_key => $collection) {

			$call_to_action_button_icons_array[] = array(
				'type' => 'dropdown',
				'heading' => esc_html__('Button Icon', 'mixtapewp'),
				'param_name' => 'button_'.$collection->param,
				'value' => $collection->getIconsArray(),
				'save_always' => true,
				'dependency' => Array('element' => 'button_icon_pack', 'value' => array($collection_key))
			);

		}

		vc_map( array(
				'name' => esc_html__('Call To Action', 'mixtapewp'),
				'base' => $this->getBase(),
				'category' => esc_html__('by SELECT', 'mixtapewp'),
				'icon' => 'icon-wpb-call-to-action extended-custom-icon',
				'allowed_container_element' => 'vc_row',
				'params' => array_merge(
					array(
						array(
							'type'          => 'dropdown',
							'heading'       => esc_html__('Full Width', 'mixtapewp'),
							'param_name'    => 'full_width',
							'admin_label'	=> true,
							'value'         => array(
								esc_html__('Yes', 'mixtapewp')       => 'yes',
								esc_html__('No', 'mixtapewp')        => 'no'
							),
							'save_always' 	=> true,
							'description'   => '',
						),
						array(
							'type'          => 'dropdown',
							'heading'       => esc_html__('Content in grid', 'mixtapewp'),
							'param_name'    => 'content_in_grid',
							'value'         => array(
								esc_html__('Yes', 'mixtapewp')       => 'yes',
								esc_html__('No', 'mixtapewp')        => 'no'
							),
							'save_always'	=> true,
							'description'   => '',
							'dependency'    => array('element' => 'full_width', 'value' => 'yes')
						),
						array(
							'type'          => 'dropdown',
							'heading'       => esc_html__('Grid size', 'mixtapewp'),
							'param_name'    => 'grid_size',
							'value'         => array(
								'75/25'     => '75',
								'50/50'     => '50',
								'66/33'     => '66'
							),
							'save_always' 	=> true,
							'description'   => '',
							'dependency'    => array('element' => 'content_in_grid', 'value' => 'yes')
						),
						array(
							'type' 			=> 'dropdown',
							'heading'		=> esc_html__('Type', 'mixtapewp'),
							'param_name' 	=> 'type',
							'admin_label' 	=> true,
							'value' 		=> array(
								esc_html__('Normal', 'mixtapewp') 	  => 'normal',
								esc_html__('With Icon', 'mixtapewp')  => 'with-icon',
							),
							'save_always' 	=> true,
							'description' 	=> ''
						)
					),
					mixtape_qodef_icon_collections()->getVCParamsArray(array('element' => 'type', 'value' => array('with-icon'))),
					array(
						array(
							'type' 			=> 'colorpicker',
							'heading' 		=> esc_html__('Background Color', 'mixtapewp'),
							'param_name' 	=> 'bg_color',
							'admin_label' 	=> true,
							'group'			=> esc_html__('Design Options', 'mixtapewp')
						),
						array(
							'type' 			=> 'textfield',
							'heading' 		=> esc_html__('Icon Size (px)', 'mixtapewp'),
							'param_name' 	=> 'icon_size',
							'description' 	=> '',
							'dependency' 	=> Array('element' => 'type', 'value' => array('with-icon')),
							'group'			=> esc_html__('Design Options', 'mixtapewp'),
						),
						array(
							'type' 			=> 'textfield',
							'heading' 		=> esc_html__('Box Padding (top right bottom left) px', 'mixtapewp'),
							'param_name' 	=> 'box_padding',
							'admin_label' 	=> true,
							'description' 	=> esc_html__('Default padding is 20px on all sides', 'mixtapewp'),
							'group'			=> esc_html__('Design Options', 'mixtapewp')
						),
						array(
							'type' 			=> 'textfield',
							'heading' 		=> esc_html__('Default Text Font Size (px)', 'mixtapewp'),
							'param_name' 	=> 'text_size',
							'description' 	=> esc_html__('Font size for p tag', 'mixtapewp'),
							'group'			=> esc_html__('Design Options', 'mixtapewp'),
						),
						array(
							'type' 			=> 'dropdown',
							'heading' 		=> esc_html__('Show Button', 'mixtapewp'),
							'param_name' 	=> 'show_button',
							'value' 		=> array(
								esc_html__('Yes', 'mixtapewp') 		=> 'yes',
								esc_html__('No', 'mixtapewp') 		=> 'no'
							),
							'admin_label' 	=> true,
							'save_always' 	=> true,
							'description' 	=> ''
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Button Position', 'mixtapewp'),
							'param_name' => 'button_position',
							'value' => array(
								esc_html__('Default/right', 'mixtapewp') => '',
								esc_html__('Center', 'mixtapewp') => 'center',
								esc_html__('Left', 'mixtapewp') => 'left'
							),
							'description' => '',
							'dependency' => array('element' => 'show_button', 'value' => array('yes'))
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Button Skin', 'mixtapewp'),
							'param_name' => 'button_skin',
							'value' => array(
								esc_html__('Dark', 'mixtapewp') => 'dark',
								esc_html__('Light', 'mixtapewp') => 'light',
							),
							'description' => '',
							'dependency' => array('element' => 'show_button', 'value' => array('yes')),
							'group'			=> esc_html__('Design Options', 'mixtapewp'),
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Button Size', 'mixtapewp'),
							'param_name' => 'button_size',
							'value' => array(
								esc_html__('Default', 'mixtapewp') => '',
								esc_html__('Small', 'mixtapewp') => 'small',
								esc_html__('Medium', 'mixtapewp') => 'medium',
								esc_html__('Large', 'mixtapewp') => 'large',
								esc_html__('Extra Large', 'mixtapewp') => 'big_large'
							),
							'description' => '',
							'dependency' => array('element' => 'show_button', 'value' => array('yes')),
							'group'			=> esc_html__('Design Options', 'mixtapewp'),
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__('Button Text', 'mixtapewp'),
							'param_name' => 'button_text',
							'admin_label' 	=> true,
							'description' => esc_html__('Default text is "button"', 'mixtapewp'),
							'dependency' => array('element' => 'show_button', 'value' => array('yes'))
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__('Button Link', 'mixtapewp'),
							'param_name' => 'button_link',
							'description' => '',
							'admin_label' 	=> true,
							'dependency' => array('element' => 'show_button', 'value' => array('yes'))
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Button Target', 'mixtapewp'),
							'param_name' => 'button_target',
							'value' => array(
								'' => '',
								esc_html__('Self', 'mixtapewp') => '_self',
								esc_html__('Blank', 'mixtapewp') => '_blank'
							),
							'description' => '',
							'dependency' => array('element' => 'show_button', 'value' => array('yes'))
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Button Icon Pack', 'mixtapewp'),
							'param_name' => 'button_icon_pack',
							'value' => array_merge(array(esc_html__('No Icon', 'mixtapewp') => ''),mixtape_qodef_icon_collections()->getIconCollectionsVC()),
							'save_always' => true,
							'dependency' => array('element' => 'show_button', 'value' => array('yes'))
						)
					),
					$call_to_action_button_icons_array,
					array(
						array(
							'type' => 'textarea_html',
							'admin_label' => true,
							'heading' => esc_html__('Content', 'mixtapewp'),
							'param_name' => 'content',
							'value' => '<p>'.esc_html__('I am test text for Call to action.', 'mixtapewp').'</p>',
							'description' => ''
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
			'type' => 'normal',
			'full_width' => 'yes',
			'content_in_grid' => 'yes',
			'grid_size' => '75',
			'bg_color'	=> '',
			'icon_size' => '',
			'box_padding' => '20px',
			'text_size' => '',
			'show_button' => 'yes',
			'button_position' => 'right',
			'button_size' => '',
			'button_skin' => '',
			'button_link' => '',
			'button_text' => 'button',
			'button_target' => '',
			'button_icon_pack' => ''
		);

		$call_to_action_icons_form_fields = array();

		foreach (mixtape_qodef_icon_collections()->iconCollections as $collection_key => $collection) {

			$call_to_action_icons_form_fields['button_' . $collection->param ] = '';

		}

		$args = array_merge($args, mixtape_qodef_icon_collections()->getShortcodeParams(),$call_to_action_icons_form_fields);

		$params = shortcode_atts($args, $atts);

		$params['content']= preg_replace('#^<\/p>|<p>$#', '', $content);
		$params['text_wrapper_classes'] = $this->getTextWrapperClasses($params);
		$params['content_styles'] = $this->getContentStyles($params);
		$params['call_to_action_styles'] = $this->getCallToActionStyles($params);
		$params['icon'] = $this->getCallToActionIcon($params);
		$params['button_parameters'] = $this->getButtonParameters($params);
		$params['bg_style'] = $this->getBackgroundStyles($params);

		//Get HTML from template
		$html = mixtape_qodef_get_shortcode_module_template_part('templates/call-to-action-template', 'calltoaction', '', $params);

		return $html;

	}

	/**
	 * Return Classes for Call To Action text wrapper
	 *
	 * @param $params
	 * @return string
	 */
	private function getTextWrapperClasses($params) {
		return ( $params['show_button'] == 'yes') ? 'qodef-call-to-action-column1 qodef-call-to-action-cell' : '';
	}

	/**
	 * Return CSS styles for Call To Action Icon
	 *
	 * @param $params
	 * @return string
	 */
	private function getBackgroundStyles($params) {
		$bg_style = array();

		if ($params['bg_color'] !== '') {
			$bg_style[] = 'background-color: ' . $params['bg_color'];
		}

		return implode(';', $bg_style);
	}

	/**
	 * Return CSS styles for Call To Action Icon
	 *
	 * @param $params
	 * @return string
	 */
	private function getIconStyles($params) {
		$icon_style = array();

		if ($params['icon_size'] !== '') {
			$icon_style[] = 'font-size: ' . $params['icon_size'] . 'px';
		}

		return implode(';', $icon_style);
	}

	/**
	 * Return CSS styles for Call To Action Content
	 *
	 * @param $params
	 * @return string
	 */
	private function getContentStyles($params) {
		$content_styles = array();

		if ($params['text_size'] !== '') {
			$content_styles[] = 'font-size: ' . $params['text_size'] . 'px';
		}

		return implode(';', $content_styles);
	}

	/**
	 * Return CSS styles for Call To Action shortcode
	 *
	 * @param $params
	 * @return string
	 */
	private function getCallToActionStyles($params) {
		$call_to_action_styles = array();

		if ($params['box_padding'] != '') {
			$call_to_action_styles[] = 'padding: ' . $params['box_padding'] . ';';
		}

		return implode(';', $call_to_action_styles);
	}

	/**
	 * Return Icon for Call To Action Shortcode
	 *
	 * @param $params
	 * @return mixed
	 */
	private function getCallToActionIcon($params) {

		$icon = mixtape_qodef_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
		$iconStyles = array();
		$iconStyles['icon_attributes']['style'] = $this->getIconStyles($params);
		$call_to_action_icon = '';
		if(!empty($params[$icon])){			
			$call_to_action_icon = mixtape_qodef_icon_collections()->renderIcon( $params[$icon], $params['icon_pack'], $iconStyles );
		}
		return $call_to_action_icon;

	}
	
	private function getButtonParameters($params) {
		$button_params_array = array();
		
		if(!empty($params['button_link'])) {
			$button_params_array['link'] = $params['button_link'];
		}
		
		if(!empty($params['button_size'])) {
			$button_params_array['size'] = $params['button_size'];
		}

		if(!empty($params['button_skin'])) {
			$button_params_array['button_skin'] = $params['button_skin'];
		}
		
		if(!empty($params['button_icon_pack'])) {
			$button_params_array['icon_pack'] = $params['button_icon_pack'];
			$iconPackName = mixtape_qodef_icon_collections()->getIconCollectionParamNameByKey($params['button_icon_pack']);
			$button_params_array[$iconPackName] = $params['button_'.$iconPackName];		
		}
				
		if(!empty($params['button_target'])) {
			$button_params_array['target'] = $params['button_target'];
		}
		
		if(!empty($params['button_text'])) {
			$button_params_array['text'] = $params['button_text'];
		}
		
		return $button_params_array;
	}
}