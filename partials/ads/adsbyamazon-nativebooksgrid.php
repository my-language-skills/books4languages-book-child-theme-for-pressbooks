<?php
/**
 * Amazon Native Ads
 * @internal nativebooksgrid
 * onclick="gtag('event', 'ad_click', {'event_category': 'amazon', 'event_label': 'adsbyamazon-nativebooksgrid'});"
 *
 * @since 1.x
 *
 */

 // class="amazon"

if ( !wp_is_mobile() && !is_user_logged_in() && is_singular('chapter') ) {
?>
  <br>
  <div id="amzn-assoc-ad-145bcbb6-6a95-4330-9368-c30910ed2f31"></div>
  <script async src="//z-na.amazon-adsystem.com/widgets/onejs?MarketPlace=US&adInstanceId=145bcbb6-6a95-4330-9368-c30910ed2f31"></script>
  <br>
<?php
}
