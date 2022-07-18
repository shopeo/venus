<?php
$prev_text = sprintf( '<span class="nav-prev-text">%s</span>', '<i class="arrow fas fa-angle-left"></i>' );

$next_text = sprintf( '<span class="nav-next-text">%s</span>', '<i class="arrow fas fa-angle-right"></i>' );

$posts_pagination = get_the_posts_pagination(
		array(
				'mid_size'  => 1,
				'prev_text' => $prev_text,
				'next_text' => $next_text
		)
);

if ( strpos( $posts_pagination, 'prev page-numbers' ) === false ) {
	$posts_pagination = str_replace( '<div class="nav-links">', '<div class="nav-links"><span class="prev page-numbers placeholder" aria-hidden="true">' . $prev_text . '</span>', $posts_pagination );
}

if ( strpos( $posts_pagination, 'next page-numbers' ) === false ) {
	$posts_pagination = str_replace( '</div>', '<span class="next page-numbers placeholder" aria-hidden="true">' . $next_text . '</span></div>', $posts_pagination );
}

if ( $posts_pagination ) { ?>
	<div class="pagination-wrapper section-inner">
		<?php echo $posts_pagination; ?>
	</div>
<?php }
