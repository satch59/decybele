<?php
namespace MixtapeQode\Modules\Shortcodes\ImageWithTitle;

use MixtapeQode\Modules\Shortcodes\Lib\ShortcodeInterface;

class ImageWithTitle implements ShortcodeInterface{

	private $base;

	/**
	 * Image Gallery constructor.
	 */
	public function __construct() {
		$this->base = 'qodef_image_with_title';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	/**
	 * Maps shortcode to Visual Composer. Hooked on vc_before_init
	 *
	 * @see qodef_core_get_carousel_slider_array_vc()
	 */
	public function vcMap() {
		vc_map(array(
			'name'                      => esc_html__('Image With Title', 'mixtapewp'),
			'base'                      => $this->getBase(),
			'category'                  => esc_html__('by SELECT', 'mixtapewp'),
			'icon'                      => 'icon-wpb-image-with-title extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array(
				array(
					'type'			=> 'attach_image',
					'param_name'	=> 'image',
					'heading'		=> esc_html__('Image',  'mixtapewp'),
					'description'	=> esc_html__('Select images from media library',  'mixtapewp')
				),
				array(
					'type'			=> 'textfield',
					'param_name'	=> 'title',
					'heading'		=> esc_html__('Title',  'mixtapewp')
				),
				array(
					'type'        => 'dropdown',
					'param_name'  => 'title_tag',
					'heading'     => esc_html__( 'Title Tag', 'mixtapewp' ),
					'value'  => array(
						esc_html__('Default', 'mixtapewp')  => '',
						'h1' => 'h1',
						'h2' => 'h2',
						'h3' => 'h3',
						'h4' => 'h4',
						'h5' => 'h5',
						'h6' => 'h6'
					),
					'save_always' => true,
					'dependency'  => array( 'element' => 'title_text', 'not_empty' => true )
				),
				array(
					'type'        => 'textfield',
					'param_name'  => 'title_break_words',
					'heading'     => esc_html__( 'Position of Line Break', 'mixtapewp' ),
					'description' => esc_html__( 'Enter the position of the word after which you would like to create a line break (e.g. if you would like the line break after the 3rd word, you would enter "3")', 'mixtapewp' ),
					'dependency'  => array( 'element' => 'title', 'not_empty' => true )
				),
                array(
                    'type'        => 'textfield',
                    'param_name'  => 'link',
                    'heading'     => esc_html__( 'Link', 'mixtapewp' ),
                    'description' => esc_html__( 'Enter link for the image and title)', 'mixtapewp' ),
                    'dependency'  => array( 'element' => 'title', 'not_empty' => true )
                ),
                array(
                    'type'       => 'dropdown',
                    'heading'    => esc_html__('Link Target', 'mixtapewp'),
                    'param_name' => 'link_target',
                    'value'      => array(
                        'Self'  => '_self',
                        'Blank' => '_blank'
                    ),
                    'dependency' => array('element' => 'link', 'not_empty' => true),
                ),
				array(
					'type'			=> 'dropdown',
					'param_name' 	=> 'vertical_position',
					'heading'		=> esc_html__('Title Vertical Position',  'mixtapewp'),
					'value' 		=> array(
						esc_html__('Top',  'mixtapewp')	    => 'top',
						esc_html__('Middle', 'mixtapewp')	=> 'middle',
						esc_html__('Bottom', 'mixtapewp')	=> 'bottom'
					),
					'save_always'	=> true
				),
				array(
					'type'			=> 'dropdown',
					'param_name' 	=> 'horizontal_position',
					'heading'		=> esc_html__('Title Horizontal Position',  'mixtapewp'),
					'value' 		=> array(
						esc_html__('Left',  'mixtapewp')	=> 'left',
						esc_html__('Right', 'mixtapewp')	=> 'right',
					),
					'save_always'	=> true
				),
				array(
					'type'			=> 'dropdown',
					'param_name' 	=> 'shadow',
					'heading'		=> esc_html__('Enable Shadow',  'mixtapewp'),
					'value' 		=> array(
						esc_html__('No', 'mixtapewp')	=> 'no',
						esc_html__('Yes', 'mixtapewp')	=> 'yes'
					),
					'save_always'	=> true
				)
			)
		));

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
			'image'	                => '',
			'title'		            => '',
			'title_tag'             => 'h3',
			'link'                  => '',
			'link_target'           => '_self',
			'title_break_words'     => '',
			'vertical_position'     => 'top',
			'horizontal_position'   => 'left',
			'shadow'                => 'no'
		);

		$params = shortcode_atts($args, $atts);

		$params['title_tag']      = ! empty( $params['title_tag'] ) ? $params['title_tag'] : 'h3';
		$params['title']          = $this->getModifiedTitle( $params );
		$params['holder_classes'] = $this->getHolderClasses($params);

		$html = mixtape_qodef_get_shortcode_module_template_part('templates/image-with-title', 'image-with-title', '', $params);

		return $html;

	}

	/**
	   * Generates image grid holder classes
	   *
	   * @param $params
	   *
	   * @return string
	*/
	private function getHolderClasses($params){
		$classes = array();

		$classes[] = ! empty($params['vertical_position']) ? 'qodef-iwt-vertical-'.$params['vertical_position'] : 'qodef-iwt-vertical-top';
		$classes[] = ! empty($params['horizontal_position']) ? 'qodef-iwt-'.$params['horizontal_position'] : 'qodef-iwt-left';

        if($params['shadow'] === 'yes') {
	        $classes[] = ' qodef-image-with-title-shadow';
        }

		return implode(' ', $classes);
	}

	private function getModifiedTitle( $params ) {
		$title             = $params['title'];
		$title_break_words = str_replace( ' ', '', $params['title_break_words'] );

		if ( ! empty( $title ) ) {
			$split_title = explode( ' ', $title );

			if ( ! empty( $title_break_words ) ) {
				$split_title[ $title_break_words - 1 ] = $split_title[ $title_break_words - 1 ] . '<br />';
			}

			$title = implode( ' ', $split_title );
		}

		return $title;
	}
}