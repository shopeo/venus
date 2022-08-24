<?php
$entry_header_classes = '';
if ( is_singular() ) {
	$entry_header_classes .= ' has-text-align-center header-footer-group';
} ?>
<div class="entry-header<?php echo esc_attr( $entry_header_classes ); ?>">
	<?php venus_the_post_meta( get_the_ID(), 'single-top' ); ?>
	<div class="entry-header-inner section-inner medium">
		<?php
		$intro_text_width = '';
		if ( is_singular() ) {
			$intro_text_width = ' small';
			the_title( '<h1 class="entry-title">', '</h1>' );
		} else {
			$intro_text_width = ' thin';
			the_title( '<h4 class="entry-title heading-size-1"><a href="' . esc_url( get_permalink() ) . '">', '</a></h4>' );
		}

		if ( has_excerpt() && is_singular() ) { ?>
			<div class="intro-text section-inner max-percentage<?php echo $intro_text_width; ?>">
				<?php the_excerpt(); ?>
			</div>
		<?php } ?>
	</div>
</div>

