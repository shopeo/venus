<?php

if ( ! class_exists( 'VenusFooterCustomize' ) ) {
	class VenusFooterCustomize {
		public static function register( $wp_customize ) {
			$wp_customize->add_panel( 'footer', array(
				'title'      => __( 'Footer', 'venus' ),
				'capability' => 'edit_theme_options',
			) );

			$wp_customize->add_section( 'footer_icp_section', array(
				'title'      => __( 'ICP', 'venus' ),
				'capability' => 'edit_theme_options',
				'panel'      => 'footer',
			) );

			$wp_customize->add_setting( 'enable_footer_icp', array(
				'capability'        => 'edit_theme_options',
				'default'           => false,
				'sanitize_callback' => array( VenusCustomize::class, 'sanitize_checkbox' ),
			) );

			$wp_customize->add_control( 'enable_footer_icp', array(
				'type'     => 'checkbox',
				'section'  => 'footer_icp_section',
				'priority' => 10,
				'label'    => __( 'Show icp in footer', 'venus' ),
			) );

			$wp_customize->add_setting( 'footer_icp_text', array(
				'capability' => 'edit_theme_options',
				'transport'  => 'postMessage',
			) );

			$wp_customize->add_control( 'footer_icp_text', array(
				'type'     => 'text',
				'section'  => 'footer_icp_section',
				'priority' => 10,
				'label'    => __( 'ICP in footer', 'venus' ),
			) );

			$wp_customize->selective_refresh->add_partial( 'enable_footer_icp', array(
				'selector' => '#site-footer .icp'
			) );

			$wp_customize->add_section( 'footer_social_media', array() );
		}
	}
}
