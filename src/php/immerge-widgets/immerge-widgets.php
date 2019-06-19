<?php
/*
Plugin Name: Immerge Custom Widgets
Plugin URI: https://immergetech.com
Description: Plugin for custom widget on Immerge WP demo site
Version: 1.0.0
Author: Immerge
Author URI: https://immergetech.com
License: GPLv2
*/

add_action( 'widgets_init', 'immerge_register_widgets' );

function immerge_register_widgets()
{
    register_widget( 'Immerge_search_widget' );
    register_widget( 'Immerge_latest_posts_widget' );
    register_widget( 'Immerge_categories_widget' );
}




// Immerge search widget - general search box
class Immerge_search_widget extends WP_Widget
{

    function __construct()
    {
        $widget_options = array(
            'classname'   => 'widget__search',
            'description' => 'Custom styled simple search box'
        );

        parent::__construct( 'Immerge_search_widget', 'Immerge Search', $widget_options );
    }

    function form( $instance )
    {
        $defaults = array(
            'title'       => 'Search',
            'placeholder' => 'Enter Your Search',
            'button_text' => 'Search'
        );

        $instance = wp_parse_args( (array) $instance, $defaults );
        $title = $instance['title'];
        $placeholder = $instance['placeholder'];
        $button_text = $instance['button_text'];
        ?>

        <p>
            <label
                for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
                Title:
            </label>
            <input
                name="<?php echo $this->get_field_name( 'title' ); ?>"
                type="text"
                value="<?php echo esc_attr( $title ); ?>"
            />
        </p>

        <p>
            <label
                for="<?php echo esc_attr( $this->get_field_id( 'placeholder' ) ); ?>">
                Placeholder:
            </label>
            <input
                name="<?php echo $this->get_field_name( 'placeholder' ); ?>"
                type="text"
                value="<?php echo esc_attr( $placeholder ); ?>"
            />
        </p>

        <p>
            <label
                for="<?php echo esc_attr( $this->get_field_id( 'button_text' ) ); ?>">
                Button Text:
            </label>
            <input
                name="<?php echo $this->get_field_name( 'button_text' ); ?>"
                type="text"
                value="<?php echo esc_attr( $button_text ); ?>"
            />
        </p>

        <?php
    }

    function update( $new_instance, $old_instance )
    {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['placeholder'] = sanitize_text_field( $new_instance['placeholder'] );
        $instance['button_text'] = sanitize_text_field( $new_instance['button_text'] );

        return $instance;
    }

    function widget( $args, $instance )
    {
        extract( $args );

        echo $before_widget;

        $title = apply_filters( 'widget_title', $instance['title'] );
        $placeholder = ( empty( $instance['placeholder'] ) ) ? '&nbsp;' : $instance['placeholder'];
        $button_text = ( empty( $instance['button_text'] ) ) ? '&nbsp;' : $instance['button_text'];

        if ( !empty( $title ) )
        {
            echo '<h3>' . esc_html( $title ) . '</h3>';
        }
        ?>

        <form role="search" method="get" class="widget__search__form" action="<?php echo home_url( '/' ); ?>">
            <input
                type="search"
                class="field"
                placeholder="<?php echo esc_html( $placeholder ) ?>"
                value="<?php echo get_search_query() ?>"
                name="s"
            />
            <button
                type="submit"
                class="widget__search__button"
                title="<?php echo esc_html( $button_text ) ?>"
                aria-label="<?php echo esc_html( $button_text ) ?>"
                value="<?php echo esc_html( $button_text ) ?>">
                <?php echo esc_html( $button_text ) ?>
            </button>
        </form>
        <?php

        echo $after_widget;
    }
}




// Immerge latest posts widget - displays a certain amount of recents posts
class Immerge_latest_posts_widget extends WP_Widget
{

    function __construct()
    {
        $widget_options = array(
            'classname'   => 'widget__recent',
            'description' => 'Immerge custom recent posts list'
        );

        parent::__construct( 'Immerge_latest_posts_widget', 'Immerge Latest Posts', $widget_options );
    }

