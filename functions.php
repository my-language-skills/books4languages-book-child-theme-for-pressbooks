<?php
/*
Theme Name:       Books4languages Book child theme
Version:          1.4.5
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

function pbc_enqueue_scripts() {

	wp_enqueue_script( 'owl-carousel', get_stylesheet_directory_uri() . '/script.js', array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'pbc_enqueue_scripts' );


/**
 * Function for updating company logo on sign in page
 *
 * @since v1.0
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
 * Function for printing URL of Table of contents post
 *
 * SINCE v1.4.3
 */
function pbc_get_tablecontents_url(){
	global $wpdb;
	echo get_permalink($postID = $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE post_name = 'table-of-contents'" ));
}
/** End of functionality*/

/**
 * Remove External Google Fonts
 *
 * @since v1.4.4
 * @internal not loonger required
 */
/*
fonts.gstatic.com
fonts.googleapis.com
*/
/*
function remove_google_fonts_stylesheet() {
		wp_dequeue_style('Inconsolata');
		wp_deregister_style('Inconsolata');
}
add_action( 'wp_enqueue_scripts', 'remove_google_fonts_stylesheet', 100 );
*/

if ( is_user_logged_in() ) {
   // your code for logged in user
} else {
   // your code for logged out user
	 add_filter( 'style_loader_src', function($href){
	 if(strpos($href, "//fonts.googleapis.com/") === false) {
	 return $href;
	 }
	 return false;
	 });

}


//include content-header-smdre
include ( locate_template("/partials/content-header-smdre.php"));
/** End of functionality*/
