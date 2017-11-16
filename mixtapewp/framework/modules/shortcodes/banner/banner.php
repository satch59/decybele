<?php
namespace MixtapeQode\Modules\Shortcodes\Banner;

use MixtapeQode\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class ItemShowcase
 */
class Banner implements ShortcodeInterface  {
    private $base; 
    
    function __construct() {
        $this->base = 'qodef_banner';

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
            'name' => esc_html__('Banner', 'mixtapewp'),
            'base' => $this->base,
            'category' => esc_html__('by SELECT', 'mixtapewp'),
            'icon' => 'icon-wpb-banner extended-custom-icon',
            'params' => array(
                array(
                    'type' => 'attach_image',
                    'param_name' => 'item_image',
                    'heading' => esc_html__('Image', 'mixtapewp'),
                ),
                array(
                    'type' => 'textfield',
                    'param_name' => 'link',
                    'heading' => esc_html__('Link', 'mixtapewp')
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'link_target',
                    'heading' => esc_html__('Link Target', 'mixtapewp'),
                    'value' => array(
                        ''                             => '',
                        esc_html__('Self', 'mixtapewp')  => '_self',
                        esc_html__('Blank', 'mixtapewp') => '_blank'
                    )
                ),
                array(
                    'type' => 'textfield',
                    'param_name' => 'banner_title',
                    'heading' => esc_html__('Title', 'mixtapewp'),
                    'admin_label' => true
                ),
	            array(
		            'type' => 'dropdown',
		            'param_name' => 'text_skin',
		            'heading' => esc_html__('Text Skin', 'mixtapewp'),
		            'value' => array(
			            esc_html__('Light', 'mixtapewp')   => 'light',
			            esc_html__('Dark', 'mixtapewp')    => 'dark'
		            ),
		            'dependency' => array('element' => 'banner_title', 'not_empty' => true)
	            ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'image_hover',
                    'heading' => esc_html__('Image Hover', 'mixtapewp'),
                    'value' => array(
                        esc_html__('No Hover', 'mixtapewp')   => '',
                        esc_html__('Zoom', 'mixtapewp')       => 'zoom'
                    ),
                    'dependency' => array('element' => 'item_image', 'not_empty' => true)
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
            'item_image'   => '',
            'banner_title' => '',
	        'text_skin'    => 'light',
            'link'         => '',
            'link_target'  => '',
            'image_hover'  => ''

        );

        $params = shortcode_atts($args, $atts);
        $params['banner_classes'] = $this->getBannerClass($params);

        extract($params);
        $params['content']= $content;

        if($params['link_target'] == ''){
            $params['link_target'] = '_self';
        }

        $html = mixtape_qodef_get_shortcode_module_template_part('templates/banner-template', 'banner', '', $params);

        return $html;

    }

    /**
     * Return Separator classes
     *
     * @param $params
     * @return array
     */
    private function getBannerClass($params) {

        $banner_classes = array();

	    if( !empty($params['text_skin']) && $params['text_skin'] === 'dark') {
		    $banner_classes[] = 'qodef-bih-dark-text';
	    }
        
        if( !empty($params['image_hover']) ) {
            $banner_classes[] = 'qodef-bih-'.$params['image_hover'];
        }

        return implode(' ', $banner_classes);

    }

  }
