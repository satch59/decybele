<?php
namespace MixtapeQode\Modules\Shortcodes\DeviceShowcase;

use MixtapeQode\Modules\Shortcodes\Lib\ShortcodeInterface;


/**
 * Class DeviceShowcase that represents audio playlist shortcode
 * @package MixtapeQode\Modules\Shortcodes\DeviceShowcase
 */
class DeviceShowcase implements ShortcodeInterface {
    /**
     * @var string
     */
    private $base;

    /**
     * Sets base attribute and registers shortcode with Visual Composer
     */
    public function __construct() {
        $this->base = 'qodef_device_showcase';

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
            'name'                      => esc_html__('Device Showcase', 'mixtapewp'),
            'base'                      => $this->base,
            'category'                  => esc_html__('by SELECT', 'mixtapewp'),
            'icon'                      => 'icon-wpb-device-showcase extended-custom-icon',
            'allowed_container_element' => 'vc_row',
            'params'                    =>  array(
                    array(
                        'type'          => 'textfield',
                        'heading'       => esc_html__('Title', 'mixtapewp'),
                        'param_name'    => 'title',
                        'admin_label'   => true,
                        'group' => esc_html__('Typography', 'mixtapewp'),
                    ),
                   array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Title Color', 'mixtapewp'),
                        'param_name' => 'title_color',
                        'dependency' => array('element' => 'title', 'not_empty' => true),
                        'group' => esc_html__('Typography', 'mixtapewp'),
                    ),
                    array(
                        'type'          => 'textfield',
                        'heading'       => esc_html__('Title Font Size', 'mixtapewp'),
                        'param_name'    => 'title_font_size',
                        'dependency' => array('element' => 'title', 'not_empty' => true),
                        'group' => esc_html__('Typography', 'mixtapewp'),
                    ),
                    array(
                        'type'          => 'textfield',
                        'heading'       => esc_html__('Description', 'mixtapewp'),
                        'param_name'    => 'description',
                        'admin_label'   => true,
                        'group' => esc_html__('Typography', 'mixtapewp'),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Description Color', 'mixtapewp'),
                        'param_name' => 'description_color',
                        'description' => '',
                        'dependency' => array('element' => 'description', 'not_empty' => true),
                        'group' => esc_html__('Typography', 'mixtapewp'),
                    ),
                    array(
                        'type'          => 'textfield',
                        'heading'       => esc_html__('Description Font Size', 'mixtapewp'),
                        'param_name'    => 'description_font_size',
                        'dependency' => array('element' => 'description', 'not_empty' => true),
                        'admin_label' => true,
                        'group' => esc_html__('Typography', 'mixtapewp'),
                    ),
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('Desktop Image', 'mixtapewp'),
                        'description'   => esc_html__('This image will be set inside the desktop browser window.', 'mixtapewp'),
                        'param_name' => 'desktop_image',
                        'group' => esc_html__('Images', 'mixtapewp'),
                    ),
                    array(
                        'type'          => 'textfield',
                        'heading'   => esc_html__('Desktop Image Link', 'mixtapewp'),
                        'param_name'    => 'desktop_image_link',
                        'description'   => esc_html__('Enter an external URL to link to.', 'mixtapewp'),
                        'dependency' => array('element' => 'desktop_image', 'not_empty' => true),
                        'admin_label' => true,
                        'group' => esc_html__('Images', 'mixtapewp'),
                    ),
                    array(
                        'type'       => 'dropdown',
                        'heading'    => esc_html__('Desktop Image Link Target', 'mixtapewp'),
                        'param_name' => 'desktop_image_link_target',
                        'value'      => array(
                            'Self'  => '_self',
                            'Blank' => '_blank'
                        ),
                        'dependency' => array('element' => 'desktop_image_link', 'not_empty' => true),
                        'group' => esc_html__('Images', 'mixtapewp'),
                    ),
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('Tablet Image', 'mixtapewp'),
                        'description'   => esc_html__('This image will be set inside the tablet device frame.', 'mixtapewp'),
                        'param_name' => 'tablet_image',
                        'group' => esc_html__('Images', 'mixtapewp'),
                    ),
                    array(
                        'type'          => 'textfield',
                        'heading'   => esc_html__('Tablet Image Link', 'mixtapewp'),
                        'param_name'    => 'tablet_image_link',
                        'description'   => esc_html__('Enter an external URL to link to.', 'mixtapewp'),
                        'dependency' => array('element' => 'tablet_image', 'not_empty' => true),
                        'admin_label' => true,
                        'group' => esc_html__('Images', 'mixtapewp'),
                    ),
                    array(
                        'type'       => 'dropdown',
                        'heading'    => esc_html__('Tablet Image Link Target', 'mixtapewp'),
                        'param_name' => 'tablet_image_link_target',
                        'value'      => array(
                            'Self'  => '_self',
                            'Blank' => '_blank'
                        ),
                        'dependency' => array('element' => 'tablet_image_link', 'not_empty' => true),
                        'group' => esc_html__('Images', 'mixtapewp'),
                    ),
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('Phone Image', 'mixtapewp'),
                        'description'   => esc_html__('This image will be set inside the phone device frame.', 'mixtapewp'),
                        'param_name' => 'phone_image',
                        'group' => esc_html__('Images', 'mixtapewp'),
                    ),
                    array(
                        'type'          => 'textfield',
                        'heading'   => esc_html__('Phone Image Link', 'mixtapewp'),
                        'param_name'    => 'phone_image_link',
                        'description'   => esc_html__('Enter an external URL to link to.', 'mixtapewp'),
                        'dependency' => array('element' => 'phone_image', 'not_empty' => true),
                        'admin_label' => true,
                        'group' => esc_html__('Images', 'mixtapewp'),
                    ),
                    array(
                        'type'       => 'dropdown',
                        'heading'    => esc_html__('Phone Image Link Target', 'mixtapewp'),
                        'param_name' => 'phone_image_link_target',
                        'value'      => array(
                            'Self'  => '_self',
                            'Blank' => '_blank'
                        ),
                        'dependency' => array('element' => 'phone_image_link', 'not_empty' => true),
                        'group' => esc_html__('Images', 'mixtapewp'),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading'     => esc_html__('Add interactivity', 'mixtapewp'),
                        'param_name' => 'animate',
                        'value' => array(
                            esc_html__('Yes', 'mixtapewp')  => 'yes',
                            esc_html__('No', 'mixtapewp')   => 'no'
                        ),
                        'admin_label' => true,
                        'group' => esc_html__('Behavior', 'mixtapewp')
                    ),
                ), 
        ));
    }

    /**
     * Renders HTML for album disc shortcode
     *
     * @param array $atts
     * @param null $content
     *
     * @return string
     */
    public function render($atts, $content = null) {
        $args = array(  
            'title' => '',
            'title_color' => '',
            'title_font_size' => '',
            'description' => '',
            'description_color' => '',
            'description_font_size' => '',
            'desktop_image' => '',
            'desktop_image_link' => '',
            'desktop_image_link_target' => '_self',
            'tablet_image' => '',
            'tablet_image_link' => '',
            'tablet_image_link_target' => '_self',
            'phone_image' => '',
            'phone_image_link' => '',
            'phone_image_link_target' => '_self',
            'animate' => 'yes'
        );

        $params = shortcode_atts($args, $atts);
        extract($params);

        $params['holder_classes'] = $this->getHolderClasses($params);
        $params['title_style'] = $this->getTitleStyle($params);
        $params['description_style'] = $this->getDescriptionStyle($params);

        $html = mixtape_qodef_get_shortcode_module_template_part('templates/device-showcase-template', 'device-showcase', '', $params);

        return $html;
    }


    /**
     * Return Holder classes
     *
     * @param $params
     * @return array
     */
    private function getHolderClasses($params) {

        $holder_classes = array();

        if ($params['animate'] !== '') {
            $holder_classes[] = 'qodef-animate-'. $params['animate'];
        }

        return implode(' ', $holder_classes);

    }

    /**
     * Return Title style
     *
     * @param $params
     * @return string
     */
    private function getTitleStyle($params) {
        $style = array();

        if ($params['title_color'] !== ''){
            $style[] = 'color:'.$params['title_color'];
        }

        if ($params['title_font_size'] !== ''){
            $style[] = 'font-size:'. mixtape_qodef_filter_px($params['title_font_size']).'px';
        }

        return implode(';', $style);
    }

    /**
     * Return Description style
     *
     * @param $params
     * @return string
     */
    private function getDescriptionStyle($params) {
        $style = array();

        if ($params['description_color'] !== ''){
            $style[] = 'color:'.$params['description_color'];
        }

        if ($params['description_font_size'] !== ''){
            $style[] = 'font-size:'. mixtape_qodef_filter_px($params['description_font_size']).'px';
        }

        return implode(';', $style);
    }
}