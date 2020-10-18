<?php
/**
 * Google Adsense ads.
 * @internal  adsbygoogle 1
 *
 * @since 1.x
 *
 */

if (!is_user_logged_in() && is_singular('chapter')) {
    ?>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <?php
  if ( wp_is_mobile()) {
    /* Display and echo mobile specific stuff here */
  ?>
  <br>
  <!-- adsbygoogle Ads 1 Mobile -->
  <ins class="adsbygoogle"
       style="display:inline-block;width:320px;height:90px"
       data-ad-client="ca-pub-9416109953950159"
       data-ad-slot="9773065628"></ins>
  <script>
       (adsbygoogle = window.adsbygoogle || []).push({});
  </script>
  <br>
  <?php
  }
  else {
    /* Display and echo desktop specific stuff here */
  ?>
  <br>
  <!-- adsbygoogle Ads 1 Desktop -->
  <ins class="adsbygoogle"
       style="display:inline-block;width:688px;height:90px"
       data-ad-client="ca-pub-9416109953950159"
       data-ad-slot="7734237405"></ins>
  <script>
       (adsbygoogle = window.adsbygoogle || []).push({});
  </script>
  <br>
  <?php
  }
}
