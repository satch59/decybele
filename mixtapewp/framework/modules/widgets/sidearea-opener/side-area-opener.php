<?php

class MixtapeQodeSideAreaOpener extends MixtapeQodeWidget {
    public function __construct() {
        parent::__construct(
            'qodef_side_area_opener', // Base ID
            esc_html__('Select Side Area Opener','mixtapewp') // Name
        );

        $this->setParams();
    }

    protected function setParams() {

		$this->params = array(
			array(
				'name'			=> 'side_area_opener_icon_color',
				'type'			=> 'textfield',
				'title'			=> esc_html__('Icon Color','mixtapewp'),
				'description'	=> esc_html__('Define color for Side Area opener icon','mixtapewp')
			),
			array(
                'type' 			=> 'textfield',
                'title' 		=> esc_html__('Margin','mixtapewp'),
                'name' 			=> 'margin',
                'description' 	=> esc_html__('Margin (top right bottom left)','mixtapewp')
            )
		);

    }


    public function widget($args, $instance) {
		
		$sidearea_icon_styles = array();

		if ( !empty($instance['side_area_opener_icon_color']) ) {
			$sidearea_icon_styles[] = 'color: ' . $instance['side_area_opener_icon_color'];
		}

		if (!empty($instance['margin'])) {
            $sidearea_icon_styles[] = 'margin: '.$instance['margin'];
        }
		
		$icon_size = '';
		if ( mixtape_qodef_options()->getOptionValue('side_area_predefined_icon_size') ) {
			$icon_size = mixtape_qodef_options()->getOptionValue('side_area_predefined_icon_size');
		}
		?>
		<?php print $args['before_widget']; ?>
        <a class="qodef-side-menu-button-opener <?php echo esc_attr( $icon_size ); ?>" <?php mixtape_qodef_inline_style($sidearea_icon_styles) ?> href="javascript:void(0)">
            <?php echo mixtape_qodef_get_side_menu_icon_html(); ?>
        </a>
		<?php print $args['after_widget']; ?>
    <?php }

}