<?php
if ( ! function_exists( 'venus_support' ) ) {
	function venus_support() {
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'custom-background', array(
			'default-color' => 'F5EFE0',
		) );

		global $content_width;
		if ( ! isset( $content_width ) ) {
			$content_width = 640;
		}

		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1200, 9999 );
		add_image_size( 'venus-fullscreen', 1980, 9999 );

		$logo_width  = 120;
		$logo_height = 90;

		if ( get_theme_mod( 'retina_logo', false ) ) {
			$logo_width  = floor( $logo_width * 2 );
			$logo_height = floor( $logo_height * 2 );
		}

		add_theme_support( 'custom-logo', array(
			'height'      => $logo_height,
			'width'       => $logo_width,
			'flex-height' => true,
			'flex-width'  => true,
		) );

		add_theme_support( 'title-tag' );

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
				'navigation-widgets',
			)
		);

		load_theme_textdomain( 'venus' );

		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );

		if ( is_customize_preview() ) {

		}

		add_theme_support( 'customize-selective-refresh-widgets' );
	}
}

add_action( 'after_setup_theme', 'venus_support' );


if ( ! function_exists( 'venus_styles' ) ) {
	function venus_styles() {
		$theme_version = wp_get_theme()->get( 'Version' );
		wp_enqueue_style( 'venus-style', get_stylesheet_uri(), array(), $theme_version );
		wp_style_add_data( 'venus-style', 'rtl', 'replace' );
		// Add print css
		wp_enqueue_style( 'venus-print-style', get_template_directory_uri() . '/print.css', array(), $theme_version, 'print' );
	}
}

add_action( 'wp_enqueue_scripts', 'venus_styles' );


if ( ! function_exists( 'venus_scripts' ) ) {
	function venus_scripts() {
		$theme_version = wp_get_theme()->get( 'Version' );
		wp_enqueue_script( 'venus-script', get_template_directory_uri() . '/assets/js/app.js', array( 'jquery' ), $theme_version );
		wp_script_add_data( 'venus-script', 'async', true );
	}
}
add_action( 'wp_enqueue_scripts', 'venus_scripts' );
