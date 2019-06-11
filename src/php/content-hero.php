<?php if( have_rows('hero_section') ): ?>
    <?php while ( have_rows('hero_section') ) : the_row(); ?>
		<?php if( get_row_layout() == 'hero_content' ): ?>

			<!-- .hero start -->
			<div class="hero">
				<img
					class="hero__image immerge_lazy"
					data-src="<?php the_sub_field('hero_image'); ?>"
					data-type="img">
				<div class="hero__content">
					<?php the_sub_field('hero_text'); ?>
				</div>
			</div>
			<div class="hero__dirt__container">
				<img
					class="hero__dirt immerge_lazy"
					data-src="http://100.26.102.174/wp-content/uploads/2019/05/spatter_new.png"
					data-type="img">
            </div>
			<!-- .hero end -->
	
		<?php endif; ?>
	<?php endwhile; ?>
<?php endif; ?>