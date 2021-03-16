<?php
/**
 * Multisite header code goes here
 * You can add code to the <head> section of your website like this:
 * @internal
 *
 * @since 1.5
 *
 */




add_action( 'wp_footer', function () {

  /*
   * ADDED: Google Adsense ads.
   * @internal  adsbygoogle 1 / adsbygoogle 2
   *
   * @since 1.5
  */

// if (!is_user_logged_in() && is_singular('chapter')) { ?>
    <!-- <script defer="defer" src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <br>  -->
    <?php
// }


 /*
  * ADDED: Google Tag Manager code
  *
  * @since 1.5
 */



 /*
  * MODIFICATION Cookie Consent (At header.php and foote.php)
  *
  * @since 00
  * @link https://www.osano.com/cookieconsent/download/
  * https://empresiona.com/blog/como-crear-aviso-cookies-wordpress-sin-plugin/
  * https://newblogr.com/how-do-i-add-cookie-notifications-to-wordpress/
 */
?>
<!-- Cookie Consent -->
<script  defer="defer" src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js" data-cfasync="false"></script>
<script>

setTimeout(function() {
  //.. what to do after 2 seconds
window.cookieconsent.initialise({
 "palette": {
   "popup": {
     "background": "#aa0000",
     "text": "#ffdddd"
   },
   "button": {
     "background": "#ff0000"
   }
 },
 "theme": "edgeless",
 "position": "top",// "position": "bottom-left",//
	//"static": true,
 "content": {
   "href": "https://books4languages.com/legal/cookies-policy//"
 }
});

}, 2000);

</script>
<!-- End Cookie Consent -->




<?php } ); ?>
