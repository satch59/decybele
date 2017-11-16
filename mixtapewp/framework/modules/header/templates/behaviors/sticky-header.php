<?php do_action('mixtape_qodef_before_sticky_header'); ?>

<div class="qodef-sticky-header">
    <?php do_action( 'mixtape_qodef_after_sticky_menu_html_open' ); ?>
    <div class="qodef-sticky-holder">
    <?php if($sticky_header_in_grid) : ?>
        <div class="qodef-grid">
            <?php endif; ?>
            <div class=" qodef-vertical-align-containers">
                <div class="qodef-position-left">
                    <div class="qodef-position-left-inner">
                        <?php if(!$hide_logo) {
                            mixtape_qodef_get_logo('sticky');
                        } ?>
                    </div>
                </div>
                <div class="qodef-position-right">
                    <div class="qodef-position-right-inner">
						<?php mixtape_qodef_get_sticky_menu('qodef-sticky-nav'); ?>
						<?php if($widget_area) : ?>
							<?php dynamic_sidebar($widget_area); ?>
						<?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if($sticky_header_in_grid) : ?>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php do_action('mixtape_qodef_after_sticky_header'); ?>