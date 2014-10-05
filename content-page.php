<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Christiaan Conover
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="post-featured-image" style="background-image: url( '<?php echo christiaanconover_featured_image_url(); ?>' );">
			<div class="entry-header-container">
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->
			</div><!-- .entry-header-container -->
		</div><!-- .post-featured-image -->
		
		<?php
		// If a caption is set, display it
		if ( cc_has_featured_image_caption() ) : ?>
			<div class="featured-image-caption">
				<?php cc_featured_image_caption(); ?>
			</div><!-- .featured-image-caption -->
		<?php endif; ?>
	<?php else : ?>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
	<?php endif; ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'christiaanconover' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'christiaanconover' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
