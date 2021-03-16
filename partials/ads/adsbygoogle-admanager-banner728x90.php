<?php
/**
 *
 * ADDED: Google Ad Manager
 * @internal Banner 728x90
 *
 * @since 1.x
 *
 */

if ( !wp_is_mobile() && !is_user_logged_in() && is_singular('chapter')) { ?>
<!-- /22132103474/Banner729x90 -->
<div id='div-gpt-ad-1602419382855-0' style='width: 728px; height: 90px;'>
 <script>

  setTimeout(function() {
    //.. what to do after 10 seconds
    googletag.cmd.push(function() { googletag.display('div-gpt-ad-1602419382855-0'); });
  }, 10000);

 </script>
</div>
<?php
}

/** End of added code  */
