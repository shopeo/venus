<?php

if ( ! class_exists( 'VenusBlogCustomize' ) ) {
	class VenusBlogCustomize {
		public static function register( $wp_customize ) {
			$wp_customize->selective_refresh->add_partial( 'blog_title', array(
				'selector' => '#site-content .archive-header .archive-title'
			) );

			$wp_customize->selective_refresh->add_partial( 'blog_slogan', array(
				'selector' => '#site-content .archive-header .archive-subtitle'
			) );

			$wp_customize->add_section( 'blog', array(
				'title'      => __( 'Blog', 'venus' ),
				'capability' => 'edit_theme_options',

			) );

			$wp_customize->add_setting( 'blog_title', array(
				'capability' => 'edit_theme_options',
				'transport'  => 'postMessage',
				'default'    => get_bloginfo( 'name' ),
			) );
			$wp_customize->add_control( 'blog_title', array(
				'type'     => 'text',
				'section'  => 'blog',
				'priority' => 10,
				'label'    => __( 'Blog Title', 'venus' )
			) );

			$wp_customize->add_setting( 'blog_slogan', array(
				'capability' => 'edit_theme_options',
				'transport'  => 'postMessage',
				'default'    => venus_site_description( false ),
			) );
			$wp_customize->add_control( 'blog_slogan', array(
				'type'     => 'text',
				'section'  => 'blog',
				'priority' => 10,
				'label'    => __( 'Blog Slogan', 'venus' )
			) );
		}
	}
}
