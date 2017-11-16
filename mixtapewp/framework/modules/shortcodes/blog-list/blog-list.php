<?php

namespace MixtapeQode\Modules\Shortcodes\BlogList;

use MixtapeQode\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class BlogList
 */
class BlogList implements ShortcodeInterface {
	/**
	* @var string
	*/
	private $base;
	
	function __construct() {
		$this->base = 'qodef_blog_list';
		
		add_action('vc_before_init', array($this,'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}
	public function vcMap() {

		vc_map( array(
			'name' => esc_html__('Blog List', 'mixtapewp'),
			'base' => $this->base,
			'icon' => 'icon-wpb-blog-list extended-custom-icon',
			'category' => esc_html__('by SELECT', 'mixtapewp'),
			'allowed_container_element' => 'vc_row',
			'params' => array(
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Type', 'mixtapewp'),
						'param_name' => 'type',
						'value' => array(
							esc_html__('Boxes','mixtapewp') => 'boxes',
							esc_html__('Minimal','mixtapewp') => 'minimal',
							esc_html__('Masonry','mixtapewp') => 'masonry',
							esc_html__('Image in box','mixtapewp') => 'image_in_box'
						),
						'description' => '',
						'admin_label' => true
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Number of Posts','mixtapewp'),
						'param_name' => 'number_of_posts',
						'description' => ''
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Number of Columns','mixtapewp'),
						'param_name' => 'number_of_columns',
						'value' => array(
							esc_html__('One','mixtapewp') => '1',
							esc_html__('Two','mixtapewp') => '2',
							esc_html__('Three','mixtapewp') => '3',
							esc_html__('Four','mixtapewp') => '4'
						),
						'description' => '',
						'dependency' => Array('element' => 'type', 'value' => array('boxes')),
   
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Order By','mixtapewp'),
						'param_name' => 'order_by',
						'value' => array(
							esc_html__('Title','mixtapewp') => 'title',
							esc_html__('Date','mixtapewp') => 'date'
						)
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Order','mixtapewp'),
						'param_name' => 'order',
						'value' => array(
							esc_html__('ASC','mixtapewp') => 'ASC',
							esc_html__('DESC','mixtapewp') => 'DESC'
						)
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Category Slug','mixtapewp'),
						'param_name' => 'category',
						'admin_label' => true,
						'description' => esc_html__('Leave empty for all or use comma for list','mixtapewp')
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Image Size','mixtapewp'),
						'param_name' => 'image_size',
						'value' => array(
							esc_html__('Original','mixtapewp') => 'original',
							esc_html__('Landscape','mixtapewp') => 'landscape',
							esc_html__('Square','mixtapewp') => 'square'
						),
						'description' => '',
						'dependency' => array('element' => 'type', 'value' => array('boxes'))
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Text length','mixtapewp'),
						'param_name' => 'text_length',
						'description' => esc_html__('Number of characters','mixtapewp')
					),
						array(
						'type' => 'colorpicker',
						'heading' => esc_html__('Title Color','mixtapewp'),
						'param_name' => 'title_color',
						'description' => '',
						'dependency'  => array('element' => 'type','value'=> array('boxes','masonry')),
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html__('Post Info Color','mixtapewp'),
						'param_name' => 'post_info_color',
						'description' => '',
						'dependency'  => array('element' => 'type','value'=> array('boxes','masonry')),
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html__('Text Color','mixtapewp'),
						'param_name' => 'text_color',
						'description' => '',
						'dependency'  => array('element' => 'type','value'=> array('boxes','masonry')),
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Box Shadow','mixtapewp'),
						'param_name' => 'box_shadow',
						'description' => '',
						'value' => array(
							esc_html__('No','mixtapewp')   => 'no',
							esc_html__('Yes','mixtapewp') => 'yes',
						),
						'dependency'  => array('element' => 'type','value'=> array('boxes','masonry')),
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html__('Background Color','mixtapewp'),
						'param_name' => 'bg_color',
						'description' => '',
						'dependency'  => array('element' => 'type','value'=> array('boxes','masonry')),
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Title Tag','mixtapewp'),
						'param_name' => 'title_tag',
						'value' => array(
							''   => '',
							'h2' => 'h2',
							'h3' => 'h3',
							'h4' => 'h4',
							'h5' => 'h5',
							'h6' => 'h6',
						),
						'description' => '',
						'dependency'  => array('element' => 'type','value'=> array('boxes','minimal','image_in_box')),
					),
					array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Show Load More','mixtapewp') ,
                        'param_name' => 'show_load_more',
                        'value' => array(
                            esc_html__('No','mixtapewp')  => 'no',
                            esc_html__('Yes','mixtapewp') => 'yes'
                        )
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Load More Skin','mixtapewp') ,
                        'param_name' => 'load_more_skin',
                        'value' => array(
                            esc_html__('Dark','mixtapewp')  => 'dark',
                            esc_html__('Light','mixtapewp') => 'light'
                        ),
                        'dependency'  => array('element' => 'show_load_more','value'=> array('yes')),
                    ),
				)
		) );

	}
	public function render($atts, $content = null) {
		
		$default_atts = array(
			'type' 					=> 'boxes',
            'number_of_posts' 		=> '',
            'number_of_columns'		=> '',
            'image_size'			=> 'original',
            'order_by'				=> 'title',
            'order'					=> 'ASC',
            'category'				=> '',
            'title_tag'				=> 'h4',
			'text_length'			=> '90',
			'title_color'			=> '',
			'post_info_color'		=> '',
			'text_color'			=> '',
			'box_shadow'			=> 'no',
			'bg_color'				=> '',
			'show_load_more'		=> '',
			'load_more_skin'		=> 'dark'
        );
		
		$params = shortcode_atts($default_atts, $atts);
		extract($params);
		$params['holder_classes'] = $this->getBlogHolderClasses($params);
	
		$queryArray = $this->generateBlogQueryArray($params);
		$query_result = new \WP_Query($queryArray);
		$params['query_result'] = $query_result;	
		
        $thumbImageSize = $this->generateImageSize($params);
		$params['thumb_image_size'] = $thumbImageSize;

		$params['data_atts'] = $this->getDataAtts($params);
		$params['data_atts'] .= 'data-max-num-pages = '.$query_result->max_num_pages;


		$params['title_color'] = $this->getBlogListTitleColor($params);
		$params['post_info_color'] = $this->getBlogListPostInfoColor($params);
		$params['text_color'] = $this->getBlogListTextColor($params);
		$params['bg_color'] = $this->getHolderBackgroundColor($params);

		$html ='';
        $html .= mixtape_qodef_get_shortcode_module_template_part('templates/blog-list-holder', 'blog-list', '', $params);
		return $html;
		
	}

	/**
	   * Generates holder classes
	   *
	   * @param $params
	   *
	   * @return string
	*/
	private function getBlogHolderClasses($params){
		$holderClasses = '';
		
		$columnNumber = $this->getColumnNumberClass($params);
		
		if(!empty($params['type'])){
			switch($params['type']){
				case 'image_in_box':
					$holderClasses = 'qodef-image-in-box';
				break;
				case 'boxes' : 
					$holderClasses = 'qodef-boxes';
				break;	
				case 'masonry' : 
					$holderClasses = 'qodef-masonry';
				break;
				case 'minimal' :
					$holderClasses = 'qodef-minimal';
				break;
				default: 
					$holderClasses = 'qodef-boxes';
			}
		}
		
		$holderClasses .= ' '.$columnNumber;

        if(!empty($params['bg_color'])) {
            $holderClasses .= ' qodef-holder-with-padding';
        }

        if($params['box_shadow'] == 'yes') {
            $holderClasses .= ' qodef-holder-with-shadow';
            $holderClasses .= ' qodef-holder-with-padding';
        }

        if($params['load_more_skin'] == 'light') {
            $holderClasses .= ' qodef-holder-load-more-light';
        }

		return $holderClasses;
		
	}

	/** 
	   * Generates column classes for boxes type
	   *
	   * @param $params
	   *
	   * @return string
	*/
	private function getColumnNumberClass($params){
		
		$columnsNumber = '';
		$type = $params['type'];
		$columns = $params['number_of_columns'];
		
        if ($type == 'boxes') {
            switch ($columns) {
                case 1:
                    $columnsNumber = 'qodef-one-column';
                    break;
                case 2:
                    $columnsNumber = 'qodef-two-columns';
                    break;
                case 3:
                    $columnsNumber = 'qodef-three-columns';
                    break;
                case 4:
                    $columnsNumber = 'qodef-four-columns';
                    break;
                default:
					$columnsNumber = 'qodef-one-column';
                    break;
            }
        }
		return $columnsNumber;
	}

	/**
	   * Generates query array
	   *
	   * @param $params
	   *
	   * @return array
	*/
	public function generateBlogQueryArray($params){

		$queryArray = array();
		
		$queryArray = array(
			'orderby' => $params['order_by'],
			'order' => $params['order'],
			'posts_per_page' => $params['number_of_posts'],
			'category_name' => $params['category']
		);

		$paged = '';
        if(empty($params['next_page'])) {
            if(get_query_var('paged')) {
                $paged = get_query_var('paged');
            } elseif(get_query_var('page')) {
                $paged = get_query_var('page');
            }
        }

        if(!empty($params['next_page'])){
            $queryArray['paged'] = $params['next_page'];

        } else{
            $queryArray['paged'] = 1;
        }

		return $queryArray;
	}

	/**
	   * Generates image size option
	   *
	   * @param $params
	   *
	   * @return string
	*/
	private function generateImageSize($params){
		$thumbImageSize = '';
		$imageSize = $params['image_size'];
		
		if ($imageSize !== '' && $imageSize == 'landscape') {
            $thumbImageSize .= 'mixtape_qodef_landscape';
        } else if($imageSize === 'square'){
			$thumbImageSize .= 'mixtape_qodef_square';
		} else if ($imageSize !== '' && $imageSize == 'original') {
            $thumbImageSize .= 'full';
        }
		return $thumbImageSize;
	}

	private function getBlogListTitleColor($params) {

		$title_color = array();

		if ($params['title_color'] !== '') {
			$title_color[] = 'color:' . $params['title_color'];
		}

		return implode(';', $title_color);
	}

	private function getBlogListPostInfoColor($params) {

		$post_info_color = array();

		if ($params['post_info_color'] !== '') {
			$post_info_color[] = 'color:' . $params['post_info_color'];
		}

		return implode(';', $post_info_color);
	}

	private function getBlogListTextColor($params) {

		$text_color = array();

		if ($params['text_color'] !== '') {
			$text_color[] = 'color:' . $params['text_color'];
		}

		return implode(';', $text_color);
	}

	private function getHolderBackgroundColor($params) {

		$bg_color = array();

		if ($params['bg_color'] !== '') {
			$bg_color[] = 'background-color:' . $params['bg_color'];
		}

		return implode(';', $bg_color);
	}

	/**
     * Generates datta attributes array
     *
     * @param $params
     *
     * @return array
     */
    public function getDataAtts($params){

        $data_attr = array();
        $data_return_string = '';

        if(get_query_var('paged')) {
            $paged = get_query_var('paged');
        } elseif(get_query_var('page')) {
            $paged = get_query_var('page');
        } else {
            $paged = 1;
        }

        if(!empty($paged)) {
            $data_attr['data-next-page'] = $paged+1;
        }
        if(!empty($params['order_by'])){
            $data_attr['data-order-by'] = $params['order_by'];
        }
        if(!empty($params['order'])){
            $data_attr['data-order'] = $params['order'];
        }
        if(!empty($params['number_of_posts'])){
            $data_attr['data-number'] = $params['number_of_posts'];
        }
        if(!empty($params['title_tag'])){
            $data_attr['data-title-tag'] = $params['title_tag'];
        }
        if(!empty($params['title_color'])){
            $data_attr['data-title-color'] = $params['title_color'];
        }
        if(!empty($params['text_color'])){
            $data_attr['data-text-color'] = $params['text_color'];
        }
        if(!empty($params['post_info_color'])){
            $data_attr['data-post-info-color'] = $params['post_info_color'];
        }
        if(!empty($params['box_shadow'])){
            $data_attr['data-box-shadow'] = $params['box_shadow'];
        }
        if(!empty($params['bg_color'])){
            $data_attr['data-bg-color'] = $params['bg_color'];
        }
        if(!empty($params['show_load_more'])){
            $data_attr['data-show-load-more'] = $params['show_load_more'];
        }
        if(!empty($params['load_more_skin'])){
            $data_attr['data-load-more-skin'] = $params['load_more_skin'];
        }
        if(!empty($params['text_length'])){
            $data_attr['data-text-length'] = $params['text_length'];
        }
        if(!empty($params['category'])){
            $data_attr['data-category'] = $params['category'];
        }
        if(!empty($params['image-size'])){
            $data_attr['data-image-size'] = $params['image-size'];
        }
        if(!empty($params['type'])){
            $data_attr['data-type'] = $params['type'];
        }
        
        foreach($data_attr as $key => $value) {
            if($key !== '') {
                $data_return_string .= $key . '= "' . esc_attr( $value ) . '" ';
            }
        }
        return $data_return_string;
    }


}
	
