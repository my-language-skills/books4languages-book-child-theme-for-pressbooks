<?php
/*
Theme Name:       Books4languages Book child theme
Version:          1.5
License:          GPL v3 or later
GitHub Theme URI: my-language-skills/books4languages-book-child-theme-for-pressbooks
*/

/**
 * Function for
 *
 * @since 0.0
 * @link

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

if ( !is_user_logged_in() ) {
	 add_filter( 'style_loader_src', function($href){
	 if(strpos($href, "//fonts.googleapis.com/") === false) {
	 	return $href;
	 }
	 return false;
	 });

}

/** End of functionality*/







/**
 * Include content-header-smdre
 *
 * @since 1.4.6
 * @internal Simple Metadata Relations
 *
 */

// include ( locate_template("/partials/content-header-smdre.php"));





/**
 * Include display-posts-shortcode
 *
 * @since 1.4.8
 * @internal display-posts-shortcode
 *
 */

require_once dirname( __FILE__ ) . '/vendor/display-posts-shortcode/display-posts-shortcode.php';
require_once dirname( __FILE__ ) . '/vendor/display-posts-shortcode/display-posts-transient-cache.php';


/**
 * Include B4L-shortcode
 *
 * @since 1.5
 * @internal b4l-shortcodes
 *
 */

require_once dirname( __FILE__ ) . '/b4l-shortcodes/shortcodes.php';
require_once dirname( __FILE__ ) . '/b4l-shortcodes/h5p.php';
