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

	wp_enqueue_style( 'dropdown-lang.css',get_stylesheet_directory_uri() . '/translations-menu.css' );

}
add_action( 'wp_enqueue_scripts', 'pbc_enqueue_styles' );


function pbc_enqueue_scripts() {

	wp_enqueue_script( 'owl-carousel', get_stylesheet_directory_uri() . '/script.js', array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'pbc_enqueue_scripts' );


/**
 * Function for updating company logo on sign in page
 *
 * SINCE v1.0
 */
 function pbc_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/books4languages-header.png) !important;
		height:65px;
		width:320px;
		background-size: 320px 65px;
		background-repeat: no-repeat;
        	padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'pbc_login_logo' );
/** End of functionality*/
