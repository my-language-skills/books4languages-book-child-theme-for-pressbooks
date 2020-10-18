<?php
/**
 * Ads shorcode to content area top.
 *
 * @package simple-metadata-relation-print
 * @since 1.x
 *
 */


 /**
  * geoplugin
  * Add support of country recognition with geoplugin.
  * Max 120 calls minute
  *
  * @since 0.1
  * @link  https://stackoverrun.com/es/q/2585363
  * @link  http://www.geoplugin.net/json.gp?
  * @link  http://www.geoplugin.com/iso3166
  *
  */

$a = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']));
$countrycode= $a['geoplugin_countryCode'];
if (!($countrycode == 'IN')){

  /**
   *
   * ADDED: Google AdSense
   * @internal  adsbygoogle 1
   *
   * @since 1.x
   *
   */

  get_template_part( 'partials/ads/adsbygoogle','1' );



}




/** End of added code  */
