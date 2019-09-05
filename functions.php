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


/**
 * Function for hooking responsive CSS file
 *
 * SINCE v1.2.1
 */
function wpa_custom_css(){
    wp_enqueue_style(
        'wpa_custom',
        get_stylesheet_directory_uri() . '/responsive.css'
    );
}
add_action( 'wp_enqueue_scripts', 'wpa_custom_css', 999 );
/** End of functionality*/
