<?php get_header(); ?>

<h3><?php esc_html_e( 'Oops! That content can&rsquo;t be found.', 'pressbooks-book' ); ?></h3>
<p><?php esc_html_e( 'It looks like nothing was found at this location. Try a search?', 'pressbooks-book' ); ?></p>
<?php get_search_form(); ?>

<p><img style="display: block; margin-left: auto; margin-right: auto;" src="https://media.giphy.com/media/M9ZpE3vcxH6bKuhL8b/giphy.gif" alt="Typewriter (GIF) designed by Georgy Pashkov." width="800" height="450" />Typewriter (GIF) designed by Georgy Pashkov</p>
<br>
<h4>Are you searching for our index?</h4>
<a class="button" href="<?php pbc_get_tablecontents_url() ?>"><?php _e( 'Site index', 'pressbooks-book' ); ?></a>
<br>
<br>
<h4>Do you have an idea of a book?</h4>
<a class="button" href="https://books4languages.com/legal/mou/" target="_blank" rel="noopener noreferrer">Contact us</a>
<br>
<br>
<h4>Do you need more information?</h4>
<a class="button minimal" href="https://open.books4languages.com" target="_blank" rel="noopener noreferrer">User page</a>

<?php
get_footer();
