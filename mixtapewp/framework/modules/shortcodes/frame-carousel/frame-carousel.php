<?php
namespace MixtapeQode\Modules\Shortcodes\FrameCarousel;

use MixtapeQode\Modules\Shortcodes\Lib\ShortcodeInterface;

class FrameCarousel implements ShortcodeInterface{

	private $base;

	/**
	 * Frame Carousel constructor.
	 */
	public function __construct() {
		$this->base = 'qodef_frame_carousel';

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
			'name'                      => esc_html__('Frame Carousel', 'mixtapewp'),
			'base'                      => $this->getBase(),
			'category'                  => esc_html__('by SELECT', 'mixtapewp'),
			'icon'                      => 'icon-wpb-frame-carousel extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array(
				array(
						'type' => 'param_group',
						'heading' => esc_html__( 'Images', 'mixtapewp' ),
						'param_name' => 'images',
						'value' => '',
						'params' => array(
							array(
								'type' => 'attach_image',
								'heading' => esc_html__( 'Carousel Image', 'mixtapewp' ),
								'param_name' => 'carousel_image',
								'admin_label' => true,
								'description' => esc_html__('Recommended image size is 485x275px', 'mixtapewp'),
							),
							array(
								'type' => 'attach_image',
								'heading' => esc_html__( 'Frame Image', 'mixtapewp' ),
								'param_name' => 'active_image',
								'admin_label' => true,
								'description' => esc_html__('Recommended image size is 635x397px', 'mixtapewp'),
							)
						)
					),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Skin', 'mixtapewp'),
					'admin_label'	=> true,
					'param_name'	=> 'skin',
					'value'			=> array(
						esc_html__('Dark', 'mixtapewp') 	=> 'dark',
						esc_html__('Light', 'mixtapewp') 	=> 'light'
					),
					'save_always'	=> true,
					'description' => esc_html__('Auto rotate slides each X seconds', 'mixtapewp'),
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Slide duration', 'mixtapewp'),
					'admin_label'	=> true,
					'param_name'	=> 'autoplay',
					'value'			=> array(
						'3'									=> '3',
						'5'									=> '5',
						'10'								=> '10',
						esc_html__('Disable', 'mixtapewp') 	=> 'disable'
					),
					'save_always'	=> true,
					'description' => esc_html__('Auto rotate slides each X seconds', 'mixtapewp'),
				),
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
			'images' 	=> '',
			'autoplay'	=> '5000',
			'skin'		=> 'dark'
		);

		$params = shortcode_atts($args, $atts);

		$params['images'] = json_decode(urldecode($params['images']), true);

		$params['carousel_data'] = $this->getCarouselData($params);
		$params['images'] = $this->getFrameCarouselImages($params);
		
		$html = mixtape_qodef_get_shortcode_module_template_part('templates/frame-carousel', 'frame-carousel', '', $params);

		return $html;

	}

	/**
	 * Return images for gallery
	 *
	 * @param $params
	 * @return array
	 */
	private function getFrameCarouselImages($params) {
		
		$new_images = array();

		$images = $params['images'];
		$i = 0;

		if(is_array($images) && count($images) > 0) {
			foreach ($images as $image) {
				$new_images[$i]['carousel_image']['id'] = $image['carousel_image'];
				$new_images[$i]['active_image']['id'] = $image['active_image'];

				
				$image_original = wp_get_attachment_image_src($image['carousel_image'], 'full');
				$new_images[$i]['carousel_image']['url'] = $image_original[0];

				$image_original_active = wp_get_attachment_image_src($image['active_image'], 'full');
				$new_images[$i]['active_image']['url'] = $image_original_active[0];

				$new_images[$i]['carousel_image']['title'] = get_the_title($image['carousel_image']);
				$new_images[$i]['active_image']['title'] = get_the_title($image['active_image']);

//				$thumb_img = get_post($image['carousel_image']);
//				$new_images[$i]['carousel_image']['description'] = $thumb_img->post_content;
//
//				$thumb_img_active = get_post($image['active_image']);
//				$new_images[$i]['active_image']['description'] = $thumb_img_active->post_content;

				$i++;
			}
		}

		return $new_images;

	}

	/**
	 * Return all configuration data for slider
	 *
	 * @param $params
	 * @return array
	 */
	private function getCarouselData($params) {

		$carousel_data = array();

		$carousel_data['data-autoplay'] = ($params['autoplay'] !== '') ? $params['autoplay'] : '';

		return $carousel_data;

	}

}