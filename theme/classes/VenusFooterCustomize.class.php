<?php

if ( ! class_exists( 'VenusFooterCustomize' ) ) {
	class VenusFooterCustomize {
		public static $social_media = array(
			array( 'id' => 'telegram', 'name' => 'Telegram', 'class' => 'fab fa-telegram' ),
			array( 'id' => 'twitter', 'name' => 'Twitter', 'class' => 'fab fa-twitter' ),
			array( 'id' => 'facebook', 'name' => 'Facebook', 'class' => 'fab fa-facebook' ),
			array( 'id' => 'messenger', 'name' => 'Facebook Messenger', 'class' => 'fab fa-facebook-messenger' ),
			array( 'id' => 'instagram', 'name' => 'Instagram', 'class' => 'fab fa-instagram' ),
			array( 'id' => 'pinterest', 'name' => 'Pinterest', 'class' => 'fab fa-pinterest' ),
			array( 'id' => 'youtube', 'name' => 'Youtube', 'class' => 'fab fa-youtube' ),
			array( 'id' => 'product_hunt', 'name' => 'Product Hunt', 'class' => 'fab fa-product-hunt' ),
			array( 'id' => 'whatsapp', 'name' => 'Whatsapp', 'class' => 'fab fa-whatsapp' ),
			array( 'id' => 'reddit', 'name' => 'Reddit', 'class' => 'fab fa-reddit' ),
			array( 'id' => 'slack', 'name' => 'Slack', 'class' => 'fab fa-slack' ),
			array( 'id' => 'discord', 'name' => 'Discord', 'class' => 'fab fa-discord' ),
			array( 'id' => 'patreon', 'name' => 'Patreon', 'class' => 'fab fa-patreon' ),
			array( 'id' => 'tiktok', 'name' => 'TikTok', 'class' => 'fab fa-tiktok' ),
			array( 'id' => 'linkedin', 'name' => 'Linkedin', 'class' => 'fab fa-linkedin' ),
			array( 'id' => 'medium', 'name' => 'Medium', 'class' => 'fab fa-medium' ),
			array( 'id' => 'flipboard', 'name' => 'Flipboard', 'class' => 'fab fa-flipboard' ),
			array( 'id' => 'hashnode', 'name' => 'Hashnode', 'class' => 'fab fa-hashnode' ),
			array( 'id' => 'weibo', 'name' => 'Weibo', 'class' => 'fab fa-weibo' ),
			array( 'id' => 'zhihu', 'name' => 'Zhihu', 'class' => 'fab fa-zhihu' ),
			array( 'id' => 'weixin', 'name' => 'Weixin', 'class' => 'fab fa-weixin' ),
			array( 'id' => 'qq', 'name' => 'QQ', 'class' => 'fab fa-qq' ),
			array( 'id' => 'rss', 'name' => 'RSS', 'class' => 'fas fa-rss' ),
		);

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

			$wp_customize->add_section( 'footer_social_media', array(
				'title'      => __( 'Social Media', 'venus' ),
				'capability' => 'edit_theme_options',
				'panel'      => 'footer',
				'priority'   => 10,
			) );

			foreach ( VenusFooterCustomize::$social_media as $media ) {
				$wp_customize->add_setting( 'social_media_' . $media['id'], array(
					'capability' => 'edit_theme_options',
				) );

				$wp_customize->add_control( 'social_media_' . $media['id'], array(
					'type'    => 'text',
					'section' => 'footer_social_media',
					'label'   => __( $media['name'], 'venus' ),
				) );
			}

			$wp_customize->selective_refresh->add_partial( 'social_media_telegram', array(
				'selector' => '#site-footer .social-media'
			) );
		}
	}
}
