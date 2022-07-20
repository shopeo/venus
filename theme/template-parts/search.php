<?php
global $wp_query;
$archive_title    = sprintf( '%1$s %2$s', '<span class="color-accent">' . __( 'Search:', 'venus' ) . '</span>', '&ldquo;' . get_search_query() . '&rdquo;' );
$archive_subtitle = '';
if ( $wp_query->found_posts ) {
	$archive_title = sprintf( _n(
			'We found %s result for your search.',
			'We found %s results for your search.',
			$wp_query->found_posts,
			'venus' ), number_format_i18n( $wp_query->found_posts ) );
} else {
	$archive_title    = __( 'We could not find any results for your search.', 'venus' );
	$archive_subtitle = __( 'You can give it another try through the search form below.', 'venus' );
}
?>
<div class="archive-header">
	<div class="archive-header-inner section-inner medium">
		<?php if ( $archive_title ) { ?>
			<h1 class="archive-title"><?php echo wp_kses_post( $archive_title ); ?></h1>
		<?php }
		if ( $archive_subtitle ) { ?>
			<div class="archive-subtitle section-inner thin max-percentage intro-text"><?php echo wp_kses_post( wpautop( $archive_subtitle ) ); ?></div>
		<?php } ?>
	</div>
</div>
<?php get_template_part( 'template-parts/grid-posts' ); ?>
