<section data-type="<?php echo $datatype; ?>" <?php post_class( pb_get_section_type( $post ) ); ?>>
<header>

<!--
-				ADDED: featured image code
-
-				@SINCE v1.2.2  MODIFIED v1.3  MODIFIED v1.4.1 MODIFIED 1.4.2
-->
<?php
if (is_plugin_active('featured-image-for-pressbooks/featured-image-for-pressbooks.php')){
	if(!(wp_is_mobile() && fifp_is_featured_image_disabled())){
		// condition to check if displaying featured images is not disabled for mobile devices
			?>
				<div class="featured_image" >
					<?php
						if ( has_post_thumbnail() || fifp_has_ext_thumbnail()) { // check if some thumbnail exists for this post
								$fi_info = fifp_get_fi_info();
								if ( "print_local_fi" == $fi_info) {		// if site is source or thumbnail saved locally print from local
									$option = get_option("pressbooks_theme_options_web");
									if ($option['webbook_width'] == '30em'){
										the_post_thumbnail('featured-narrow');
									}
									if ($option['webbook_width'] == '40em'){
										the_post_thumbnail('featured-standard');
									}
									if ($option['webbook_width'] == '48em'){
										the_post_thumbnail('featured-wide');
									}
								} else {					// else print from external source (from source book)
									$source_fi_id = $fi_info;
									switch_to_blog(get_option( '_ext_source_id'));	// switch to source blog and get featured_image from there
										$option = get_option("pressbooks_theme_options_web");
										if ($option['webbook_width'] == '30em'){
											echo wp_get_attachment_image($source_fi_id, 'featured-narrow' );
										}
										if ($option['webbook_width'] == '40em'){
											echo wp_get_attachment_image($source_fi_id, 'featured-standard' );
										}
										if ($option['webbook_width'] == '48em'){
											echo wp_get_attachment_image($source_fi_id, 'featured-wide' );
										}
									restore_current_blog();
								}
						}
						?>
				</div>
			<?php
	 } } ?>
<!-- End of added code -->
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
	 	endif; ?>
<!-- End of added code -->
	 <?php }	?>
	</h1>
	<?php if ( $subtitle ) { ?>
	<p data-type="subtitle"><?php echo $subtitle; ?>  <?php echo reading_time(); ?>   </p> <!-- Add reading time from EFP -->
	<?php } ?>
	<?php if ( $authors ) { ?>
	<p data-type="author"><?php echo $authors; ?></p>
	<?php } ?>
<!-- Download button -->
	<a class="epub" href="https://books4languages.com/ebooks/" target="_blank" rel="noopener noreferrer" title="<?php _e( 'Download eBook', 'pressbooks-book' ); ?>">
		<img id="epub_icon" class="epub_icon" src="/wp-content/themes/books4languages-book-child-theme-for-pressbooks/assets/images/epub-bn-24.png" alt="Download">
		<span class="screen-reader-text"><?php _e( 'Download eBook', 'pressbooks-book' ); ?></span>
	 </a>
	<a href="https://books4languages.com/ebooks/" target="_blank" rel="noopener noreferrer" title="Download ebook">Download ebook</a>
<!-- END -->

<!-- @ADDED: Print pages is available jus in desktop -->
<?php

if(function_exists('wp_print') && ! wp_is_mobile()) { print_link(); }

?>
<!-- END -->

<!-- if ( $key_pb_subtitle !=  'Revision' ) -->
<!-- @ADDED: socialsnap -->
<?php
if ( function_exists('socialsnap_generate_share_request_url') && is_user_logged_in() ) {
	echo do_shortcode('[ss_social_share align="left" shape="rounded" size="small"labels="label" spacing="1" hide_on_mobile="0" total="0" all_networks="0"]'); } ?>
<!-- END -->

