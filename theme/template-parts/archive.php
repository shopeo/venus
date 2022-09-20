<?php
$archive_title    = get_the_archive_title();
$archive_subtitle = get_the_archive_description();
?>
<div class="archive-header bg-primary-500 py-16 md:py-24 ">
	<div class="archive-header-inner relative max-w-8xl p-4 mx-auto section-inner medium text-center">
		<svg class="absolute top-0 opacity-50" xmlns="http://www.w3.org/2000/svg"
			 width="76.33920288085938" height="124.09346008300781" viewBox="0 0 76.33920288085938 124.09346008300781">
			<path class="fill-primary-400"
				  d="M56.6078,50.5431C63.8078,68.3431,73.2078,75.7431,75.7078,88.0431C78.1078,100.443,73.6078,117.843,63.2078,122.643C52.9078,127.443,36.7078,119.543,26.1078,110.443C15.6078,101.443,10.6078,91.1431,6.00776,78.5431C1.30776,65.9431,-2.89224,51.0431,2.60776,33.7431C8.20776,16.3431,23.7078,-3.55688,33.9078,0.543121C44.2078,4.74312,49.3078,32.8431,56.6078,50.5431Z"/>
		</svg>
		<svg class="absolute left-1/2 opacity-20" xmlns="http://www.w3.org/2000/svg"
			 width="99.31586456298828" height="49.18467712402344" viewBox="0 0 99.31586456298828 49.18467712402344">
			<path class="fill-primary-300"
				  d="M99.1999,11.6242C100.6,16.1242,89.0999,24.7242,76.7999,34.2242C64.4999,43.6242,51.2999,53.9242,34.0999,46.8242C16.7999,39.7242,-4.4001,15.2242,0.799896,5.62417C5.9999,-4.07583,37.4999,1.12417,60.4999,3.92417C83.3999,6.72417,97.7999,7.12417,99.1999,11.6242Z"/>
		</svg>
		<svg class="absolute bottom-0 right-4 opacity-30" xmlns="http://www.w3.org/2000/svg"
			 width="107.5284423828125" height="67.81828308105469" viewBox="0 0 107.5284423828125 67.81828308105469">
			<path class="fill-primary-400"
				  d="M105.956,5.66465C112.256,14.7646,98.4557,37.2646,85.3557,50.1646C72.1557,63.0647,59.5557,66.3646,44.9557,67.4646C30.4557,68.5647,13.8557,67.5647,5.85572,57.6646C-2.24429,47.7646,-1.84428,28.8646,6.45572,18.5646C14.6557,8.16465,30.8557,6.46465,52.0557,3.46465C73.2557,0.564648,99.6557,-3.53535,105.956,5.66465Z"/>
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
