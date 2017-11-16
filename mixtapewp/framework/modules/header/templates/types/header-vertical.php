<?php do_action('mixtape_qodef_before_page_header'); ?>
<aside class="qodef-vertical-menu-area">
    <div class="qodef-vertical-menu-area-inner">
        <div class="qodef-vertical-area-background"></div>
        <div class="qodef-vertical-menu-nav-holder-outer">
            <div class="qodef-vertical-menu-nav-holder">
                <div class="qodef-vertical-menu-holder-nav-inner">
                    <?php mixtape_qodef_get_vertical_main_menu();?>
                </div>
            </div>
        </div>
        <?php if(!$hide_logo) {
            mixtape_qodef_get_logo();
        } ?>
        <div class="qodef-vertical-menu-holder">
            <div class="qodef-vertical-menu-table">
                <div class="qodef-vertical-menu-table-cell">

                    <div class="qodef-vertical-menu-opener">
                        <a href="#"><span class="qodef-line"></span></a>
                    </div>
                    <div class="qodef-vertical-area-widget-holder">
            			<?php if($widget_area) : ?>
            				<?php dynamic_sidebar($widget_area); ?>
            			<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>

<?php do_action('mixtape_qodef_after_page_header'); ?>