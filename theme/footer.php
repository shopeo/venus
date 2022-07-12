<footer id="site-footer" class="bg-neutral-700 text-white">
	<div class="max-w-8xl p-4 mx-auto">
		Hello World
	</div>
	<div class="max-w-8xl p-4 mx-auto border-t border-neutral-500">
		<div class="footer-copyright">
			&copy; <?php echo date_i18n( _x( 'Y', 'copyright date format', 'venus' ) ); ?>
			<a class="uppercase" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
