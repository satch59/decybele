<?php
namespace MixtapeQode\Modules\Header\Types;

use MixtapeQode\Modules\Header\Lib\HeaderType;

/**
 * Class that represents Header Standard layout and option
 *
 * Class HeaderStandard
 */
class HeaderStandard extends HeaderType {
    protected $heightOfTransparency;
    protected $heightOfCompleteTransparency;
    protected $headerHeight;
    protected $mobileHeaderHeight;

    /**
     * Sets slug property which is the same as value of option in DB
     */
    public function __construct() {
        $this->slug = 'header-standard';

        if(!is_admin()) {

            $menuAreaHeight       = mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('menu_area_height_header_standard'));
            $this->menuAreaHeight = $menuAreaHeight !== '' ? (int)$menuAreaHeight : 100;

            $mobileHeaderHeight       = mixtape_qodef_filter_px(mixtape_qodef_options()->getOptionValue('mobile_header_height'));
            $this->mobileHeaderHeight = $mobileHeaderHeight !== '' ? (int)$mobileHeaderHeight : 100;

            add_action('wp', array($this, 'setHeaderHeightProps'));

            add_filter('mixtape_qodef_js_global_variables', array($this, 'getGlobalJSVariables'));
            add_filter('mixtape_qodef_per_page_js_vars', array($this, 'getPerPageJSVariables'));
            add_filter('mixtape_qodef_add_page_custom_style', array($this, 'headerPerPageStyles'));

        }
    }

    /**
     * Loads template file for this header type
     *
     * @param array $parameters associative array of variables that needs to passed to template
     */
    public function loadTemplate($parameters = array()) {

        $parameters['menu_area_in_grid'] = mixtape_qodef_get_meta_field_intersect('menu_area_in_grid_header_standard') == 'yes' ? true : false;

        $parameters = apply_filters('mixtape_qodef_header_standard_parameters', $parameters);

        mixtape_qodef_get_module_template_part('templates/types/'.$this->slug, $this->moduleName, '', $parameters);
    }

    /**
     * Sets header height properties after WP object is set up
     */
    public function setHeaderHeightProps(){
        $this->heightOfTransparency         = $this->calculateHeightOfTransparency();
        $this->heightOfCompleteTransparency = $this->calculateHeightOfCompleteTransparency();
        $this->headerHeight                 = $this->calculateHeaderHeight();
        $this->mobileHeaderHeight           = $this->calculateMobileHeaderHeight();
    }

    /**
     * Returns total height of transparent parts of header
     *
     * @return int
     */
    public function calculateHeightOfTransparency() {
        $id = mixtape_qodef_get_page_id();
        $transparencyHeight = 0;

        if(get_post_meta($id, 'qodef_menu_area_background_color_header_standard_meta', true) !== ''){
            $menuAreaTransparent = get_post_meta($id, 'qodef_menu_area_background_color_header_standard_meta', true) !== '' &&
                                   get_post_meta($id, 'qodef_menu_area_background_transparency_header_standard_meta', true) !== '1';
        } else {
            $menuAreaTransparent = mixtape_qodef_options()->getOptionValue('menu_area_background_color_header_standard') !== '' &&
                                   mixtape_qodef_options()->getOptionValue('menu_area_background_transparency_header_standard') !== '1';
        }


        $sliderExists = get_post_meta($id, 'qodef_page_slider_meta', true) !== '';

        if($sliderExists){
            $menuAreaTransparent = true;
        }

        if($menuAreaTransparent || is_404()) {
            $transparencyHeight = $this->menuAreaHeight;

            if(($sliderExists && mixtape_qodef_is_top_bar_enabled())
               || mixtape_qodef_is_top_bar_enabled() && mixtape_qodef_is_top_bar_transparent()) {
                $transparencyHeight += mixtape_qodef_get_top_bar_height();
            }
        }

        return $transparencyHeight;
    }

    /**
     * Returns height of completely transparent header parts
     *
     * @return int
     */
    public function calculateHeightOfCompleteTransparency() {
        $id = mixtape_qodef_get_page_id();
        $transparencyHeight = 0;

        if(get_post_meta($id, 'qodef_menu_area_background_color_header_standard_meta', true) !== ''){
            $menuAreaTransparent = get_post_meta($id, 'qodef_menu_area_background_color_header_standard_meta', true) !== '' &&
                                   get_post_meta($id, 'qodef_menu_area_background_transparency_header_standard_meta', true) === '0';
        } else {
            $menuAreaTransparent = mixtape_qodef_options()->getOptionValue('menu_area_background_color_header_standard') !== '' &&
                                   mixtape_qodef_options()->getOptionValue('menu_area_background_transparency_header_standard') === '0';
        }

        if($menuAreaTransparent) {
            $transparencyHeight = $this->menuAreaHeight;
        }

        return $transparencyHeight;
    }


    /**
     * Returns total height of header
     *
     * @return int|string
     */
    public function calculateHeaderHeight() {
        $headerHeight = $this->menuAreaHeight;
        if(mixtape_qodef_is_top_bar_enabled()) {
            $headerHeight += mixtape_qodef_get_top_bar_height();
        }

        return $headerHeight;
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
        $globalVariables['qodefMenuAreaHeight'] = $this->headerHeight;
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
    	$id = mixtape_qodef_get_page_id();

        //calculate transparency height only if header has no sticky behaviour
        if(!in_array(mixtape_qodef_get_meta_field_intersect('header_behaviour',$id), array('sticky-header-on-scroll-up','sticky-header-on-scroll-down-up'))) {
            $perPageVars['qodefHeaderTransparencyHeight'] = $this->headerHeight - (mixtape_qodef_get_top_bar_height() + $this->heightOfCompleteTransparency);
        }else{
            $perPageVars['qodefHeaderTransparencyHeight'] = 0;
        }

        return $perPageVars;
    }

    public function headerPerPageStyles($style) {
        $id                     = mixtape_qodef_get_page_id();
        $class_prefix           = mixtape_qodef_get_unique_page_class();
        $main_menu_style        = array();
        $main_menu_grid_style   = array();
        $disable_border         = mixtape_qodef_get_meta_field_intersect('border_bottom_header_standard',$id) == 'no';

        $main_menu_selector = array($class_prefix.'.qodef-header-standard .qodef-page-header .qodef-menu-area');
     
        /* header style - start */
        if(!$disable_border) {
            $header_border_color = get_post_meta($id, 'qodef_border_bottom_color_header_standard_meta', true);
            if($header_border_color !== '') {
                $header_border_transparency = get_post_meta($id, 'qodef_border_bottom_transparency_header_standard_meta', true);
                if($header_border_transparency !== '') {
                    $main_menu_style['border-bottom-color'] = mixtape_qodef_rgba_color($header_border_color, $header_border_transparency);
                } else {
                    $main_menu_style['border-bottom-color'] = $header_border_color;
                }
            }
        }
        else {
            $main_menu_style['border-bottom'] = 'none';
        }

        $menu_area_background_color = get_post_meta($id, 'qodef_menu_area_background_color_header_standard_meta', true);
        if($menu_area_background_color !== '') {
            $menu_area_background_transparency = get_post_meta($id, 'qodef_menu_area_background_transparency_header_standard_meta', true);
            if($menu_area_background_transparency !== '') {
                $main_menu_style['background-color'] = mixtape_qodef_rgba_color($menu_area_background_color, $menu_area_background_transparency);
            } else {
                $main_menu_style['background-color'] = $menu_area_background_color;
            }
        }

        /* header style - end */

		$current_style = mixtape_qodef_dynamic_css($main_menu_selector, $main_menu_style);

		$current_style = $current_style . $style;

		return $current_style;

    }
}