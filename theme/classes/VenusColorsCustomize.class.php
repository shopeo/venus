<?php

if ( ! class_exists( 'VenusColorsCustomize' ) ) {
	class VenusColorsCustomize {
		public static function register( $wp_customize ) {
			$wp_customize->add_setting(
				'primary_color_50',
				array(
					'default'           => '#B2CBFB',
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
					'default'           => '#9EBDFA',
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
					'default'           => '#77A3F8',
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
					'default'           => '#5189F6',
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
					'default'           => '#2A6EF4',
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
					'default'           => '#0C57E9',
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
					'default'           => '#0943B4',
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
					'default'           => '#072F7E',
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
					'default'           => '#041B49',
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
					'default'           => '#010714',
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
