<?php
/**
 * The header for our theme
 * This is the template that displays all of the <head> section and everything up until <
 * @package immerge_demo
 */

global $post;
$page_slug = $post->post_name;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"">
    <link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>  data-route="<?php echo $page_slug ?>">
	
<?php
	
// .logonav start
get_template_part( 'template-parts/content', 'navigation' );
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <!-- .hero start -->
    <div class="hero">
        <img
            class="hero__image immerge_lazy"
            data-src="<?php echo wp_get_attachment_image_url( get_post_thumbnail_id(), 'large'); ?>"
            data-type="img">
    </div>
    <div class="hero__dirt__container">
        <img
            class="hero__dirt immerge_lazy"
            data-src="http://100.26.102.174/wp-content/uploads/2019/05/spatter_new.png"
            data-type="img">
    </div>
    <!-- .hero end -->
            
    <!-- main container start -->
    <div class="app">

        <div class="post">
            <div class="post__content">
                <img
                    class="post__content__image immerge_lazy"
                    data-src="<?php echo wp_get_attachment_image_url( get_post_thumbnail_id(), 'large'); ?>"
                    data-type="img"
                    alt="<?php the_title(); ?>" />
                <h1><?php the_title(); ?></h1>
                <span class="post__content__date">Posted on: <strong><?php echo get_the_date( get_option('date_format') ); ?></strong></span>
                <hr class="post__hr" />
                <?php the_content(); ?>

                <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <!-- .sidebar start -->
            <aside class="sidebar">
                <?php get_sidebar(); ?>
            </aside><!-- .sidebar end -->
        </div><!-- .post end -->

<?php
get_footer();
