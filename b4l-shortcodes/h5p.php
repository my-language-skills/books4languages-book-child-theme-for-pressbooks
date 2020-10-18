<!-- ADDED: Menu show/hide exercises -->
<?php
/**
 *
 * H5P exercises integration
 * @internal https://open.books4languages.com/wp-content/themes/books4languages-book-child-theme-for-pressbooks/assets/js/h5p-resizer.js
 * @internal /worksheet.books4languages.com/wp-content/plugins/h5p
 *
 * @since 1.x
 *
 */


 /**
  *
  * Exercises section
  * @internal default section (Contribute url)
  * @link https://books4languages.com/contribute/
  *
  * @since 1.x
  *
  */


function b4l_h5pexercises_contribute() {
  ?>
	<div id="exercises" class="textbox textbox--exercise"><header class="textbox__header">
	<h2 class="textbox__title">Exercises</h2>
	</header>
	<div class="textbox__content">
	<br>
	<p>The exercises are not created yet. If you would like to get involve with their creation, be a <a target="_blank" rel="noopener noreferrer" onclick="gtag('event', 'content_click', {'event_category': 'information', 'event_label': 'contribute'});" href="https://books4languages.com/contribute/"><?php _e( 'contributor' , 'pressbooks-book' ); ?></a>.</p>
	<br>
	</div>
	</div>
	<?php
}
  add_shortcode('h5pexercises_contribute','b4l_h5pexercises_contribute'); // Code to shorcode.




  /**
   *
   * Exercises section
   * @internal English
   * @link https://worksheet.books4languages.com/english/
   * @link https://books4languages.com/contribute/
   *
   * @since 1.x
   *
   */

function b4l_h5pexercises_english() {
$key_h5p_id_field = get_post_meta( get_the_ID(), 'efp_h5p_id_field', true );
  if ( is_singular('chapter')) {
    if ( !empty($key_h5p_id_field)) {     // Check if the custom field has a value.
    ?>
    <div id="exercises" class="textbox textbox--exercise"><header class="textbox__header">
    <h2 class="textbox__title">Exercises</h2>
    </header>
    <div class="textbox__content">
    <br>
    <p>External link to <a target="_blank" rel="noopener noreferrer"  onclick="gtag('event', 'visit_exercise', {'event_category': 'resources', 'event_label': 'worksheet'});" href="https://worksheet.books4languages.com/english/wp-admin/admin-ajax.php?action=h5p_embed&id=<?php echo $key_h5p_id_field?>"><?php _e( ' exercises ' . the_title() . ' (' . $key_h5p_id_field . ')' , 'pressbooks-book' ); ?></a>.</p>
    <br>
    <?php
      if ( is_user_logged_in() ) {  // Check if visitor
      ?>
      <iframe src="https://worksheet.books4languages.com/english/wp-admin/admin-ajax.php?action=h5p_embed&id=<?php echo $key_h5p_id_field?>" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
      <script src="https://worksheet.books4languages.com/content/wp-content/plugins/h5p/h5p-php-library/js/h5p-resizer.js" charset="UTF-8"></script>
      <br>
      <?php
      }
      if ( !is_user_logged_in()) {  // Check if student.
        if ( isset($_POST['button1']) ) { // Check if menu buttom activated.
      	 ?>
      	 <iframe src="https://worksheet.books4languages.com/english/wp-admin/admin-ajax.php?action=h5p_embed&id=<?php echo $key_h5p_id_field?>" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
     	   <script src="https://worksheet.books4languages.com/content/wp-content/plugins/h5p/h5p-php-library/js/h5p-resizer.js" charset="UTF-8"></script>
         <?php
          }
          ?>
      <!-- ADDED: Menu show/hide exercises -->
      <form method="post" onclick="gtag('event', 'view_exercise', {'event_category': 'resources', 'event_label': 'show_exercises'});" action="<?php the_permalink()?>#exercises">
      <input class="summaryblock1" type="submit" name="button1" aria-labelledby="buttonText1" value="Show exercises"/>
      <input class="summaryblock2" type="submit" name="button2" aria-labelledby="buttonText2" value="Hide exercises"/>
      </form>
      <br>
      </div>
      </div>
      <br>
      <?php
      }
    }
  else { // If no exercises in page show a message. ?>
    <div id="exercises" class="textbox textbox--exercise"><header class="textbox__header">
  	<h2 class="textbox__title">Exercises</h2>
  	</header>
  	<div class="textbox__content">
  	<br>
  	<p>The exercises are not created yet. If you would like to get involve with their creation, be a <a target="_blank" rel="noopener noreferrer" onclick="gtag('event', 'content_click', {'event_category': 'information', 'event_label': 'contribute'});" href="https://books4languages.com/contribute/"><?php _e( 'contributor' , 'pressbooks-book' ); ?></a>.</p>
  	<br>
  	</div>
  	</div>
    <br>
    <?php
    }
  }
}
  add_shortcode('h5pexercises_english','b4l_h5pexercises_english'); // Code to shorcode.


  /**
   *
   * Exercises section
   * @internal Greek
   * @link https://worksheet.books4languages.com/english/
   * @link https://books4languages.com/contribute/
   *
   * @since 1.x
   *
   */


