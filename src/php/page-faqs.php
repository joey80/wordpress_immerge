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
    </div><!-- .faq end -->

<?php
get_footer();
