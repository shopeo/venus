<?php
/**
 * Template Name: Medium Width
 */
get_header(); ?>
<main id="site-content">
	<div>
		<div class="post-inner">
			<div class="entry-content">
				<?php the_content( __( 'Continue reading', 'venus' ) ); ?>
			</div>
		</div>
		<?php
		if ( ( comments_open() || get_comments_number() ) && ! post_password_required() ) { ?>
			<div class="comments-wrapper section-inner">
				<?php comments_template(); ?>
			</div>
		<?php } ?>
	</div>
</main>
<?php get_footer(); ?>
