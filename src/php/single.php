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

                <!-- Search form-->
                <div class="widget widget__search">
                    <h3>Search</h3>
                    <form method="get" action="#" class="widget__search__form">
                        <input type="text" class="field" name="s" placeholder="Enter your search" />
                        <button type="submit" class="submit">Search</button>
                    </form>
                </div>

                <!-- Text Area -->
                <div class="widget widget__text">
                    <h3>About our company</h3>
                    <p>
                        Mauris imperdiet, urna mi, gravida sod ales. Vivamus hendrerit nulla erat ornare
                        tortor in vestibulum id.
                    </p>
                </div>

                <!-- Recent posts -->
                <div class="widget widget__recent">
                    <h3>Latest posts</h3>
                    <div class="widget__recent__container">
                        <ul>
                            <li class="widget__recent__post">
                                <a href="#">
                                    <img
                                        data-src="https://res.cloudinary.com/hc4srjl6b/image/upload/v1558145512/hero_npsfrt.jpg"
                                        class="widget__recent__post__image immerge_lazy"
                                        alt="Title Of Post"
                                        data-type="img"/>
                                </a>
                                <div class="widget__recent__post__description">
                                    <a href="#"><h6>Content builder for posts, This is a really long title heading</h6></a>
                                    <span class="widget__recent__post__date">
                                        May 13, 2015
                                    </span>
                                </div>
                            </li>
                            <li class="widget__recent__post">
                                <a href="#">
                                    <img
                                        data-src="https://res.cloudinary.com/hc4srjl6b/image/upload/v1558145512/hero_npsfrt.jpg"
                                        class="widget__recent__post__image immerge_lazy"
                                        alt="Title Of Post"
                                        data-type="img"/>
                                </a>
                                <div class="widget__recent__post__description">
                                    <a href="#"><h6>Content builder for posts</h6></a>
                                    <span class="widget__recent__post__date">
                                        May 13, 2015
                                    </span>
                                </div>
                            </li>
                        </ul>
                    </div><!-- .widget__recent__container end -->
                </div><!-- .widget__recent end -->

                <!-- Categories Area -->
                <div class="widget widget__categories">
                    <h3>Categories</h3>
                    <ul>
                        <li class="widget__categories__item">
                            <a href="category-page.html">Lifestyle</a>
                        </li>
                        <li class="widget__categories__item">
                            <a href="category-page.html">Mobile</a>
                        </li>
                        <li class="widget__categories__item">
                            <a href="category-page.html">Motion</a>
                        </li>
                        <li class="widget__categories__item">
                            <a href="category-page.html">News</a>
                        </li>
                        <li class="widget__categories__item">
                            <a href="category-page.html">Photography</a>
                        </li>
                        <li class="widget__categories__item">
                            <a href="category-page.html">Priest</a>
                        </li>
                        <li class="widget__categories__item">
                            <a href="category-page.html">Sport</a>
                        </li>
                        <li class="widget__categories__item">
                            <a href="category-page.html">Technology</a>
                        </li>
                        <li class="widget__categories__item">
                            <a href="category-page.html">Uncategorized</a>
                        </li>
                    </ul>
                </div>

            </aside><!-- .sidebar end -->
        </div><!-- .post end -->

<?php
get_footer();
