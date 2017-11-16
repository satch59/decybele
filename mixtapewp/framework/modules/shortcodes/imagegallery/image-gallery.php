<?php
namespace MixtapeQode\Modules\Shortcodes\ImageGallery;

use MixtapeQode\Modules\Shortcodes\Lib\ShortcodeInterface;

class ImageGallery implements ShortcodeInterface{

	private $base;

	/**
	 * Image Gallery constructor.
	 */
	public function __construct() {
		$this->base = 'qodef_image_gallery';

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
			'name'                      => esc_html__('Image Gallery', 'mixtapewp'),
			'base'                      => $this->getBase(),
			'category'                  => esc_html__('by SELECT', 'mixtapewp'),
			'icon'                      => 'icon-wpb-image-gallery extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array(
				array(
					'type'			=> 'attach_images',
					'heading'		=> esc_html__('Images',  'mixtapewp'),
					'param_name'	=> 'images',
					'description'	=> esc_html__('Select images from media library',  'mixtapewp'),
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Image Size',  'mixtapewp'),
					'param_name'	=> 'image_size',
					'description'	=> esc_html__('Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size',  'mixtapewp'),
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('Gallery Type',  'mixtapewp'),
					'admin_label' => true,
					'param_name'  => 'type',
					'value'       => array(
						esc_html__('Slider',  'mixtapewp')		=> 'slider',
						esc_html__('Image Grid',  'mixtapewp')	=> 'image_grid',
						esc_html__('Masonry', 'mixtapewp')	=> 'masonry',
					),
					'description' => esc_html__('Select gallery type',  'mixtapewp'),
					'save_always' => true
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('With Space',  'mixtapewp'),
					'admin_label'	=> true,
					'param_name'	=> 'image_grid_space',
					'value'			=> array(
                        esc_html__('Yes', 'mixtapewp')			=> 'yes',
                        esc_html__('No', 'mixtapewp')			=> 'no'
					),
					'save_always'	=> true,
					'dependency'	=> array(
						'element'	=> 'type',
						'value'		=> array(
							'image_grid'
						)
					),
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Slide duration',  'mixtapewp'),
					'admin_label'	=> true,
					'param_name'	=> 'autoplay',
					'value'			=> array(
						'3'			=> '3',
						'5'			=> '5',
						'10'		=> '10',
                        esc_html__('Disable', 'mixtapewp')	=> 'disable'
					),
					'save_always'	=> true,
					'dependency'	=> array(
						'element'	=> 'type',
						'value'		=> array(
							'slider'
						)
					),
					'description'	=> esc_html__('Auto rotate slides each X seconds',  'mixtapewp'),
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Slide Animation',  'mixtapewp'),
					'admin_label'	=> true,
					'param_name'	=> 'slide_animation',
					'value'			=> array(
						esc_html__('Slide',  'mixtapewp')		=> 'slide',
						esc_html__('Fade',  'mixtapewp')		=> 'fade'
					),
					'save_always'	=> true,
					'dependency'	=> array(
						'element'	=> 'type',
						'value'		=> array(
							'slider'
						)
					)
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Column Number',  'mixtapewp'),
					'param_name'	=> 'column_number',
					'value'			=> array(2, 3, 4, 5),
					'save_always'	=> true,
					'dependency'	=> array(
						'element' 	=> 'type',
						'value'		=> array(
							'image_grid'
						)
					),
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Open PrettyPhoto on click',  'mixtapewp'),
					'param_name'	=> 'pretty_photo',
					'value'			=> array(
						esc_html__('No',  'mixtapewp')		=> 'no',
						esc_html__('Yes',  'mixtapewp')		=> 'yes'
					),
					'save_always'	=> true,
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__('Grayscale Images',  'mixtapewp'),
					'param_name' 	=> 'grayscale',
					'value' 		=> array(
						esc_html__('No',  'mixtapewp') => 'no',
						esc_html__('Yes',  'mixtapewp') => 'yes'
					),
					'save_always'	=> true,
					'dependency'	=> array(
						'element'	=> 'type',
						'value'		=> array(
							'image_grid'
						)
					)
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Show Navigation Arrows',  'mixtapewp'),
					'param_name' 	=> 'navigation',
					'value' 		=> array(
						esc_html__('Yes',  'mixtapewp')	=> 'yes',
						esc_html__('No'	,  'mixtapewp')	=> 'no'
					),
					'dependency' 	=> array(
						'element'	=> 'type',
						'value' 	=> array(
							'slider'
						)
					),
					'save_always'	=> true
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Show Pagination',  'mixtapewp'),
					'param_name' 	=> 'pagination',
					'value' 		=> array(
						esc_html__('Yes',  'mixtapewp') 	=> 'yes',
						esc_html__('No',  'mixtapewp')		=> 'no'
					),
					'save_always'	=> true,
					'dependency'	=> array(
						'element' 	=> 'type',
						'value' 	=> array(
							'slider'
						)
					)
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
			'images'			=> '',
			'image_size'		=> 'thumbnail',
			'type'				=> 'slider',
			'image_grid_space'	=> 'no',
			'autoplay'			=> '5000',
			'slide_animation'	=> 'slide',
			'pretty_photo'		=> '',
			'column_number'		=> '',
			'grayscale'			=> '',
			'navigation'		=> 'yes',
			'pagination'		=> 'yes'
		);

		$params = shortcode_atts($args, $atts);
		$params['slider_data'] = $this->getSliderData($params);
		$params['image_size'] = $this->getImageSize($params['image_size']);
		$params['images'] = $this->getGalleryImages($params);
		$params['pretty_photo'] = ($params['pretty_photo'] == 'yes') ? true : false;
		$params['columns'] = 'qodef-gallery-columns-' . $params['column_number'];
		$params['gallery_classes'] = ($params['grayscale'] == 'yes') ? 'qodef-grayscale' : '';
		$params['image_grid_space_classes'] = $this->getImageGridHolderClasses($params);

		if ($params['type'] == 'image_grid') {
			$template = 'gallery-grid';
		} elseif ($params['type'] == 'slider') {
			$template = 'gallery-slider';
		} elseif ($params['type'] == 'masonry') {
			$template = 'gallery-masonry';
		}

		$html = mixtape_qodef_get_shortcode_module_template_part('templates/' . $template, 'imagegallery', '', $params);

		return $html;

	}

