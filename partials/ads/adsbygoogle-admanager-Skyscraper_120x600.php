<?php
/**
 * Multisite header code goes here
 * You can add code to the <head> section of your website like this:
 * @internal
 *
 * @since 1.5
 *
 */

 add_action( 'wp_head', function () {?>

  <script defer="defer" async src="https://securepubads.g.doubleclick.net/tag/js/gpt.js"></script>
  <script>
    window.googletag = window.googletag || {cmd: []};
    googletag.cmd.push(function() {
      googletag.defineSlot('/22132103474/Skyscraper_120x600', [120, 600], 'div-gpt-ad-1604421481522-0').addService(googletag.pubads());
      googletag.pubads().enableSingleRequest();
      googletag.enableServices();
    });
  </script>

<?php } );

if ( !wp_is_mobile() && !is_user_logged_in() && is_singular('chapter') ) {
?>
  <br>
  <!-- /22132103474/Skyscraper_120x600 -->
  <div id='div-gpt-ad-1604421481522-0' style='width: 120px; height: 600px;'>
    <script>

    setTimeout(function() {
      //.. what to do after 10 seconds
      googletag.cmd.push(function() { googletag.display('div-gpt-ad-1604421481522-0'); });
    }, 10000);

    </script>
  </div>
  <br>
<?php
}
?>
