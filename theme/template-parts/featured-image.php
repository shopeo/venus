<?php
if ( has_post_thumbnail() && ! post_password_required() ) {
	$featured_media_inner_classes = '';
	if ( ! is_singular() ) {
		$featured_media_inner_classes .= ' medium';
	} ?>
	<figure class="featured-media">
		<div class="featured-media-inner section-inner<?php echo $featured_media_inner_classes; ?>">
			<?php
			the_post_thumbnail( 'venus-fullscreen' );
			?>
		</div>
	</figure>
<?php }
