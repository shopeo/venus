<?php
/**
 * Template Name: Blank
 */ ?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
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
</body>
</html>
