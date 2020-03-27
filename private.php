
<?php $bloginfourl = get_bloginfo( 'url' ); ?>

	<div <?php post_class(); ?>>
  <style>
#content.site-content {
  background-color: #ffe4e5; text-align: center; }
</style>
		<h2 class="entry-title denied-title"><?php _e( 'Access Denied', 'pressbooks-book' ); ?></h2>
		<div class="entry-content denied-text">
			<p><b>
			<?php
			printf(
				/* translators: link to sign in */
				__( 'This book is private, and accessible only to registered users. If you have an account you can %s.', 'pressbooks-book' ),
				sprintf(
					'<a href="%1$s">%2$s</a>',
					wp_login_url(),
					__( 'sign in here', 'pressbooks-book' )
				)
			);
			?>
    </b></p>

      <p><img style="display: block; margin-left: auto; margin-right: auto;" src="https://media.giphy.com/media/hSdbwiVGiz72x67VyG/giphy.gif" alt="Typewriter (GIF) designed by Georgy Pashkov." width="800" height="450" />Typewriter (GIF) designed by Georgy Pashkov</p>
      <br>
      <p>
      <?php
      printf(
        /* translators: link to Pressbooks.com */
        __( 'You can also set up your own Books4Languages book at %s.', 'pressbooks-book' ),
        sprintf(
          '<a href="%1$s">%2$s</a>',
          apply_filters( 'pb_signup_url', 'https://open.books4languages.com/' ),
          apply_filters( 'pb_signup_title', 'www.open.books4languages.com' )
        )
      );
      ?>
      </p>
      <br>
      <h4>Do you have an idea of a book?</h4>
      <a class="button" href="https://books4languages.com/legal/mou/" target="_blank" rel="noopener noreferrer">Contact us</a>
      <br>
		</div>
	</div><!-- #post-## -->
