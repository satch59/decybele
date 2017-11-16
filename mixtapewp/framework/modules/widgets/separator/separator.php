<?php

/**
 * Widget that adds separator boxes type
 *
 * Class Separator_Widget
 */
class MixtapeQodeSeparatorWidget extends MixtapeQodeWidget {
    /**
     * Set basic widget options and call parent class construct
     */
    public function __construct() {
        parent::__construct(
            'qodef_separator_widget', // Base ID
            esc_html__('Select Separator Widget','mixtapewp') // Name
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array(
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Type','mixtapewp'),
                'name' => 'type',
                'options' => array(
                    'normal' => esc_html__('Normal','mixtapewp'),
                    'full-width' => esc_html__('Full Width','mixtapewp')
                )
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Position','mixtapewp'),
                'name' => 'position',
                'options' => array(
                    'center' => esc_html__('Center','mixtapewp'),
                    'left' => esc_html__('Left','mixtapewp'),
                    'right' => esc_html__('Right','mixtapewp')
                )
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Style','mixtapewp'),
                'name' => 'border_style',
                'options' => array(
                    'solid' => esc_html__('Solid','mixtapewp'),
                    'dashed' => esc_html__('Dashed','mixtapewp'),
                    'dotted' => esc_html__('Dotted','mixtapewp')
                )
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Color','mixtapewp'),
                'name' => 'color'
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Width','mixtapewp'),
                'name' => 'width',
                'description' => ''
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Thickness (px)','mixtapewp'),
                'name' => 'thickness',
                'description' => ''
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Top Margin','mixtapewp'),
                'name' => 'top_margin',
                'description' => ''
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Bottom Margin','mixtapewp'),
                'name' => 'bottom_margin',
                'description' => ''
            )
        );
    }

    /**
     * Generates widget's HTML
     *
     * @param array $args args from widget area
     * @param array $instance widget's options
     */
    public function widget($args, $instance) {

        extract($args);

        //prepare variables
        $params = '';

        //is instance empty?
        if(is_array($instance) && count($instance)) {
            //generate shortcode params
            foreach($instance as $key => $value) {
                $params .= " $key='$value' ";
            }
        }

        echo '<div class="widget qodef-separator-widget">';

        //finally call the shortcode
        echo do_shortcode("[qodef_separator $params]"); // XSS OK

        echo '</div>'; //close div.qodef-separator-widget
    }
}