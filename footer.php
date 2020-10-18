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

/**
 * Add checks to determine what contact link returns
 * @deprecated Not longer required
 *
 */


/**
 * Filter the "Contact" link.
 *
 * @since 5.6.0
 * @deprecated Not longer required
 */

?>
">
	<div class="footer__inner">
		<section class="footer__pressbooks">
<?php
	/**
	 *
	 * ADDED: changes logo from dynamic original logo to static logo of the company.
	 *
	 * @since 1.0
	 *
	 */
	 ?>
			<a class="" onclick="gtag('event', 'image_click', {'event_category': 'navigation', 'event_label': 'footer_home'});" href="https://books4languages.com/" title="Books4Languages">
				<img id="bfl_icon_footer" class="bfl_icon_class" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/empty.gif" alt="Books4Languages">
			</a>
<!-- End of added code -->

<div class="footer__pressbooks__links" style = "margin: auto;"> <!-- <div class="footer__pressbooks__links"> -->
<?php
	/**
	 *
	 * MODIFIES: Footer tittle.
	 *
	 * @since 1.0
	 *
	 */
	 ?>
	<p class="footer__pressbooks__links__title"><?php printf( __( 'Created with use of %s', 'pressbooks-book' ),'<span class="pressbooks">Wordpress and Pressbooks</span>' ); ?></p>

<!-- End of modified code -->
<?php
/**
 *
 * MODIFIES: all the links bellow. Privacy Policy menu slug added.
 *
 * @since 1.0
 * @since 1.4.3 Book- index link
 * @since 1.4.8 Mobile ADDED
 *
 */

if ( wp_is_mobile() && is_single()) : ?>
	<ul class="footer__pressbooks__links__list">
		<li><a target="_blank" rel="noopener noreferrer" onclick="gtag('event', 'footer_click', {'event_category': 'navigation', 'event_label': 'worksheet'});" href="https://worksheet.books4languages.com/"><?php _e( 'Exercises', 'pressbooks-book' ); ?></a> |</li>
		<li><a target="_blank" rel="noopener noreferrer" onclick="gtag('event', 'footer_click', {'event_category': 'navigation', 'event_label': 'legal'});" href="https://books4languages.com/legal/"><?php _e( 'Legal', 'pressbooks-book' ); ?></a> |</li>
		<li><a target="_blank" rel="noopener noreferrer" onclick="gtag('event', 'footer_click', {'event_category': 'navigation', 'event_label': 'your-membership'});" href="https://open.books4languages.com/register/your-membership/"><?php _e( 'Membership', 'pressbooks-book' ); ?></a> |</li>
		<li><a target="_blank" rel="noopener noreferrer" onclick="gtag('event', 'footer_click', {'event_category': 'navigation', 'event_label': 'newsletter'});" href="https://books4languages.com/newsletter/"><?php _e( 'Newsletter', 'pressbooks-book' ); ?></a>
	</ul>
<?php	else : ?>
	<ul class="footer__pressbooks__links__list">
		<li><a onclick="gtag('event', 'footer_click', {'event_category': 'navigation', 'event_label': 'catalog'});" href="https://open.books4languages.com/"><?php _e( 'Catalog', 'pressbooks-book' ); ?></a> |</li>
		<li><a onclick="gtag('event', 'footer_click', {'event_category': 'navigation', 'event_label': 'site-index'});" href="<?php pbc_get_tablecontents_url() ?>"><?php _e( 'Site index', 'pressbooks-book' ); ?></a> |</li>
		<li><a onclick="gtag('event', 'footer_click', {'event_category': 'navigation', 'event_label': 'worksheet'});" target="_blank" rel="noopener noreferrer" href="https://worksheet.books4languages.com/"><?php _e( 'Exercises', 'pressbooks-book' ); ?></a> |</li>
		<li><a onclick="gtag('event', 'footer_click', {'event_category': 'navigation', 'event_label': 'legal'});" target="_blank" rel="noopener noreferrer" href="https://books4languages.com/legal/"><?php _e( 'TOS', 'pressbooks-book' ); ?></a> |</li>
		<li><a onclick="gtag('event', 'footer_click', {'event_category': 'navigation', 'event_label': 'privacy-policy'});" rel="noopener noreferrer" href="https://books4languages.com/legal/privacy-policy/"><?php _e( 'Privacy', 'pressbooks-book' ); ?></a> |</li>
		<li><a onclick="gtag('event', 'footer_click', {'event_category': 'navigation', 'event_label': 'questions4languages'});" target="_blank" rel="noopener noreferrer" href="https://questions4languages.wordpress.com/"><?php _e( 'Forum', 'pressbooks-book' ); ?></a> |</li>
		<li><a onclick="gtag('event', 'footer_click', {'event_category': 'navigation', 'event_label': 'your-membership'});" target="_blank" rel="noopener noreferrer" href="https://open.books4languages.com/register/your-membership/"><?php _e( 'Membership', 'pressbooks-book' ); ?></a> |</li>
		<li><a onclick="gtag('event', 'footer_click', {'event_category': 'navigation', 'event_label': 'contact'});" target="_blank" rel="noopener noreferrer" href="https://books4languages.com/contact"><?php _e( 'Contact', 'pressbooks-book' ); ?></a> |</li>
		<li><a onclick="gtag('event', 'footer_click', {'event_category': 'navigation', 'event_label': 'newsletter'});" target="_blank" rel="noopener noreferrer" href="https://books4languages.com/newsletter/"><?php _e( 'Newsletter', 'pressbooks-book' ); ?></a>
	</ul>
<?php	endif;
/** End of modified code  */

/**
 *
 * ADDED: Functionality for loading of the available translations - location 3. Functions are called from translations-for-presbooks plugin.
 *
 *	@since 1.3
 *	@since 1.4
 *
 */
 if ( is_user_logged_in() ) {
						if (is_plugin_active('translations-for-pressbooks/translations-for-pressbooks.php') && "1" == $option = tfp_checkIfTranslationsEnabled() ) {
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
				<?php  }

			}
/** End of added code  */
			?>

			</div>

<?php
/**
 *
 * MODIFIES: href="" of the link bellow for addition of company social networks.
 * MODIFIES: Icons are now sprites css
 *
 * @since 1.0
 *
 */
?>
				<div class="footer__pressbooks__social">
					<a class="facebook" onclick="gtag('event', 'footer_click', {'event_category': 'social', 'event_label': 'facebook'});" href="https://www.facebook.com/Books4Languages/" target="_blank" title="<?php _e( 'Books4Languages on Facebook', 'pressbooks-book' ); ?>" rel=”noopener”>
						<img id="facebook_icon_footer" class="social_icon_class" src="/wp-content/themes/books4languages-book-child-theme-for-pressbooks/assets/images/empty.gif" alt="facebook bfl">
					 	<span class="screen-reader-text"><?php _e( 'Books4Languages on Facebook', 'pressbooks-book' ); ?></span>
					 </a>
					 <a class="twitter" onclick="gtag('event', 'footer_click', {'event_category': 'social', 'event_label': 'twitter'});" href="https://twitter.com/bookslanguages/" target="_blank" title="<?php _e( 'Books4Languages on Twitter', 'pressbooks-book' ); ?>" rel=”noopener”>
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
