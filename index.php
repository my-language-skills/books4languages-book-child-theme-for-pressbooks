<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<?php if ( \PressbooksBook\Helpers\is_book_public() ) : ?>
	<section class="block block-toc">
		<?php
	if ( pb_get_first_post_id() ) :

		$loop = new WP_Query( array( 'post_type' => 'chapter', 'posts_per_page' => -1, 'orderby'=> 'title', 'order' => 'ASC'  ) ); ?>


		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

				<?php the_title( '<h2 class="toc"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' );
								// the_excerpt()
								?>

		<?php endwhile; ?>
	<?php
		else :
			echo apply_filters( 'the_content', __( 'This book does not contain any public content.', 'pressbooks-book' ) );
		endif;?>

	</section>
<?php else : ?>
	<?php get_template_part( 'private' ); ?>
<?php endif; ?>
<?php get_footer(); ?>
