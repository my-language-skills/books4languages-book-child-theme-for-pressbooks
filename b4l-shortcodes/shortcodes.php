<!--  -->
<?php
/**
 * Shorcodes
 *
 * @package shortcodes
 * @since 1.x
 *
 */

 /**
  * ADDED: Feedback Image
  *
  * @since 0.1
  * @link  https://books4languages.com/feedback/
  *
  */

function b4l_feedback_image() {
	if ( is_singular('chapter')) { ?>
		<div id="info" class="info">
			<h2 class="textbox__title">Feedback</h2>
			<a onclick="gtag('event', 'content_click', {'event_category': 'information', 'event_label': 'feedback'});" href="https://books4languages.com/feedback/" aria-label="Feedback.">
			<!-- width="96" height="96" -->
			<img class="feedbackimage" target="_blank" rel="noopener noreferrer" class="b4l-feedback-image center-feedback size-full alignleft" src="https://i.imgur.com/cqbVrNV.png" alt="Books4Languages feedback." /></a>
		</div>
	<?php }
	}
add_shortcode('feedbackimage','b4l_feedback_image');
?>
<!-- END -->


<!-- @ADDED:  -->
<?php
/**
 * ADDED: h5p info menu
 *
 * @since 0.1
 * @link  https://books4languages.com/feedback/
 *
 */
function b4l_info_menu() { ?>

	<!-- if( ! is_user_logged_in()  ) { -->
	<div id="info" class="info">
		<h2 class="textbox__title">Info</h2>

	<?php	if(isset($_POST['button3'])) { ?>
	<!-- @ADDED: integration with h5p -->
		<iframe src="https://worksheet.books4languages.com/content/wp-admin/admin-ajax.php?action=h5p_embed&id=2" width="927" height="1" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
		<script src="https://worksheet.books4languages.com/content/wp-content/plugins/h5p/h5p-php-library/js/h5p-resizer.js" charset="UTF-8"></script>
	<?php } ?>

	<?php if ( is_singular('chapter')) { ?>
		<form method="post" onclick="gtag('event', 'view_info', {'event_category': 'information', 'event_label': 'show_info'});" action="<?php the_permalink()?>#info">
			<input class="summaryblock1" type="submit" name="button3" aria-labelledby="buttonText3" value="Show info"/>
			<input class="summaryblock2" type="submit" name="button4" aria-labelledby="buttonText4" value="Hide info"/>
		</form>
	<?php } ?>
	</div>

<?php }
add_shortcode('infomenu','b4l_info_menu'); ?>
<!-- End of added code -->
