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
				'wrap'        => '<h1 class="%1$s">%2$s</h1>',
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

		$html = sprintf( $args['wrap'], $classname, $contents );

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

if ( ! function_exists( 'venus_powered_by' ) ) {
	function venus_powered_by( $display = true ) {
		$link = sprintf(
				__( 'Powered by <a target="_blank" href="%s">SHOPEO</a>.', 'venus' ),
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
		$a    = '<a href="%1$s" target="_blank" rel="nofollow">%2$s</a>';
		$i    = '<i class="%s"></i>';
		foreach ( VenusFooterCustomize::$social_media as $media ) {
			$value = get_theme_mod( 'social_media_' . $media['id'] );
			if ( $value ) {
				$icon = sprintf( $i, $media['class'] );
				$link = sprintf( $a, $value, $icon );
				$html .= $link;
			}
		}
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

if ( ! function_exists( 'venus_get_post_meta' ) ) {
	function venus_get_post_meta( $post_id = null, $location = 'single-top' ) {
		if ( ! $post_id ) {
			return;
		}

		$disallowed_post_types = apply_filters( 'venus_disallowed_post_types_for_meta_output', array( 'page' ) );
		if ( in_array( get_post_type( $post_id ), $disallowed_post_types, true ) ) {
			return;
		}
		$post_meta_wrapper_classes = '';
		$post_meta_classes         = '';
		if ( 'single-top' === $location ) {
			$post_meta                 = apply_filters( 'venus_post_meta_location_single_top', array(
					'tags'
			) );
			$post_meta_wrapper_classes = ' post-meta-single post-meta-single-top';
		} elseif ( 'single-bottom' === $location ) {
			$post_meta                 = apply_filters( 'venus_post_meta_location_single_bottom', array(
					'post-date',
					'comments'
			) );
			$post_meta_wrapper_classes = ' post-meta-single post-meta-single-bottom';
		}

		if ( $post_meta && ! in_array( 'empty', $post_meta, true ) ) {
			$has_meta = false;
			global $post;
			$the_post = get_post( $post_id );
			setup_postdata( $the_post );
			ob_start();
			?>
			<div class="post-meta-wrapper<?php echo esc_attr( $post_meta_wrapper_classes ); ?>">
				<ul class="post-meta<?php echo esc_attr( $post_meta_classes ); ?>">
					<?php
					do_action( 'venus_start_of_post_meta_list', $post_id, $post_meta, $location );

					if ( post_type_supports( get_post_type( $post_id ), 'author' ) && in_array( 'author', $post_meta, true ) ) {
						$has_meta = true; ?>
						<li class="post-author meta-wrapper">
							<span class="meta-icon">
								<span class="screen-reader-text"><?php _e( 'Post author', 'venus' ); ?></span>
								<i class="fas fa-user"></i>
							</span>
							<span class="meta-text">
								<?php printf( '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author_meta( 'display_name' ) ) . '</a>' ) ?>
							</span>
						</li>
					<?php }

					if ( in_array( 'post-date', $post_meta, true ) ) {
						$has_meta = true; ?>
						<li class="post-date meta-wrapper">
							<span class="meta-icon">
								<span class="screen-reader-text"><?php _e( 'Post date', 'venus' ); ?></span>
								<i class="fas fa-calendar"></i>
							</span>
							<span class="meta-text">
								<a href="<?php echo esc_url( get_day_link( get_post_time( 'Y' ), get_post_time( 'm' ), get_post_time( 'j' ) ) ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a>
							</span>
						</li>
					<?php }

					if ( in_array( 'categories', $post_meta, true ) && has_category() ) {
						$has_meta = true; ?>
						<li class="post-categories meta-wrapper">
							<span class="meta-icon">
								<span class="screen-reader-text"><?php _e( 'Categories', 'venus' ); ?></span>
								<i class="fas fa-folder"></i>
							</span>
							<span class="meta-text">
								<?php the_category( ', ' ); ?>
							</span>
						</li>
					<?php }

					if ( in_array( 'tags', $post_meta, true ) && has_tag() ) {
						$has_meta = true; ?>
						<li class="post-tags meta-wrapper">
							<span class="meta-icon">
								<span class="screen-reader-text"><?php _e( 'Tags', 'venus' ); ?></span>
								<i class="fas fa-tag"></i>
							</span>
							<span class="meta-text"><?php the_tags( '', '', '' ); ?></span>
						</li>
					<?php }

					if ( in_array( 'comments', $post_meta, true ) && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
						$has_meta = true; ?>
						<li class="post-comment-link meta-wrapper">
							<span class="meta-icon">
								<i class="fas fa-comment"></i>
							</span>
							<span class="meta-text"><?php comments_popup_link(); ?></span>
						</li>
					<?php }

					if ( in_array( 'sticky', $post_meta, true ) && is_sticky() ) {
						$has_meta = true; ?>
						<li class="post-sticky meta-wrapper">
							<span class="meta-icon">
								<i class="fas fa-bookmark"></i>
							</span>
							<span class="meta-text">
								<?php _e( 'Sticky post', 'venus' ); ?>
							</span>
						</li>
					<?php }

					do_action( 'venus_end_of_post_meta_list', $post_id, $post_meta, $location );
					?>
				</ul>
			</div>
			<?php
			wp_reset_postdata();
			$meta_output = ob_get_clean();
			if ( $has_meta && $meta_output ) {
				return $meta_output;
			}
		}
	}
}

if ( ! function_exists( 'venus_the_post_meta' ) ) {
	function venus_the_post_meta( $post_id = null, $location = 'single-top' ) {
		echo venus_get_post_meta( $post_id, $location );
	}
}
