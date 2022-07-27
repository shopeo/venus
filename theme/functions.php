<?php
if ( ! function_exists( 'venus_support' ) ) {
	function venus_support() {
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'custom-background', array(
				'default-color' => '#ffffff',
		) );

		global $content_width;
		if ( ! isset( $content_width ) ) {
			$content_width = 640;
		}

		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1200, 9999 );
		add_image_size( 'venus-fullscreen', 1980, 9999 );

		$logo_width  = 160;
		$logo_height = 30;

		if ( get_theme_mod( 'retina_logo', false ) ) {
			$logo_width  = floor( $logo_width * 2 );
			$logo_height = floor( $logo_height * 2 );
		}

		add_theme_support( 'custom-logo', array(
				'height'      => $logo_height,
				'width'       => $logo_width,
				'flex-height' => true,
				'flex-width'  => true,
		) );

		add_theme_support( 'title-tag' );

		add_theme_support(
				'html5',
				array(
						'search-form',
						'comment-form',
						'comment-list',
						'gallery',
						'caption',
						'script',
						'style',
						'navigation-widgets',
				)
		);

		load_theme_textdomain( 'venus', get_template_directory() . '/languages' );

		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );

		if ( is_customize_preview() ) {

		}

		add_theme_support( 'customize-selective-refresh-widgets' );

		$loader = new VenusScriptLoader();
		add_filter( 'script_loader_tag', array( $loader, 'filter_script_loader_tag' ), 10, 2 );
	}
}

add_action( 'after_setup_theme', 'venus_support' );

require_once get_template_directory() . '/inc/template-tags.php';
require_once get_template_directory() . '/classes/VenusColorsCustomize.class.php';
require_once get_template_directory() . '/classes/VenusFooterCustomize.class.php';
require_once get_template_directory() . '/classes/VenusCustomize.class.php';
require_once get_template_directory() . '/classes/VenusSeparatorControl.class.php';
require_once get_template_directory() . '/classes/VenusWalkerComment.class.php';
require_once get_template_directory() . '/classes/VenusWalkerPage.class.php';
require_once get_template_directory() . '/classes/VenusScriptLoader.class.php';
require_once get_template_directory() . '/classes/VenusNonLatinLanguages.class.php';
require_once get_template_directory() . '/inc/custom-css.php';
require_once get_template_directory() . '/inc/block-patterns.php';

if ( ! function_exists( 'venus_styles' ) ) {
	function venus_styles() {
		$theme_version = wp_get_theme()->get( 'Version' );
		wp_enqueue_style( 'venus-style', get_stylesheet_uri(), array(), $theme_version );
		wp_style_add_data( 'venus-style', 'rtl', 'replace' );
		wp_add_inline_style( 'venus-style', venus_get_customizer_css( 'front-end' ) );
		// Add print css
		wp_enqueue_style( 'venus-print-style', get_template_directory_uri() . '/print.css', array(), $theme_version, 'print' );
	}
}

add_action( 'wp_enqueue_scripts', 'venus_styles' );

