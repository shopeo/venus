<?php
$archive_title    = get_the_archive_title();
$archive_subtitle = get_the_archive_description();
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
