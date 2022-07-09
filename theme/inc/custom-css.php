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
