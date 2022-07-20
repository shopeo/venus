<?php
$archive_title = __( 'Blog && News', 'venus' );;
?>
<div class="archive-header">
	<div class="archive-header-inner section-inner medium">
		<?php if ( $archive_title ) { ?>
			<h1 class="archive-title"><?php echo wp_kses_post( $archive_title ); ?></h1>
		<?php } ?>
	</div>
</div>
<?php get_template_part( 'template-parts/grid-posts' ); ?>
