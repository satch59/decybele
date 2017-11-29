<?php

add_action('after_setup_theme', 'mixtape_qodef_meta_boxes_map_init', 1);
function mixtape_qodef_meta_boxes_map_init() {
    /**
    * Loades all meta-boxes by going through all folders that are placed directly in meta-boxes folder
    * and loads map.php file in each.
    *
    * @see http://php.net/manual/en/function.glob.php
    */

    do_action('mixtape_qodef_before_meta_boxes_map');

	global $mixtape_qodef_options;
	global $mixtape_qodef_Framework;
	global $mixtape_qodef_options_fontstyle;
	global $mixtape_qodef_options_fontweight;
	global $mixtape_qodef_options_texttransform;
	global $mixtape_qodef_options_fontdecoration;
	global $mixtape_qodef_options_arrows_type;

    foreach(glob(QODE_FRAMEWORK_ROOT_DIR.'/admin/meta-boxes/*/map.php') as $meta_box_load) {
        include_once $meta_box_load;
    }

	do_action('mixtape_qodef_meta_boxes_map');

	do_action('mixtape_qodef_after_meta_boxes_map');
}