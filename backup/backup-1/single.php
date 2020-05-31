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


<!-- The sidebar -->

<div class="sidebar" onclick="ga('send', 'event', 'liks', 'sidebar', 'all'0);">
	<div class="sidebar-center">
		<?php
		$key_pb_subtitle = get_post_meta( get_the_ID(), 'pb_subtitle', true );
		// Check if the custom field has a value.
		if ( ! empty( $key_pb_subtitle ) && is_singular('chapter')) {?>
			<h2 data-type="subtitle">More: <?php echo $subtitle; ?></h2>
			<?php echo do_shortcode( '[display-posts transient_key="dps_subtitle_' . $subtitle . '" transient_expiration="WEEK_IN_SECONDS" wrapper="ul" wrapper_class="display-posts-ul" meta_key="pb_subtitle" meta_value="'. $subtitle . '" exclude_current="true" post_type="chapter" post_status="publish" orderby="title" order="ASC"]' );
			}
			?>
		<!-- If Subtitle is empty -->
		<?php
		// Check if the custom field has a value.
		if ( empty( $key_pb_subtitle ) && is_singular('chapter')) {?>
		<h2 data-type="subtitle">More topics</h2>
		<?php echo do_shortcode( '[display-posts transient_key="be_display_posts-rand" transient_expiration="WEEK_IN_SECONDS" wrapper="ul" wrapper_class="display-posts-ul" exclude_current="true" post_type="chapter" post_status="publish" posts_per_page="12" orderby="rand" order="ASC"]' );
		}
		?>

		<?php
				// function to grab all possible meta values of smdre_bibliography_citations meta key.
				$get_bibliography_citations = get_post_meta( get_the_ID(), 'smdre_bibliography_citations', true );
				// Check if the custom field has a value.
				if ( ! empty( $get_bibliography_citations ) && is_singular('chapter')) {
					?><h2 data-type="subtitle">Bibliography</h2><?php
					$myvals = get_post_meta( get_the_ID());
					foreach($myvals as $key=>$val){
					  foreach($val as $vals){
							$url_parse = wp_parse_url($vals);
					    if ($key=='smdre_bibliography_citations'){
		 					  echo '<a href="' . $vals . '" target="_blank"> '. $url_parse['host'] .' </a>'. '<br/>';
					     }
					   }
					 }
				}
			?>
	</div>
</div>
<style>
/* The side navigation menu */
.sidebar {
  margin: 0;
  padding: 0;
  width: 235px;
  background-color: #F5F9FC !important;
  position: absolute;
  height: 100%;
  overflow: auto;
  top: 208px; /*  Stay at the top */
  right: 0;
}

/* On screens that are less than 700px wide, make the sidebar into a topbar 720px*/
@media screen and (max-width: 1200px) {
  .sidebar {
		display: none;
    /* width: 100%;
    position: static;
    height: auto; */
  }
/* .sidebar-center {
  	padding: 0 3rem;
	max-width: 720px;
  	margin-left: auto;
  	margin-right: auto;
  } */
}


/* unvisited link */
.sidebar a:link {
  color: #dc6e78;
  text-decoration: none;
  }

/* visited link */
.sidebar a:visited {
  color: #1356A3;
  font: bold;
  }

/* mouse over link */
.sidebar a:hover {
  color: #dc6e78;
  text-decoration: underline;
  }

/* selected link */
.sidebar a:active {
  color: blue;
  }

.sidebar ul {
  margin-top: 0.5em !important;
  padding-left: 1em !important;
color:  #92aed3;
}

.sidebar h2 {
	color: var(--primary);
	font-size: 1.25rem;
	text-align: center;
  	text-transform: uppercase;
  	font-style: normal;
}

</style>






			<?php \PressbooksBook\Helpers\get_links(); ?>

					<div class="block block-reading-meta">
						<div class="block-reading-meta__inner">
							<?php include( locate_template( 'partials/content-difftool.php' ) ); ?>
					<!-- @ ADDED Just mobile -->
					<?php if ( ! wp_is_mobile() ){?>

							<div class="block-reading-meta__subsection">
								<h2 class="section__subtitle block-reading-meta__subtitle"><?php _e( 'License', 'pressbooks-book' ); ?></h2>
								<?php if ( \PressbooksBook\Helpers\is_book_public() ) { ?>
									<p>
										<?php echo \PressbooksBook\Helpers\copyright_license( false ); ?>
									</p>
								<?php } ?>

					<?php	}?>
						<!-- END -->
							<?php
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
							<?php if ( \PressbooksBook\Helpers\social_media_enabled() ) { ?>
							<div class="block-reading-meta__subsection">
								<h2 class="section__subtitle block-reading-meta__subtitle"><?php _e( 'Share This Book', 'pressbooks-book' ); ?></h2>
								<div class="block-reading-meta__share">
									<?php
										echo \PressbooksBook\Helpers\share_icons();
									?>
								</div>
							</div>
							<?php } ?>
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
