<?php

/**
 * Author: Christiaan Conover
 * URL: https://christiaanconover.com.
 *
 * Christiaan Conover functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @since 1.0.0
 */

/** Various clean up functions */
require_once 'includes/cleanup.php';

/** Required for Foundation to work properly */
require_once 'includes/foundation.php';

/** Register all navigation menus */
require_once 'includes/navigation.php';

/** Add desktop menu walker */
require_once 'includes/menu-walker.php';

/** Add off-canvas menu walker */
require_once 'includes/offcanvas-walker.php';

/** Create widget areas in sidebar and footer */
require_once 'includes/widget-areas.php';

/** Return entry meta information for posts */
require_once 'includes/entry-meta.php';

/** Enqueue scripts */
require_once 'includes/enqueue-scripts.php';

/** Add theme support */
require_once 'includes/theme-support.php';

/** Add Header image */
require_once 'includes/custom-header.php';