</header>
<?php
if ( get_post_type( $post->ID ) !== 'part' ) {
	if ( pb_should_parse_subsections() ) {
		$content = pb_tag_subsections( apply_filters( 'the_content', get_the_content() ), $post->ID );
		echo $content;
	} else {
		$content = apply_filters( 'the_content', get_the_content() );
		echo $content;
	}
?>

<!-- @ADDED: youtube -->
<?php
// https://stackoverflow.com/questions/5322344/to-delay-javascript-function-call-using-jquery
$get_video_url = get_post_meta(get_the_ID(), 'smdre_resources_videos', true);

if ( is_user_logged_in() && ! empty( $get_video_url ) && is_singular('chapter') ) {
global $wp_embed;
echo "<p align=center>" . $wp_embed->run_shortcode('[embed]' . $get_video_url . '[/embed]') . "</p>";
}
?>
<!-- END -->


<?php

$key_h5p_id_field = get_post_meta( get_the_ID(), 'efp_h5p_id_field', true );

// if (strpos(is_single(),"english") !== false) {
// 					 $country = "english";
// 			 } elseif (strpos(is_single(),"greek") !== false) {
// 					 $country = "greek";
// 			 } elseif (strpos(is_single(),"spanish") !== false) {
// 					 $country = "spanish";
// 			 } else {
// 					 $country = $defaultcat;
// 			 }
if (strpos(get_blogaddress_by_domain($domain, $path),"english") !== false) {
 // Check if the custom field has a value.
 if ( ! empty($key_h5p_id_field) && isset($_POST['button1']) ) {
 	?>
 	<div class="textbox textbox--exercise"><header class="textbox__header">
 	<h2 class="textbox__title">Exercises</h2>
 	</header>
 	<div class="textbox__content"><p>External link to <a target="_blank" rel="noopener noreferrer" href="https://worksheet.books4languages.com/english/wp-admin/admin-ajax.php?action=h5p_embed&id=<?php echo $key_h5p_id_field?>"><?php _e( 'exercise ' . $key_h5p_id_field, 'pressbooks-book' ); ?></a></p>
 	<br>
 	<iframe src="https://worksheet.books4languages.com/english/wp-admin/admin-ajax.php?action=h5p_embed&id=<?php echo $key_h5p_id_field?>" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
 	<script src="https://worksheet.books4languages.com/content/wp-content/plugins/h5p/h5p-php-library/js/h5p-resizer.js" charset="UTF-8"></script>
 	</div>
 	</div>
 	<?php
 	}

 if ( is_user_logged_in() && ! empty($key_h5p_id_field)  ) {
 	?>
 	<div class="textbox textbox--exercise"><header class="textbox__header">
 	<h2 class="textbox__title">Exercises</h2>
 	</header>
 	<div class="textbox__content">
 	<br>
 	<iframe src="https://worksheet.books4languages.com/english/wp-admin/admin-ajax.php?action=h5p_embed&id=<?php echo $key_h5p_id_field?>" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
 	<script src="https://worksheet.books4languages.com/content/wp-content/plugins/h5p/h5p-php-library/js/h5p-resizer.js" charset="UTF-8"></script>
	<br>
	<p>External link to <a target="_blank" rel="noopener noreferrer" href="https://worksheet.books4languages.com/english/wp-admin/admin-ajax.php?action=h5p_embed&id=<?php echo $key_h5p_id_field?>"><?php _e( 'Exercise ' . $key_h5p_id_field, 'pressbooks-book' ); ?></a></p>
 	</div>
 	</div>
 	<?php
 	}

}
if (strpos(get_blogaddress_by_domain($domain, $path),"greek") !== false) {
 // Check if the custom field has a value.
 if ( ! empty($key_h5p_id_field) && isset($_POST['button1']) ) {
 	?>
 	<div class="textbox textbox--exercise"><header class="textbox__header">
 	<h2 class="textbox__title">Exercises</h2>
 	</header>
 	<div class="textbox__content"><p>External link to <a target="_blank" rel="noopener noreferrer" href="https://worksheet.books4languages.com/greek/wp-admin/admin-ajax.php?action=h5p_embed&id=<?php echo $key_h5p_id_field?>"><?php _e( 'exercise ' . $key_h5p_id_field, 'pressbooks-book' ); ?></a></p>
 	<br>
 	<iframe src="https://worksheet.books4languages.com/greek/wp-admin/admin-ajax.php?action=h5p_embed&id=<?php echo $key_h5p_id_field?>" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
 	<script src="https://worksheet.books4languages.com/content/wp-content/plugins/h5p/h5p-php-library/js/h5p-resizer.js" charset="UTF-8"></script>
 	</div>
 	</div>
 	<?php
 	}

 if ( is_user_logged_in() && ! empty($key_h5p_id_field)  ) {
 	?>
 	<div class="textbox textbox--exercise"><header class="textbox__header">
 	<h2 class="textbox__title">Exercises</h2>
 	</header>
 	<div class="textbox__content">
 	<br>
 	<iframe src="https://worksheet.books4languages.com/greek/wp-admin/admin-ajax.php?action=h5p_embed&id=<?php echo $key_h5p_id_field?>" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
 	<script src="https://worksheet.books4languages.com/content/wp-content/plugins/h5p/h5p-php-library/js/h5p-resizer.js" charset="UTF-8"></script>
	<br>
	<p>External link to <a target="_blank" rel="noopener noreferrer" href="https://worksheet.books4languages.com/greek/wp-admin/admin-ajax.php?action=h5p_embed&id=<?php echo $key_h5p_id_field?>"><?php _e( 'exercise ' . $key_h5p_id_field, 'pressbooks-book' ); ?></a></p>
 	</div>
 	</div>
 	<?php
 	}
}
?>
 <!-- <form action="#textbox--exercise" method="post"> -->
 <!-- if ( strpos( get_the_content(), '13801580' ) !== false) { -->
 <?php if ( ! is_user_logged_in() && is_singular('chapter') && ! empty($key_h5p_id_field)  ) { ?>

 <!-- strpos( get_the_content(), 'textbox--exercise' ) !== false )  -->
<!-- https://www.labschool.es/crear-eventos-google-analytics -->
 <form method="post" onsubmit="ga('send', 'event', 'exercises', 'show', 'all', 0);">
	 <input class="summaryblock1" type="submit" name="button1" aria-labelledby="buttonText1" value="Show exercises"/>
	 <input class="summaryblock2" type="submit" name="button2" aria-labelledby="buttonText2" value="Hide exercises"/>
</form>
	 <?php } ?>

<!-- END -->

<!-- ADDED: Feedback Image -->
<!-- width="96" height="96" -->
<?php if ( is_singular('chapter')) { ?>
<a href="https://books4languages.com/feedback/" aria-label="Feedback.">
<img class="feedbackimage" target="_blank" rel="noopener noreferrer" class="b4l-feedback-image center-feedback size-full alignleft" src="https://i.imgur.com/cqbVrNV.png" alt="Books4Languages feedback"  /></a>
<?php } ?>


<!-- @ADDED: h5p just in desktop -->
<!-- if( ! is_user_logged_in()  ) { -->
	<div class="info">
<?php
	if(isset($_POST['button3']) && ! wp_is_mobile()) {
	?>	<!-- @ADDED: integration with h5p -->
	<iframe src="https://worksheet.books4languages.com/content/wp-admin/admin-ajax.php?action=h5p_embed&id=2" width="927" height="1" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
	<script src="https://worksheet.books4languages.com/content/wp-content/plugins/h5p/h5p-php-library/js/h5p-resizer.js" charset="UTF-8"></script>
	<?php }?>
	<?php if ( is_singular('chapter')) { ?>

	<form method="post" onsubmit="ga('send', 'event', 'info', 'show', 'all', 0);">
		<input class="summaryblock1" type="submit" name="button3" aria-labelledby="buttonText3" value="Show info"/>
		<input class="summaryblock2" type="submit" name="button4" aria-labelledby="buttonText4" value="Hide info"/>
	</form>

	 <?php } ?>
</div>

<?php
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
