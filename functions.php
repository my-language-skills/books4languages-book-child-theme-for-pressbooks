<?php
/*
Theme Name:       Books4languages Book child theme
Version:          1.4.6
License:          GPL v3 or later
GitHub Theme URI: my-language-skills/books4languages-book-child-theme-for-pressbooks
*/

/* site optimization code: https://github.com/scorpiock/wp-perf-optimization-without-plugin/blob/master/functions.php */


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
 * @since 1.0
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
 * @since 1.4.3
 */
function pbc_get_tablecontents_url(){
	global $wpdb;
	echo get_permalink($postID = $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE post_name = 'table-of-contents'" ));
}
/** End of functionality*/

/**
 * Remove External Google Fonts
 *
 * @since 1.4.4
 * @internal fonts.gstatic.com / fonts.googleapis.com
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

/** End of functionality*/

/**
 * Remove dashicons in frontend for unauthenticated users
 *
 * @since 1.4.6
 *
 */

 add_action( 'wp_enqueue_scripts', 'bs_dequeue_dashicons' );
 function bs_dequeue_dashicons() {
		 if ( ! is_user_logged_in() ) {
				 wp_deregister_style( 'dashicons' );
		 }
 }

 // Deregister los dashicons si no se muestra la barra de admin
 // add_action( 'wp_print_styles', function() {
 //     if (!is_admin_bar_showing()) wp_deregister_style( 'dashicons' );
 // }, 100);

/** End of functionality*/


/**
 * Include content-header-smdre
 *
 * @since 1.4.6
 * @internal Simple Metadata Relations
 *
 */
//
include ( locate_template("/partials/content-header-smdre.php"));

/** End of functionality*/
