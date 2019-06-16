<?php
/**
 * The template for the FAQ page
 *
 * @package immerge_demo
 */

get_header();

$args = array( 
    'orderby' => 'date',
    'post_type' => 'faqs',
    'order' => 'ASC',
);

$the_query = new WP_Query( $args );

?>

    <!-- .faq start -->
    <div class="faq">

        <!-- content start -->
        <div class="faq__content">
            <h1>Frequently Asked Questions</h1>

            <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                <?php if( have_rows('faq') ): ?>
                    <?php while ( have_rows('faq') ) : the_row(); ?>
                        <?php if( get_row_layout() == 'faq' ): ?>

                            <!-- .faq__container start -->
                            <div
                                class="faq__container immerge_lazy"
                                data-type="bg"
                                data-src="http://100.26.102.174/wp-content/uploads/2019/05/bg.jpg">
                                <div class="faq__question">
                                    <img
                                        data-src="http://100.26.102.174/wp-content/uploads/2019/05/leaf.png"
                                        data-type="img"
                                        class="faq__leaf immerge_lazy" />
                                    <?php the_sub_field('question'); ?>
                                </div><!-- .faq__question end -->
                                <div class="faq__answer">
                                    <?php the_sub_field('answer'); ?>
                                </div><!-- .faq__answer end -->
                            </div><!-- .faq__container end -->
                    
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>

            <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_query(); ?>

        </div><!-- .faq__content end -->
        <!-- .sidebar start -->
        <aside class="sidebar">
            <?php get_sidebar(); ?>
        </aside><!-- .sidebar end -->
    </div><!-- .faq end -->

<?php
get_footer();