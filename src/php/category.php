<?php
/**
 * The template for displaying search results pages
 *
 * @package immerge_demo
 */

get_header();
?>

    <!-- .search start -->
    <div class="searched">

		<?php if ( have_posts() ) : ?>

        <!-- content start -->
        <div class="searched__content">
            <h1>Category: <?php echo single_cat_title( '', false ); ?></h1>

            <?php while ( have_posts() ) :
            the_post();
            get_template_part( 'template-parts/content', 'search' );

            endwhile;

            the_posts_navigation();

        else :

            get_template_part( 'template-parts/content', 'none' );

        endif;
        ?>

        </div><!-- .searched__content end -->

        <!-- .sidebar start -->
        <aside class="sidebar">
            <?php get_sidebar(); ?>
        </aside><!-- .sidebar end -->

    </div><!-- .searched end -->

<?php
get_footer();
