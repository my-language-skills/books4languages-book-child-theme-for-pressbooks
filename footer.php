<?php if ( ! is_single() ) { ?>
	</div><!-- #content -->
<?php } ?>
</main>
<?php
global $multipage;
?>

<!--
-				ADDED: Add the h5p javascript.
-
-				@SINCE
-				@LINK https://stackoverflow.com/questions/2026335/how-to-add-extra-info-to-copied-web-text
-				@LINK https://developer.mozilla.org/en-US/docs/Web/API/Element/copy_event


-->
<script src="https://worksheet.books4languages.com/english/wp-content/plugins/h5p/h5p-php-library/js/h5p-resizer.js" charset="UTF-8"></script>


<!--
-				ADDED: Add a #copyright notice to the clipboard when someone copies a text from the website.
-
-				@SINCE
-				@LINK https://stackoverflow.com/questions/2026335/how-to-add-extra-info-to-copied-web-text
-				@LINK https://developer.mozilla.org/en-US/docs/Web/API/Element/copy_event
-				@LINK https://www.wpbeginner.com/wp-tutorials/how-to-add-a-read-more-link-to-copied-text-in-wordpress/
- 	  const pagelink = `\n\nSource: © ${document.location.href}`;

-->

<?php
if ( !wp_is_mobile() ) {
	if ( !is_user_logged_in() ) { ?>
	<script type="text/javascript">

	document.addEventListener('copy', (event) => {
	  const pagelink = `\n\nSource: <?php the_title(); ?> © <?php echo wp_get_shortlink(get_the_ID()); ?>`; //Original: `\n\nSource: ${document.location.href}`
	  event.clipboardData.setData('text', document.getSelection() + pagelink);
	  event.preventDefault();
	});

	</script>
<?php }
}
?>
<!-- END CODE -->

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

/**
 * Add checks to determine what contact link returns
 */

 //@Delete

/**
 * Filter the "Contact" link.
 *
 * @since 5.6.0
 */

 //@Delete


?>
">
	<div class="footer__inner">
		<section class="footer__pressbooks">

<!--
-		ADD: changes logo from dynamic original logo to static logo of the company
-
-		@since 1.0
-->
						<a class="" href="https://books4languages.com/" title="Books4Languages">
							<img id="bfl_icon_footer" class="bfl_icon_class" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/empty.gif" alt="Books4Languages">
						</a>
<!-- End of added code -->

			<div class="footer__pressbooks__links" style = "margin: auto;">

				<?php /* translators: %s: Pressbooks */ ?>



<!--
-		MODIFIES: Footer tittle.
-
-		@since 1.0
-->
								<p class="footer__pressbooks__links__title"><?php printf( __( 'Created with use of %s', 'pressbooks-book' ),'<span class="pressbooks">Wordpress and Pressbooks</span>' ); ?></p>

 <!-- End of modified code -->

<!--
-		MODIFIES: all the links bellow. Privacy Policy menu slug added.
-
-		@since 1.0    Book- index link ADDED v1.4.3
-->
					<ul class="footer__pressbooks__links__list">
						<li><a href="https://open.books4languages.com/"><?php _e( 'Catalog', 'pressbooks-book' ); ?></a> |</li>
						<li><a href="<?php pbc_get_tablecontents_url() ?>"><?php _e( 'Site index', 'pressbooks-book' ); ?></a> |</li>
						<li><a href="https://worksheet.books4languages.com/"><?php _e( 'Exercises', 'pressbooks-book' ); ?></a> |</li>
						<li><a target="_blank" rel="noopener noreferrer" href="https://books4languages.com/legal/"><?php _e( 'Policy', 'pressbooks-book' ); ?></a> |</li>
						<li><a target="_blank" rel="noopener noreferrer" href="https://books4languages.com/legal/privacy-policy/"><?php _e( 'Privacy Policy', 'pressbooks-book' ); ?></a> |</li>
						<li><a target="_blank" rel="noopener noreferrer" href="https://questions4languages.wordpress.com/"><?php _e( 'Forum', 'pressbooks-book' ); ?></a> |</li>
						<li><a target="_blank" rel="noopener noreferrer" href="https://open.books4languages.com/register/your-membership/"><?php _e( 'Your Membership', 'pressbooks-book' ); ?></a> |</li>
						<li><a target="_blank" rel="noopener noreferrer" href="https://books4languages.com/contact"><?php _e( 'Contact', 'pressbooks-book' ); ?></a> |</li>
						<li><a target="_blank" rel="noopener noreferrer" href="http://eepurl.com/gZWjHL"><?php _e( 'Newsletter', 'pressbooks-book' ); ?></a>
					</ul>
<!-- End of modified code -->

<!--
-				ADD: Functionality for loading of the available translations - location 3. Functions are called from translations-for-presbooks plugin.
-
-				@since 1.3
-				@modified 1.4
-->
						<?php if (is_plugin_active('translations-for-pressbooks/translations-for-pressbooks.php') && "1" == $option = tfp_checkIfTranslationsEnabled() ) {
						 ?>
								<div style="display: flex; justify-content: center;">
									<p><?php _e( 'Translations:', 'pressbooks-book' ); ?></p>
								</div>
									<ul class="footer__pressbooks__links__list" style="margin-bottom: 1rem;">
										<?php
											$blog_id = get_current_blog_id();
											tfp_printTransLinks($blog_id, "footer");
										?>
									</ul>
						<?php  } ?>
<!-- End of modified code -->


			</div>

<!--
-		MODIFIES: href="" of the link bellow for addition of company social networks.
-   MODIFIES: icons are now sprites css
-		@since 1.0
-->
	<div class="footer__pressbooks__social">
		<a class="facebook" href="https://www.facebook.com/Books4Languages/" target="_blank" title="<?php _e( 'Books4Languages on Facebook', 'pressbooks-book' ); ?>" rel=”noopener”>
			<img id="facebook_icon_footer" class="social_icon_class" src="/wp-content/themes/books4languages-book-child-theme-for-pressbooks/assets/images/empty.gif" alt="facebook bfl">
		 	<span class="screen-reader-text"><?php _e( 'Books4Languages on Facebook', 'pressbooks-book' ); ?></span>
		 </a>
		 <a class="twitter" href="https://twitter.com/bookslanguages/" target="_blank" title="<?php _e( 'Books4Languages on Twitter', 'pressbooks-book' ); ?>" rel=”noopener”>
			 <img id="twitter_icon_footer" class="social_icon_class" src="/wp-content/themes/books4languages-book-child-theme-for-pressbooks/assets/images/empty.gif" alt="twitter bfl">
		 <span class="screen-reader-text"><?php _e( 'Books4Languages on Twitter', 'pressbooks-book' ); ?></span>
	 </a>
	</div>
<!-- End of modified code -->

		</section>
	</div><!-- .container -->
</footer><!-- .footer -->
<?php wp_footer(); ?>
</div>
</body>
</html>
