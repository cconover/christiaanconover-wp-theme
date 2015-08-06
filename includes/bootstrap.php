<?php
/**
 * Bootstrap the theme environment.
 *
 * @since 1.0.0
 */

/* Hooks for this file */
add_action( 'christiaanconover_bootstrap', 'christiaanconover_constants' );

// Execute the theme bootstrap action
do_action( 'christiaanconover_bootstrap' );

/**
 * Theme constants.
 *
 * @since 1.0.0
 */
function christiaanconover_constants() {
    // Get theme information
    $theme = wp_get_theme();

    // Theme ID
    if ( ! defined( 'THEME_ID' ) ) {
        define( 'THEME_ID', $theme->get( 'TextDomain' ) );
    }

    // Theme name
    if ( ! defined( 'THEME_NAME' ) ) {
        define( 'THEME_NAME', $theme->get( 'Name' ) );
    }

    // Theme version
    if ( ! defined( 'THEME_VERSION' ) ) {
        define( 'THEME_VERSION', $theme->get( 'Version' ) );
    }
}
