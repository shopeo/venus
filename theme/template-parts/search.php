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
	$archive_title    = __( 'Sorry, no related content found.', 'venus' );
	$archive_subtitle = __( 'We could not find any results for your search.', 'venus' );
}
?>
<div class="archive-header bg-primary-500 py-16 md:py-24 ">
	<div class="archive-header-inner relative max-w-8xl p-4 mx-auto section-inner medium text-center">
		<svg class="absolute top-0 opacity-50" xmlns="http://www.w3.org/2000/svg" width="101.1142349243164"
			 height="88.43372344970703" viewBox="0 0 101.1142349243164 88.43372344970703">
			<path class="fill-primary-400"
				  d="M72.3836,4.75348C86.4836,11.0535,103.284,26.4535,100.884,37.6535C98.5836,48.8535,76.9836,55.8535,56.0836,66.8535C35.1836,77.8535,15.0836,92.7535,6.28358,87.2535C-2.51642,81.8535,0.183582,55.9535,1.18358,37.1535C2.28358,18.3535,1.78358,6.65347,7.28358,2.35347C12.7836,-2.04653,24.3836,1.05347,35.6836,1.15347C47.0836,1.25348,58.3836,-1.54653,72.3836,4.75348Z"/>
		</svg>
		<svg class="absolute left-1/2 opacity-20" xmlns="http://www.w3.org/2000/svg" width="76.92784881591797"
			 height="74.47770690917969" viewBox="0 0 76.92784881591797 74.47770690917969">
			<path class="fill-primary-300"
				  d="M74.258,21.9678C81.358,37.4678,73.258,58.3678,62.158,67.6678C51.058,76.9678,36.958,74.4678,25.158,73.1678C13.358,71.7678,3.95796,71.4678,1.05796,66.8678C-1.84204,62.2678,1.65796,53.4678,6.25796,39.3678C10.958,25.2678,16.858,5.86777,30.958,1.16777C44.958,-3.53223,67.158,6.46777,74.258,21.9678Z"/>
		</svg>
		<svg class="absolute bottom-0 right-4 opacity-30" xmlns="http://www.w3.org/2000/svg" width="85.2188491821289"
			 height="78.41050720214844" viewBox="0 0 85.2188491821289 78.41050720214844">
			<path class="fill-primary-400"
				  d="M84.4262,14.8222C89.1262,27.7222,72.2262,49.2222,52.2262,62.9222C32.2262,76.6222,9.12617,82.5222,2.32617,75.3222C-4.47383,68.2222,5.12617,48.0222,12.0262,32.1222C18.8262,16.3222,23.0262,4.82222,38.2262,1.22222C53.4262,-2.37778,79.7262,1.92222,84.4262,14.8222Z"/>
		</svg>
		<?php if ( $archive_title ) { ?>
			<h1 class="archive-title text-white text-6xl mb-2"><?php echo wp_kses_post( $archive_title ); ?></h1>
		<?php }
		if ( $archive_subtitle ) { ?>
			<div class="archive-subtitle section-inner thin max-percentage intro-text text-neutral-200"><?php echo wp_kses_post( wpautop( $archive_subtitle ) ); ?></div>
		<?php } ?>
	</div>
</div>
<?php get_template_part( 'template-parts/grid-posts' ); ?>
