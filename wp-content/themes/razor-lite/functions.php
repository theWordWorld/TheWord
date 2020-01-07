<?php
/**
 * Theme functions and definitions
 *
 * @package Razor Lite
 */

if ( ! function_exists( 'razor_lite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function razor_lite_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Razor Lite, use a find and replace
	 * to change 'razor-lite' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'razor-lite', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Add custom stylesheet file (includes custom font) to the TinyMCE editor
	add_editor_style( array( 'editor-style.css', razor_lite_fonts_url() ) );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	set_post_thumbnail_size( 1180, 530, true );

	// Hero Image on the front page & single page template
	// add_image_size( 'razor-lite-hero', 1180, 530, true );

	add_image_size( 'razor-lite-large', 2000, 1500, true );
	add_image_size( 'razor-lite-medium', 1400, 760, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'mobile-menu' => esc_html__( 'Main Menu', 'razor-lite' ),
		'social'  => esc_html__( 'Social Links Menu', 'razor-lite' ),
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
	add_theme_support( 'custom-background', apply_filters( 'razor_lite_custom_background_args', array(
		'default-color' => '343b47', /* 272b31 */
		'default-image' => '',
	) ) );
}
endif; // razor_lite_setup
add_action( 'after_setup_theme', 'razor_lite_setup' );

/**
 * Set up the WordPress core custom header feature
 */
function razor_lite_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'razor_lite_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 2000,
		'height'                 => 1500,
		'flex-height'            => true,
		'header-text'            => false,
	) ) );
}
add_action( 'after_setup_theme', 'razor_lite_custom_header_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function razor_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'razor_lite_content_width', 705 );
}
add_action( 'after_setup_theme', 'razor_lite_content_width', 0 );

/**
 * Social Links Menu
 */
function razor_lite_social_menu() {
	if ( has_nav_menu( 'social' ) ) : ?>
	<nav class="social-navigation" role="navigation">
		<?php wp_nav_menu( array(
					'theme_location' => 'social',
					'link_before' => '<span class="screen-reader-text">',
					'link_after' => '</span>',
					'depth' => 1,
				) ); ?>
	</nav><!-- .social-navigation -->
<?php
	endif;
}

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function razor_lite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'razor-lite' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'razor_lite_widgets_init' );

/**
 * Returns the Google font stylesheet URL, if available.
 */
function razor_lite_fonts_url() {
	$fonts_url = '';

	/* translators: If there are characters in your language that are not supported
	 * by Source Sans Pro, translate this to 'off'. Do not translate into your own language.
	 */
	$roboto  = esc_html_x( 'on', 'Roboto font: on or off',  'razor-lite' );
	$open_sans = esc_html_x( 'on', 'Open Sans font: on or off', 'razor-lite' );

	if ( 'off' !== $roboto || 'off' !== $open_sans ) {
		$font_families = array();

		if ( 'off' !== $roboto ) {
			$font_families[] = 'Roboto:300,900,700,400';
		}
		if ( 'off' !== $open_sans ) {
			$font_families[] = 'Open Sans:400,400italic,600';
		}
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, "https://fonts.googleapis.com/css" );
	}

	return $fonts_url;
}

/**
 * Enqueue scripts and styles.
 */
function razor_lite_scripts() {
	// Add custom fonts.
	wp_enqueue_style( 'razor-lite-fonts', razor_lite_fonts_url(), array(), null );

	wp_enqueue_style( 'razor-lite-style', get_stylesheet_uri() );

	wp_enqueue_script( 'razor-lite-main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), '1.0', true );

	wp_enqueue_script( 'skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '1.0', true );

	if ( wp_style_is( 'genericons', 'registered' ) ) {
		wp_enqueue_style( 'genericons' );
	} else {
		wp_enqueue_style( 'genericons', get_template_directory_uri() . '/assets/fonts/genericons.css', array(), null );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'razor_lite_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
