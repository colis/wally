<?php
/**
 * Wally functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Wally
 */

if ( ! defined( 'THEME_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'THEME_VERSION', '1.2.0' );
}

if ( ! function_exists( 'wally_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wally_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Wally, use a find and replace
		 * to change 'wally' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'wally', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'wally' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'wally_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );
		add_editor_style( 'dist/css/style.css' );

		// Add support for wide-aligned images.
		add_theme_support( 'align-wide' );

		// Remove support for custom colors and font sizes.
		add_theme_support( 'disable-custom-colors' );
		add_theme_support( 'disable-custom-font-sizes' );
		add_theme_support( 'editor-color-palette' );
		add_theme_support( 'editor-button-styles' );

		/**
		 * Add color palette for the gutenberg editor.
		 * Get the values from a JSON file.
		 */
		$theme_json_file = file_get_contents( get_theme_file_path( 'config/variables.json' ) );
		$theme_json      = json_decode( $theme_json_file, true );

		$gutenberg_palette = array_map(
			function( $name, $hex_color ) {
					$slug = sanitize_title( $name );
					$name = str_replace( '-', ' ', ucwords( $slug ) );

					return [
						'name'  => $name,
						'slug'  => $slug,
						'color' => sanitize_hex_color( $hex_color ),
					];
			},
			array_keys( $theme_json['colors'] ),
			array_values( $theme_json['colors'] )
		);
		add_theme_support( 'editor-color-palette', $gutenberg_palette );
	}
endif;
add_action( 'after_setup_theme', 'wally_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wally_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'wally_content_width', 640 );
}
add_action( 'after_setup_theme', 'wally_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wally_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'wally' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'wally' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'wally_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wally_scripts() {
	wp_enqueue_style( 'wally-style', get_template_directory_uri() . '/dist/css/style.css', array(), THEME_VERSION );

	wp_enqueue_script( 'wally-navigation', get_template_directory_uri() . '/dist/js/navigation.js', array(), THEME_VERSION, true );

	wp_enqueue_script( 'wally-skip-link-focus-fix', get_template_directory_uri() . '/dist/js/skip-link-focus-fix.js', array(), THEME_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_front_page() ) {
		wp_enqueue_script( 'typed-js-lib', get_template_directory_uri() . '/dist/js/lib/typed.js', array(), THEME_VERSION, true );
		wp_enqueue_script( 'wally-typed-js', get_template_directory_uri() . '/dist/js/typed.js', array(), THEME_VERSION, true );
	}
}
add_action( 'wp_enqueue_scripts', 'wally_scripts' );

/**
 * Enqueue the block editor assets.
 */
function wally_editor_assets() {
	wp_enqueue_style(
		'wally-editor-style',
		get_stylesheet_directory_uri() . '/dist/css/editor-style.css',
		[ 'wp-edit-blocks' ],
		THEME_VERSION
	);
}
add_action( 'enqueue_block_editor_assets', 'wally_editor_assets' );

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

