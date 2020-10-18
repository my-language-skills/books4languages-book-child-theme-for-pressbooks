<section data-type="<?php echo $datatype; ?>" <?php post_class( pb_get_section_type( $post ) ); ?>>
<header>


<?php
/**
 *
 * ADDED: the_content area ads (top)
 *
 * @since 1.x
 *
 */

 get_template_part( 'partials/content-single','ads-top' );


/** End of added code  */

/**
 *
 * ADDED: featured image code
 *
 * @since 1.x
 *
 */

get_template_part( 'partials/content-single','featureimage');

/** End of added code  */

?>
<h1 class="entry-title">
<?php
if ( $number ) {
	echo "<span>$number</span> ";
}
if ( get_post_meta( $post->ID, 'pb_show_title', true ) || $post->post_type === 'part' ) {
	// @ADDED: Titles are link to pages in desktop

 	if ( wp_is_mobile() ) :
 	    /* Display and echo mobile specific stuff here */
 			the_title();
 	else :
 	    /* Display and echo desktop stuff here */

 			if(function_exists('wp_print') && is_page('print')) : // If wp_print is acivated, titles are links.
 					/* Display and echo mobile specific stuff here */
			?><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
 			<?php
 			else :
 					/* Display and echo desktop stuff here */
 				 the_title();
 			endif; ?>
 	<?php
 	endif;
	/** End of added code  */
}	?>
</h1>
<?php if ( $subtitle ) { ?>
<p data-type="subtitle"><?php echo $subtitle; ?></p> <!-- Add reading time from EFP --><?php // echo reading_time(); ?>
<?php } ?>
<?php if ( $authors ) { ?>
<p data-type="author"><?php echo $authors; ?></p>
<?php }

/**
 *
 * ADDED: Download and print button
 * Available just in desktop
 *
 * @since 1.x
 *
 */

if(function_exists('wp_print') && !wp_is_mobile() && is_singular('chapter')) {
?>
	<a class="epub" onclick="gtag('event', 'content_click', {'event_category': 'resources', 'event_label': 'ebook'});" href="https://books4languages.com/ebooks/" target="_blank" rel="noopener noreferrer" title="<?php _e( 'Download eBook', 'pressbooks-book' ); ?>">
		<img id="epub_icon" class="epub_icon" src="/wp-content/themes/books4languages-book-child-theme-for-pressbooks/assets/images/epub-bn-24.png" alt="Download">
		<span class="screen-reader-text"><?php _e( 'Download eBook', 'pressbooks-book' ); ?></span>
	 </a>
	<a onclick="gtag('event', 'imag_click', {'event_category': 'resources', 'event_label': 'ebook'});" href="https://books4languages.com/ebooks/" target="_blank" rel="noopener noreferrer" title="Download ebook">Download ebook</a>
<?php
print_link();
	 }

 /** End of added code  */


 /**
  *
  * ADDED: socialsnap
  * if ( $key_pb_subtitle !=  'Revision' )
  *
  * @since 1.x
  *
  */

if ( function_exists('socialsnap_generate_share_request_url') && is_user_logged_in() ) {
	echo do_shortcode('[ss_social_share align="left" shape="rounded" size="small"labels="label" spacing="1" hide_on_mobile="0" total="0" all_networks="0"]'); }
	/** End of added code  */

?> </header> <?php

if ( get_post_type( $post->ID ) !== 'part' ) {
	if ( pb_should_parse_subsections() ) {
		$content = pb_tag_subsections( apply_filters( 'the_content', get_the_content() ), $post->ID );
		echo $content;
	}
	else
	{
		$content = apply_filters( 'the_content', get_the_content() );
		echo $content;
	}

/**
 *
 * ADDED: youtube
 * @link https://stackoverflow.com/questions/5322344/to-delay-javascript-function-call-using-jquery
 *
 * @since 1.x
 *
 */

$get_video_url = get_post_meta(get_the_ID(), 'smdre_resources_videos', true);

if ( is_user_logged_in() && !empty( $get_video_url ) && is_singular('chapter') ) {
global $wp_embed;
echo "<p align=center>" . $wp_embed->run_shortcode('[embed]' . $get_video_url . '[/embed]') . "</p>";
}

/** End of added code  */

/**
 *
 * ADDED: Exercises h5p
 *
 * @since 1.x
 *
 */

if (strpos(get_blogaddress_by_domain($domain, $path),"english") !== false) {
	echo do_shortcode( '[h5pexercises_english]' );
	}
elseif (strpos(get_blogaddress_by_domain($domain, $path),"greek") !== false) {
echo do_shortcode( '[h5pexercises_greek]' );
	}
else {
	if ( is_singular('chapter')) {
  echo do_shortcode( '[h5pexercises_contribute]' );

	}
}
/** End of added code  */

/**
 *
 * ADDED: feedbacklink
 *
 * @since 1.x
 *
 */
echo do_shortcode( '[feedbackimage]' );

/** End of added code  */

/**
 *
 * ADDED: info menu
 *
 * @since 1.x
 *
 */
 echo do_shortcode( '[infomenu]' );

 /** End of added code  */

 /**
  *
  * ADDED: the_content area ads (bottom)
  *
  * @since 1.x
  *
  */

  get_template_part( 'partials/content-single','ads-bottom' );


 /** End of added code  */


	global $multipage;
	if ( $multipage ) {
		?>
		<div class="nav-reading--page">
			<?php
			global $page, $numpages;
			if ( $page > 1 ) {
				?>
					<div class="nav-reading--page__previous">
						<?php echo _wp_link_page( $page - 1 ); ?><svg class="icon--svg">
				<use href="#arrow-left" />
			</svg>
				<?php
						echo __( 'Previous Page', 'pressbooks-book' ) . '</a>'
				?>
					</div>
					<?php
			}

			if ( $page < $numpages ) {
				?>
					<div class="nav-reading--page__next">
						<?php echo _wp_link_page( $page + 1 ); ?>
									<?php
									echo __( 'Next Page', 'pressbooks-book' ) . '<svg class="icon--svg">
						<use href="#arrow-right" />
					</svg></a>'
									?>
					</div>
					<?php
			}
			?>
		</div>
		<?php
	}
} else {
	echo apply_filters( 'the_content', $post->post_content );
}
?>
</section>

<?php edit_post_link( __( 'Edit', 'pressbooks-book' ), '<div class="edit-link">', '</div>', $post->ID, 'call-to-action' ); ?>


<!-- @ADDED: just in desktop -->
<?php if ( wp_is_mobile() ) :
				/* Display and echo mobile specific stuff here */

	else :
				/* Display and echo desktop stuff here */

	endif; ?>
<!-- End of added code -->
