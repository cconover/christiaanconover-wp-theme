<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package WordPress
 * @subpackage ChristiaanConover
 * @since 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	<?php do_action( 'christiaanconover_after_body' ); ?>

	<div class="off-canvas-wrap" data-offcanvas>
	<div class="inner-wrap">

	<?php do_action( 'christiaanconover_layout_start' ); ?>

	<nav class="tab-bar">
		<section class="left-small">
			<a class="left-off-canvas-toggle menu-icon" href="#"><span></span></a>
		</section>
		<section class="middle tab-bar-section">

			<h1 class="title">
				<?php bloginfo( 'name' ); ?>
			</h1>

		</section>
	</nav>

	<?php get_template_part( 'parts/off-canvas-menu' ); ?>

	<?php get_template_part( 'parts/top-bar' ); ?>

<section class="container" role="document">
	<?php do_action( 'christiaanconover_after_header' ); ?>
