<?php if ( have_posts() ) {
	while ( have_posts() ) :
		the_post();
		get_header();
		if ( \PressbooksBook\Helpers\is_book_public() ) :
			$web_options  = get_option( 'pressbooks_theme_options_web' );
			$number       = ( $post->post_type === 'chapter' ) ? pb_get_chapter_number( $post->ID ) : false;
			$subtitle     = get_post_meta( $post->ID, 'pb_subtitle', true );
			$contributors = new \Pressbooks\Contributors();
			$authors      = $contributors->get( $post->ID, 'authors' );
			$datatype     = ( in_array( $post->post_type, [ 'front-matter', 'back-matter' ], true ) ) ? pb_get_section_type( $post ) : $post->post_type;
			if ( isset( $web_options['part_title'] ) && absint( $web_options['part_title'] ) === 1 ) {
				if ( $post->post_type === 'chapter' ) {
					echo "<div class='part-title'><p><small>" . get_the_title( $post->post_parent ) . '</small></p></div>';
				}
			} ?>
			<?php
			if ( \PressbooksBook\Helpers\is_buckram() || pb_is_custom_theme() ) {
				include( locate_template( 'partials/content-single.php' ) );
			} else {
				include( locate_template( 'partials/content-single-legacy.php' ) );
			}
			?>

</div><!-- #content -->

<?php
// get_template_part( 'partials/content-single','ads-sidebar' ); ?>



			<?php \PressbooksBook\Helpers\get_links(); ?>

					<div class="block block-reading-meta">
						<div class="block-reading-meta__inner">
							<?php include( locate_template( 'partials/content-difftool.php' ) );
							/** ADDED Just Desktop
							 * @since 1.5
							 */
					 	 	if ( !wp_is_mobile() ){?>

							<div class="block-reading-meta__subsection">
								<h2 class="section__subtitle block-reading-meta__subtitle"><?php _e( 'License', 'pressbooks-book' ); ?></h2>
								<?php if ( \PressbooksBook\Helpers\is_book_public() ) { ?>

									<ul>
 										<li><a rel="nofollow" href="<?php wp_get_shortlink(get_the_ID()); ?>"><?php the_title() ?> </a> from <?php bloginfo('name');?>.</li>
										<li>Copyright © 2021 <a rel="nofollow" href="https://books4languages.com/">Books4Languages</a>. All rights reserved.</li>
										<li>Educators, <a rel="nofollow" href="https://books4languages.com/legal/licence-to-use/">Some Rights Reserved</a>.</li>
										<li>ShortLink: <?php echo wp_get_shortlink(get_the_ID()); ?></li>
									</ul>
									<p>
										<!-- NOT LONGER REQUIRED -->
										<?php //echo \PressbooksBook\Helpers\copyright_license( false ); ?>
									</p>
								<?php } ?>
				<?php	}
							/** End of added code: Just Desktop */

								$pb_section_doi = get_post_meta( $post->ID, 'pb_section_doi', true );
								if ( $pb_section_doi ) {
									?>
									<h2 class="section__subtitle block-reading-meta__subtitle"><?php _e( 'Digital Object Identifier (DOI)', 'pressbooks-book' ); ?></h2>
									<p>
									<?php
										/**
										 * Filter the DOI resolver service URL (default: https://dx.doi.org).
										 *
										 * @since Pressbooks @ 5.6.0
										 */
										$doi_resolver = apply_filters( 'pb_doi_resolver', 'https://dx.doi.org' );
										printf( '<a itemprop="sameAs" href="%1$s">%1$s</a>', trailingslashit( $doi_resolver ) . $pb_section_doi );
									?>
									</p>
								<?php } ?>
							</div>

							<?php
							/**
							 *
							 * @deprecated
							 * @since 1.5
							 */
						 ?>

						</div>
					</div>
				<?php comments_template( '', true ); ?>
<?php else : ?>
	<?php get_template_part( 'private' ); ?>
<?php endif; ?>
		<?php
		/** Insert content before content footer.
		 * @since 2.0.0
		 */
		do_action( 'pb_book_content_before_footer' );
		get_footer();
		?>
<?php endwhile;
};?>
