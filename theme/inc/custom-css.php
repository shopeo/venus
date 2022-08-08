<?php

if ( ! function_exists( 'venus_generate_css' ) ) {
	function venus_generate_css( $selector, $style, $value, $prefix = '', $suffix = '', $display = true ) {
		$return = '';
		if ( ! $value || ! $selector ) {

			return;
		}

		$return = sprintf( '%s { %s: %s; }', $selector, $style, $prefix . $value . $suffix );

		if ( $display ) {
			echo $return;
		}

		return $return;
	}
}

if ( ! function_exists( 'venus_get_customizer_css' ) ) {
	function venus_get_customizer_css( $type = 'front-end' ) {
		ob_start();

		return ob_get_clean();
	}
}
