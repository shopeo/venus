<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<?php
	get_template_part( 'template-parts/featured-image' ); ?>
	<div class="p-4">
		<?php get_template_part( 'template-parts/entry-header' ); ?>
		<div class="post-inner">
			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div>
		</div>
		<div class="section-inner">
			<?php venus_the_post_meta( get_the_ID(), 'single-bottom' ); ?>
		</div>
	</div>
</article>
