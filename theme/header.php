<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header id="site-header" class="bg-white">
	<div class="flex  max-w-8xl p-4 mx-auto space-x-10">
		<div class="flex-none">
			<?php venus_site_logo(); ?>
		</div>
		<?php if ( has_nav_menu( 'primary' ) ) {
			wp_nav_menu( array(
					'container_class' => 'hidden md:block grow',
					'menu_class'      => 'primary-menu flex space-x-10',
					'theme_location'  => 'primary',
					'depth'           => 2
			) );
		} ?>
		<div class="hidden md:block flex-none">
			<?php get_search_form(); ?>
		</div>
	</div>
</header>
