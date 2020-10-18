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
   * ADDED: Amazon Ads banner
   * @internal books4languag-20
   *
   * @since 1.x
   *
   */

get_template_part( 'partials/ads/adsbyamazon','1');

/** End of added code  */

/**
 *
 * ADDED: Google AdSense
 * @internal adsbygoogle 2
 *
 * @since 1.x
 *
 */

get_template_part( 'partials/ads/adsbygoogle','2');

/** End of added code  */

/**
 *
 * ADDED: Amazon Native Ads
 * @internal nativebooksgrid
 *
 * @since 1.x
 *
 */

// echo do_shortcode( '[adsbyamazon_nativebooksgrid]');
get_template_part( 'partials/ads/adsbyamazon','nativebooksgrid');

/** End of added code  */

}

/**
 *
 * ADDED: Google Ad Manager
 * @internal Banner 728x90
 *
 * @since 1.x
 *
 */

if ( !wp_is_mobile() && !is_user_logged_in()) { ?>
<!-- /22132103474/Banner729x90 -->
<div id='div-gpt-ad-1602419382855-0' style='width: 728px; height: 90px;'>
 <script>
   googletag.cmd.push(function() { googletag.display('div-gpt-ad-1602419382855-0'); });
 </script>
</div>
<?php }

/** End of added code  */
