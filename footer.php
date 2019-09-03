<?php if ( ! is_single() ) { ?>
	</div><!-- #content -->
<?php } ?>
</main>
<?php
global $multipage;
?>

<!--
-				ADDED: code for connecion to WordPress DataBase
-
-				SINCE v1.0
-->
<?php
global $wpdb;
  ?>
<!-- End of modified code -->

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
-				Comment OUT in case you want do use dynamic logo in the footer.
-
-				SINCE v1.0

			<a class="footer__pressbooks__icon" href="https://pressbooks.com" title="Pressbooks">
				<?php //  ?>
				<svg class="icon">
					<use xlink:href="#icon-pressbooks" />
				</svg>
			</a>
 -->


<!--
-				MODIFIES: logo for the logo of the company
-
-				SINCE v1.0
-->
			<a class="" href="https://books4languages.com/" title="Books For Languages">
				<img src="/wp-content/themes/books4languages-book-child-theme-for-pressbooks/assets/images/books4languages-icon.png" alt="Books4Languages Logo">
			</a>
<!-- End of modified code -->

			<div class="footer__pressbooks__links">

				<?php /* translators: %s: Pressbooks */ ?>

				<?php

				/**
				* ADD: code for translations
				*
				* SINCE v1.0
				*/
				include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
				if (is_plugin_active('translations-for-pressbooks/translations-for-pressbooks.php')) {

					$blog_id = get_current_blog_id();
				 if (pbc_check_trans($blog_id)){
				/** End of modified code */
				?>

<!--
-				NEW BLOCK which shows available translations.
-
-				SINCE v1.0
-->
				<div style="display: flex; justify-content: center;">
					<p><?php _e( 'Translations', 'pressbooks-book' ); ?></p>
				</div>
				<ul class="footer__pressbooks__links__list" style="margin-bottom: 1rem;">
					<?php pbc_print_trans_links($blog_id)?>
				</ul>
				<?php } } ?>
<!-- End of modified code -->

				<p class="footer__pressbooks__links__title"><a href="https://pressbooks.com"><?php printf( __( 'Powered by %s', 'pressbooks-book' ), '<span class="pressbooks">Pressbooks</span>' ); ?></a></p>
				<ul class="footer__pressbooks__links__list">


<!--
-				MODIFIES: href="" all the links bellow.
-
-				SINCE v1.0
-->
				 <li><a href="https://books4languages.com/"><?php _e( 'Books4Languagess', 'pressbooks-book' ); ?></a> |</li>
				 <li><a href="https://worksheet.books4languages.com/"><?php _e( 'Exercises', 'pressbooks-book' ); ?></a> |</li>
				 <li><a href="https://books4languages.com/legal/"><?php _e( 'Policy', 'pressbooks-book' ); ?></a> |</li>
				 <li><a href="https://questions4languages.wordpress.com/"><?php _e( 'Forum', 'pressbooks-book' ); ?></a> |</li>
				 <li><a href="/register/your-membership"><?php _e( 'Your Membership', 'pressbooks-book' ); ?></a> </li>
				</ul>
			</div>
			<div class="footer__pressbooks__social">
<!-- End of modified code -->

<!--
-				MODIFIES: href="" of all the link bellow for addition of company social networks.
-
-				SINCE v1.0
-->
			 <a class="facebook" href="https://www.facebook.com/Books4Languages/" target="_blank" title="<?php _e( 'Books For Languages on Facebook', 'pressbooks-book' ); ?>">
		 		<svg class="icon--svg">
		 			<use xlink:href="#facebook" />
		 		</svg>
		 		<span class="screen-reader-text"><?php _e( 'Books For Languages on Facebook', 'pressbooks-book' ); ?></span>
		 	</a>
		 	<a class="twitter" href="https://twitter.com/bookslanguages/" target="_blank" title="<?php _e( 'Books For Languages on Twitter', 'pressbooks-book' ); ?>">
		 		<svg class="icon--svg">
		 			<use xlink:href="#twitter" />
		 		</svg>
		 	<span class="screen-reader-text"><?php _e( 'Books For Languages on Twitter', 'pressbooks-book' ); ?></span></a>
		 </div>
<!-- End of modified code -->


		</section>
	</div><!-- .container -->
</footer><!-- .footer -->
<?php wp_footer(); ?>
</div>
</body>
</html>
