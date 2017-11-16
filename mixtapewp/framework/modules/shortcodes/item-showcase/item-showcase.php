<?php
namespace MixtapeQode\Modules\Shortcodes\ItemShowcase;

use MixtapeQode\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class ItemShowcase
 */
class ItemShowcase implements ShortcodeInterface	{
	private $base; 
	
	function __construct() {
		$this->base = 'qodef_item_showcase';

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
			'name' => esc_html__('Item Showcase', 'mixtapewp'),
			'base' => $this->base,
			'category' => esc_html__('by SELECT', 'mixtapewp'),
			'icon' => 'icon-wpb-showcase extended-custom-icon',
            'as_parent' => array('only' => 'qodef_item_showcase_list_item'),
            'js_view' => 'VcColumnView',
			'params' =>	array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__('Image', 'mixtapewp'),
                    'param_name' => 'item_image'
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Image Top Offset', 'mixtapewp'),
                    'admin_label' => true,
                    'value' => '-180px',
                    'save_always' => true,
                    'param_name' => 'image_top_offset',
                ),
            )
		) );

	}

	public function render($atts, $content = null) {
		
		$args = array(
            'item_image'    => '',
            'image_top_offset' => '',
        );

		$params = shortcode_atts($args, $atts);

        extract($params);

        $html = '';

        $item_showcase_classes = array();
        $item_showcase_classes[] = 'clearfix qodef-item-showcase';
        $item_showcase_class = implode(' ', $item_showcase_classes);

        $item_image_style = '';
        $item_image_style .= 'margin-top:' . mixtape_qodef_filter_px($image_top_offset) . 'px;';

        $html .= '<div '. mixtape_qodef_get_class_attribute($item_showcase_class) . '>';
            $html .= '<div class="qodef-item-image" '. mixtape_qodef_get_inline_style($item_image_style)  .'>';
                if ($item_image != '') {
                    $html .= wp_get_attachment_image($item_image,'full');
                }
            $html .= '</div>';
            $html .= do_shortcode($content);
        $html .= '</div>';

        return $html;

	}

}