<?php
/**
 * The template for the Events page
 *
 * @package immerge_demo
 */

get_header();

$args = array( 
    'orderby' => 'date',
    'post_type' => 'events',
    'order' => 'ASC',
);

$the_query = new WP_Query( $args );

?>

    <!-- .events start -->
    <div class="events">

        <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

            <!-- .events__card start -->
            <div class="events__card">
                <img
                    class="events__card__image immerge_lazy"
                    data-src="<?php echo wp_get_attachment_image_url( get_post_thumbnail_id(), 'large'); ?>"
                    data-type="img"
                    alt="<?php the_title(); ?>"
                />
                <div class="events__card__content">
                    <span class="events__card__title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </span>
                    <span class="events__card__date">
                        <?php the_field('date'); ?>
                        <span class="events__card__time">
                            <?php the_field('time'); ?>
                        </span>
                    </span>
                    <?php the_excerpt(); ?>
                </div>
            </div><!-- .events__card end -->

        <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>

    </div><!-- .events end -->

<?php
get_footer();