function b4l_h5pexercises_greek() {
$key_h5p_id_field = get_post_meta( get_the_ID(), 'efp_h5p_id_field', true );
  if ( is_singular('chapter')) {
    if ( !empty($key_h5p_id_field)) {     // Check if the custom field has a value.
    ?>
    <div id="exercises" class="textbox textbox--exercise"><header class="textbox__header">
    <h2 class="textbox__title">Exercises</h2>
    </header>
    <div class="textbox__content">
    <br>
    <p>External link to <a target="_blank" rel="noopener noreferrer" onclick="gtag('event', 'visit_exercise', {'event_category': 'resources', 'event_label': 'worksheet'});" href="https://worksheet.books4languages.com/greek/wp-admin/admin-ajax.php?action=h5p_embed&id=<?php echo $key_h5p_id_field?>"><?php _e( ' exercises ' . the_title() . ' (' . $key_h5p_id_field . ')' , 'pressbooks-book' ); ?></a>.</p>
    <br>
    <?php
      if ( is_user_logged_in() ) {
      ?>
      <iframe src="https://worksheet.books4languages.com/greek/wp-admin/admin-ajax.php?action=h5p_embed&id=<?php echo $key_h5p_id_field?>" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
      <script src="https://worksheet.books4languages.com/content/wp-content/plugins/h5p/h5p-php-library/js/h5p-resizer.js" charset="UTF-8"></script>
      <br>
      <hr>
      <br>
      <?php
      }
      if ( !is_user_logged_in()) {
        if ( isset($_POST['button1']) ) {
      	 ?>
      	 <iframe src="https://worksheet.books4languages.com/greek/wp-admin/admin-ajax.php?action=h5p_embed&id=<?php echo $key_h5p_id_field?>" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
     	   <script src="https://worksheet.books4languages.com/content/wp-content/plugins/h5p/h5p-php-library/js/h5p-resizer.js" charset="UTF-8"></script>
         <?php
          }
          ?>
      <!-- ADDED: Menu show/hide exercises -->
      <form method="post" onclick="gtag('event', 'view_exercise', {'event_category': 'resources', 'event_label': 'show_exercises'});" action="<?php the_permalink()?>#exercises">
      <input class="summaryblock1" type="submit" name="button1" aria-labelledby="buttonText1" value="Show exercises"/>
      <input class="summaryblock2" type="submit" name="button2" aria-labelledby="buttonText2" value="Hide exercises"/>
      </form>
      <br>
      </div>
      </div>
      <br>
      <hr>
      <br>
      <?php
      }
    }
  else { ?>
    <div id="exercises" class="textbox textbox--exercise"><header class="textbox__header">
  	<h2 class="textbox__title">Exercises</h2>
  	</header>
  	<div class="textbox__content">
  	<br>
  	<p>The exercises are not created yet. If you wouldlike to get involve with their creation, be a <a target="_blank" rel="noopener noreferrer" onclick="gtag('event', 'content_click', {'event_category': 'information', 'event_label': 'contribute'});" href="https://books4languages.com/contribute/"><?php _e( 'contributor' , 'pressbooks-book' ); ?></a>.</p>
  	<br>
  	</div>
  	</div>
    <br>
    <hr>
    <br>
    <?php
    }
  }
}
  add_shortcode('h5pexercises_greek','b4l_h5pexercises_greek'); // Code to shorcode.


  // if (strpos(is_single(),"english") !== false) {
  // 					 $country = "english";
  // 			 } elseif (strpos(is_single(),"greek") !== false) {
  // 					 $country = "greek";
  // 			 } elseif (strpos(is_single(),"spanish") !== false) {
  // 					 $country = "spanish";
  // 			 } else {
  // 					 $country = $defaultcat;
  // 			 }

  ?>
