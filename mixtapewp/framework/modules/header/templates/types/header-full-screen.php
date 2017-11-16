<?php do_action('mixtape_qodef_before_page_header'); ?>

<header class="qodef-page-header">
	<?php if($show_fixed_wrapper) : ?>
		<div class="qodef-fixed-wrapper">
	<?php endif; ?>
	<div class="qodef-menu-area">
        <?php if($menu_area_in_grid) : ?>
            <div class="qodef-grid">
        <?php endif; ?>
			<?php do_action( 'qodef_themename_after_header_menu_area_html_open' )?>
            <div class="qodef-vertical-align-containers">
                <div class="qodef-position-left">
                    <div class="qodef-position-left-inner">
                        <?php if(!$hide_logo) {
							mixtape_qodef_get_logo();
                        } ?>
                    </div>
                </div>
                <div class="qodef-position-right">
                    <div class="qodef-position-right-inner">
						<?php if($widget_area) : ?>
							<?php dynamic_sidebar($widget_area); ?>
						<?php endif; ?>
                        <?php mixtape_qodef_get_full_screen_opener(); ?>
                    </div>
                </div>
            </div>
        <?php if($menu_area_in_grid) : ?>
        </div>
        <?php endif; ?>
    </div>
	<?php if($show_fixed_wrapper) : ?>
		</div>
	<?php endif; ?>
	<?php if($show_sticky) {
		mixtape_qodef_get_sticky_header('full-screen');
	} ?>
</header>

<?php do_action('mixtape_qodef_after_page_header'); ?>

