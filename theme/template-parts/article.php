<article <?php post_class( 'max-w-5xl mx-auto p-4 pt-0' ); ?>
		id="post-<?php the_ID(); ?>">
	<?php
	get_template_part( 'template-parts/featured-image' );
	get_template_part( 'template-parts/entry-header' );
	?>
	<div class="post-inner">
		<div class="entry-content">
			<?php the_content( __( 'Continue reading', 'venus' ) ); ?>
		</div>
	</div>
	<div class="section-inner">
		<?php wp_link_pages( array(
				'before'      => '<nav class="post-nav-links bg-light-background" aria-label="' . esc_attr__( 'Page', 'venus' ) . '"><span class="label">' . __( 'Pages:', 'venus' ) . '</span>',
				'after'       => '</nav>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>'
		) );
		venus_the_post_meta( get_the_ID(), 'single-bottom' );
		if ( post_type_supports( get_post_type( get_the_ID() ), 'author' ) && is_single() ) {
			get_template_part( 'template-parts/entry-author-bio' );
		}
		?>
	</div>
</article>
<div class="max-w-5xl mx-auto p-4">
	<?php
	if ( ( comments_open() || get_comments_number() ) && ! post_password_required() ) { ?>
		<div class="comments-wrapper section-inner">
			<?php comments_template(); ?>
		</div>
	<?php }
	?>
</div>
<div class="max-w-8xl mx-auto p-4 pb-8 md:py-8">
	<?php get_template_part( 'template-parts/navigation' ); ?>
</div>
