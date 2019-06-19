<?php
/**
 * The template for displaying the contact page
 *
 * @package immerge_demo
 */

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
				<?php echo do_shortcode('[contact-form-7 id="279" title="Contact form 1"]'); ?>
			</div>
		</div><!-- .contact end -->
		<div id="map"></div>

	<?php endwhile; ?>
	<?php endif; ?>

<?php
get_footer();