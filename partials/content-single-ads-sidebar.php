<?php
/**
 * Ads at content area sidebar.
 *
 * @package content-single
 * @since 1.5
 *
 */

?>
 <div class="sidebar">
 	<div class="sidebar-center">
  <?php
  /**
   *
   * ADDED: Google Ad Manager
   * @internal Skyscraper 120x600
   *
   * @since 1.5
   *
   */

  get_template_part( 'partials/ads/adsbygoogle-admanager','Skyscraper_120x600');
  /** End of added code  */
  ?>
 	</div>
 </div>
 <style>
 /* The side navigation menu */
 .sidebar {
   margin: 0;
   padding: 0;
   width: 235px;
   background-color: #F5F9FC !important;
   position: absolute;
   height: 100%;
   overflow: auto;
   top: 258px; /*  Stay at the top */
   right: 0;
 }

 /* On screens that are less than 700px wide, make the sidebar into a topbar 720px*/
 @media screen and (max-width: 1200px) {
   .sidebar {
     width: 100%;
     position: static;
     height: auto;
   }
 .sidebar-center {
   	padding: 0 3rem;
 	  max-width: 720px;
   	margin-left: auto;
   	margin-right: auto;
   }
 }
 </style>
