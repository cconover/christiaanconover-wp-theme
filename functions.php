<?php
/**
 * Christiaan Conover functions and definitions
 *
 * @package Christiaan Conover
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'christiaanconover_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function christiaanconover_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Christiaan Conover, use a find and replace
	 * to change 'christiaanconover' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'christiaanconover', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'christiaanconover' ),
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
	add_theme_support( 'custom-background', apply_filters( 'christiaanconover_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	// Require Composer
	require( 'vendor/autoload.php' );
	
	// Add support for site logo (https://github.com/Automattic/site-logo)
	add_theme_support( 'site-logo', array( 'size' => 'medium' ) );
}
endif; // christiaanconover_setup
add_action( 'after_setup_theme', 'christiaanconover_setup' );

/**
 * Add custom image sizes
 */
if ( function_exists( 'add_image_size' ) ) {
	// Extra-large image (1024px)
	add_image_size( 'x-large', 1024, 1024, false );
}

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function christiaanconover_widgets_init() {
	// Footer widget area
	register_sidebar( array(
		'name'          => __( 'Footer', 'christiaanconover' ),
		'id'            => 'footer',
		'description'   => 'Widgets for the site footer',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'christiaanconover_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function christiaanconover_scripts() {
	// Google Fonts
	wp_enqueue_style( 'christiaanconover-googlefonts', 'https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed' );
	
	// Font Awesome
	wp_enqueue_style( 'christiaanconover-fontawesome', get_template_directory_uri() . '/font/fontawesome/css/font-awesome.min.css' );
	
	// Main theme stylesheet
	wp_enqueue_style( 'christiaanconover-style', get_stylesheet_uri() );
	
	// Admin bar accomodation
	if ( is_admin_bar_showing() ) {
		wp_enqueue_style( 'christiaanconover-adminbar', get_template_directory_uri() . '/css/adminbar.css' );
	}
	
	// Headroom.js
	wp_enqueue_script( 'christiaanconover-headroomjs', get_template_directory_uri() . '/js/headroom.js', array( 'jquery' ) );

	wp_enqueue_script( 'christiaanconover-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'christiaanconover_scripts' );

/**
 * TGM Plugin Activation
 * http://tgmpluginactivation.com
 */
function christiaanconover_register_required_plugins() {
	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	 $plugins = array(
	 	 // Author Customization
		 array(
		 	'name'					=> 'Author Customization', // Name of the plugin
		 	'slug'					=> 'author-customization', // Slug for the plugin
		 	'required'				=> true, // Plugin is required for the theme to be active
		 	'force_activation'		=> true // Force the plugin to activate on them activation, and keep plugin active as long as theme is active
		 ),
		 
		 // Featured Image Caption
		 array(
		 	'name'					=> 'Featured Image Caption', // Name of the plugin
		 	'slug'					=> 'featured-image-caption', // Slug for the plugin
		 	'required'				=> true, // Plugin is required for the theme to be active
		 	'force_activation'		=> true // Force the plugin to activate on them activation, and keep plugin active as long as theme is active
		 ),
		 
		 // Jetpack
		 array(
		 	'name'					=> 'Jetpack', // Name of the plugin
		 	'slug'					=> 'jetpack', // Slug for the plugin
		 	'required'				=> true, // Plugin is required for the theme to be active
		 	'force_activation'		=> true // Force the plugin to activate on them activation, and keep plugin active as long as theme is active
		 ),
		 
		 // Liveblog
		 array(
		 	'name'					=> 'Liveblog', // Name of the plugin
		 	'slug'					=> 'liveblog', // Slug for the plugin
		 	'required'				=> true, // Plugin is required for the theme to be active
		 	'force_activation'		=> true // Force the plugin to activate on them activation, and keep plugin active as long as theme is active
		 ),
		 
		 // Site Logo (GitHub repo as source)
		 array(
		 	'name'					=> 'Site Logo', // Name of the plugin
		 	'slug'					=> 'site-logo-master', // Slug for the plugin
		 	'source'				=> 'https://github.com/Automattic/site-logo/archive/master.zip', // Source from where the plugin should be retrieved
		 	'required'				=> true, // Plugin is required for the theme to be active
		 	'force_activation'		=> true // Force the plugin to activate on them activation, and keep plugin active as long as theme is active
		 ),
		 
		 // WP Fragmention
		 array(
		 	'name'					=> 'WP Fragmention', // Name of the plugin
		 	'slug'					=> 'wp-fragmention', // Slug for the plugin
		 	'required'				=> true, // Plugin is required for the theme to be active
		 	'force_activation'		=> true // Force the plugin to activate on them activation, and keep plugin active as long as theme is active
		 ),
	 );
	 
	 /**
	  * Configuration array
	  * All elements are optional
	  * Refer to http://tgmpluginactivation.com for guidance
	  */
	  $config = array(
	  	'dismissable'			=> false, // Do not allow user to dismiss admin notices
	  	'is_automatic'			=> true, // Automatically activate plugins when they are installed
	  );
	  
	  tgmpa( $plugins, $config );
} // End christiaanconover_register_required_plugins()
add_action( 'tgmpa_register', 'christiaanconover_register_required_plugins' );

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
