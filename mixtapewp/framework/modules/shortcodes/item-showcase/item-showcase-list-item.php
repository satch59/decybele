<?php
namespace MixtapeQode\Modules\Shortcodes\ItemShowcaseListItem;

use MixtapeQode\Modules\Shortcodes\Lib\ShortcodeInterface;

class ItemShowcaseListItem implements ShortcodeInterface{
	private $base;

	function __construct() {
		$this->base = 'qodef_item_showcase_list_item';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')){
			vc_map( 
				array(
					'name' => esc_html__('Item Showcase List Item', 'mixtapewp'),
					'base' => $this->base,
					'as_child' => array('only' => 'qodef_item_showcase'),
					'as_parent' => array('except' => 'vc_row, vc_accordion, no_cover_boxes, no_portfolio_list, no_portfolio_slider'),
					'content_element' => true,
					'category' => esc_html__('by SELECT', 'mixtapewp'),
					'icon' => 'icon-wpb-showcase-list-item extended-custom-icon',
					'show_settings_on_create' => true,
					'params' => array_merge(
						\MixtapeQodeIconCollections::get_instance()->getVCParamsArray(),
						array(
							array(
								'type'        => 'dropdown',
								'admin_label' => true,
								'heading'     => esc_html__('Item Position', 'mixtapewp'),
								'param_name'  => 'item_position',
								'value'       => array(
                                    esc_html__('Left', 'mixtapewp')  => 'left',
                                    esc_html__('Right', 'mixtapewp') => 'right'
								),
								'save_always' => true
							),
							array(
								'type'        => 'textfield',
								'heading'     => esc_html__('Item Title', 'mixtapewp'),
								'admin_label' => true,
								'param_name'  => 'item_title',
							),
							array(
								'type'        => 'textfield',
								'heading'     => esc_html__('Item Text', 'mixtapewp'),
								'admin_label' => true,
								'param_name'  => 'item_text',
							),
							array(
								'type'       => 'textfield',
								'heading'    => esc_html__('Item Link', 'mixtapewp'),
								'param_name' => 'item_link',
								'dependency' => array( 'element' => 'item_title', 'not_empty' => true )
							),
							array(
								'type' => 'colorpicker',
								'heading' => esc_html__('Icon Color', 'mixtapewp'),
								'param_name' => 'icon_color',
								'description' => ''
							),
						)
					)
				)
			);			
		}
	}

	public function render($atts, $content = null) {
		$args = array(
			'item_position' => '',
			'icon_color' => '',
			'item_title' => '',
			'item_text' => '',
			'item_link' => '',
		);

		$args = array_merge($args, mixtape_qodef_icon_collections()->getShortcodeParams());
		$params = shortcode_atts($args, $atts);
		extract($params);

		$iconPackName = mixtape_qodef_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);

		$params['icon'] = $params[$iconPackName];
		$params['icon_attributes']['style'] =  $this->getIconStyle($params);

		$params['item_showcase_list_item_class'] = $this->getItemShowcaseListItemClass($params);


		$html = mixtape_qodef_get_shortcode_module_template_part('templates/item-showcase-list-item-template', 'item-showcase', '', $params);

		return $html;
	}


	/**
	 * Generates icon styles
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getIconStyle($params){

		$iconStylesArray = array();
		if(!empty($params['icon_color'])) {
			$iconStylesArray[] = 'color:' . $params['icon_color'];
		}

		return implode(';', $iconStylesArray);
	}


	/**
	 * Return Item Showcase List Item Classes
	 *
	 * @param $params
	 * @return array
	 */
	private function getItemShowcaseListItemClass($params) {

		$item_showcase_list_item_class = array();

		if ($params['item_position'] !== '') {
			$item_showcase_list_item_class[] = 'qodef-item-'. $params['item_position'];
		}

		return implode(' ', $item_showcase_list_item_class);

	}

}
