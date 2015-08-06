<?php
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage ChristiaanConover
 * @since 1.0.0
 */

?>
<aside id="sidebar" class="small-12 large-4 columns">
	<?php do_action( 'christiaanconover_before_sidebar' ); ?>
	<?php dynamic_sidebar( 'sidebar-widgets' ); ?>
	<?php do_action( 'christiaanconover_after_sidebar' ); ?>
</aside>