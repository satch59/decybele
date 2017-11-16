<?php
	if(!function_exists('mixtape_qodef_layerslider_overrides')) {
		/**
		 * Disables Layer Slider auto update box
		 */
		function mixtape_qodef_layerslider_overrides() {
			$GLOBALS['lsAutoUpdateBox'] = false;
		}

		add_action('layerslider_ready', 'mixtape_qodef_layerslider_overrides');
	}
?>