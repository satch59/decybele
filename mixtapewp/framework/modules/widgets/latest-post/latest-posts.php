<?php

class MixtapeQodeLatestPosts extends MixtapeQodeWidget {
	protected $params;
	public function __construct() {
		parent::__construct(
			'qodef_latest_posts_widget', // Base ID
			esc_html__('Select Latest Posts','mixtapewp'), // Name
			array( 'description' => esc_html__( 'Display posts from your blog', 'mixtapewp' ), ) // Args
		);

		$this->setParams();
	}

	protected function setParams() {
		$this->params = array(
			array(
                'name' => 'title',
                'type' => 'textfield',
                'title' => esc_html__('Title','mixtapewp')
            ),
			array(
				'name' => 'number_of_posts',
				'type' => 'textfield',
				'title' => esc_html__('Number of posts','mixtapewp')
			),
			array(
				'name' => 'order_by',
				'type' => 'dropdown',
				'title' => esc_html__('Order By','mixtapewp'),
				'options' => array(
					'title' => esc_html__('Title','mixtapewp'),
					'date' => esc_html__('Date','mixtapewp')
				)
			),
			array(
				'name' => 'order',
				'type' => 'dropdown',
				'title' => esc_html__('Order','mixtapewp'),
				'options' => array(
					'ASC' => esc_html__('ASC','mixtapewp'),
					'DESC' => esc_html__('DESC','mixtapewp')
				)
			),
			array(
				'name' => 'category',
				'type' => 'textfield',
				'title' => esc_html__('Category Slug','mixtapewp')
			),
			array(
				'name' => 'text_length',
				'type' => 'textfield',
				'title' => esc_html__('Number of characters','mixtapewp')
			),
			array(
				'name' => 'title_tag',
				'type' => 'dropdown',
				'title' => esc_html__('Title Tag','mixtapewp'),
				'options' => array(
					""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",
					"h5" => "h5",
					"h6" => "h6"
				)
			)			
		);
	}

	public function widget($args, $instance) {
		extract($args);

		//prepare variables
		$content        = '';
		$params         = array();
		$params['type'] = 'image_in_box';

		//is instance empty?
		if(is_array($instance) && count($instance)) {
			//generate shortcode params
			foreach($instance as $key => $value) {
				$params[$key] = $value;
			}
		}
		if(empty($params['title_tag'])){
			$params['title_tag'] = 'h5';
		}

		if(!empty($params['title'])) {
            print $args['before_title'].$params['title'].$args['after_title'];
        }

		echo '<div class="widget qodef-latest-posts-widget">';
		
		echo mixtape_qodef_execute_shortcode('qodef_blog_list', $params);

		echo '</div>'; //close qodef-latest-posts-widget
	}
}
