<?php
$archive_title    = get_bloginfo( 'name' );
$archive_subtitle = venus_site_description( false );
?>
<div class="archive-header bg-primary-500 py-16 md:py-24 ">
	<div class="archive-header-inner max-w-8xl p-4 mx-auto section-inner medium text-center">
		<?php if ( $archive_title ) { ?>
			<h1 class="archive-title text-white text-6xl mb-2"><?php echo wp_kses_post( $archive_title ); ?></h1>
		<?php }
		if ( $archive_subtitle ) { ?>
			<div class="archive-subtitle section-inner thin max-percentage intro-text text-neutral-200"><?php echo wp_kses_post( wpautop( $archive_subtitle ) ); ?></div>
		<?php } ?>
	</div>
</div>
<?php get_template_part( 'template-parts/grid-posts' ); ?>
