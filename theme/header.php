<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header x-data="{ mobile_menu_open: false}" id="site-header" class="bg-white border-t-4 border-primary-500">
	<div class="flex justify-between items-center max-w-8xl p-4 mx-auto">
		<div class="flex-none">
			<?php venus_site_logo(); ?>
		</div>
		<?php if ( has_nav_menu( 'primary' ) ) {
			wp_nav_menu( array(
					'container_class' => 'hidden md:block menu',
					'menu_class'      => 'primary-menu flex space-x-10',
					'theme_location'  => 'primary',
					'depth'           => 2
			) );
		} ?>
		<?php
		$enable_header_search = get_theme_mod( 'enable_header_search', true );
		$enable_header_button = get_theme_mod( 'enable_header_button', true );
		if ( $enable_header_search || $enable_header_button ) { ?>
			<div class="hidden md:flex space-x-4">
				<?php
				if ( $enable_header_search === true ) {
					get_search_form();
				}
				?>
				<?php
				$header_button_text = get_theme_mod( 'header_button_text', __( 'get started', 'venus' ) );
				if ( $enable_header_button === true && $header_button_text ) {
					venus_header_button();
				} ?>
			</div>
		<?php } ?>
		<div class="md:hidden">
			<div @click="mobile_menu_open =! mobile_menu_open">
				<span class="sr-only"><?php _e( 'Open menu', 'venus' ); ?></span>
				<i class="fas fa-bars"></i>
			</div>
		</div>
	</div>
	<div x-show="mobile_menu_open" x-transition @click.away="mobile_menu_open = false"
		 class="md:hidden max-w-8xl p-4 border-t-2 border-neutral-200 mx-auto space-y-4">
		<?php if ( has_nav_menu( 'primary' ) ) {
			wp_nav_menu( array(
					'container_class' => 'menu',
					'menu_class'      => 'primary-menu-mobile space-y-2',
					'theme_location'  => 'primary',
					'depth'           => 2
			) );
		} ?>
		<?php
		$enable_header_search = get_theme_mod( 'enable_header_search', true );
		$enable_header_button = get_theme_mod( 'enable_header_button', true );
		if ( $enable_header_search || $enable_header_button ) { ?>
			<div class="space-y-4">
				<?php
				if ( $enable_header_search === true ) {
					get_search_form();
				}
				?>
				<?php
				$header_button_text = get_theme_mod( 'header_button_text', __( 'get started', 'venus' ) );
				if ( $enable_header_button === true && $header_button_text ) {
					venus_header_button();
				} ?>
			</div>
		<?php } ?>
	</div>
</header>
