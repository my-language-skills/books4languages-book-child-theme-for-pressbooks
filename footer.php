<?php if ( ! is_single() ) { ?>
	</div><!-- #content -->
<?php } ?>
</main>
<?php
global $multipage;
global $wpdb;
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
				<img src="/wp-content/themes/books4languages-book-child-theme-for-pressbooks/assets/images/books4languages-icon.png" alt="Books4languages Logo">
			</a>
			<div class="footer__pressbooks__links">
				<?php
					$blog_id = get_current_blog_id();
				 if (pbc_check_trans($blog_id)){ 
				?>
				<!-- New block which shows available translations-->
				<div style="display: flex; justify-content: center;">
					<p>Translations</p>
				</div>
				<ul class="footer__pressbooks__links__list" style="margin-bottom: 1rem;">
					<?php pbc_print_trans_links($blog_id)?>
				</ul>
				<?php } ?>
				<!-- END OF TRANSLATIONS BLOCK-->
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
