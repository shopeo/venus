<?php get_header(); ?>
<main id="site-content">
	<div class="max-w-8xl mx-auto p-4 pb-0">
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
		if ( ( $archive_title || $archive_subtitle ) && ! is_singular() ) { ?>
			<div class="archive-header header-footer-group">
				<div class="archive-header-inner section-inner medium">
					<?php if ( $archive_title ) { ?>
						<h1 class="archive-title"><?php echo wp_kses_post( $archive_title ); ?></h1>
					<?php }
					if ( $archive_subtitle ) { ?>
						<div class="archive-subtitle section-inner thin max-percentage intro-text"><?php echo wp_kses_post( wpautop( $archive_subtitle ) ); ?></div>
					<?php } ?>
				</div>
			</div>
		<?php } ?>
	</div>
	<div class="max-w-8xl mx-auto p-4 pb-8">
		<?php if ( ! is_singular() ){ ?>
		<div class="grid md:grid-cols-5 gap-8">
			<div class="md:col-span-4"><?php }
				if ( have_posts() ) {
					if ( ! is_singular() ) { ?>
						<div class="grid md:grid-cols-3 gap-4">
					<?php }
					while ( have_posts() ) {
						the_post();
						get_template_part( 'template-parts/content', get_post_type() );
					}
					if ( ! is_singular() ) { ?>
						</div>
					<?php }
				} elseif ( is_search() ) { ?>
					<div class="no-search-results-form section-inner">
						<?php get_search_form( array( 'aria_label' => __( 'search again', 'venus' ) ) ); ?>
					</div>
				<?php }
				get_template_part( 'template-parts/pagination' );
				?>
				<?php if ( ! is_singular() ){ ?></div>
			<div class="md:col-span-1">
				<?php get_sidebar(); ?>
			</div>
			<?php } ?>
		</div>
	</div>
</main>
<?php get_footer(); ?>
