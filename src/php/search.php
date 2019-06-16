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
            <h1><?php printf( 'Search Results for: <em>%s</em>', get_search_query() ); ?></h1>

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
