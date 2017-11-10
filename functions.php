<?php
/**
 * bootstrapwp functions and definitions
 *
 * @package bootstrapwp
 */

// Include the Redux theme options Framework
if ( !class_exists( 'ReduxFramework' ) ) {
	require_once( get_template_directory() . '/redux/framework.php' );
}

// Register all the theme options
require_once( get_template_directory() . '/inc/redux-config.php' );

// Theme options functions
require_once( get_template_directory() . '/inc/bswp-options.php' );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'bootstrapwp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bootstrapwp_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on bootstrapwp, use a find and replace
	 * to change 'bootstrapwp' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'bootstrapwp', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'sidebar-thumb', 120, 120, true ); // Hard Crop Mode
	add_image_size( 'homepage-thumb', 220, 180 ); // Soft Crop Mode
	add_image_size( 'singlepost-thumb', 590, 9999 ); // Unlimited Height Mode

	// This theme uses wp_nav_menu() in one location.
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'bootstrapwp' ),
        'footer-menu' => __( 'Footer Menu', 'bootstrapwp' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'bootstrapwp_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // bootstrapwp_setup
add_action( 'after_setup_theme', 'bootstrapwp_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function bootstrapwp_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'bootstrapwp' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar Left', 'bootstrapwp' ),
		'id'            => 'sidebar-left',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Contact', 'bootstrapwp' ),
		'id'            => 'contact',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'bootstrapwp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bootstrapwp_scripts() {
	wp_enqueue_style( 'bootstrap-styles', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.7.0', 'all' );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.7.0', 'all' );

	wp_enqueue_style( 'bootstrapwp-style', get_stylesheet_uri() );

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.7.0', true );

	wp_enqueue_script( 'isotope-js', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array('jquery'), '3.0.4', true );

	wp_enqueue_script( 'imagesloaded-js', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array('jquery'), '4.1.3', true );

	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), '3.7.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bootstrapwp_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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

/**
 * Load Bootstrap menu.
 */
require get_template_directory() . '/inc/bootstrap-walker.php';

/**
 * Comments Callback.
 */
require get_template_directory() . '/inc/comments-callback.php';

/**
 * Author Meta.
 */
require get_template_directory() . '/inc/author-meta.php';

/**
 * Search Results - Highlight.
 */
require get_template_directory() . '/inc/search-highlight.php';

/**
 * Custom Post Types
 */
require get_template_directory() . '/inc/post-types/CPT.php';

/**
 * Portfolio Custom Post Type
 */
require get_template_directory() . '/inc/post-types/register-portfolio.php';
