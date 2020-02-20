<section data-type="<?php echo $datatype; ?>" <?php post_class( pb_get_section_type( $post ) ); ?>>
<header>

<!--
-				ADDED: featured image code
-
-				@since v1.2.2  MODIFIED v1.3  MODIFIED v1.4.1 MODIFIED 1.4.2
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
		?>
		<!-- @ADDED: Titles are link to pages in desktop -->
				<?php if ( wp_is_mobile() ) :
				    /* Display and echo mobile specific stuff here */
						the_title();
				else :
				    /* Display and echo desktop stuff here */
						?><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				<?php endif; ?>
		<!-- End of added code -->
				<?php
	}
	?>
	</h1>
	<?php if ( $subtitle ) { ?>
	<p data-type="subtitle"><?php echo $subtitle; ?></p>
	<?php } ?>
	<?php if ( $authors ) { ?>
	<p data-type="author"><?php echo $authors; ?></p>
	<?php } ?>
</header>

<?php // Edit page call to action buttom created by mls
edit_post_link( __( 'Edit', 'pressbooks-book' ), '<div class="edit-link">', '</div>', $post->ID, 'call-to-action' ); ?>

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
	<!-- @ADDED: Print pages is available jus in desktop -->
			<?php if ( wp_is_mobile() ) :
					/* Display and echo mobile specific stuff here */

			else :
					/* Display and echo desktop stuff here */
					if(function_exists('wp_print')) { print_link(); }
	endif; ?>
	<!-- End of added code -->
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
				<use xlink:href="#arrow-left" />
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
						<use xlink:href="#arrow-right" />
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
