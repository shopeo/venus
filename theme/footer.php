<footer id="site-footer" class="bg-neutral-700 text-white">
	<div class="max-w-8xl p-4 mx-auto">
		Hello World
	</div>
	<div class="md:flex justify-between items-center max-w-8xl p-4 mx-auto border-t border-neutral-500 space-y-2 md:space-y-0">
		<div class="footer-copyright">
			&copy; <?php echo date_i18n( _x( 'Y', 'copyright date format', 'venus' ) ); ?>
			<a class="uppercase" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
			<?php venus_technical_support(); ?>
			<?php venus_icp(); ?>
		</div>
		<div class="space-x-4">
			<a href="#" target="_blank" rel="nofollow"><i class="fab fa-telegram"></i></a>
			<a href="#" target="_blank" rel="nofollow"><i class="fab fa-twitter"></i></a>
			<a href="#" target="_blank" rel="nofollow"><i class="fab fa-facebook"></i></a>
			<a href="#" target="_blank" rel="nofollow"><i class="fab fa-instagram"></i></a>
			<a href="#" target="_blank" rel="nofollow"><i class="fab fa-pinterest"></i></a>
			<a href="#" target="_blank" rel="nofollow"><i class="fab fa-youtube"></i></a>
			<a href="#" target="_blank" rel="nofollow"><i class="fab fa-product-hunt"></i></a>
			<a href="#" target="_blank" rel="nofollow"><i class="fab fa-whatsapp"></i></a>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
