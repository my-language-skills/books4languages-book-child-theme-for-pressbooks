<!--
-				ADDED: featured image code
-
-				@SINCE v1.2.2  MODIFIED v1.3  MODIFIED v1.4.1 MODIFIED 1.4.2
-->

<?php
if (is_plugin_active('featured-image-for-pressbooks/featured-image-for-pressbooks.php')){
	if(!(wp_is_mobile() && fifp_is_featured_image_disabled())){
		// condition to check if displaying featured images is not disabled for mobile devices
			?>
				<div class="featured_image" >
					<?php
						if ( has_post_thumbnail() || fifp_has_ext_thumbnail()) { // check if some thumbnail exists for this post
								$fi_info = fifp_get_fi_info();
								if ( "print_local_fi" == $fi_info) {		// if site is source or thumbnail saved locally print from local
									$option = get_option("pressbooks_theme_options_web");
									if ($option['webbook_width'] == '30em'){
										the_post_thumbnail('featured-narrow'); //508
									}
									if ($option['webbook_width'] == '40em'){
										the_post_thumbnail('featured-standard'); //688
									}
									if ($option['webbook_width'] == '48em'){
										the_post_thumbnail('featured-wide'); //832
									}
								} else {					// else print from external source (from source book)
									$source_fi_id = $fi_info;
									switch_to_blog(get_option( '_ext_source_id'));	// switch to source blog and get featured_image from there
										$option = get_option("pressbooks_theme_options_web");
										if ($option['webbook_width'] == '30em'){
											echo wp_get_attachment_image($source_fi_id, 'featured-narrow' );
										}
										if ($option['webbook_width'] == '40em'){
											echo wp_get_attachment_image($source_fi_id, 'featured-standard' );
										}
										if ($option['webbook_width'] == '48em'){
											echo wp_get_attachment_image($source_fi_id, 'featured-wide' );
										}
									restore_current_blog();
								}
						}
						?>
				</div>
			<?php
	 }
 } ?>
