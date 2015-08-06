<?php
/**
 * Register theme support for languages, menus, post-thumbnails, post-formats etc.
 *
 * @package WordPress
 * @subpackage ChristiaanConover
 * @since 1.0.0
 */

if ( ! function_exists( 'christiaanconover_theme_support' ) ) :
	function christiaanconover_theme_support() {
		// Add language support
		load_theme_textdomain( THEME_ID, get_template_directory() . '/languages' );

		// Add menu support
		add_theme_support( 'menus' );

		// Let WordPress manage the document title
		add_theme_support( 'title-tag' );

		// Add post thumbnail support: http://codex.wordpress.org/Post_Thumbnails
		add_theme_support( 'post-thumbnails' );

		// Custom image sizes
		add_image_size( 'extra-large', 1024, 1024 );
		add_filter( 'image_size_names_choose', 'christiaanconover_list_image_sizes' );

		// RSS thingy
		add_theme_support( 'automatic-feed-links' );

		// Add post formarts support: http://codex.wordpress.org/Post_Formats
		add_theme_support( 'post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat') );

	}
	add_action( 'after_setup_theme', 'christiaanconover_theme_support' );
endif;

/**
 * Append custom image sizes to the list of standard image sizes
 *
 * @since 1.0.0
 */
function christiaanconover_list_image_sizes( $sizes ) {
	return array_merge( $sizes, array(
		'extra-large' => __( 'Extra Large', THEME_ID ),
	) );
}
?>
