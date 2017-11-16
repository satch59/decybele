<?php

if ( ! function_exists('mixtape_qodef_blockquote_options_map') ) {
	/**
	 * Add Blockquote options to elements page
	 */
	function mixtape_qodef_blockquote_options_map() {

		$panel_blockquote = mixtape_qodef_add_admin_panel(
			array(
				'page' => '_elements_page',
				'name' => 'panel_blockquote',
				'title' => esc_html__('Blockquote','mixtapewp')
			)
		);

	}

	add_action( 'mixtape_qodef_options_elements_map', 'mixtape_qodef_blockquote_options_map');

}