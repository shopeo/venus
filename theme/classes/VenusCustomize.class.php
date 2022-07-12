<?php

if ( ! class_exists( 'VenusCustomize' ) ) {
	class VenusCustomize {
		public static function register( $wp_customize ) {
			$wp_customize->selective_refresh->add_partial( 'custom_logo', array(
				'selector'            => '.site-logo',
				'render_callback'     => 'venus_customize_partial_site_logo',
				'container_inclusive' => true,
			) );

			$wp_customize->selective_refresh->add_partial( 'retina_logo', array(
				'selector'        => '.site-logo',
				'render_callback' => 'venus_customize_partial_site_logo',
			) );

			$wp_customize->selective_refresh->add_partial( 'enable_header_search', array(
				'selector' => '#site-header .search-form'
			) );

			$wp_customize->selective_refresh->add_partial( 'enable_header_button', array(
				'selector' => '#site-header .header-button'
			) );

			$wp_customize->add_setting( 'retina_logo', array(
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => array( __CLASS__, 'sanitize_checkbox' ),
				'transport'         => 'postMessage',
			) );

			$wp_customize->add_control( 'retina_logo', array(
				'type'        => 'checkbox',
				'section'     => 'title_tagline',
				'priority'    => 10,
				'label'       => __( 'Retina logo', 'venus' ),
				'description' => __( 'Scales the logo to half its uploaded size, making it sharp on high-res screens.', 'venus' ),
			) );

			/**
			 * Colors
			 */
			VenusColorsCustomize::register( $wp_customize );

			/**
			 * Header Options
			 */
			$wp_customize->add_section( 'header', array(
				'title'      => __( 'Header', 'venus' ),
				'priority'   => 80,
				'capability' => 'edit_theme_options',
			) );

			$wp_customize->add_setting( 'enable_header_search', array(
				'capability'        => 'edit_theme_options',
				'default'           => true,
				'sanitize_callback' => array( __CLASS__, 'sanitize_checkbox' ),
			) );

			$wp_customize->add_control( 'enable_header_search', array(
				'type'     => 'checkbox',
				'section'  => 'header',
				'priority' => 10,
				'label'    => __( 'Show search in header', 'venus' ),
			) );

			$wp_customize->add_setting( 'enable_header_button', array(
				'capability'        => 'edit_theme_options',
				'default'           => true,
				'sanitize_callback' => array( __CLASS__, 'sanitize_checkbox' ),
			) );

			$wp_customize->add_control( 'enable_header_button', array(
				'type'     => 'checkbox',
				'section'  => 'header',
				'priority' => 10,
				'label'    => __( 'Show button in header', 'venus' ),
			) );

			$wp_customize->add_setting( 'header_button_text', array(
				'capability' => 'edit_theme_options',
				'default'    => __( 'get started', 'venus' ),
			) );

			$wp_customize->add_control( 'header_button_text', array(
				'type'     => 'text',
				'section'  => 'header',
				'priority' => 10,
				'label'    => __( 'Button text in header', 'venus' ),
			) );

			$wp_customize->add_setting( 'header_button_link', array(
				'capability' => 'edit_theme_options',
				'default'    => '#',
			) );

			$wp_customize->add_control( 'header_button_link', array(
				'type'     => 'url',
				'section'  => 'header',
				'priority' => 10,
				'label'    => __( 'Button link in header', 'venus' ),
			) );
		}

		public static function sanitize_accent_accessible_colors( $value ) {
			$value = is_array( $value ) ? $value : array();

			// Loop values.
			foreach ( $value as $area => $values ) {
				foreach ( $values as $context => $color_val ) {
					$value[ $area ][ $context ] = sanitize_hex_color( $color_val );
				}
			}

			return $value;
		}

		public static function sanitize_select( $input, $setting ) {
			$input   = sanitize_key( $input );
			$choices = $setting->manager->get_control( $setting->id )->choices;

			return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
		}

		public static function sanitize_checkbox( $checked ) {
			return ( ( isset( $checked ) && true === $checked ) ? true : false );
		}
	}

	add_action( 'customize_register', array( 'VenusCustomize', 'register' ) );
}

if ( ! function_exists( 'venus_customize_partial_site_logo' ) ) {
	function venus_customize_partial_site_logo() {
		venus_site_logo();
	}
}

if ( ! function_exists( 'venus_customize_opacity_range' ) ) {
	function venus_customize_opacity_range() {
		return apply_filters(
			'venus_customize_opacity_range',
			array(
				'min'  => 0,
				'max'  => 90,
				'step' => 5,
			)
		);
	}
}
