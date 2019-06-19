<?php
/**
 * The template for the home page
 *
 * @package immerge_demo
 */

get_header();
?>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <!-- .callouts start -->
        <div class="callouts">

            <?php if( have_rows('callout_image') ): while ( have_rows('callout_image') ) : the_row(); ?>

                <!-- .callouts__container start -->
                <div class="callouts__container">
                    <img
                        class="callouts__image immerge_lazy"
                        data-src="<?php the_sub_field('image'); ?>"
                        data-type="img"
                        alt="<?php the_sub_field('title'); ?>"
                    />
                    <div class="callouts__title">
                        <?php the_sub_field('title'); ?>
                    </div>
                    <hr />
                    <div class="callouts__text">
                        <?php the_sub_field('content'); ?>
                    </div>
                </div><!-- .callouts__container end -->

            <?php endwhile; ?>
            <?php endif; ?>

        </div><!-- .callouts end -->

        <div class="homes">

            <!-- content start -->
            <div class="homes__content">
                <?php the_content(); ?>
            </div>

            <!-- .sidebar start -->
            <aside class="sidebar">
                <?php get_sidebar(); ?>
            </aside><!-- .sidebar end -->
            
        </div>

    <?php endwhile; ?>
    <?php endif;

get_footer();
