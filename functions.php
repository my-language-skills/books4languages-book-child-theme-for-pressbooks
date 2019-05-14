<?php
/* Automatically set the image Title, Alt-Text, Caption & Description upon upload
http://brutalbusiness.com/automatically-set-the-wordpress-image-title-alt-text-other-meta/
for adding the tags and categories: https://wordpress.org/plugins/seo-image/
--------------------------------------------------------------------------------------*/
add_action( 'add_attachment', 'my_set_image_meta_upon_image_upload' );
function my_set_image_meta_upon_image_upload( $post_ID ) {
	// Check if uploaded file is an image, else do nothing
	if ( wp_attachment_is_image( $post_ID ) ) {
		$my_image_title = get_post( $post_ID )->post_title;
		// Sanitize the title:  remove hyphens, underscores & extra spaces:
		$my_image_title = preg_replace( '%\s*[-_\s]+\s*%', ' ',  $my_image_title );
		// Sanitize the title:  letters lower case:
		$my_image_title = strtolower( $my_image_title );
		// Create an array with the image meta (Title, Caption, Description) to be updated
		// Note:  comment out the Excerpt/Caption or Content/Description lines if not needed
		$my_image_meta = array(
			'ID'		=> $post_ID,			// Specify the image (ID) to be updated
			'post_title'	=> $my_image_title,		// Set image Title to sanitized title
		//	'post_excerpt'	=> $my_image_title,		// Set image Caption (Excerpt) to sanitized title
			'post_content'	=> $my_image_title,		// Set image Description (Content) to sanitized title
		);
		// Set the image Alt-Text
		update_post_meta( $post_ID, '_wp_attachment_image_alt', $my_image_title );
		// Set the image meta (e.g. Title, Excerpt, Content)
		wp_update_post( $my_image_meta );
	}
}


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
* @since 4.6
*/
require 'vendor/plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
		'https://github.com/my-language-skills/books4languages-book-child-theme-for-pressbooks/',
		__FILE__,
		'books4languages-book-child-theme-for-pressbooks'
);
