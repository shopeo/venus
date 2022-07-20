<?php get_header(); ?>
<main id="site-content">
	<?php
	if ( is_search() ) {
		get_template_part( 'template-parts/search' );
	} elseif ( is_404() ) {
		get_template_part( 'template-parts/404' );
	} elseif ( is_page() ) {
		get_template_part( 'template-parts/page' );
	} elseif ( is_home() ) {
		get_template_part( 'template-parts/home' );
	} elseif ( is_singular() ) {
		get_template_part( 'template-parts/article' );
	} elseif ( is_archive() ) {
		get_template_part( 'template-parts/archive' );
	}
	?>
</main>
<?php get_footer(); ?>
