<?php

if(!function_exists('mixtape_qodef_overlapping_content_enabled')) {
    /**
     * Checks if overlapping content is enabled
     *
     * @return bool
     */
    function mixtape_qodef_overlapping_content_enabled() {
        $id = mixtape_qodef_get_page_id();

        return get_post_meta($id, 'qodef_overlapping_content_enable_meta', true) === 'yes';
    }
}

if(!function_exists('mixtape_qodef_overlapping_content_class')) {
    /**
     * Adds overlapping content class to body tag
     * if overlapping content is enabled
     * @param $classes
     *
     * @return array
     */
    function mixtape_qodef_overlapping_content_class($classes) {
        if(mixtape_qodef_overlapping_content_enabled()) {
            $classes[] = 'qodef-overlapping-content-enabled';
        }

        return $classes;
    }

    add_filter('body_class', 'mixtape_qodef_overlapping_content_class');
}

if(!function_exists('mixtape_qodef_overlapping_content_amount')) {
    /**
     * Returns amount of overlapping content
     *
     * @return int
     */
    function mixtape_qodef_overlapping_content_amount() {
        return 75;
    }
}

if(!function_exists('mixtape_qodef_oc_content_top_padding')) {
    function mixtape_qodef_oc_content_top_padding($style) {
	    $id = mixtape_qodef_get_page_id();
		$current_style = '';
	    $class_prefix = mixtape_qodef_get_unique_page_class();

	    $content_selector = array(
		    $class_prefix.' .qodef-content .qodef-content-inner > .qodef-container .qodef-overlapping-content'
	    );

	    $content_class = array();

	    $padding = get_post_meta($id, 'qodef_page_padding_meta', true);

		$content_class['padding'] = mixtape_qodef_filter_px($padding).'px';


		if(!empty ($content_class)) {
			$current_style .= mixtape_qodef_dynamic_css($content_selector, $content_class);
		}

		$current_style = $current_style . $style;

		return $current_style;
    }

	add_filter('mixtape_qodef_add_page_custom_style', 'mixtape_qodef_oc_content_top_padding');
}