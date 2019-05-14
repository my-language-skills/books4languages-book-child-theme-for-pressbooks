<?php if ( ! is_single() ) { ?>
	</div><!-- #content -->
<?php } ?>
</main>
<?php
global $multipage;
?>
<!--
							Hugo B4L
							ADD code for connexion to WordPress DataBase
-->
<?php
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
			<!--
									Hugo B4L
									MODIFIE  all the link bellow


			<a class="footer__pressbooks__icon" href="https://pressbooks.com" title="Pressbooks">
				<?php //  ?>
				<svg class="icon">
					<use xlink:href="#icon-pressbooks" />
				</svg>
			</a>
 -->

 <!--
							 Hugo B4L
							 NEW MODIFES code of all this above code, for add logo company in the footer
 -->

			<a class="" href="https://books4languages.com/" title="Books For Languages">
				<img src="/wp-content/themes/books4languages-book-child-theme-for-pressbooks/assets/images/books4languages-icon.png" alt="Books4Languages Logo">
			</a>

			<div class="footer__pressbooks__links">
				<?php /* translators: %s: Pressbooks */ ?>

				<!--
											Hugo B4L
											ADD code for translations block BEGIN 1
				-->

				<?php
				include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if (is_plugin_active('translations-for-pressbooks/translations-for-pressbooks.php')) {

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
				<?php } } ?>

				<!--
											Hugo B4L
											ADD code for translations block END 1
				-->
				<p class="footer__pressbooks__links__title"><a href="https://pressbooks.com"><?php printf( __( 'Powered by %s', 'pressbooks-book' ), '<span class="pressbooks">Pressbooks</span>' ); ?></a></p>
				<ul class="footer__pressbooks__links__list">
					<!--
											Hugo B4L
											MODIFIE href="" of all the link bellow
				 -->

				 <li><a href="https://books4languages.com/"><?php _e( 'Books4Languagess', 'pressbooks-book' ); ?></a> |</li>
				 <li><a href="https://worksheet.books4languages.com/"><?php _e( 'Exercises', 'pressbooks-book' ); ?></a> |</li>
				 <li><a href="https://books4languages.com/legal/"><?php _e( 'Policy', 'pressbooks-book' ); ?></a> |</li>
				 <li><a href="https://questions4languages.wordpress.com/"><?php _e( 'Forum', 'pressbooks-book' ); ?></a> |</li>
				 <li><a href="/register/your-membership"><?php _e( 'Your Membership', 'pressbooks-book' ); ?></a> </li>
				</ul>
			</div>
			<div class="footer__pressbooks__social">
				<!--
										Hugo B4L
										MODIFIE href="" of all the link bellow for add social network of the company
			 -->
			 <a class="facebook" href="https://www.facebook.com/Books4Languages/" title="<?php _e( 'Books For Languages on Facebook', 'pressbooks-book' ); ?>">
		 		<svg class="icon--svg">
		 			<use xlink:href="#facebook" />
		 		</svg>
		 		<span class="screen-reader-text"><?php _e( 'Books For Languages on Facebook', 'pressbooks-book' ); ?></span>
		 	</a>
		 	<a class="twitter" href="https://twitter.com/bookslanguages/" title="<?php _e( 'Books For Languages on Twitter', 'pressbooks-book' ); ?>">
		 		<svg class="icon--svg">
		 			<use xlink:href="#twitter" />
		 		</svg>
		 	<span class="screen-reader-text"><?php _e( 'Books For Languages on Twitter', 'pressbooks-book' ); ?></span></a>
		 </div>


		</section>
	</div><!-- .container -->
</footer><!-- .footer -->
<?php wp_footer(); ?>
</div>
</body>
</html>