if ( ! function_exists( 'venus_scripts' ) ) {
	function venus_scripts() {
		$theme_version = wp_get_theme()->get( 'Version' );
		if ( ( ! is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		wp_enqueue_script( 'venus-script', get_template_directory_uri() . '/assets/js/app.js', array( 'jquery' ), $theme_version );
		wp_script_add_data( 'venus-script', 'async', true );
	}
}

add_action( 'wp_enqueue_scripts', 'venus_scripts' );

if ( ! function_exists( 'venus_skip_link_focus_fix' ) ) {
	function venus_skip_link_focus_fix() {
		?>
		<script>
			/(trident|msie)/i.test(navigator.userAgent) && document.getElementById && window.addEventListener && window.addEventListener("hashchange", function () {
				var t, e = location.hash.substring(1);
				/^[A-z0-9_-]+$/.test(e) && (t = document.getElementById(e)) && (/^(?:a|select|input|button|textarea)$/i.test(t.tagName) || (t.tabIndex = -1), t.focus())
			}, !1);
		</script>
		<?php
	}
}

add_action( 'wp_print_footer_scripts', 'venus_skip_link_focus_fix' );

if ( ! function_exists( 'venus_non_latin_languages' ) ) {
	function venus_non_latin_languages() {
		$custom_css = VenusNonLatinLanguages::get_non_latin_css( 'front-end' );

		if ( $custom_css ) {
			wp_add_inline_style( 'venus-style', $custom_css );
		}
	}
}

add_action( 'wp_enqueue_scripts', 'venus_non_latin_languages' );

if ( ! function_exists( 'venus_menus' ) ) {
	function venus_menus() {
		$locations = array(
				'primary' => __( 'Primary Menu', 'venus' )
		);
		register_nav_menus( $locations );
	}
}

add_action( 'init', 'venus_menus' );

if ( ! function_exists( 'venus_get_custom_logo' ) ) {
	function venus_get_custom_logo( $html ) {
		$logo_id = get_theme_mod( 'custom_logo' );
		if ( ! $logo_id ) {
			return $html;
		}
		$logo = wp_get_attachment_image_src( $logo_id, 'full' );
		if ( $logo ) {
			$logo_width  = esc_attr( $logo[1] );
			$logo_height = esc_attr( $logo[2] );

			if ( get_theme_mod( 'retina_logo', false ) ) {
				$logo_width  = floor( $logo_width / 2 );
				$logo_height = floor( $logo_height / 2 );
				$search      = array(
						'/width=\"\d+\"/iU',
						'/height=\"\d+\"/iU',
				);

				$replace = array(
						"width=\"{$logo_width}\"",
						"height=\"{$logo_height}\"",
				);

				if ( strpos( $html, ' style=' ) === false ) {
					$search[]  = '/(src=)/';
					$replace[] = "style=\"height: {$logo_height}px;\" src=";
				} else {
					$search[]  = '/(style="[^"]*)/';
					$replace[] = "$1 height: {$logo_height}px;";
				}

				$html = preg_replace( $search, $replace, $html );
			}
		}

		return $html;
	}
}

add_filter( 'get_custom_logo', 'venus_get_custom_logo' );

if ( ! function_exists( 'wp_body_open' ) ) {
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

if ( ! function_exists( 'venus_customize_controls_enqueue_scripts' ) ) {
	function venus_customize_controls_enqueue_scripts() {
		$theme_version = wp_get_theme()->get( 'Version' );
		wp_enqueue_script( 'venus-customize', get_template_directory_uri() . '/assets/js/customize.js', array( 'jquery' ), $theme_version, false );
		wp_enqueue_script( 'venus-color-calculations', get_template_directory_uri() . '/assets/js/color-calculations.js', array( 'wp-color-picker' ), $theme_version, false );
		wp_enqueue_script( 'venus-customize-controls', get_template_directory_uri() . '/assets/js/customize-controls.js', array(
				'venus-color-calculations',
				'customize-controls',
				'underscore',
				'jquery'
		), $theme_version, false );
	}
}

add_action( 'customize_controls_enqueue_scripts', 'venus_customize_controls_enqueue_scripts' );

if ( ! function_exists( 'venus_customize_preview_init' ) ) {
	function venus_customize_preview_init() {
		$theme_version = wp_get_theme()->get( 'Version' );
		wp_enqueue_script( 'venus-customize-preview', get_theme_file_uri( '/assets/js/customize-preview.js' ), array(
				'customize-preview',
				'customize-selective-refresh',
				'jquery'
		), $theme_version, true );
		wp_add_inline_script( 'venus-customize-preview',
				sprintf(
						'wp.customize.selectiveRefresh.partialConstructor[ %1$s ].prototype.attrs = %2$s;',
						wp_json_encode( 'cover_opacity' ),
						wp_json_encode( venus_customize_opacity_range() )
				)
		);
	}
}

add_action( 'customize_preview_init', 'venus_customize_preview_init' );

if ( ! function_exists( 'venus_head' ) ) {
	function venus_head() {
		?>
		<style>
			:root {
				--primary-color-50: <?php echo get_theme_mod('primary_color_50','#B2CBFB');?>;
				--primary-color-100: <?php echo get_theme_mod('primary_color_100','#9EBDFA');?>;
				--primary-color-200: <?php echo get_theme_mod('primary_color_200','#77A3F8');?>;
				--primary-color-300: <?php echo get_theme_mod('primary_color_300','#5189F6');?>;
				--primary-color-400: <?php echo get_theme_mod('primary_color_400','#2A6EF4');?>;
				--primary-color-500: <?php echo get_theme_mod('primary_color_500','#0C57E9');?>;
				--primary-color-600: <?php echo get_theme_mod('primary_color_600','#0943B4');?>;
				--primary-color-700: <?php echo get_theme_mod('primary_color_700','#072F7E');?>;
				--primary-color-800: <?php echo get_theme_mod('primary_color_800','#041B49');?>;
				--primary-color-900: <?php echo get_theme_mod('primary_color_900','#010714');?>;
			}
		</style>
		<?php
	}
}

add_action( 'wp_head', 'venus_head' );

if ( ! function_exists( 'venus_register_sidebars' ) ) {
	function venus_register_sidebars() {
		register_sidebar( array(
				'id'            => 'primary',
				'name'          => __( 'Primary Sidebar', 'venus' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>'
		) );
		register_sidebar( array(
				'id'            => 'footer',
				'name'          => __( 'Footer Sidebar', 'venus' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>'
		) );
	}
}

add_action( 'widgets_init', 'venus_register_sidebars' );

if ( ! function_exists( 'venus_block_editor_styles' ) ) {
	function venus_block_editor_styles() {
		wp_enqueue_style( 'venus-block-editor-styles', get_theme_file_uri( '/assets/css/editor-block.css' ), array(), wp_get_theme()->get( 'Version' ), 'all' );
		wp_style_add_data( 'venus-block-editor-styles', 'rtl', 'replace' );

		wp_add_inline_style( 'venus-block-editor-styles', venus_get_customizer_css( 'block-editor' ) );
		wp_add_inline_style( 'venus-block-editor-styles', VenusNonLatinLanguages::get_non_latin_css( 'block-editor' ) );
		wp_enqueue_script( 'venus-block-editor-script', get_theme_file_uri( '/assets/js/editor-script-block.js' ), array(
				'wp-blocks',
				'wp-dom'
		), wp_get_theme()->get( 'Version' ), true );
	}
}

add_action( 'enqueue_block_editor_assets', 'venus_block_editor_styles', 1, 1 );

if ( ! function_exists( 'venus_classic_editor_styles' ) ) {
	function venus_classic_editor_styles() {
		$classic_editor_styles = array(
				'/assets/css/editor-classic.css',
		);

		add_editor_style( $classic_editor_styles );
	}
}

add_action( 'init', 'venus_classic_editor_styles' );

if ( ! function_exists( 'venus_add_classic_editor_customizer_styles' ) ) {
	function venus_add_classic_editor_customizer_styles( $mce_init ) {
		$styles = venus_get_customizer_css( 'classic-editor' );

		if ( ! isset( $mce_init['content_style'] ) ) {
			$mce_init['content_style'] = $styles . ' ';
		} else {
			$mce_init['content_style'] .= ' ' . $styles . ' ';
		}

		return $mce_init;
	}
}

add_filter( 'tiny_mce_before_init', 'venus_add_classic_editor_customizer_styles' );

if ( ! function_exists( 'venus_add_classic_editor_non_latin_styles' ) ) {
	function venus_add_classic_editor_non_latin_styles( $mce_init ) {
		$styles = VenusNonLatinLanguages::get_non_latin_css( 'classic-editor' );

		if ( ! $styles ) {
			return $mce_init;
		}

		if ( ! isset( $mce_init['content_style'] ) ) {
			$mce_init['content_style'] = $styles . ' ';
		} else {
			$mce_init['content_style'] .= ' ' . $styles . ' ';
		}

		return $mce_init;
	}
}

add_filter( 'tiny_mce_before_init', 'venus_add_classic_editor_non_latin_styles' );

if ( ! function_exists( 'venus_posts_per_page' ) ) {
	function venus_posts_per_page( $query ) {
		if ( ! is_admin() ) {
			if ( $query->is_search ) {
				$query->set( 'post_type', 'post' );
			}
			$query->set( 'ignore_sticky_posts', 1 );
		}
	}
}

add_action( 'pre_get_posts', 'venus_posts_per_page' );

if ( ! function_exists( 'venus_custom_excerpt_length' ) ) {
	function venus_custom_excerpt_length( $length ) {
		return 230;
	}
}

add_filter( 'excerpt_length', 'venus_custom_excerpt_length', 999 );

if ( ! function_exists( 'venus_excerpt_more' ) ) {
	function venus_custom_excerpt_more( $more ) {
		if ( ! is_single() ) {
			$more = sprintf( '<a class="read-more" href="%1$s">%2$s</a>', get_permalink( get_the_ID() ), __( '...', 'venus' ) );
		}

		return $more;
	}
}

add_filter( 'excerpt_more', 'venus_custom_excerpt_more' );
