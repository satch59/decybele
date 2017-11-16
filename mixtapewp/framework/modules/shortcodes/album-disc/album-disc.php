<?php
namespace MixtapeQode\Modules\Shortcodes\AlbumDisc;

use MixtapeQode\Modules\Shortcodes\Lib\ShortcodeInterface;


/**
 * Class AlbumDisc that represents audio playlist shortcode
 * @package MixtapeQode\Modules\Shortcodes\AlbumDisc
 */
class AlbumDisc implements ShortcodeInterface {
    /**
     * @var string
     */
    private $base;

    /**
     * Sets base attribute and registers shortcode with Visual Composer
     */
    public function __construct() {
        $this->base = 'qodef_album_disc';

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
            'name'                      => esc_html__('Album Disc', 'mixtapewp'),
            'base'                      => $this->base,
            'category'                  => esc_html__('by SELECT', 'mixtapewp'),
            'icon'                      => 'icon-wpb-album-disc extended-custom-icon',
            'allowed_container_element' => 'vc_row',
            'params'                    =>  array(
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('CD Case Image', 'mixtapewp'),
                        'param_name' => 'cd_case_image'
                    ),
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('CD Image', 'mixtapewp'),
                        'param_name' => 'cd_image',
                        'description' => esc_html('Set an image to be placed upon the CD template', 'mixtapewp')
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('CD Image Outer Border Color', 'mixtapewp'),
                        'param_name' => 'cd_image_outer_border_color',
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Link', 'mixtapewp'),
                        'param_name'  => 'link',
                        'admin_label' => true
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading'     => esc_html__('Link Target', 'mixtapewp'),
                        'param_name' => 'link_target',
                        'value' => array(
                            esc_html__('Same Window', 'mixtapewp')  => '_self',
                            esc_html__('New Window', 'mixtapewp')   => '_blank'
                        ),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading'     => esc_html__('Animate', 'mixtapewp'),
                        'param_name' => 'animate',
                        'value' => array(
                            esc_html__('On Appear', 'mixtapewp')  => 'appear',
                            esc_html__('On Hover', 'mixtapewp')   => 'hover'
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
            'cd_case_image' => '',
            'cd_image' => '',
            'cd_image_outer_border_color' => '',
            'link' => '',
            'link_target' => '_self',
            'animate' => 'appear',
        );

        $params = shortcode_atts($args, $atts);
        extract($params);

        $params['holder_classes'] = $this->getHolderClasses($params);
        $params['cd_image_styles'] = $this->getCDImageStyles($params);

        $html = mixtape_qodef_get_shortcode_module_template_part('templates/album-disc-template', 'album-disc', '', $params);

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
            $holder_classes[] = 'qodef-animate-on-'. $params['animate'];
        }

        return implode(' ', $holder_classes);
    }

     /**
     * Returns array of cd image styles
     *
     * @param $params
     *
     * @return array
     */
    private function getCDImageStyles($params) {
        $styles = array();

        if(!empty($params['cd_image_outer_border_color'])) {
            $styles[] = 'border-color: '.$params['cd_image_outer_border_color'];
        }

        return $styles;
    }
}