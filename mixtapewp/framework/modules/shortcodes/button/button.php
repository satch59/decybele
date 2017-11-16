<?php
namespace MixtapeQode\Modules\Shortcodes\Button;

use MixtapeQode\Modules\Shortcodes\Lib\ShortcodeInterface;


/**
 * Class Button that represents button shortcode
 * @package MixtapeQode\Modules\Shortcodes\Button
 */
class Button implements ShortcodeInterface {
    /**
     * @var string
     */
    private $base;

    /**
     * Sets base attribute and registers shortcode with Visual Composer
     */
    public function __construct() {
        $this->base = 'qodef_button';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    /**
     * Returns base attribute
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     * Maps shortcode to Visual Composer
     */
    public function vcMap() {
        vc_map(array(
            'name'                      => esc_html__('Button', 'mixtapewp'),
            'base'                      => $this->base,
            'category'                  => esc_html__('by SELECT', 'mixtapewp'),
            'icon'                      => 'icon-wpb-button extended-custom-icon',
            'allowed_container_element' => 'vc_row',
            'params'                    => array_merge(
                array(
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Size', 'mixtapewp'),
                        'param_name'  => 'size',
                        'value'       => array(
                            esc_html__('Default', 'mixtapewp')                => '',
                            esc_html__('Small', 'mixtapewp')                  => 'small',
                            esc_html__('Medium', 'mixtapewp')                 => 'medium',
                            esc_html__('Large', 'mixtapewp')                  => 'large',
                            esc_html__('Extra Large', 'mixtapewp')            => 'huge',
                            esc_html__('Extra Large Full Width', 'mixtapewp') => 'huge-full-width'
                        ),
                        'save_always' => true,
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Type', 'mixtapewp'),
                        'param_name'  => 'type',
                        'value'       => array(
                            esc_html__('Default', 'mixtapewp') => '',
                            esc_html__('Outline', 'mixtapewp') => 'outline',
                            esc_html__('Solid', 'mixtapewp')   => 'solid'
                        ),
                        'save_always' => true,
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Text', 'mixtapewp'),
                        'param_name'  => 'text',
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Link', 'mixtapewp'),
                        'param_name'  => 'link',
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Link Target', 'mixtapewp'),
                        'param_name'  => 'target',
                        'value'       => array(
                            esc_html__('Self', 'mixtapewp')  => '_self',
                            esc_html__('Blank', 'mixtapewp') => '_blank'
                        ),
                        'save_always' => true,
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Custom CSS class', 'mixtapewp'),
                        'param_name'  => 'custom_class',
                        'admin_label' => true
                    )
                ),
                mixtape_qodef_icon_collections()->getVCParamsArray(array(), '', true),
                array(
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Color', 'mixtapewp'),
                        'param_name'  => 'color',
                        'group'       => esc_html__('Design Options', 'mixtapewp'),
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Hover Color', 'mixtapewp'),
                        'param_name'  => 'hover_color',
                        'group'       => esc_html__('Design Options', 'mixtapewp'),
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Background Color', 'mixtapewp'),
                        'param_name'  => 'background_color',
                        'admin_label' => true,
                        'dependency'  => array('element' => 'type', 'value' => array('solid')),
                        'group'       => esc_html__('Design Options', 'mixtapewp')
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Hover Background Color', 'mixtapewp'),
                        'param_name'  => 'hover_background_color',
                        'admin_label' => true,
                        'group'       => esc_html__('Design Options', 'mixtapewp')
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Border Color', 'mixtapewp'),
                        'param_name'  => 'border_color',
                        'admin_label' => true,
                        'group'       => esc_html__('Design Options', 'mixtapewp')
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Hover Border Color', 'mixtapewp'),
                        'param_name'  => 'hover_border_color',
                        'admin_label' => true,
                        'group'       => esc_html__('Design Options', 'mixtapewp')
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Font Size (px)', 'mixtapewp'),
                        'param_name'  => 'font_size',
                        'admin_label' => true,
                        'group'       => esc_html__('Design Options', 'mixtapewp')
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Font Weight', 'mixtapewp'),
                        'param_name'  => 'font_weight',
                        'value'       => array_flip(mixtape_qodef_get_font_weight_array(true)),
                        'admin_label' => true,
                        'group'       => esc_html__('Design Options', 'mixtapewp')
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Margin', 'mixtapewp'),
                        'param_name'  => 'margin',
                        'description' => esc_html__('Insert margin in format: 0px 0px 1px 0px', 'mixtapewp'),
                        'admin_label' => true,
                        'group'       => esc_html__('Design Options', 'mixtapewp')
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Button Skin', 'mixtapewp'),
                        'param_name'  => 'button_skin',
                        'value'       => array(
                            esc_html__('Dark', 'mixtapewp')    => 'dark',
                            esc_html__('Light', 'mixtapewp')   => 'light'
                        ),
                        'admin_label' => true,
                        'group'       => esc_html__('Design Options', 'mixtapewp')
                    )
                )
            ) //close array_merge
        ));
    }

    /**
     * Renders HTML for button shortcode
     *
     * @param array $atts
     * @param null $content
     *
     * @return string
     */
    public function render($atts, $content = null) {
        $default_atts = array(
            'size'                   => '',
            'type'                   => '',
            'text'                   => '',
            'link'                   => '',
            'target'                 => '',
            'color'                  => '',
            'hover_color'            => '',
            'background_color'       => '',
            'hover_background_color' => '',
            'border_color'           => '',
            'hover_border_color'     => '',
            'font_size'              => '',
            'font_weight'            => '',
            'margin'                 => '',
            'button_skin'            => 'dark',
            'custom_class'           => '',
            'html_type'              => 'anchor',
            'input_name'             => '',
            'hover_animation'        => '',
            'custom_attrs'           => array()
        );

        $default_atts = array_merge($default_atts, mixtape_qodef_icon_collections()->getShortcodeParams());
        $params       = shortcode_atts($default_atts, $atts);

        if($params['html_type'] !== 'input') {
            $iconPackName   = mixtape_qodef_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
            $params['icon'] = $iconPackName ? $params[$iconPackName] : '';
        }

        $params['size'] = !empty($params['size']) ? $params['size'] : 'medium';
        $params['type'] = !empty($params['type']) ? $params['type'] : 'outline';


        $params['link']   = !empty($params['link']) ? $params['link'] : '#';
        $params['target'] = !empty($params['target']) ? $params['target'] : '_self';

        //prepare params for template
        $params['button_classes']      = $this->getButtonClasses($params);
        $params['button_custom_attrs'] = !empty($params['custom_attrs']) ? $params['custom_attrs'] : array();
        $params['button_styles']       = $this->getButtonStyles($params);
        $params['button_data']         = $this->getButtonDataAttr($params);

        return mixtape_qodef_get_shortcode_module_template_part('templates/'.$params['html_type'], 'button', $params['hover_animation'], $params);
    }

    /**
     * Returns array of button styles
     *
     * @param $params
     *
     * @return array
     */
    private function getButtonStyles($params) {
        $styles = array();

        if(!empty($params['color'])) {
            $styles[] = 'color: '.$params['color'];
        }

        if(!empty($params['background_color']) && $params['type'] !== 'outline') {
            $styles[] = 'background-color: '.$params['background_color'];
        }

        if(!empty($params['border_color'])) {
            $styles[] = 'border-color: '.$params['border_color'];
        }

        if(!empty($params['font_size'])) {
            $styles[] = 'font-size: '.mixtape_qodef_filter_px($params['font_size']).'px';
        }

        if(!empty($params['font_weight'])) {
            $styles[] = 'font-weight: '.$params['font_weight'];
        }

        if(!empty($params['margin'])) {
            $styles[] = 'margin: '.$params['margin'];
        }

        return $styles;
    }

    /**
     *
     * Returns array of button data attr
     *
     * @param $params
     *
     * @return array
     */
    private function getButtonDataAttr($params) {
        $data = array();

        if(!empty($params['hover_background_color'])) {
            $data['data-hover-bg-color'] = $params['hover_background_color'];
        }

        if(!empty($params['hover_color'])) {
            $data['data-hover-color'] = $params['hover_color'];
        }

        if(!empty($params['hover_border_color'])) {
            $data['data-hover-border-color'] = $params['hover_border_color'];
        }

        return $data;
    }

    /**
     * Returns array of HTML classes for button
     *
     * @param $params
     *
     * @return array
     */
    private function getButtonClasses($params) {
        $buttonClasses = array(
            'qodef-btn',
            'qodef-btn-'.$params['size'],
            'qodef-btn-'.$params['type']
        );

        if(!empty($params['hover_background_color'])) {
            $buttonClasses[] = 'qodef-btn-custom-hover-bg';
        }

        if(!empty($params['hover_border_color'])) {
            $buttonClasses[] = 'qodef-btn-custom-border-hover';
        }

        if(!empty($params['hover_color'])) {
            $buttonClasses[] = 'qodef-btn-custom-hover-color';
        }

        if(!empty($params['icon'])) {
            $buttonClasses[] = 'qodef-btn-icon';
        }

        if(!empty($params['custom_class'])) {
            $buttonClasses[] = $params['custom_class'];
        }

        if(!empty($params['hover_animation'])) {
            $buttonClasses[] = 'qodef-btn-'.$params['hover_animation'];
        }

        if($params['button_skin'] == 'light') {
            $buttonClasses[] = 'qodef-btn-light';
        }

        return $buttonClasses;
    }
}