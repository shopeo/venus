<?php
$archive_title    = get_theme_mod( 'blog_title', get_bloginfo( 'name' ) );
$archive_subtitle = get_theme_mod( 'blog_slogan', venus_site_description( false ) );
?>
<div class="archive-header bg-primary-500 py-16 md:py-24 ">
	<div class="archive-header-inner relative max-w-8xl p-4 mx-auto section-inner medium text-center">
		<svg class="absolute top-0 opacity-50" xmlns="http://www.w3.org/2000/svg"
			 width="96.08010864257812" height="100.1725082397461" viewBox="0 0 96.08010864257812 100.1725082397461">
			<path class="fill-primary-400"
				  d="M94.9329,33.5442C100.633,53.6442,84.2329,78.0442,64.7329,90.4442C45.2329,102.744,22.5329,103.044,10.6329,93.2442C-1.26706,83.4442,-2.36706,63.6442,3.33294,43.4442C9.03294,23.2442,21.6329,2.74416,41.6329,0.24416C61.7329,-2.15584,89.3329,13.4442,94.9329,33.5442Z"/>
		</svg>
		<svg class="absolute left-1/2 opacity-20" xmlns="http://www.w3.org/2000/svg"
			 width="64.26873779296875" height="32.94395065307617" viewBox="0 0 64.26873779296875 32.94395065307617">
			<path class="fill-primary-300"
				  d="M64.2012,3.47166C65.8012,9.37166,38.6012,23.4717,22.8012,29.3717C7.00118,35.1717,2.50118,32.6717,0.901184,30.4717C-0.798815,28.2717,0.301184,26.4717,1.00118,21.7717C1.60118,17.1717,1.80118,9.77166,17.1012,4.87166C32.3012,-0.0283432,62.7012,-2.42834,64.2012,3.47166Z"/>
		</svg>
		<svg class="absolute bottom-0 right-4 opacity-30" xmlns="http://www.w3.org/2000/svg" width="92.89601135253906"
			 height="109.92164611816406" viewBox="0 0 92.89601135253906 109.92164611816406">
			<path class="fill-primary-400"
				  d="M86.8617,47.0628C94.6617,70.9628,96.0617,97.1628,84.0617,106.163C72.0617,115.163,46.6617,106.963,27.7617,92.5628C8.76169,78.1628,-3.83831,57.5628,1.06169,37.6628C5.86169,17.8628,28.1617,-1.23722,46.4617,0.0627861C64.7617,1.36279,78.9617,23.0628,86.8617,47.0628Z"/>
		</svg>
		<?php if ( $archive_title ) { ?>
			<h1 class="archive-title text-white text-6xl mb-2"><?php echo wp_kses_post( $archive_title ); ?></h1>
		<?php }
		if ( $archive_subtitle ) { ?>
			<div class="archive-subtitle section-inner thin max-percentage intro-text text-neutral-200"><?php echo wp_kses_post( wpautop( $archive_subtitle ) ); ?></div>
		<?php } ?>
	</div>
</div>
<?php get_template_part( 'template-parts/posts' ); ?>
