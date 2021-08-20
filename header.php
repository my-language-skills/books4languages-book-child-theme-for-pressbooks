<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<?php
/*
 * MODIFICATION href="" of all the link bellow to static pathways
 *
 *	@since 1.0
*/
?>
	<link rel="apple-touch-icon" sizes="180x180" href="/wp-content/themes/books4languages-book-child-theme-for-pressbooks/assets/images/books4languages-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/wp-content/themes/books4languages-book-child-theme-for-pressbooks/assets/images/books4languages-icon.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/wp-content/themes/books4languages-book-child-theme-for-pressbooks/assets/images/books4languages-icon.png">
	<link rel="manifest" href="/wp-content/themes/books4languages-book-child-theme-for-pressbooks/b4l.webmanifest.json" crossorigin="use-credentials">
	<link rel="mask-icon" href="/wp-content/themes/books4languages-book-child-theme-for-pressbooks/assets/images/books4languages-icon.png" color="#b01109">
	<link rel="shortcut icon" href="/wp-content/themes/books4languages-book-child-theme-for-pressbooks/assets/images/books4languages-icon.png" >
<!-- End of modified code -->
	<meta name="application-name" content="Pressbooks">
	<meta name="msapplication-TileColor" content="#b01109">
	<meta name="msapplication-config" content="<?php echo get_template_directory_uri(); ?>/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" /><?php // TODO ?>
	<?php wp_head();

	/*
	 *  ADDED: Custom code snippets
	 *
	 *	@since v 1.X
	 *
	*/

	get_template_part( 'partials/content-header-b4l','snippets');
	/** End of added code  */
	?>

</head>

<body <?php body_class(); ?> >

<?php
	/*
	 *	MODIFICATION Deletion of SVG code
	 *
	 *	@since 1.0
	 *  @deprecated Not longer required

	*/

if ( \PressbooksBook\Helpers\social_media_enabled() ) {
	get_template_part( 'partials/content', 'facebook-js' ); }
?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" onclick="gtag('event', 'header_click', {'event_category': 'navigation', 'event_label': 'content'});" href="#content"><?php esc_html_e( 'Skip to content', 'pressbooks-book' ); ?></a>
	<header class="header" role="banner">
		<div class="header__inside">
			<div class="header__brand">
<?php
	/*
	 *	MODIFICATION  dynamic logo to static logo
	 *
	 *	@since 1.0
	*/
?>
			<a aria-label="Catalog Books4Languages" onclick="gtag('event', 'image_click', {'event_category': 'navigation', 'event_label': 'header_home'});" href="https://books4languages.com/">
			<img width="200" height="20" src="/wp-content/themes/books4languages-book-child-theme-for-pressbooks/assets/images/books4languages-header.png" alt="Books4Languages logo">
			</a>
<!-- End of modificated code -->

			</div>
<?php
	/*
	 *	ADDED: Functionality for loading of the available translations - location 2 (mobile). Functions are called from translations-for-presbooks plugin.
	 *				NOTE: Location 2 and location 1 work together.
	 *
	 *	@since 1.3
	 *	@since 1.4
	*/
// TEMPORAL JUST FOR ADMINS    ///////////////////////
	if (current_user_can('edit_others_pages') && is_plugin_active('translations-for-pressbooks/translations-for-pressbooks.php') && "1" == $option = tfp_checkIfTranslationsEnabled()) {
		 // If translations are enabled in back-end display here. tfp_checkIfTranslationsEnabled() from TFP.

		 /* Load values to variables to limit queries.  */
			$currLang = tfp_getCurrentBookLanguageCode();
			$flag_id = "flag-" . $currLang ;
			?>

			<div id="header-inside-right"> <!-- This div is added due for align translation icon to the right in small screen version -->
				<ul>
				<li id="dropdown-in-responsive-header">
					<div class="dropdown-lang2">
					  <a onclick="mls_toggleLangDropdown(event, 'dropdown-lang-content2')"><img onclick="gtag('event', 'header_click', {'event_category': 'navigation', 'event_label': 'translations'});" src="/wp-content/themes/books4languages-book-child-theme-for-pressbooks/assets/images/lang-icon.png" width="25px" alt="langicon">
							<?php
							// echo '<img id="' . $flag_id . '" class="flag_class" src="/wp-content/themes/books4languages-book-child-theme-for-pressbooks/assets/images/empty.gif" alt="country flag">';
							echo $currLang;
							?>
						</a>
					  <div id="dropdown-lang-content2">
							<ul>
								<?php
									$blog_id = get_current_blog_id();
									tfp_printTransLinks($blog_id, "header");
								?>
							</ul>
					  </div>
					</div>
				</li>
				</ul>

<?php 	}
	/** End of added code  */
?>

				<div class="header__nav">
					<a class="header__nav-icon js-header-nav-toggle" onclick="gtag('event', 'header_click', {'event_category': 'navigation', 'event_label': 'navigation'});" href="#navigation"><?php _e( 'Toggle Menu', 'pressbooks-book' ); ?><span class="header__nav-icon__icon"></span></a>
					<nav class="js-header-nav" id="navigation">
						<ul id="nav-primary-menu" class="nav--primary">
							<?php echo \PressbooksBook\Helpers\display_menu();
	/*
	 *	ADDED: Link to registration and subscription details
	 *
	 *	@since 1.0
	 *
	*/