    function form( $instance )
    {
        $defaults = array(
            'title'  => ''
        );

        $instance = wp_parse_args( (array) $instance, $defaults );
        $title = $instance['title'];
        ?>

        <p>
            <label
                for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
                Title:
            </label>
            <input
                name="<?php echo $this->get_field_name( 'title' ); ?>"
                type="text"
                value="<?php echo esc_attr( $title ); ?>"
            />
        </p>

        <p>
            <label
                for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>">
                Number of posts to show:
            </label>
            <input
                name="<?php echo $this->get_field_name( 'number' ); ?>"
                type="text"
                value="<?php echo esc_attr( $number ); ?>"
                maxLength="2"
                size="2"
            />
        </p>

        <p>
            <label
                for="<?php echo esc_attr( $this->get_field_id( 'sort' ) ); ?>">
                Sort order:
            </label>
            <select name="<?php echo $this->get_field_name( 'sort' ); ?>">
                <option <?php selected( $sort, 'ASC'); ?> value="ASC">ASC</option>
                <option <?php selected( $sort, 'DESC'); ?> value="DESC">DESC</option>
            </select>
        </p>

        <?php
    }

    function update( $new_instance, $old_instance )
    {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['number'] = sanitize_text_field( $new_instance['number'] );
        $instance['sort'] = sanitize_text_field( $new_instance['sort'] );

        return $instance;
    }

    function widget( $args, $instance )
    {
        extract( $args );

        echo $before_widget;

        $title = apply_filters( 'widget_title', $instance['title'] );
        $number = ( empty( $instance['number'] ) ) ? '1' : $instance['number'];
        $sort = ( empty( $instance['sort'] ) ) ? 'DESC' : $instance['sort'];
        $post_args = array(
            'order'          => $sort,
            'orderby'        => 'date',
            'post_type'      => 'post',
            'posts_per_page' => $number
        );
        $the_query = new WP_Query( $post_args );

        if ( !empty( $title ) )
        {
            echo '<h3>' . esc_html( $title ) . '</h3>';
        }
        ?>

        <div class="widget__recent__container">
            <ul>

                <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                
                    <li class="widget__recent__post">
                        <a href="<?php the_permalink(); ?>">
                            <img
                                data-src="<?php echo wp_get_attachment_image_url( get_post_thumbnail_id(), 'thumbnail'); ?>"
                                class="widget__recent__post__image immerge_lazy"
                                alt="<?php the_title(); ?>"
                                data-type="img" />
                        </a>
                        <div class="widget__recent__post__description">
                            <a href="<?php the_permalink(); ?>"><h6><?php the_title(); ?></h6></a>
                            <span class="widget__recent__post__date">
                                <?php echo get_the_date( get_option('date_format') ); ?>
                            </span>
                        </div>
                    </li>

                <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_query(); ?>

            </ul>
        </div><!-- .widget__recent__container end -->
        
        <?php

        echo $after_widget;
    }
}




// Immerge categories widget - displays all of the categories
class Immerge_categories_widget extends WP_Widget
{

    function __construct()
    {
        $widget_options = array(
            'classname'   => 'widget__categories',
            'description' => 'Immerge custom category list'
        );

        parent::__construct( 'Immerge_categories_widget', 'Immerge Categories', $widget_options );
    }

    function form( $instance )
    {
        $defaults = array(
            'title' => ''
        );

        $instance = wp_parse_args( (array) $instance, $defaults );
        $title = $instance['title'];
        ?>

        <p>
            <label
                for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
                Title:
            </label>
            <input
                name="<?php echo $this->get_field_name( 'title' ); ?>"
                type="text"
                value="<?php echo esc_attr( $title ); ?>"
            />
        </p>

        <?php
    }

    function update( $new_instance, $old_instance )
    {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field( $new_instance['title'] );

        return $instance;
    }

    function widget( $args, $instance )
    {
        extract( $args );

        echo $before_widget;

        $title = apply_filters( 'widget_title', $instance['title'] );
        $categories = get_categories( array(
            'orderby' => 'name',
            'parent'  => 0
        ) );

        if ( !empty( $title ) )
        {
            echo '<h3>' . esc_html( $title ) . '</h3>';
        }

        echo '<ul>';

        foreach ( $categories as $category ) {
            ?>

            <li class="widget__categories__item">
                <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a>
            </li>

            <?php
        }

        echo '</ul>';
        echo $after_widget;
    }
}
