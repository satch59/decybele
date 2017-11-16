<?php

if(!function_exists('mixtape_qodef_bandsintown_assets')) {
	/**
	 * Loads all assets for bandsintown plugin
	 */
	function mixtape_qodef_bandsintown_assets() {
		wp_enqueue_style('mixtape_qodef_bandsintown', QODE_ASSETS_ROOT.'/css/bandsintown.min.css');

		if(mixtape_qodef_is_responsive_on()) {
			wp_enqueue_style('mixtape_qodef_bandsintown_responsive', QODE_ASSETS_ROOT.'/css/bandsintown-responsive.min.css');
		}
	}

	add_action('wp_enqueue_scripts', 'mixtape_qodef_bandsintown_assets', 20);
}
