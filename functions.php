<?php
/*
Theme Name:       Books4languages Book child theme
Version:          1.3
License:          GPL v3 or later
GitHub Theme URI: my-language-skills/books4languages-book-child-theme-for-pressbooks
*/


function pbc_enqueue_styles() {

	$parent_style = 'parent-style';

	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style ),
		wp_get_theme()->get('Version')
	);
}
add_action( 'wp_enqueue_scripts', 'pbc_enqueue_styles' );
