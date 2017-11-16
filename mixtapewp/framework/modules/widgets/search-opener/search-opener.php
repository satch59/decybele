<?php

/**
 * Widget that adds search icon that triggers opening of search form
 *
 * Class Qode_Search_Opener
 */
class MixtapeQodeSearchOpener extends MixtapeQodeWidget {
    /**
     * Set basic widget options and call parent class construct
     */
    public function __construct() {
        parent::__construct(
            'qodef_search_opener', // Base ID
            esc_html__('Select Search Opener','mixtapewp') // Name
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array(
            array(
                'name'        => 'search_icon_size',
                'type'        => 'textfield',
                'title'       => esc_html__('Search Icon Size (px)','mixtapewp'),
                'description' => esc_html__('Define size for Search icon','mixtapewp')
            ),
            array(
                'name'        => 'search_icon_color',
                'type'        => 'textfield',
                'title'       => esc_html__('Search Icon Color','mixtapewp'),
                'description' => esc_html__('Define color for Search icon','mixtapewp')
            ),
            array(
                'name'        => 'search_icon_hover_color',
                'type'        => 'textfield',
                'title'       => esc_html__('Search Icon Hover Color','mixtapewp'),
                'description' => esc_html__('Define hover color for Search icon','mixtapewp')
            ),
            array(
                'name'        => 'show_label',
                'type'        => 'dropdown',
                'title'       => esc_html__('Enable Search Icon Text','mixtapewp'),
                'description' => esc_html__('Enable this option to show \'Search\' text next to search icon in header','mixtapewp'),
                'options'     => array(
                    ''    => '',
                    'yes' => esc_html__('Yes','mixtapewp'),
                    'no'  => esc_html__('No','mixtapewp')
                )
            ),
			array(
				'name'			=> 'close_icon_position',
				'type'			=> 'dropdown',
				'title'			=> esc_html__('Close icon stays on opener place','mixtapewp'),
				'description'	=> esc_html__('Enable this option to set close icon on same position like opener icon','mixtapewp'),
				'options'		=> array(
					'yes'	=> esc_html__('Yes','mixtapewp'),
					'no'	=> esc_html__('No','mixtapewp')
				)
			),
            array(
                'type'          => 'textfield',
                'title'         => esc_html__('Margin','mixtapewp'),
                'name'          => 'margin',
                'description'   => esc_html__('Margin (top right bottom left)','mixtapewp')
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
        global $mixtape_qodef_options, $mixtape_qodef_IconCollections;

        $search_type_class    = 'qodef-search-opener';
		$fullscreen_search_overlay = false;
        $search_opener_styles = array();
        $show_search_text     = $instance['show_label'] == 'yes' || $mixtape_qodef_options['enable_search_icon_text'] == 'yes' ? true : false;
		$close_icon_on_same_position = $instance['close_icon_position'] == 'yes' ? true : false;
		$data = '';
        
        if(isset($mixtape_qodef_options['search_type']) && $mixtape_qodef_options['search_type'] == 'search_covers_header') {
            if(isset($mixtape_qodef_options['search_cover_only_bottom_yesno']) && $mixtape_qodef_options['search_cover_only_bottom_yesno'] == 'yes') {
                $search_type_class .= ' search_covers_only_bottom';
            }
        }

        if(!empty($instance['search_icon_size'])) {
            $search_opener_styles[] = 'font-size: '.$instance['search_icon_size'].'px';
        }
        
        if(!empty($instance['search_icon_color'])) {
            $search_opener_styles[] = 'color: '.$instance['search_icon_color'];
			$data .= 'data-color='.$instance['search_icon_color'];
        }


		if ($instance['search_icon_hover_color'] !== ''){
			$data .= ' data-hover-color='.$instance['search_icon_hover_color'];
		}

        if (!empty($instance['margin']) && $instance['margin'] !== '') {
            $search_opener_styles[] = 'margin: '.$instance['margin'];
        }

        ?>
		<?php print $args['before_widget']; ?>
        <a <?php echo esc_attr($data); ?>
			<?php if ( $close_icon_on_same_position ) {
				echo mixtape_qodef_get_inline_attr('yes', 'data-icon-close-same-position');
			} ?>
            <?php mixtape_qodef_inline_style($search_opener_styles); ?>
            <?php mixtape_qodef_class_attribute($search_type_class); ?> href="javascript:void(0)">
            <?php if(isset($mixtape_qodef_options['search_icon_pack'])) {
                $mixtape_qodef_IconCollections->getSearchIcon($mixtape_qodef_options['search_icon_pack'], false);
            } ?>
            <?php if($show_search_text) { ?>
                <span class="qodef-search-icon-text"><?php esc_html_e('Search', 'mixtapewp'); ?></span>
            <?php } ?>
        </a>
		<?php print $args['after_widget']; ?>
		<?php if($fullscreen_search_overlay) { ?>
			<div class="qodef-fullscreen-search-overlay"></div>
		<?php } ?>
    <?php }
}