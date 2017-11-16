<?php
namespace MixtapeQode\Modules\Shortcodes\BlogSlider;

use MixtapeQode\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class Blog Slider
 */
class BlogSlider implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'qodef_blog_slider';

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

		$categories_array = array();

		vc_map( array(
			'name' => esc_html__('Blog Slider', 'mixtapewp'),
			'base' => $this->getBase(),
			'icon'  => 'icon-wpb-blog-slider extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params' => array(
                array(
                    'type'			=> 'dropdown',
                    'heading'		=> esc_html__('Slider Type', 'mixtapewp'),
                    'param_name'	=> 'slider_type',
                    'value'			=> array(
                        esc_html__('Carousel', 'mixtapewp')  	=> 'carousel',
                        esc_html__('Slider', 'mixtapewp')		=> 'slider',
                    ),
                    'admin_label'	=> true,
                    'description'	=> ''
                ),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Number of Posts', 'mixtapewp'),
					'param_name' => 'number_of_posts',
					'description' => esc_html__('Leave empty for all posts', 'mixtapewp')
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Selected Posts', 'mixtapewp'),
					'param_name'	=> 'selected_posts',
					'description'	=> esc_html__('Selected Posts (leave empty for all, delimit by comma)', 'mixtapewp')
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Order by', 'mixtapewp'),
					'param_name'	=> 'order_by',
					'value'			=> array(
						esc_html__('Date', 'mixtapewp')		=> 'date',
						esc_html__('Title', 'mixtapewp')	=> 'title'
					),
					'admin_label'	=> true,
					'description'	=> ''
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Order', 'mixtapewp'),
					'param_name'	=> 'order',
					'value'			=> array(
						esc_html__('DESC', 'mixtapewp')		=> 'desc',
						esc_html__('ASC', 'mixtapewp')		=> 'asc'
					),
					'admin_label'	=> true,
					'description'	=> ''
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Category', 'mixtapewp'),
					'param_name' => 'category',
					'value' => '',
					'description' => esc_html__('Leave empty for all or use comma for list', 'mixtapewp')
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Show Image', 'mixtapewp'),
					'param_name'	=> 'show_image',
					'value'			=> array(
						esc_html__('No', 'mixtapewp')		=> 'no',
						esc_html__('Yes', 'mixtapewp')		=> 'yes',
					),
					'description'	=> '',
					"dependency" => array("element" => "slider_type", "value" => array("carousel"))
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Image Size', 'mixtapewp'),
					'param_name'	=> 'image_size',
					'value'			=> array(
						esc_html__('Default', 'mixtapewp')		=> 'default',
						esc_html__('Square', 'mixtapewp')		=> 'square',
					),
					'description'	=> '',
                    "dependency" => array("element" => "show_image", "value" => array("yes"))
				),
                array(
                    'type'			=> 'dropdown',
                    'heading'		=> esc_html__('Image Size', 'mixtapewp'),
                    'param_name'	=> 'image_size_slider',
                    'value'			=> array(
                        esc_html__('Default', 'mixtapewp')		=> 'default',
                        esc_html__('Square', 'mixtapewp')		=> 'square',
                        esc_html__('Custom', 'mixtapewp')		=> 'custom',
                    ),
                    "dependency" => array("element" => "slider_type", "value" => array("slider"))
                ),
                array(
                    "type" => "textfield",
                    "heading" => esc_html__("Image Width", 'mixtapewp'),
                    "param_name" => "image_width",
                    "value" => "",
                    "description" => esc_html__("Set custom image width", 'mixtapewp'),
                    "dependency" => array("element" => "image_size_slider", "value" => array("custom"))
                ),
                array(
                    "type" => "textfield",
                    "heading" => esc_html__("Image Height", 'mixtapewp'),
                    "param_name" => "image_height",
                    "value" => "",
                    "description" => esc_html__("Set custom image height", 'mixtapewp'),
                    "dependency" => array("element" => "image_size_slider", "value" => array("custom"))
                ),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Text length', 'mixtapewp'),
					'param_name' => 'text_length',
					'description' => esc_html__('Number of characters', 'mixtapewp')
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
			'number_of_posts'	=> -1,
			'order_by'		 	=> 'date',
			'order'				=> 'DESC',
			'category'			=> '',
			'image_size'		=> 'full',
			'image_size_slider'	=> 'full',
			'slider_type'	 	=> 'carousel',
			'show_image'	 	=> 'no',
			'image_height'	 	=> '',
            'image_width'	 	=> '',
            'selected_posts' 	=> '',
            'text_length' 		=> '90'
		);

		$params = shortcode_atts($args, $atts);

		extract($params);
		
		
		$args = array(
			'post_type'			=> 'post',
			'posts_per_page'	=> $number_of_posts,
			'orderby'			=> $order_by,
			'order'				=> $order
		);
		if($category != '' && $category != 0){
			$args['cat'] = $category;			
		}

		$slider_class = 'qodef-blog-slider-type-'.$slider_type;
		$post_ids = null;
		
		if($selected_posts != ''){
			$post_ids = explode(',', $selected_posts);
			$args['post__in'] = $post_ids;
		}

        if($slider_type == 'slider'){
           if($image_size_slider == 'custom' && $image_width != '' && $image_height != ''){
                $params['image_size_slider'] = 'custom';
                $params['image_width'] = $image_width;
                $params['image_height'] = $image_height;
            }elseif($image_size_slider == 'square') {
               $params['image_size_slider'] = 'mixtape_qodef_square';
           }



        }elseif($image_size == 'square') {
            $params['image_size'] = 'mixtape_qodef_square';
        }

		$query = new \WP_Query($args);

		if ( $query->have_posts() ) {

			$html = '';

			$html .= '<div class="qodef-blog-slider-outer">';
			

			$html .= '<div class="qodef-blog-slider qodef-slick-slider-navigation-style '. $slider_class .'" data-type="'.$slider_type.'">';

			while ( $query->have_posts() ) {

				$query->the_post();

				//Get slide HTML from template
				$html .= mixtape_qodef_get_shortcode_module_template_part('templates/blog-'.$slider_type, 'blog-slider', '', $params);

			}

			$html .= '</div></div>';


		} else {

			$html = esc_html__('There is no posts!', 'mixtapewp');

		}

		wp_reset_postdata();

		return $html;

	}
}