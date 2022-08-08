<footer id="site-footer" class="text-zinc-500">
	<div class="max-w-8xl p-4 mx-auto">
		<div id="footer-sidebar" class="sidebar">
			<?php dynamic_sidebar( 'footer' ); ?>
		</div>
	</div>
	<div class="md:flex justify-between items-center max-w-8xl p-4 mx-auto border-t border-neutral-300 space-y-2 md:space-y-0 text-neutral-500">
		<div class="footer-copyright text-center md:text-left">
			&copy; <?php echo date_i18n( _x( 'Y', 'copyright date format', 'venus' ) ); ?>
			<a class="uppercase" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
			<?php venus_technical_support(); ?>
			<?php venus_icp(); ?>
		</div>
		<div class="social-media space-x-4 text-center md:text-right">
			<?php venus_social_media(); ?>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
