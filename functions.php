<?php

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
 *Function to return first $amount characters from string
 */
function pbc_shorten_string($string, $amount) {

	$retval = strlen($string) >= 26 ? substr($string, 0, 25).'...' : $string;
 
	return $retval;
}

/**
 * Function for printing links to translations
 */
 function pbc_print_trans_links($blog_id){

 	global $wpdb;
 	global $wp;

 	//>> identify if book is translation or not and get the source book ID
 	switch_to_blog($blog_id);
 	$trans_lang = get_post_meta(tre_get_info_post(), 'efp_trans_language') ?: 'not_set';
 	$source = get_post_meta(tre_get_info_post(), 'pb_is_based_on', true) ?: 'original';
 	if ($source == 'original'){
 		$origin_id = $blog_id;
 	} else {
 		$origin = str_replace(['http://', 'https://'], '', $source).'/';
		switch_to_blog(1);
		$origin_id = $wpdb->get_results("SELECT `blog_id` FROM $wpdb->blogs WHERE CONCAT(`domain`, `path`) = '$origin'", ARRAY_A)[0]['blog_id'];
	}
	//<<
	//fetching all related translations
 	switch_to_blog(1);
 	$relations = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}trans_rel WHERE `book_id` = '$origin_id'", ARRAY_A);
 	restore_current_blog();
 	//if book is orginal, unset 'id' property, as no need to point itself
 	if($source == 'original'){
 		unset($relations['book_id']);
 	}

 	$current_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
 	$flag = 0;
 	foreach ($relations as $lang => $id) {
 		$separator = $flag ? '|' : '';
 		if ($id == $blog_id || $id == 0){
 			continue;
 		} elseif ($lang == 'book_id'){
 			echo '<li><a href="'.$source.'/'.add_query_arg( array(), $wp->request ).'">'.__('Original Language', 'pressbooks-book').'</a></li>';
 			$flag = 1;
 			continue;
 		}
 		//unknown bug fix
 		restore_current_blog();
 		echo '<li>'.$separator.' <a href="'.str_replace(get_blog_details(get_current_blog_id())->path, get_blog_details($id)->path, $current_link).'">'.$lang.'</a> </li>';
 		$flag = 1;	
 	}
 	if ($source != 'original' && ($trans_lang == 'not_set' || $trans_lang == 'non_tr')){
 		echo '<li><a href="'.$source.'/'.add_query_arg( array(), $wp->request ).'">'.__('Original Book', 'pressbooks-book').'</a></li>';
 	}
 }
