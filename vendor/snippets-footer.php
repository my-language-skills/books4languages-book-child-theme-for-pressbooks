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
  * MODIFICATION Cookie Consent (CSS is at header.php)
  *
  * @since 00
  * @link https://www.osano.com/cookieconsent/download/
  * https://empresiona.com/blog/como-crear-aviso-cookies-wordpress-sin-plugin/
  * https://newblogr.com/how-do-i-add-cookie-notifications-to-wordpress/
 */
?>
<!-- Cookie Consent -->
<!-- <script  defer="defer" src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js" data-cfasync="false"></script>
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

</script> -->
<!-- End Cookie Consent -->




<?php
/*
 * MODIFICATION Cookie Consent
 *
 * @since 00
 * @link https://wpspeedmatters.com/fastest-cookie-consent-wordpress-plugin/
*/

 ?>

<p id="cookie-notice">This website uses cookies to ensure you get the best experience on our website<br><button onclick="acceptCookie();">Got it!</button></p>

<style>#cookie-notice{color:#fff;font-family:inherit;background:#596cd5;padding:20px;position:fixed;bottom:10px;left:10px;width:100%;max-width:300px;box-shadow:0 10px 20px rgba(0,0,0,.2);border-radius:5px;margin:0px;visibility:hidden;z-index:1000000;box-sizing:border-box}#cookie-notice button{color:inherit;background:#3842c7;border:0;padding:10px;margin-top:10px;width:100%;cursor:pointer}@media only screen and (max-width:600px){#cookie-notice{max-width:100%;bottom:0;left:0;border-radius:0}}</style>

<script>function acceptCookie(){document.cookie="cookieaccepted=1; expires=Thu, 18 Dec 2030 12:00:00 UTC; path=/",document.getElementById("cookie-notice").style.visibility="hidden"}document.cookie.indexOf("cookieaccepted")<0&&(document.getElementById("cookie-notice").style.visibility="visible");</script>

<?php } ); ?>
