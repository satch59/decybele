<?php

if( !function_exists('mixtape_qodef_search_body_class') ) {
	/**
	 * Function that adds body classes for different search types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function mixtape_qodef_search_body_class($classes) {

		if ( is_active_widget( false, false, 'qodef_search_opener' ) ) {

			$classes[] = 'qodef-' . mixtape_qodef_options()->getOptionValue('search_type');

			if ( mixtape_qodef_options()->getOptionValue('search_type') == 'fullscreen-search' ) {

				$classes[] = 'qodef-search-fade';

			}

		}
		return $classes;

	}

	add_filter('body_class', 'mixtape_qodef_search_body_class');
}

if ( ! function_exists('mixtape_qodef_get_search') ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function mixtape_qodef_get_search() {

		if ( mixtape_qodef_active_widget( false, false, 'qodef_search_opener' ) ) {

			mixtape_qodef_load_search_template();

		}
	}

}

if ( ! function_exists('mixtape_qodef_set_search_position_in_menu') ) {
	/**
	 * Finds part of header where search template will be loaded
	 */
	function mixtape_qodef_set_search_position_in_menu( $type ) {

		add_action( 'mixtape_qodef_after_header_menu_area_html_open', 'mixtape_qodef_load_search_template');

	}
}

if ( ! function_exists('mixtape_qodef_set_search_position_mobile') ) {
	/**
	 * Hooks search template to mobile header
	 */
	function mixtape_qodef_set_search_position_mobile() {

		add_action( 'mixtape_qodef_after_mobile_header_html_open', 'mixtape_qodef_load_search_template');

	}

}

if ( ! function_exists('mixtape_qodef_load_search_template') ) {
	/**
	 * Loads HTML template with parameters
	 */
	function mixtape_qodef_load_search_template() {
		global $mixtape_qodef_IconCollections;

		$search_type = mixtape_qodef_options()->getOptionValue('search_type');

		$search_icon = '';
		$search_icon_close = '';
		if ( mixtape_qodef_options()->getOptionValue('search_icon_pack') !== '' ) {
			$search_icon = $mixtape_qodef_IconCollections->getSearchIcon( mixtape_qodef_options()->getOptionValue('search_icon_pack'), true );
			$search_icon_close = $mixtape_qodef_IconCollections->getSearchClose( 'font_elegant', true );
		}

		$parameters = array(
			'search_in_grid'		=> mixtape_qodef_options()->getOptionValue('search_in_grid') == 'yes' ? true : false,
			'search_icon'			=> $search_icon,
			'search_icon_close'		=> $search_icon_close
		);

		mixtape_qodef_get_module_template_part( 'templates/types/'.$search_type, 'search', '', $parameters );

	}

}