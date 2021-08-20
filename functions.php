<?php
/*
Theme Name:       Books4languages Book child theme
Version:          1.5
License:          GPL v3 or later
GitHub Theme URI: my-language-skills/books4languages-book-child-theme-for-pressbooks




https://bloggyaani.com/speed-up-wordpress-site/
*/

//Disable Self-Pingbacks
// function bloggyaani_disable_self_pingbacks( &$links ) {
// foreach ( $links as $l => $link )
// if ( 0 === strpos( $link, get_option( 'home' ) ) )
// unset($links[$l]);
// }
// add_action( 'pre_ping', 'bloggyaani_disable_self_pingbacks' );


/* https://jamesparsons.com/2020/02/jquery-render-blocking-insights */
// add_filter( 'wp_enqueue_scripts', 'replace_default_jquery_with_fallback');
// function replace_default_jquery_with_fallback() {
//     $ver = '1.12.4';
//     wp_dequeue_script( 'jquery' );
//     wp_deregister_script( 'jquery' );
//     // Set last parameter to 'true' if you want to load it in footer
//     wp_register_script( 'jquery', "//ajax.googleapis.com/ajax/libs/jquery/$ver/jquery.min.js", '', $ver, false );//false
//     wp_add_inline_script( 'jquery', 'window.jQuery||document.write(\'<script src="'.includes_url( '/js/jquery/jquery.js' ).'"><\/script>\')' );
//     wp_enqueue_script ( 'jquery' );
// }


/**
 * Restore shortlink at amdmin page.
 *
 * @since 0.0
 * @link

 */

add_filter( 'get_shortlink', function( $shortlink ) {return $shortlink;} );


/**
 * Function for
 *
 * @since 0.0
 * @link

 */



/* site optimization code: https://github.com/scorpiock/wp-perf-optimization-without-plugin/blob/master/functions.php */

// style
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


// script
function pbc_enqueue_scripts() {

	wp_enqueue_script( 'owl-carousel', get_stylesheet_directory_uri() . '/script.js', array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'pbc_enqueue_scripts' );


// disable stylesheet (glossary-tooltip)
function shapeSpace_disable_scripts_styles() {

 wp_dequeue_style('glossary-tooltip');

}
add_action('wp_enqueue_scripts', 'shapeSpace_disable_scripts_styles', 100);




/**
 * Function for printing URL of Table of contents post (DO NOT TRANSFER OF BREAK)
 *
 * @since 1.4.3
 */
function pbc_get_tablecontents_url(){
	global $wpdb;
	echo get_permalink($postID = $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE post_name = 'table-of-contents'" ));
}
/** End of functionality*/



/**
 * Remove External Google Fonts (DO NOT TRANSFER OF BREAK)
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

include ( locate_template("/partials/content-header-smdre.php"));




/**
 * Include lib folder
 *
 * @since 1.4.8
 * @internal display-posts-shortcode
 * @internal display-posts-transient-cache
 *
 * @since 1.5
 * @internal wp-print-for-pb
 * @internal wampum-popups
 *
 */
 // if (!function_exists('get_content_toc_headers')) {
 //
 // 		// load Social if not already loaded
	// 	require_once dirname( __FILE__ ) . '/lib/hm-content-toc/hm-content-toc.php';
 //
 // 	}

require_once dirname( __FILE__ ) . '/lib/display-posts-shortcode/display-posts-shortcode.php';
require_once dirname( __FILE__ ) . '/lib/display-posts-shortcode/display-posts-transient-cache.php';

// require_once dirname( __FILE__ ) . '/lib/wp-print-for-pb/wp-print-for-pb.php';
// require_once dirname( __FILE__ ) . '/lib/wampum-popups/wampum-popups.php';




/**
 * Include Vendor folder
 *
 * @since 1.5
 * @internal snippets-single
 * @internal snippets-mu
 * @internal snippets-header
 * @internal snippets-footer
 * @internal shortcodes
 * @internal shortcodes-h5p
 *
 */

 require_once dirname( __FILE__ ) . '/vendor/snippets-single.php';
 require_once dirname( __FILE__ ) . '/vendor/snippets-mu.php';
 require_once dirname( __FILE__ ) . '/vendor/snippets-header.php';
 require_once dirname( __FILE__ ) . '/vendor/snippets-footer.php';
 // require_once dirname( __FILE__ ) . '/vendor/shortcodes.php';
 require_once dirname( __FILE__ ) . '/vendor/shortcodes-h5p.php';








 if(!is_user_logged_in()) {
	 /** * Completely Remove jQuery From WordPress */
	 function my_init() {
	 		if (!is_admin()) {
	 				wp_deregister_script('jquery');
	 				wp_register_script('jquery', false);
	 		}
	 }
	 add_action('init', 'my_init');
 }























 /*
 * Change 'post' name to 'Houses'
 */


function dev_change_post_object() {
	   $get_post_type = get_post_type_object('chapter');
     $labels = $get_post_type->labels;



    // $labels->name = 'Topics';
    // $labels->singular_name = 'Topic';
    // $labels->add_new = 'Add Topic';
    // $labels->add_new_item = 'Add Topic';
    $labels->edit_item = 'Edit Chapter (Topic)';
    // $labels->new_item = 'Topic';
    // $labels->view_item = 'View Topic';
    // $labels->search_items = 'Search Topics';
    // $labels->not_found = 'No Topics found';
    // $labels->not_found_in_trash = 'No Topics found in Trash';
    // $labels->all_items = 'All Topics';
    // $labels->menu_name = 'Topics';
    // $labels->name_admin_bar = 'Topics';

    // print_r($labels);
}
add_action( 'init', 'dev_change_post_object' );
