<?php

if ( ! function_exists('mixtape_qodef_like') ) {
	/**
	 * Returns MixtapeQodeLike instance
	 *
	 * @return MixtapeQodeLike
	 */
	function mixtape_qodef_like() {
		return MixtapeQodeLike::get_instance();
	}

}

function mixtape_qodef_get_like() {

	echo wp_kses(mixtape_qodef_like()->add_like(), array(
		'span' => array(
			'class' => true,
			'aria-hidden' => true,
			'style' => true,
			'id' => true
		),
		'i' => array(
			'class' => true,
			'style' => true,
			'id' => true
		),
		'a' => array(
			'href' => true,
			'class' => true,
			'id' => true,
			'title' => true,
			'style' => true
		)
	));
}

if ( ! function_exists('mixtape_qodef_like_latest_posts') ) {
	/**
	 * Add like to latest post
	 *
	 * @return string
	 */
	function mixtape_qodef_like_latest_posts() {
		return mixtape_qodef_like()->add_like();
	}

}