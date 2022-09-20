<div class="max-w-8xl mx-auto p-4 md:py-8">
	<div class="grid md:grid-cols-5 gap-8">
		<div class="md:col-span-4">
			<?php if ( have_posts() ) { ?>
				<div class="grid md:grid-cols-3 gap-4 grid-post">
					<?php
					while ( have_posts() ) {
						the_post();
						get_template_part( 'template-parts/post', get_post_type() );
					}
					?>
				</div>
				<?php
			} else {
				get_template_part( 'template-parts/no-results' );
			}
			get_template_part( 'template-parts/pagination' );
			?>
		</div>
		<div class="md:col-span-1">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
