<?php

if(!function_exists('mixtape_qodef_overlapping_content_opening_tag')) {
    /**
     * Prints opening HTML tags for overlapping content
     * Hooks to mixtape_qodef_after_container_open
     */
    function mixtape_qodef_overlapping_content_opening_tag() {
        if(mixtape_qodef_overlapping_content_enabled()) : ?>
            <div class="qodef-overlapping-content-holder">
            <div class="qodef-overlapping-content">
            <div class="qodef-overlapping-content-inner">
    <?php endif;
    }

    add_action('mixtape_qodef_after_container_open', 'mixtape_qodef_overlapping_content_opening_tag');
}

if(!function_exists('mixtape_qodef_overlapping_content_closing_tag')) {
    /**
     * Prints closing HTML tags for overlapping content
     * Hooks to mixtape_qodef_before_container_close
     */
    function mixtape_qodef_overlapping_content_closing_tag() {
        if(mixtape_qodef_overlapping_content_enabled()) : ?>
            </div> <!-- close .qodef-overlapping-content-inner -->
            </div> <!-- close .qodef-overlapping-content -->
            </div> <!-- close .qodef-overlapping-content-holder -->
    <?php endif;
    }

    add_action('mixtape_qodef_before_container_close', 'mixtape_qodef_overlapping_content_closing_tag');
}