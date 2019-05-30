<?php if( have_rows('hero_section') ): ?>
    <?php while ( have_rows('hero_section') ) : the_row(); ?>
		<?php if( get_row_layout() == 'hero_content' ): ?>

			<!-- .hero start -->
			<div
				class="hero immerge_lazy"
				data-src="<?php the_sub_field('hero_image'); ?>"
				data-type="bg">
				<div class="hero__content">
					<?php the_sub_field('hero_text'); ?>
				</div>
			</div>
			<div
                class="projects__dirt immerge_lazy"
                data-src="http://100.26.102.174/wp-content/uploads/2019/05/spatter_new.png"
                data-type="bg">
            </div>
			<!-- .hero end -->
	
		<?php endif; ?>
	<?php endwhile; ?>
<?php endif; ?>