if (! is_user_logged_in()):?>
 						<li><a onclick="gtag('event', 'header_click', {'event_category': 'navigation', 'event_label': 'register'});" href="/register/"><?php _e( 'Sign Up', 'pressbooks-book' ); ?></a></li>
<?php
endif;
/** End of added code  */

	/*
	 *	ADDED: Link to edit page
	 *
	 *	@since 1.4.8
	 *
	*/

					?><li><?php if ( is_single() ) { edit_post_link( __( 'Edit', 'pressbooks-book' )); } ?></li><?php
/** End of added code  */


	/*
	 *	ADDED: Functionality for loading of the available translations - location 1 (desktop). Functions are called from translations-for-presbooks plugin.
	 *
	 *	@since 1.3
	 *	@since 1.4
	 *
	*/
						 if (current_user_can('edit_others_pages') && is_plugin_active('translations-for-pressbooks/translations-for-pressbooks.php') && $option == "1") {
						 ?>
						<li>
							<div class="dropdown-lang">
							  <a onclick="mls_toggleLangDropdown(event, 'dropdown-lang-content')"><img onclick="gtag('event', 'header_click', {'event_category': 'navigation', 'event_label': 'translations'});"  src="/wp-content/themes/books4languages-book-child-theme-for-pressbooks/assets/images/lang-icon.png" width="25px" alt="langicon">
									<?php
									// echo '<img id="' . $flag_id . '" class="flag_class" src="/wp-content/themes/books4languages-book-child-theme-for-pressbooks/assets/images/empty.gif" alt="country flag">';
									echo $currLang;
									?>
								</a>
							  <div id="dropdown-lang-content">
									<ul>
										<?php
											tfp_printTransLinks($blog_id, "header");
										?>
									</ul>
							  </div>
							</div>
						</li>	<?php
							}
/** End of added code  */
?>
						</ul>
					</nav>
				</div>
  	<?php
	/*
	 *	ADDED: translations-for-pressbooks.php - Closing of the <div id="header-inside-right">
	 *
	 *	@since 1.3
	 *
	*/
			if (is_plugin_active('translations-for-pressbooks/translations-for-pressbooks.php')) 	if ($option == "1"){ { ?>
			</div> <?php } }
	/** End of added code  */
			?>
		</div>

		<?php if ( !is_front_page() && pb_get_first_post_id() ) { ?>

			<div class="reading-header">
				<nav class="reading-header__inside">
					<?php if ( is_single() ) { ?>
					<div class="reading-header__toc dropdown">
						<?php if(!wp_is_mobile()){ //!wp_is_mobile() is_user_logged_in()?>
						<div class="reading-header__toc__title">
							<?php
							 _e( 'Contents', 'pressbooks-book' ); ?>
						 </div>
							<div class="block-reading-toc" hidden>
								<?php //the hidden list
							/*
							 *	ADDED: translations-for-pressbooks.php - Closing of the <div id="header-inside-right">
							 *
							 *	@since 1.3
							 *
							*/
							get_template_part( 'partials/content-header','toc');

							// include( locate_template( 'partials/content-toc.php' ) ); // FILE content-toc NOT FOUND
						?>
							</div>
						<?php }
						else { ?>
							<h1 class="reading-header__toc__title">
								<a onclick="gtag('event', 'header_click', {'event_category': 'navigation', 'event_label': 'toc'});" href="<?php pbc_get_tablecontents_url() ?>"><?php _e( 'CONTENTS', 'pressbooks-book' ); ?></a>
							</h1>
					<?php	}	?>
					</div>
					<?php } else { ?>
					<div class="reading-header__toc"></div>
					<?php } ?>
					<?php /* translators: %s: the title of the book */ ?>
					<h1 class="reading-header__title" ><a onclick="gtag('event', 'header_click', {'event_category': 'navigation', 'event_label': 'cover'});" href="<?php echo home_url( '/' ); ?>" title="<?php printf( __( 'Go to the cover page of %s', 'pressbooks-book' ), esc_attr( get_bloginfo( 'name', 'display' ) ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
<?php
	/*
	 *	ADDED: Functionality for loading of the available relations.
	 *	COMMENTED OUT: Displaying option for the Buy button.
	 *	NOTE: HTML contennt in the <div> container needs to stay space-free due to .reading-header__end-container:empty class in smd-relations.php
	 *
	 *	@since 1.4
	 *	@since 1.4.1
	 *	@since 1.4.X
	 *
	*/
	  			if ( !wp_is_mobile()) { ?>
					<div class="reading-header__end-container"><?php if (is_user_logged_in() && is_plugin_active('simple-metadata/simple-metadata.php') && is_plugin_active('simple-metadata-relation/simple-metadata-relation.php')) {
								getCurrentPostRelations($location = "chapter");
							} ?>
					<?php
/* if ( array_filter( get_option( 'pressbooks_ecommerce_links', [] ) ) ) : ?>
	<a href="<?php echo home_url( '/buy/' ); ?>"><?php _e( 'Buy', 'pressbooks-book' ); ?></a>
	<?php  endif; */
					?>
				 </div>
			 	<?php   }  ?>


<?php	/** End of added code  */ ?>

				</nav>
			</div>
		<?php   }  ?>
	</header>

	<main id="main">
	<div id="content" class="site-content">
