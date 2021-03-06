<?php
/**
 * WPBoot3 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WPBoot3
 */

if ( ! function_exists( 'WPBoot3_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function WPBoot3_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on WPBoot3, use a find and replace
		 * to change 'WPBoot3' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'WPBoot3', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'WPBoot3' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'WPBoot3' ), // added
			'social-media-menu' => esc_html__( 'Social Media Menu', 'WPBoot3' ), // added
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'WPBoot3_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'WPBoot3_setup' );

/**
 * Register custom fonts.
 * 
 * @NOTE: Borrowed from TwentySeventeen
 */
function WPBoot3_fonts_url() {
	$fonts_url = '';

	/**
	 * Translators: If there are characters in your language that are not
	 * supported by Source Sans Pro and PT Serif, set these to 'off'. Do not translate
	 * into your own language.
	 */
	$source_sans_pro = _x( 'on', 'Source Sans Pro font: on or off', 'WPBoot3' );
	$pt_serif = _x( 'on', 'PT Serif font: on or off', 'WPBoot3' );

	$font_families = array();
	
	if ( 'off' !== $source_sans_pro ) {
		$font_families[] = 'Source Sans Pro:400,400i,700,900';
	}
	
	if ( 'off' !== $pt_serif ) {
		$font_families[] = 'PT Serif:400,400i,700,700i';
	}
	
	// construct a single URL for all the fonts
	if ( in_array( 'on', array($source_sans_pro, $pt_serif) ) ) {

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @NOTE: Borrowed from TwentySeventeen
 *
 * Improves font download speed by keeping a port open to https://fonts.gstatic.com
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function WPBoot3_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'wpboot3-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'WPBoot3_resource_hints', 10, 2 );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function WPBoot3_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'WPBoot3_content_width', 640 );
}
add_action( 'after_setup_theme', 'WPBoot3_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function WPBoot3_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'WPBoot3' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'WPBoot3' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Left', 'WPBoot3' ),
		'id'            => 'sidebar-left',
		'description'   => esc_html__( 'Add widgets here.', 'WPBoot3' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'WPBoot3_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function WPBoot3_scripts() {
/**
 * @TODO: 
 * > sort the naming convention for the WP handle
 * > add conditional logic for potentially non-existant '...-libs.js' and '...-footer.js'
 */	
	wp_enqueue_style( 'WPBoot3-style', get_stylesheet_uri() );

	wp_enqueue_style( 'wpboot3-fonts' , WPBoot3_fonts_url() );

    wp_enqueue_style( 'wpboot3-libs-style', get_template_directory_uri() . '/assets/css/wpboot3-libs-style.css', array(), false, 'all' );

    wp_enqueue_style( 'wpboot3-theme-style', get_template_directory_uri() . '/assets/css/wpboot3-theme-style.css', array(), false, 'all' );

    wp_enqueue_script( 'wpboot3-libs', get_template_directory_uri() . '/assets/js/wpboot3-libs.js', array('jquery'), '', false );

    wp_enqueue_script( 'wpboot3-header', get_template_directory_uri() . '/assets/js/wpboot3-header.js', array('jquery'), '', false );

    wp_enqueue_script( 'wpboot3-footer', get_template_directory_uri() . '/assets/js/wpboot3-footer.js', array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'WPBoot3_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Load Custom Navigation Walker for Bootstrap
 */
require get_template_directory() . '/inc/wp-bootstrap-navwalker.php';

/**
 * Load Custom Theme-related functions
 */
require get_template_directory() . '/inc/custom-theme.php';

/**
 * Load Comments Callback
 */
require get_template_directory() . '/inc/comments-callback.php';