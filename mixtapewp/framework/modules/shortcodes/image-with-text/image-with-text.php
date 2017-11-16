<?php
namespace MixtapeQode\Modules\Shortcodes\ImageWithText;

use MixtapeQode\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class ImageWithText
 */
class ImageWithText implements ShortcodeInterface  {
    private $base; 
    
    function __construct() {
        $this->base = 'qodef_image_with_text';

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
            'name' => esc_html__('Image With Text', 'mixtapewp'),
            'base' => $this->base,
            'category' => esc_html__('by SELECT', 'mixtapewp'),
            'icon' => 'icon-wpb-image-with-text extended-custom-icon',
            'params' => array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__('Image', 'mixtapewp'),
                    'param_name' => 'image'
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title', 'mixtapewp'),
                    'admin_label' => true,                    
                    'param_name' => 'title',
                ),
                array(
                    'type'        => 'colorpicker',
                    'heading'     => esc_html__('Title Color', 'mixtapewp'),
                    'param_name'  => 'title_color',
                    'dependency' => array('element' => 'title', 'not_empty' => true)

                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Link', 'mixtapewp'),
                    'admin_label' => true,                    
                    'param_name' => 'link',
                ),
                array(
                    "type" => "dropdown",
                    "heading" => esc_html__("Link Target", 'mixtapewp'),
                    "param_name" => "link_target",
                    "value" => array(
                        esc_html__('New Window', 'mixtapewp')   => "_blank",
                        esc_html__('Same Window', 'mixtapewp')  => "_self" ,
                    ),
                    'save_always' => true,
                    'dependency' => array('element' => 'link', 'not_empty' => true)
                ),
                array(
                    "type" => "dropdown",
                    "heading" => esc_html__("Enable Loading Animation", 'mixtapewp'),
                    "param_name" => "loading_animation",
                    'admin_label' => true,                    
                    'save_always' => true,                    
                    "value" => array(
                        esc_html__('No', 'mixtapewp')  => "no" ,
                        esc_html__('Yes', 'mixtapewp')   => "yes",
                    ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Loading Animation Delay', 'mixtapewp'),
                    'admin_label' => true,                    
                    'param_name' => 'loading_animation_delay',
                    'description' => esc_html__('Specify loading animation delay time in miliseconds.', 'mixtapewp'),
                    'dependency' => array('element' => 'loading_animation', 'value' => array('yes'))
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
            'image'                     => '',
            'title'                     => '',
            'title_color'               => '',
            'link'                      => '',
            'link_target'               => '_blank',
            'loading_animation'         => 'no',
            'loading_animation_delay'   => ''
        );

        $params = shortcode_atts($args, $atts);

        extract($params);

        $params['holder_classes'] = $this->getHolderClasses($params);
        $params['holder_data'] = $this->getHolderData($params);
        $params['title_styles'] = $this->getTitleStyles($params);

        $html = mixtape_qodef_get_shortcode_module_template_part('templates/image-with-text-template', 'image-with-text', '', $params);

        return $html;

    }

    private function getHolderClasses($params) {
        $classes = array();

        $classes[] = 'qodef-image-with-text';

        if ($params['loading_animation'] == 'yes') {
            $classes[] = 'qodef-loading-animation';
        }

        return implode(' ', $classes);
    }


    private function getHolderData($params) {
        $data = array();

        if (!empty($params['loading_animation_delay']) && ($params['loading_animation'] == 'yes')) {
            $data['data-loading-animation-delay'] = $params['loading_animation_delay'];
        }

        return $data;
    }

    private function getTitleStyles($params) {
        $title_styles = array();

        if ($params['title_color'] !== '') {
            $title_styles[] = 'color:' . $params['title_color'];
        }

        return implode(';', $title_styles);
    }

  }
