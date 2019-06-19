<?php
/**
 * The template for the about page
 *
 * @package immerge_demo
 */

get_header();

?>

    <!-- .faq start -->
    <div class="faq">

        <!-- content start -->
        <div class="faq__content--narrow">

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <img
					class="contact__section__image immerge_lazy"
					data-src="<?php echo wp_get_attachment_image_url( get_post_thumbnail_id(), 'large'); ?>"
					data-type="img"
					alt="<?php the_title(); ?>" />

                <?php the_content(); ?>

            <?php endwhile; ?>
	        <?php endif; ?>

        </div><!-- .faq__content end -->

        <!-- .sidebar start -->
        <aside class="sidebar">
            <?php get_sidebar(); ?>
        </aside><!-- .sidebar end -->
    </div><!-- .faq end -->

<?php
get_footer();