<?php

/**
 * Function for enqueuing styles of child theme without overwriting styles of parent
 */
function pbc_enqueue_styles() {

	$parent_style = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style ),
		wp_get_theme()->get('Version')
	);
}
add_action( 'wp_enqueue_scripts', 'pbc_enqueue_styles' );

/**
 * Function for modfiing the media screen style of the parents
 */
function wpa_custom_css(){
    wp_enqueue_style(
        'wpa_custom',
        get_stylesheet_directory_uri() . '/responsive.css'
    );
}
add_action( 'wp_enqueue_scripts', 'wpa_custom_css', 999 );

/**
 * Function for creation of side navigation elements between chapters using their titles
 */
function get_navi_links_cus ($echo = true){
	global $first_chapter, $prev_chapter, $next_chapter, $multipage;
	$first_chapter          = pb_get_first();
	$prev_chapter           = pb_get_prev();
	$prev_chapter_id        = pb_get_prev_post_id();
	$prev_chapter_post_type = \Pressbooks\PostType\get_post_type_label( get_post_type( $prev_chapter_id ) );
	$prev_chapter_title		= get_the_title($prev_chapter_id);
	$next_chapter           = pb_get_next();
	$next_chapter_id        = pb_get_next_post_id();
	$next_chapter_post_type = \Pressbooks\PostType\get_post_type_label( get_post_type( $next_chapter_id ) );
	$next_chapter_title		= get_the_title($next_chapter_id);
	if ( $echo ) :
		?>
		<nav class="nav-reading <?php echo $multipage ? 'nav-reading--multipage' : '' ?>" role="navigation">
		<div class="nav-reading__previous js-nav-previous">
			<?php if ( $prev_chapter !== '/' ) { ?>
				<?php /* translators: %1$s: post title, %2$s: post type name */ ?>
				<a href="<?php echo $prev_chapter; ?>" title="<?php printf( __( 'Previous: %1$s (%2$s)', 'pressbooks-book' ), get_the_title( $prev_chapter_id ), $prev_chapter_post_type ); ?>">
					<svg class="icon--svg"><use xlink:href="#arrow-left" /></svg>
					<?php /* translators: %s: post type name */ ?>
					<?php printf( __( 'Previous <br>(%s)', 'pressbooks-book' ), pbc_shorten_string($prev_chapter_title, 25) ); ?>
				</a>
			<?php } ?>
		</div>
		<div class="nav-reading__next js-nav-next">
			<?php if ( $next_chapter !== '/' ) : ?>
				<?php /* translators: %1$s: post title, %2$s: post type name */ ?>
				<a href="<?php echo $next_chapter ?>" title="<?php printf( __( 'Next: %1$s (%2$s)', 'pressbooks-book' ), get_the_title( $next_chapter_id ), $next_chapter_post_type ); ?>">
					<?php /* translators: %s: post type name */ ?>
					<?php printf( __( 'Next <br>(%s)', 'pressbooks-book' ), pbc_shorten_string($next_chapter_title, 25) ); ?>
					<svg class="icon--svg"><use xlink:href="#arrow-right" /></svg>
				</a>
			<?php endif; ?>
		</div>
		<button class="nav-reading__up" >
			<svg class="icon--svg"><use xlink:href="#arrow-up" /></svg>
			<span class="screen-reader-text"><?php _e( 'Back to top', 'pressbooks' ); ?></span>
		</button>
		</nav>
		<?php
	endif;
}

/**
 *Function to return first $amount characters from string in multibyte encoding
 */
function pbc_shorten_string($string, $amount) {

	$retval = strlen($string) > $amount ? mb_substr($string, 0, $amount-1).'...' : $string;

	return $retval;
}


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


/*
* Auto update from github
*
* @since 1.2
*/
require 'vendor/plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
		'https://github.com/my-language-skills/books4languages-book-child-theme-for-pressbooks/',
		__FILE__,
		'books4languages-book-child-theme-for-pressbooks'
);
