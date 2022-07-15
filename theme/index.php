<?php get_header(); ?>
<main id="site-content">
	<div class="max-w-8xl mx-auto p-4">
		<div class="grid md:grid-cols-5 gap-8">
			<div class="md:col-span-4">
				<?php
				$archive_title    = '';
				$archive_subtitle = '';
				if ( is_search() ) {
					global $wp_query;
					$archive_title = sprintf( '%1$s %2$s', '<span class="color-accent">' . __( 'Search:', 'venus' ) . '</span>', '&ldquo;' . get_search_query() . '&rdquo;' );
					if ( $wp_query->found_posts ) {
						$archive_title = sprintf( _n(
								'We found %s result for your search.',
								'We found %s results for your search.',
								$wp_query->found_posts,
								'venus' ), number_format_i18n( $wp_query->found_posts ) );
					} else {
						$archive_title = __( 'We could not find any results for your search. You can give it another try through the search form below.', 'venus' );
					}
				} elseif ( is_archive() && ! have_posts() ) {
					$archive_title = __( 'Nothing Found', 'venus' );
				} elseif ( ! is_home() ) {
					$archive_title    = get_the_archive_title();
					$archive_subtitle = get_the_archive_description();
				}
				if ( $archive_title || $archive_subtitle ) { ?>
					<header>
						<div>
							<?php if ( $archive_title ) { ?>
								<h1><?php echo wp_kses_post( $archive_title ); ?></h1>
							<?php }
							if ( $archive_subtitle ) { ?>
								<div><?php echo wp_kses_post( wpautop( $archive_title ) ); ?></div>
							<?php } ?>
						</div>
					</header>
				<?php }
				if ( have_posts() ) {
					$i = 0;
					while ( have_posts() ) {
						$i ++;
						if ( $i > 1 ) {
							echo '<hr/>';
						}
						the_post();
						get_template_part( 'template-parts/content', get_post_type() );
					}
				} elseif ( is_search() ) { ?>
					<div>
						<?php get_search_form( array( 'aria_label' => __( 'search again', 'venus' ) ) ); ?>
					</div>
				<?php }
				get_template_part( 'template-parts/pagination' );
				?>
			</div>
			<div class="md:col-span-1">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>
