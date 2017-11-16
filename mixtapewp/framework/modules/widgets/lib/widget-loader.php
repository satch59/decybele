<?php

if (!function_exists('mixtape_qodef_register_widgets')) {

	function mixtape_qodef_register_widgets() {

		$widgets = array(
			'MixtapeQodeLatestPosts',
			'MixtapeQodeSearchOpener',
			'MixtapeQodeSideAreaOpener',
			'MixtapeQodeStickySidebar',
			'MixtapeQodeSocialIconWidget',
			'MixtapeQodeSeparatorWidget'
		);

		foreach ($widgets as $widget) {
			register_widget($widget);
		}
	}
}

add_action('widgets_init', 'mixtape_qodef_register_widgets');