<?php
/**
 * The template for the staff page
 *
 * @package immerge_demo
 */

get_header();

$args = array( 
    'orderby' => 'date',
    'post_type' => 'staff'
);

$the_query = new WP_Query( $args );

?>
    <div class="staff">

    <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
    
        <!-- .staff__container start -->
        <div
            class="staff__container immerge_lazy"
            data-type="bg"
            data-src="http://100.26.102.174/wp-content/uploads/2019/05/bg.jpg">
            <div class="staff__upper">
                <div class="staff__image__container">
                    <div class="staff__image">
                        <div
                            class="staff__image__front immerge_lazy"
                            data-type="bg"
                            data-src="<?php the_field('picture1'); ?>"
                            data-alt="<?php the_field('first_name'); ?>">
                        </div>
                        <div
                            class="staff__image__back immerge_lazy"
                            data-type="bg"
                            data-src="<?php the_field('picture2'); ?>"
                            data-alt="<?php the_field('first_name'); ?>">
                        </div>
                    </div>
                </div>
                <div class="staff__content">
                    <span class="staff__content__name"><?php the_field('first_name')?> <?php the_field('last_name'); ?></span>
                    <span class="staff__content__title"><?php the_field('title') ?></span>
                    <hr />
                    <span class="staff__content__bio">
                        <?php the_field('bio') ?>
                    </span>
                </div>
            </div>
            <div class="staff__container__facts">
                <?php the_field('fun_facts') ?>
            </div>
        </div>
        <!-- .staff__container end -->

    <?php endwhile; ?>
	<?php endif; ?>
	<?php wp_reset_query(); ?>
    
    </div>

<?php

get_footer();
