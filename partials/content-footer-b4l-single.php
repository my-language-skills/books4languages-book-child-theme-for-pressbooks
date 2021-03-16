<?php

/**
 * New post section.
 *
 * @since 1.5
 *
 */

 if ( !wp_is_mobile() && is_single()) { ?>
	<div id="footerwrap">
        <div id="footer-discover">
          <h2>Discover Books4Languages</h2>
					<p>Welcome to a place where language matter. On Books4Languages you can find a great collection of Open TextBooks. Read <a href="https://open.books4languages.com/"><?php _e( 'more', 'pressbooks-book' ); ?></a>.</p>
        </div>
        <div id="footer-contribute">
					<h2>Make Books4Languages yours</h2>
					<p>Translate the content or make an adaptation. If you already are a teacher, why not to be the author of your textbook? Read <a href="https://books4languages.com/contribute/"><?php _e( 'more', 'pressbooks-book' ); ?></a>.</p>
        </div>
        <div id="footer-membership">
					<!-- <h2>Become a member</h2> -->
					<!-- <p>Get unlimited access to the best language conten on Books4Languages — and support OpenEducation while you’re at it. Read <a href="https://open.books4languages.com/register/your-membership/"><?php _e( 'more', 'pressbooks-book' ); ?></a>.</p> -->
					<h2>Use the arrow keys</h2>
					<p style="text-align: center;"><img src="https://i.imgur.com/ww8rmqH.jpg" alt="" width="180" height="110" /></p>
				 </div>
    		<div class="clear"></div>
    </div>
	<?php
	}
	?>
<style>
#footerwrap{
    width: 100%;
    position:relative;
}
#footer-discover, #footer-contribute, #footer-membership{
  width:30%;
  margin:0 20px 0 0;
  display:inline-block;
  vertical-align:top;

}
#footerwrap h2{
	color: var(--primary);
	font-size: 1.25rem;
}
#footerwrap  p{
	margin-left: 2rem;
	color: var(--body-text);
}
@media (max-width: 750px){
  #footer-discover, #footer-contribute, #footer-membership{
    /* width:100%;
    margin:0; */
		display:none;

  }
}</style>
