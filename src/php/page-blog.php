<?php
/**
 * The template for the blog page
 *
 * @package immerge_demo
 */

get_header();

$args = array( 
    'orderby' => 'date',
    'post_type' => 'post',
    'posts_per_page' => 6
);

$the_query = new WP_Query( $args );

?>

	<!-- .blog start -->
    <div class="blog">

    <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <!-- .blog__container start -->
        <div class="blog__container">
            <div class="blog__container__image__container">
                <?php if ( has_post_thumbnail()) : ?>
                    <div
                        class="blog__container__image immerge_lazy"
                        data-src="<?php echo wp_get_attachment_image_url( get_post_thumbnail_id(), 'large'); ?>"
                        data-type="bg"
                        alt="<?php the_title(); ?>">
                    </div>
                <?php endif; ?>
            </div>
            <div class="blog__container__content">
                <div class="blog__container__top">
                    <span>Posted on: <strong><?php echo get_the_date( get_option('date_format') ); ?></strong></span>
                    <span>Categories</span>
                </div><!-- .blog__container__top end -->
                <div class="blog__container__middle">
                    <span class="blog__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
                    <p><?php the_excerpt(); ?></p>
                </div><!-- .blog__container__middle end -->
                <div class="blog__container__bottom">
                    <span>Published By: <strong><?php the_author(); ?> </strong></span>
                    <span class="blog__more"><a href="<?php the_permalink(); ?>">Read More</a></span>
                </div><!-- .blog__container__bottom end -->
            </div><!-- .blog__container__content end -->
        </div><!-- .blog__container end -->

    <?php endwhile; ?>
	<?php endif; ?>
    <?php wp_reset_query(); ?>
    
    </div>

<?php
get_footer();
