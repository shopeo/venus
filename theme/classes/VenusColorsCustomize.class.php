<?php

if ( ! class_exists( 'VenusColorsCustomize' ) ) {
	class VenusColorsCustomize {
		public static function register( $wp_customize ) {
			$wp_customize->add_setting(
				'primary_color_50',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => '#F0F4FE',
					'sanitize_callback' => 'sanitize_hex_color',
					'transport'         => 'postMessage',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'primary_color_50',
					array(
						'label'   => __( 'Primary Color 50', 'venus' ),
						'section' => 'colors',
					)
				)
			);

			$wp_customize->add_setting(
				'primary_color_100',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => '#DDE6FC',
					'sanitize_callback' => 'sanitize_hex_color',
					'transport'         => 'postMessage',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'primary_color_100',
					array(
						'label'   => __( 'Primary Color 100', 'venus' ),
						'section' => 'colors',
					)
				)
			);

			$wp_customize->add_setting(
				'primary_color_200',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => '#C2D3FB',
					'sanitize_callback' => 'sanitize_hex_color',
					'transport'         => 'postMessage',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'primary_color_200',
					array(
						'label'   => __( 'Primary Color 200', 'venus' ),
						'section' => 'colors',
					)
				)
			);

			$wp_customize->add_setting(
				'primary_color_300',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => '#98B8F8',
					'sanitize_callback' => 'sanitize_hex_color',
					'transport'         => 'postMessage',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'primary_color_300',
					array(
						'label'   => __( 'Primary Color 300', 'venus' ),
						'section' => 'colors',
					)
				)
			);

			$wp_customize->add_setting(
				'primary_color_400',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => '#6793F3',
					'sanitize_callback' => 'sanitize_hex_color',
					'transport'         => 'postMessage',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'primary_color_400',
					array(
						'label'   => __( 'Primary Color 400', 'venus' ),
						'section' => 'colors',
					)
				)
			);

			$wp_customize->add_setting(
				'primary_color_500',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => '#3662EC',
					'sanitize_callback' => 'sanitize_hex_color',
					'transport'         => 'postMessage',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'primary_color_500',
					array(
						'label'   => __( 'Primary Color 500', 'venus' ),
						'section' => 'colors',
					)
				)
			);

			$wp_customize->add_setting(
				'primary_color_600',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => '#2E4DE2',
					'sanitize_callback' => 'sanitize_hex_color',
					'transport'         => 'postMessage',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'primary_color_600',
					array(
						'label'   => __( 'Primary Color 600', 'venus' ),
						'section' => 'colors',
					)
				)
			);

			$wp_customize->add_setting(
				'primary_color_700',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => '#263BCF',
					'sanitize_callback' => 'sanitize_hex_color',
					'transport'         => 'postMessage',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'primary_color_700',
					array(
						'label'   => __( 'Primary Color 700', 'venus' ),
						'section' => 'colors',
					)
				)
			);

			$wp_customize->add_setting(
				'primary_color_800',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => '#2532A8',
					'sanitize_callback' => 'sanitize_hex_color',
					'transport'         => 'postMessage',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'primary_color_800',
					array(
						'label'   => __( 'Primary Color 800', 'venus' ),
						'section' => 'colors',
					)
				)
			);

			$wp_customize->add_setting(
				'primary_color_900',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => '#232E85',
					'sanitize_callback' => 'sanitize_hex_color',
					'transport'         => 'postMessage',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'primary_color_900',
					array(
						'label'   => __( 'Primary Color 900', 'venus' ),
						'section' => 'colors',
					)
				)
			);
		}
	}
}