	/**
	 * Return images for gallery
	 *
	 * @param $params
	 * @return array
	 */
	private function getGalleryImages($params) {
		$image_ids = array();
		$images = array();
		$i = 0;

		if ($params['images'] !== '') {
			$image_ids = explode(',', $params['images']);
		}

		foreach ($image_ids as $id) {

			$image['image_id'] = $id;
			$image['class'] = '';
			if ($params['type'] == 'masonry') {
		        $size = get_post_meta($id,'_qodef_masonry_image_size', true);
		        $size = ($size)?$size:'qodef-default-masonry-item';
		        switch($size){
			        case 'qodef-large-height-masonry-item' :
				        $img_size = 'mixtape_qodef_large_height';
				        $image['class'] = 'qodef-size-portrait';
				        break;
			        case 'qodef-large-width-masonry-item' :
				        $img_size = 'mixtape_qodef_large_width';
				        $image['class'] = 'qodef-size-landscape';
				        break;
			        case 'qodef-large-width-height-masonry-item' :
				        $img_size = 'mixtape_qodef_large_width_height';
				        $image['class'] = 'qodef-size-big-square';
				        break;
			        default:
				        $img_size = 'mixtape_qodef_square';
				        $image['class'] = 'qodef-size-square';
				        break;
		        }
			}
			else{
				$img_size = 'full';
			}
			$image_original = wp_get_attachment_image_src($id, $img_size);
			$image['masonry_size'] = $img_size;
			$image['url'] = $image_original[0];
			$image['title'] = get_the_title($id);

			$images[$i] = $image;
			$i++;
		}

		return $images;

	}

	/**
	 * Return image size or custom image size array
	 *
	 * @param $image_size
	 * @return array
	 */
	private function getImageSize($image_size) {

		$image_size = trim($image_size);
		//Find digits
		preg_match_all( '/\d+/', $image_size, $matches );
		if(in_array( $image_size, array('thumbnail', 'thumb', 'medium', 'large', 'full'))) {
			return $image_size;
		} elseif(!empty($matches[0])) {
			return array(
					$matches[0][0],
					$matches[0][1]
			);
		} else {
			return 'thumbnail';
		}
	}

	/**
	 * Return all configuration data for slider
	 *
	 * @param $params
	 * @return array
	 */
	private function getSliderData($params) {

		$slider_data = array();

		$slider_data['data-autoplay'] = ($params['autoplay'] !== '') ? $params['autoplay'] : '';
		$slider_data['data-animation'] = ($params['slide_animation'] !== '') ? $params['slide_animation'] : '';
		$slider_data['data-navigation'] = ($params['navigation'] !== '') ? $params['navigation'] : '';
		$slider_data['data-pagination'] = ($params['pagination'] !== '') ? $params['pagination'] : '';

		return $slider_data;

	}

	/**
	   * Generates image grid holder classes
	   *
	   * @param $params
	   *
	   * @return string
	*/
	private function getImageGridHolderClasses($params){
		$imageGridClasses = '';

        if($params['image_grid_space'] == 'yes') {
            $imageGridClasses .= ' qodef-image-gallery-grid-with-space';
        }

		return $imageGridClasses;
		
	}

}