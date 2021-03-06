<?php
$next_post = get_next_post();
$prev_post = get_previous_post();
if ( $next_post || $prev_post ) {
	$pagination_classes = '';
	if ( ! $next_post ) {
		$pagination_classes = ' only-one only-prev';
	} else {
		$pagination_classes = ' only-one only-next';
	} ?>
	<div class="pagination-single section-inner<?php echo esc_attr( $pagination_classes ); ?>"
		 aria-label="<?php esc_attr_e( 'Post', 'venus' ); ?>">
		<hr class="styled-separator is-style-wide" aria-hidden="true"/>
		<div class="pagination-single-inner">
			<?php
			if ( $prev_post ) { ?>
				<a class="previous-post" href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>">
					<i class="arrow fas fa-angle-left"></i>
					<span class="title">
						<span class="title-inner">
							<?php echo wp_kses_post( get_the_title( $prev_post->ID ) ); ?>
						</span>
					</span>
				</a>
			<?php }

			if ( $next_post ) { ?>
				<a class="next-post" href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>">
					<span class="title">
						<span class="title-inner">
							<?php echo wp_kses_post( get_the_title( $next_post->ID ) ); ?>
						</span>
					</span>
					<i class="arrow fas fa-angle-right"></i>
				</a>
			<?php }
			?>
		</div>
		<hr class="styled-separator is-style-wide" aria-hidden="true"/>
	</div>
<?php }
