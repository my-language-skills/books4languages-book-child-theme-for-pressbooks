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
 */
$pb_network_contact_form = get_blog_option( get_main_site_id(), 'pb_network_contact_form' );
$pb_network_contact_link = get_blog_option( get_main_site_id(), 'pb_network_contact_link' );

if ( $pb_network_contact_form ) {
	$contact_link = network_home_url( '/#contact' );
} else {
	if ( ! empty( $pb_network_contact_link ) ) {
		$contact_link = $pb_network_contact_link;
	} else {
		$contact_link = '';
	}
}
/**
 * Filter the "Contact" link.
 *
 * @since 5.6.0
 */
$contact_link = apply_filters( 'pb_contact_link', $contact_link );
if ( $contact_link ) {
	$contact_link_href = sprintf(
		'&bull; <a href="%1$s">%2$s</a>',
		$contact_link,
		__( 'Contact', 'pressbooks' )
	);
} else {
	$contact_link_href = '';
}

?>
">
	<div class="footer__inner">
		<section class="footer__pressbooks">

<!--
-		ADD: changes logo from dynamic original logo to static logo of the company
-
-		SINCE v1.0
-->
						<a class="" href="https://books4languages.com/" title="Books For Languages">
							<img src="/wp-content/themes/books4languages-book-child-theme-for-pressbooks/assets/images/books4languages-icon.png" alt="Books4Languages Logo">
						</a>
<!-- End of added code -->

			<div class="footer__pressbooks__links">

				<?php /* translators: %s: Pressbooks */ ?>

<!--
-				ADD: Functionality for loading of the available translations - location 3. Functions are called from translations-for-presbooks plugin.
-
-				SINCE v1.3
-->
						<?php if (is_plugin_active('translations-for-pressbooks/translations-for-pressbooks.php')) { ?>
						<div style="display: flex; justify-content: center;">
							<p><?php _e( 'Translations:', 'pressbooks-book' ); ?></p>
						</div>
							<ul class="footer__pressbooks__links__list" style="margin-bottom: 1rem;">
								<?php
									$blog_id = get_current_blog_id();
									pbc_print_trans_links($blog_id, "footer");
								?>
							</ul>
							<?php } ?>
<!-- End of modified code -->

<!--
-		MODIFIES: Footer tittle.
-
-		SINCE v1.0
-->
								<p class="footer__pressbooks__links__title"><?php printf( __( 'Created with use of %s', 'pressbooks-book' ),'<span class="pressbooks">Wordpress and Pressbooks</span>' ); ?></p>
								<ul class="footer__pressbooks__links__list">
<!-- End of modified code -->

				<ul class="footer__pressbooks__links__list">

<!--
-		MODIFIES: all the links bellow. Privacy Policy menu slug added.
-
-		SINCE v1.0
-->
						<ul class="footer__pressbooks__links__list">
							<li><a href="https://open.books4languages.com/"><?php _e( 'Books4Languages', 'pressbooks-book' ); ?></a> |</li>
							<li><a href="https://worksheet.books4languages.com/"><?php _e( 'Exercises', 'pressbooks-book' ); ?></a> |</li>
							<li><a href="https://books4languages.com/legal/"><?php _e( 'Policy', 'pressbooks-book' ); ?></a> |</li>
							<li><a href="https://books4languages.wordpress.com/legal/privacy-policy/"><?php _e( 'Privacy Policy', 'pressbooks-book' ); ?></a> |</li>
							<li><a href="https://questions4languages.wordpress.com/"><?php _e( 'Forum', 'pressbooks-book' ); ?></a> |</li>
							<li><a href="https://open.books4languages.com/register/your-membership/"><?php _e( 'Your Membership', 'pressbooks-book' ); ?></a> </li>
						</ul>
<!-- End of modified code -->

			</div>

<!--
-		MODIFIES: href="" of the link bellow for addition of company social networks.
-
-		SINCE v1.0
-->
	<div class="footer__pressbooks__social">
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
		 <span class="screen-reader-text"><?php _e( 'Books For Languages on Twitter', 'pressbooks-book' ); ?></span>
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
