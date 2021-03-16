<?php
/**
 * Multisite snippets
 * @internal
 *
 * @since 1.5
 *
 */


  /**
   * Function for updating company logo on sign in page
   *
   * @since 1.0
   */
   function pbc_login_logo() { ?>
      <style type="text/css">
          #login h1 a, .login h1 a {
              background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/books4languages-header.png) !important;
  		height:65px;
  		width:320px;
  		background-size: 320px 65px;
  		background-repeat: no-repeat;
          	padding-bottom: 30px;
          }
      </style>
  <?php }
  add_action( 'login_enqueue_scripts', 'pbc_login_logo' );
  /** End of functionality*/




/**
 * PopUp
 *
 * @since 1.5
 */

// https://github.com/bizbudding/wampum-popups
// if (!wp_is_mobile() && is_singular('chapter')) {
//
// add_action( 'wampum_popups', 'prefix_do_wampum_popup' );
// function prefix_do_wampum_popup() {
//
//  // Bail if not a single post
//    return;
//  }
//
//  $content = '
//  <p style="text-align: center;"><img src="https://i.imgur.com/ww8rmqH.jpg" alt="" width="180" height="110" /></p>
//  <p style="text-align: center;"><strong>To move the content,</strong></p>
//  <p style="text-align: center;"><strong>use the arrow keys in your keyboard.</strong></p>
//  ';
//
//  $args = array(
//    'type'	=> 'timed',
//    'style'=> 'modal',
//    'time'	=> '30000',
//  );
//  wampum_popup( $content, $args );
//
// }
