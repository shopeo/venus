<?php
if ( ! function_exists( 'venus_support' ) ) {
	function venus_support() {
		add_theme_support( 'automatic-feed-links' );

	}
}

add_action( 'after_setup_theme', 'venus_support' );


if ( ! function_exists( 'venus_styles' ) ) {
	function venus_styles() {
		$theme_version  = wp_get_theme()->get( 'Version' );
		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_register_style( 'venus-style', get_template_directory_uri() . '/style.css', array(), $version_string );
		wp_enqueue_style( 'venus-style' );
	}
}

add_action( 'wp_enqueue_scripts', 'venus_styles' );


if ( ! function_exists( 'venus_scripts' ) ) {
	function venus_scripts() {
		$theme_version  = wp_get_theme()->get( 'Version' );
		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_register_script( 'venus-script', get_template_directory_uri() . '/assets/js/app.js', array(), $version_string );
		wp_enqueue_script( 'venus-script' );
		wp_script_add_data( 'venus-script', 'async', true );
	}
}
add_action( 'wp_enqueue_scripts', 'venus_scripts' );

require get_template_directory() . '/inc/block-patterns.php';
