<?php

if ( ! function_exists('mixtape_qodef_events_options_map') ) {

	function mixtape_qodef_events_options_map() {

		mixtape_qodef_add_admin_page(array(
			'slug'  => '_events',
			'title' => esc_html__('Events', 'mixtapewp'),
			'icon'  => 'fa fa-calendar'
		));

		$panel = mixtape_qodef_add_admin_panel(array(
			'title' => esc_html__('Event', 'mixtapewp'),
			'name'  => 'panel_event',
			'page'  => '_events'
		));

		mixtape_qodef_add_admin_field(array(
			'name'          => 'event_comments',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Comments', 'mixtapewp'),
			'description'   => esc_html__('Enabling this option will show comments on your page.', 'mixtapewp'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		mixtape_qodef_add_admin_field(array(
			'name'          => 'event_pagination',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Pagination', 'mixtapewp'),
			'description'   => esc_html__('Enabling this option will turn on events pagination functionality.', 'mixtapewp'),
			'parent'        => $panel,
			'default_value' => 'no',
		));

		mixtape_qodef_add_admin_field(array(
			'name'        => 'event_single_slug',
			'type'        => 'text',
			'label'       => esc_html__('Event Single Slug','mixtapewp'),
			'description' => esc_html__('Enter if you wish to use a different Single Project slug (Note: After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect)','mixtapewp'),
			'parent'      => $panel,
			'args'        => array(
				'col_width' => 3
			)
		));

	}

	add_action( 'mixtape_qodef_options_map', 'mixtape_qodef_events_options_map', 13);

}