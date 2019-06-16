<?php
/**
 * The template for displaying the contact page
 *
 * @package immerge_demo
 */      

if (isset($_POST['submit'])) {

	$POST  = filter_var_array($_POST, FILTER_SANITIZE_STRING);
	$full_name = $POST['fullName'];
	$email = $POST['email'];
	$company = $POST['company'];
	$phone = $POST['phone'];
	$message = $POST['message'];
	$formBody = "Name: " . $name . "\n\n" . 
				"Email: " . $email . "\n\n" . 
				"Company: " . $company . "\n\n" . 
				"Phone: " . $phone . "\n\n" . 
				"Message: " . $message . "\n\n";
	$to = 'jleger@immergetech.com';
	$subject = "Someone sent a message from " . get_bloginfo('name');
	$headers = 'From: ' . $email . "\r\n" . 'Reply-To: ' . $email . "\r\n";
	$sent = wp_mail($to, $subject, $formBody, $headers);
}

get_header();
?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
		<!-- .contact start -->
		<div class="contact">
			<div class="contact__section">
				<div>
					<?php the_content(); ?>
				</div>
				<img
					class="contact__section__image immerge_lazy"
					data-src="<?php echo wp_get_attachment_image_url( get_post_thumbnail_id(), 'large'); ?>"
					data-type="img"
					alt="<?php the_title(); ?>" />
			</div>
			<div class="contact__section">
				<form id="theForm" action="<?php the_permalink(); ?>" method="post">
					<div class="contact__section__error">
                    </div>
					<div class="contact__section__group">
						<label for="fullName">Full Name</label>
						<input type="text" name="fullName">
					</div>
					<div class="contact__section__group">
						<label for="email">Email</label>
						<input type="text" name="email">
					</div>
					<div class="contact__section__group">
						<label for="company">Company</label>
						<input type="text" name="company">
					</div>
					<div class="contact__section__group">
						<label for="phone">Phone</label>
						<input type="text" name="phone">
					</div>
					<div class="contact__section__group">
						<label for="messasge">Message</label>
						<textarea name="message" rows="3"></textarea>
					</div>
					<div class="contact__section__group">
                        <input type="text" name="human" class="contact__section__group__human"> + 3 = 5
                    </div>
					<button id="submit-button" aria-label="Form Submit" type="submit">Submit</button>
				</form>
			</div>
		</div><!-- .contact end -->
		<div id="map"></div>

	<?php endwhile; ?>
	<?php endif; ?>

<?php
get_footer();