<?php
/**
 * Enqueue all styles and scripts
 *
 * Learn more about enqueue_script: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_script}
 * Learn more about enqueue_style: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_style }
 *
 * @package WordPress
 * @subpackage ChristiaanConover
 * @since 1.0.0
 */

if ( ! function_exists( 'christiaanconover_scripts' ) ) :
	function christiaanconover_scripts() {
		// Enqueue the main Stylesheet.
		wp_register_style(
			THEME_ID,
			get_stylesheet_directory_uri() . '/assets/css/' . THEME_ID . '.css',
			array(),
			THEME_VERSION
		);

		// Deregister the jquery version bundled with WordPress.
		wp_deregister_script( 'jquery' );

		// Register our own copy of jQuery.
		wp_enqueue_script(
			'jquery',
			get_template_directory_uri() . '/assets/js/lib/jquery.js',
			array(),
			THEME_VERSION,
			false
		);

		// Modernizr is used for polyfills and feature detection. Must be placed in header.
		wp_register_script(
			'modernizr',
			get_template_directory_uri() . '/assets/js/lib/modernizr.js',
			array(),
			THEME_VERSION,
			false
		);

		// Fastclick removes the 300ms delay on click events in mobile environments. Must be placed in header.
		wp_register_script(
			'fastclick',
			get_template_directory_uri() . '/assets/js/lib/fastclick.js',
			array(),
			THEME_VERSION,
			false
		);

		// Concatenated theme JavaScript.
		wp_register_script(
			THEME_ID,
			get_template_directory_uri() . '/assets/js/' . THEME_ID . '.js',
			array( 'jquery', 'fastclick', 'modernizr' ),
			THEME_VERSION,
			true
		);

		// Enqueue stylesheets.
		wp_enqueue_style( THEME_ID );

		// Enqueue all registered scripts.
		wp_enqueue_script( THEME_ID );
	}
	add_action( 'wp_enqueue_scripts', 'christiaanconover_scripts' );
endif;

?>
