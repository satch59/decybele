<?php

class MixtapeQodeFullScreenMenuOpener extends MixtapeQodeWidget {
    public function __construct() {
        parent::__construct(
            'qodef_full_screen_menu_opener', // Base ID
            esc_html__('Select Full Screen Menu Opener','mixtapewp') // Name
        );

		$this->setParams();
    }

	protected function setParams() {

		$this->params = array(
			array(
				'name'			=> 'fullscreen_menu_opener_icon_color',
				'type'			=> 'textfield',
				'title'			=> esc_html__('Icon Color','mixtapewp'),
				'description'	=> esc_html__('Define color for Side Area opener icon','mixtapewp')
			)
		);

	}

    public function widget($args, $instance) {

		$fullscreen_icon_styles = array();

		if ( !empty($instance['fullscreen_menu_opener_icon_color']) ) {
			$fullscreen_icon_styles[] = 'background-color: ' . $instance['fullscreen_menu_opener_icon_color'];
		}


		$icon_size = '';
		if (mixtape_qodef_options()->getOptionValue('fullscreen_menu_icon_size') !== '' ) {
			$icon_size = mixtape_qodef_options()->getOptionValue('fullscreen_menu_icon_size');
		}
		?>
		<?php print $args['before_widget']; ?>
        <a href="javascript:void(0)" class="qodef-fullscreen-menu-opener <?php echo esc_attr( $icon_size )?>">
<!--            <span class="popup_menu_inner">-->
            <span class="qodef-fullscreen-menu-opener-inner">
                <i class="qodef-line" <?php mixtape_qodef_inline_style($fullscreen_icon_styles); ?>>&nbsp;</i>
            </span>
        </a>
		<?php print $args['after_widget']; ?>
    <?php }

}