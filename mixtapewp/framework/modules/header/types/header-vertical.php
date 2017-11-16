<?php
namespace MixtapeQode\Modules\Header\Types;

use MixtapeQode\Modules\Header\Lib\HeaderType;

/**
 * Class that represents Header Vertical layout and option
 *
 * Class HeaderVertical
 */
class HeaderVertical extends HeaderType {
    protected $mobileHeaderHeight;

    public function __construct() {
        $this->slug = 'header-vertical';

        $mobileHeaderHeight       = mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('mobile_header_height'));
        $this->mobileHeaderHeight = $mobileHeaderHeight !== '' ? (int)$mobileHeaderHeight : (int)100;

        add_action('wp', array($this, 'setHeaderHeightProps'));

        add_filter('mixtape_qodef_js_global_variables', array($this, 'getGlobalJSVariables'));
        add_filter('mixtape_qodef_per_page_js_vars', array($this, 'getPerPageJSVariables'));
        add_filter('mixtape_qodef_add_page_custom_style', array($this, 'headerPerPageStyles'));
    }

    /**
     * Loads template for header type
     *
     * @param array $parameters associative array of variables to pass to template
     */
    public function loadTemplate($parameters = array()) {
        mixtape_qodef_get_module_template_part('templates/types/'.$this->slug, $this->moduleName, '', $parameters);
    }

    /**
     * Sets header height properties after WP object is set up
     */
    public function setHeaderHeightProps(){
        $this->mobileHeaderHeight = $this->calculateMobileHeaderHeight();
    }

    /**
     * Returns total height of transparent parts of header
     *
     * @return mixed
     */
    public function calculateHeightOfTransparency() {
        return 0;
    }

    /**
     * Returns height of header parts that are totaly transparent
     *
     * @return mixed
     */
    public function calculateHeightOfCompleteTransparency() {
        return 0;
    }

    /**
     * Returns header height
     *
     * @return mixed
     */
    public function calculateHeaderHeight() {
        return 0;
    }

    /**
     * Returns total height of mobile header
     *
     * @return int|string
     */
    public function calculateMobileHeaderHeight() {
        $mobileHeaderHeight = $this->mobileHeaderHeight;

        return $mobileHeaderHeight;
    }

    /**
     * Returns global js variables of header
     *
     * @param $globalVariables
     * @return int|string
     */
    public function getGlobalJSVariables($globalVariables) {
        $globalVariables['qodefLogoAreaHeight'] = 0;
        $globalVariables['qodefMenuAreaHeight'] = 0;
        $globalVariables['qodefMobileHeaderHeight'] = $this->mobileHeaderHeight;

        return $globalVariables;
    }

    /**
     * Returns per page js variables of header
     *
     * @param $perPageVars
     * @return int|string
     */
    public function getPerPageJSVariables($perPageVars) {
        $perPageVars['qodefHeaderTransparencyHeight'] = 0;
        return $perPageVars;
    }

    public function headerPerPageStyles($style) {
        $id                     = mixtape_qodef_get_page_id();
        $class_prefix           = mixtape_qodef_get_unique_page_class();
        $main_menu_style        = array();
        $main_menu_grid_style   = array();
        $disable_border         = mixtape_qodef_get_meta_field_intersect('border_bottom_header_standard',$id) == 'no';

        $main_menu_selector = array($class_prefix.'.qodef-header-vertical .qodef-vertical-area-background');
     
        /* header style - start */

        $menu_area_background_color        = get_post_meta($id, 'qodef_vertical_header_background_color_meta', true);
        $menu_area_background_opacity      = get_post_meta($id, 'qodef_vertical_header_transparency_meta', true);

        if($menu_area_background_color !== '') {
            $main_menu_style['background-color'] = $menu_area_background_color;
        }

        if($menu_area_background_opacity !== '') {
            $main_menu_style['opacity'] = $menu_area_background_opacity;
        }

        if (get_post_meta($id, 'qodef_disable_vertical_header_background_image_meta', true) == 'yes'){
            $main_menu_style['background-image'] = 'none';
        } elseif (($meta_temp = get_post_meta($id, 'qodef_vertical_header_background_image_meta', true)) !== ''){
            $main_menu_style['background-image'] = 'url('.$meta_temp.')';
        }

        /* header style - end */

		$current_style = mixtape_qodef_dynamic_css($main_menu_selector, $main_menu_style);

		$current_style = $current_style . $style;

		return $current_style;
    }
}