<?php

/*** Child Theme Function  ***/

function mixtape_qodef_child_theme_enqueue_scripts() {
	$parent_style = 'mixtape_qodef_default_style';

	wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');

	wp_enqueue_style('mixtape_qodef_child_style',
		get_stylesheet_directory_uri() . '/style.css',
		array($parent_style),
		wp_get_theme()->get('Version')
	);
}

add_action( 'wp_enqueue_scripts', 'mixtape_qodef_child_theme_enqueue_scripts' );