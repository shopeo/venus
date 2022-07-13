<?php

if ( ! function_exists( 'venus_site_logo' ) ) {
	function venus_site_logo( $args = array(), $display = true ) {
		$logo       = get_custom_logo();
		$site_title = get_bloginfo( 'name' );
		$contents   = '';
		$classname  = '';

		$defaults = array(
			'logo'        => '%1$s<span class="screen-reader-text">%2$s</span>',
			'logo_class'  => 'site-logo',
			'title'       => '<a href="%1$s">%2$s</a>',
			'title_class' => 'site-title',
			'home_wrap'   => '<h1 class="%1$s">%2$s</h1>',
			'single_wrap' => '<div class="%1$s faux-heading">%2$s</div>',
			'condition'   => ( is_front_page() || is_home() ) && ! is_page(),
		);

		$args = wp_parse_args( $args, $defaults );

		$args = apply_filters( 'venus_site_logo_args', $args, $defaults );

		if ( has_custom_logo() ) {
			$contents  = sprintf( $args['logo'], $logo, esc_html( $site_title ) );
			$classname = $args['logo_class'];
		} else {
			$contents  = sprintf( $args['title'], esc_url( get_home_url( null, '/' ) ), esc_html( $site_title ) );
			$classname = $args['title_class'];
		}

		$wrap = $args['condition'] ? 'home_wrap' : 'single_wrap';

		$html = sprintf( $args[ $wrap ], $classname, $contents );

		$html = apply_filters( 'venus_site_logo', $html, $args, $classname, $contents );

		if ( ! $display ) {
			return $html;
		}

		echo $html;
	}
}

if ( ! function_exists( 'venus_site_description' ) ) {
	function venus_site_description( $display = true ) {
		$description = get_bloginfo( 'description' );

		if ( ! $description ) {
			return;
		}

		$wrapper = '<div class="site-description">%s</div><!-- .site-description -->';

		$html = sprintf( $wrapper, esc_html( $description ) );

		$html = apply_filters( 'venus_site_description', $html, $description, $wrapper );

		if ( ! $display ) {
			return $html;
		}

		echo $html;
	}
}

if ( ! function_exists( 'venus_header_button' ) ) {
	function venus_header_button( $display = true ) {
		$wrapper = '<div class="header-button w-full text-center">%s</div>';
		$a       = '<a class="block bg-primary-500 rounded-full py-1 text-white capitalize hover:bg-primary-600 hover:text-white" href="%1$s">%2$s</a>';
		$link    = sprintf( $a, get_theme_mod( 'header_button_link', '#' ), get_theme_mod( 'header_button_text', __( 'get started', 'venus' ) ) );
		$html    = sprintf( $wrapper, $link );
		if ( ! $display ) {
			return $html;
		}
		echo $html;
	}
}

if ( ! function_exists( 'venus_technical_support' ) ) {
	function venus_technical_support( $display = true ) {
		$link = sprintf(
			__( 'Technical support by <a target="_blank" href="%s">SHOPEO</a>.', 'venus' ),
			'https://www.shopeo.cn/'
		);
		if ( ! $display ) {
			return $link;
		}
		echo $link;
	}
}

if ( ! function_exists( 'venus_icp' ) ) {
	function venus_icp( $display = true ) {
		$enable_footer_icp = get_theme_mod( 'enable_footer_icp', false );
		$icp_text          = get_theme_mod( 'footer_icp_text' );
		if ( $enable_footer_icp === true && $icp_text ) {
			$link = sprintf(
				'<a class="icp" target="_blank" href="%1$s">%2$s</a>',
				'https://beian.miit.gov.cn/',
				$icp_text
			);
			if ( ! $display ) {
				return $link;
			}
			echo $link;
		}
	}
}

if ( ! function_exists( 'venus_social_media' ) ) {
	function venus_social_media( $display = true ) {
		$html = '';

		if ( ! $display ) {
			return $html;
		}
		echo $html;
	}
}

if ( ! function_exists( 'venus_is_comment_by_post_author' ) ) {
	function venus_is_comment_by_post_author( $comment = null ) {

	}
}

if ( ! function_exists( 'venus_filter_comment_reply_link' ) ) {
	function venus_filter_comment_reply_link( $link ) {

	}
}

add_filter( 'comment_reply_link', 'venus_filter_comment_reply_link' );

if ( ! function_exists( 'venus_unique_id' ) ) {
	function venus_unique_id( $prefix = '' ) {
		static $id_counter = 0;
		if ( function_exists( 'wp_unique_id' ) ) {
			return wp_unique_id( $prefix );
		}

		return $prefix . (string) ++ $id_counter;
	}
}
