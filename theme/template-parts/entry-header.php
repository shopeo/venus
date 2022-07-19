<?php
$entry_header_classes = '';
if ( is_singular() ) {
	$entry_header_classes .= ' header-footer-group';
} ?>
<div class="entry-header has-text-align-center<?php echo esc_attr( $entry_header_classes ); ?>">
	<div class="entry-header-inner section-inner medium">
		<?php
		$show_categories = apply_filters( 'venus_show_categories_in_entry_header', true );
		if ( true === $show_categories && has_category() ) { ?>
			<div class="entry-categories">
				<span class="screen-reader-text"><?php _e( 'Categories', 'venus' ); ?></span>
				<div class="entry-categories-inner"><?php the_category( ' ' ); ?></div>
			</div>
		<?php }

		$intro_text_width = '';
		if ( is_singular() ) {
			$intro_text_width = ' small';
			the_title( '<h1 class="entry-title">', '</h1>' );
		} else {
			$intro_text_width = ' thin';
			the_title( '<h2 class="entry-title heading-size-1"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
		}

		if ( has_excerpt() && is_singular() ) { ?>
			<div class="intro-text section-inner max-percentage<?php echo $intro_text_width; ?>">
				<?php the_excerpt(); ?>
			</div>
		<?php }

		venus_the_post_meta( get_the_ID(), 'single-top' );
		?>
	</div>
</div>
