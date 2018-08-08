<?php if ( ! is_single() ) { ?>
	</div><!-- #content -->
<?php } ?>
</main>
<?php
global $multipage;
?>


<footer class="footer
<?php
if ( is_front_page() ) :
	echo ' footer--home';
elseif ( is_single() ) :
	echo ' footer--reading';
else :
	echo ' footer--page';
endif;
echo $multipage ? ' footer--multipage' : '';
?>
">
	<div class="footer__inner">
		<section class="footer__pressbooks">
			<a class="footer__pressbooks__icon" href="https://books4languages.com/" title="Books For Languages">
				<?php // TODO ?>
				<img src="<?=get_site_url()?>/wp-content/themes/pressbooks-jacobs/assets/images/icon-bfl.png">
			</a>
			<div class="footer__pressbooks__links">
				<?php /* translators: %s: Pressbooks */ ?>
				<p class="footer__pressbooks__links__title"><?php printf( __( 'Insolently created with use of %s', 'pressbooks-book' ), '<span class="pressbooks">Wordpress and Pressbooks</span>' ); ?></p>
				<ul class="footer__pressbooks__links__list">
					<li><a href="https://books4languages.com/"><?php _e( 'Books4Languages', 'pressbooks-book' ); ?></a> |</li>
					<li><a href="https://worksheet.books4languages.com/"><?php _e( 'Exercises', 'pressbooks-book' ); ?></a> |</li>
					<li><a href="https://books4languages.com/legal/"><?php _e( 'Policy', 'pressbooks-book' ); ?></a> |</li>
					<li><a href="https://questions4languages.wordpress.com/"><?php _e( 'Forum', 'pressbooks-book' ); ?></a> </li>
				</ul>
			</div>
			<div class="footer__pressbooks__social">
				<a class="facebook" href="https://www.facebook.com/Books4Languages/" title="<?php _e( 'Books For Languages on Facebook', 'pressbooks-book' ); ?>">
					<svg class="icon--svg">
						<use xlink:href="#facebook" />
					</svg>
					<span class="screen-reader-text"><?php _e( 'Books For Languages on Facebook', 'pressbooks-book' ); ?></span>
				</a>
				<a class="twitter" href="https://twitter.com/bookslanguages" title="<?php _e( 'Books For Languages on Twitter', 'pressbooks-book' ); ?>">
					<svg class="icon--svg">
						<use xlink:href="#twitter" />
					</svg>
				<span class="screen-reader-text"><?php _e( 'Books For Languages on Twitter', 'pressbooks-book' ); ?></span></a>
			</div>

		</section>
	</div><!-- .container -->
</footer><!-- .footer -->
<?php wp_footer(); ?>
</body>
</html>
