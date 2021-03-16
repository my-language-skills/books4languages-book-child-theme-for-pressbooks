<!-- The sidebar -->

<div class="sidebar" onclick="ga('send', 'event', 'liks', 'sidebar', 'all'0);">
	<div class="sidebar-center">
		<?php
		$key_pb_subtitle = get_post_meta( get_the_ID(), 'pb_subtitle', true );
		// Check if the custom field has a value.
		if ( ! empty( $key_pb_subtitle ) && is_singular('chapter')) {?>
			<h2 data-type="subtitle">More: <?php echo $subtitle; ?></h2>
			<?php echo do_shortcode( '[display-posts transient_key="be_display_posts" transient_expiration="WEEK_IN_SECONDS" wrapper="ul" wrapper_class="display-posts-ul" meta_key="pb_subtitle" meta_value="'. $subtitle . '" exclude_current="true" post_type="chapter" post_status="publish" orderby="title" order="ASC"]' );
			}
			?>
		<!-- If Subtitle is empty -->
		<?php
		// Check if the custom field has a value.
		if ( empty( $key_pb_subtitle ) && is_singular('chapter')) {?>
		<h2 data-type="subtitle">More topics</h2>
		<?php echo do_shortcode( '[display-posts transient_key="be_display_posts-rand" transient_expiration="WEEK_IN_SECONDS" wrapper="ul" wrapper_class="display-posts-ul" exclude_current="true" post_type="chapter" post_status="publish" posts_per_page="12" orderby="rand" order="ASC"]' );
		}
		?>

		<?php
				// function to grab all possible meta values of smdre_bibliography_citations meta key.
				$get_bibliography_citations = get_post_meta( get_the_ID(), 'smdre_bibliography_citations', true );
				// Check if the custom field has a value.
				if ( ! empty( $get_bibliography_citations ) && is_singular('chapter')) {
					?><h2 data-type="subtitle">Bibliography</h2><?php
					$myvals = get_post_meta( get_the_ID());
					foreach($myvals as $key=>$val){
						foreach($val as $vals){
// take the url
							$url_parse = wp_parse_url($vals);
// Creation of the elements of the concatenation
							$title = get_the_title();
							$title_path = $url_parse['path'];
							$title_extension_medium = 'Medium grammar page';
							$title_extension_quora = 'Quora FAQ page';
							$title_extension_pcic = 'curriculum'; // http://hookr.io/functions/wp_parse_url/      https://wordpress.stackexchange.com/questions/247730/get-current-url-permalink-without-page-pagenum
							$title_extension_drae = 'at rae.es';
							$title_extension_cambridge = 'at cambridge.com';


// Concatenation of the words
							$title_full_pcic = ($title ." ". $title_extension_pcic);
							$title_full_drae = ($title_path ." ". $title_extension_drae);
							$title_full_cambridge = ($title ." ". $title_extension_cambridge);

// print the different urls
							if ($key=='smdre_bibliography_citations'){
								if ( $url_parse['host'] === 'medium.com')										{ echo '<a href="' . $vals . '" target="_blank" rel="noopener noreferrer"> '. "Medium grammar page" .' </a>'. '<br/>';} // (code to be executed if condition 1 is true);
								elseif ( $url_parse['host'] === 'www.quora.com')						{ echo '<a href="' . $vals . '" target="_blank" rel="noopener noreferrer"> '. "Quora FAQ page" .' </a>'. '<br/>';} // (code to be executed if condition 1 is false and condition 2 is true);
								elseif ( $url_parse['host'] === 'qr.ae')										{ echo '<a href="' . $vals . '" target="_blank" rel="noopener noreferrer"> '. "Quora FAQ page" .' </a>'. '<br/>';} // (code to be executed if condition 1 is false and condition 2 is true);
								elseif ( $url_parse['host'] === 'cvc.cervantes.es')					{ echo '<a href="' . $vals . '" target="_blank" rel="noopener noreferrer"> '. $title_full_pcic .' </a>'. '<br/>';} // (code to be executed if condition 1 is false and condition 2 is true);
								elseif ( $url_parse['host'] === 'dle.rae.es')								{ echo '<a href="' . $vals . '" target="_blank" rel="noopener noreferrer"> '. 'Definition at rae.es'.' </a>'. '<br/>';}   // (code to be executed if condition 2 is false and condition 3 is true);
								elseif ( $url_parse['host'] === 'dictionary.cambridge.org')	{ echo '<a href="' . $vals . '" target="_blank" rel="noopener noreferrer"> '. $title_full_cambridge .' </a>'. '<br/>';}   // (code to be executed if any condition is false and that condition is true);
								else 																												{ echo '<a href="' . $vals . '" target="_blank" rel="noopener noreferrer"> '. $url_parse['host'] .' </a>'. '<br/>';	}  // (code to be executed if neither condition is true)
							 }
						 }
					 }
				}
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
  top: 208px; /*  Stay at the top */
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




/* unvisited link */
.sidebar a:link {
  color: #dc6e78;
  text-decoration: none;
  }

/* visited link */
.sidebar a:visited {
  color: #1356A3;
  font: bold;
  }

/* mouse over link */
.sidebar a:hover {
  color: #dc6e78;
  text-decoration: underline;
  }

/* selected link */
.sidebar a:active {
  color: blue;
  }

.sidebar ul {
  margin-top: 0.5em !important;
  padding-left: 1em !important;
color:  #92aed3;
}

.sidebar h2 {
	color: var(--primary);
	font-size: 1.25rem;
	text-align: center;
  	text-transform: uppercase;
  	font-style: normal;
}

</style>

<!-- <style>
/* The side navigation menu */
/* The side navigation menu  */

.sidebar {
  margin: 0;
padding: 0 0 80px;
  width: 18%; /*200px */
  background-color: #F5F9FC !important;
  position: absolute; /* static or inline*/
  overflow: auto;
   top: 209px; /*  Stay at the top */
  z-index: 1;
  right: 0;
  /*  height: 100%;*/

}


/* unvisited link */
.sidebar a:link {
  color: #dc6e78;
  text-decoration: none;
  }

/* visited link */
.sidebar a:visited {
  color: #1356A3;
  font: bold;
  }

/* mouse over link */
.sidebar a:hover {
  color: #dc6e78;
  text-decoration: underline;
  }

/* selected link */
.sidebar a:active {
  color: blue;
  }

.sidebar ul {
  margin-top: 0.5em !important;
  padding-left: 1em !important;
color:  #92aed3;
}

.sidebar h2 {
color: var(--primary);
font-size: 1.2em;
text-align: center;
  text-transform: uppercase;
  font-style: normal;
}
@media screen and (max-width: 1119px) {
  .sidebar {display: hide;}
}


/* Page content. The value of the margin-left property should match the value of the sidebar's width property */

/* On screens that are less than 700px wide, make the sidebar into a topbar */

@media screen and (max-width: 1119px) {
  .sidebar {
    display: none;/*
    width: 100%;
    height: auto;
    position: relative;*/
  }
} -->

</style>
