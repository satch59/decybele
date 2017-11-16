<div class="qodef-footer-bottom-holder">
    <div class="qodef-footer-bottom-holder-inner">
        <?php if($footer_in_grid) { ?>
            <div class="qodef-container">
                <div class="qodef-container-inner">

        <?php }

        switch ($footer_bottom_columns) {
            case 3:
                mixtape_qodef_get_footer_bottom_sidebar_three_columns();
                break;
            case 2:
                mixtape_qodef_get_footer_bottom_sidebar_two_columns();
                break;
            case 1:
                mixtape_qodef_get_footer_bottom_sidebar_one_column();
                break;
        }
        if($footer_in_grid){ ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>