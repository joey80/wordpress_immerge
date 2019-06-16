<?php
/**
 * Template part for displaying results in search pages
 *
 * @package immerge_demo
 */

?>

	<?php if ( 'post' === get_post_type() ) : ?>

        <!-- .search__container start -->
        <div class="searched__container">
            <div class="searched__container__image__container">
                <?php if ( has_post_thumbnail()) : ?>
                    <div
                        class="searched__container__image immerge_lazy"
                        data-src="<?php echo wp_get_attachment_image_url( get_post_thumbnail_id(), 'medium'); ?>"
                        data-type="bg"
                        alt="<?php the_title(); ?>">
                    </div>
                <?php endif; ?>
            </div>
            <div class="searched__container__content">
                <div class="searched__container__top">
                    <span>Posted on: <strong><?php echo get_the_date( get_option( 'date_format' ) ); ?></strong></span>
                </div>
                <div class="searched__container__middle">
                    <span class="searched__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
                </div>
                <div class="searched__container__bottom">
                    <span class="searched__more"><a href="<?php the_permalink(); ?>">Read Post</a></span>
                </div><!-- .search__container__bottom end -->
            </div><!-- .search__container__content end -->
        </div><!-- .search__container end -->

	<?php endif; ?>
