<?php
if ( ! function_exists( 'venus_support' ) ) {
	function venus_support() {
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );

		load_theme_textdomain( 'venus' );
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
		wp_enqueue_script( 'venus-script', get_template_directory_uri() . '/assets/js/app.js', array(), $theme_version );
		wp_script_add_data( 'venus-script', 'async', true );
	}
}
add_action( 'wp_enqueue_scripts', 'venus_scripts' );
