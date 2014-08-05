<?php
/**
 * @package Christiaan Conover
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="post-featured-image" style="background-image: url( '<?php echo christiaanconover_featured_image_url(); ?>' );">
			<div class="entry-header-container">
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					<?php if ( has_excerpt() ) : ?>
						<h2 class="entry-summary"><?php echo get_the_excerpt(); ?></h2>
					<?php endif; ?>
					<div class="entry-meta">
						<?php christiaanconover_posted_on(); ?>
					</div><!-- .entry-meta -->
				</header><!-- .entry-header -->
			</div><!-- .entry-header-container -->
		</div><!-- .post-featured-image -->
		
		<?php
		// Get featured image caption
		$postimage_caption = cc_featured_image_caption();
		
		// If a caption is set, display it
		if ( ! false == $postimage_caption ) : ?>
			<div class="featured-image-caption">
				<?php echo $postimage_caption; ?>
			</div><!-- .featured-image-caption -->
		<?php endif; ?>
	<?php else : ?>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php if ( has_excerpt() ) : ?>
				<h2 class="entry-summary"><?php echo get_the_excerpt(); ?></h2>
			<?php endif; ?>
			<div class="entry-meta">
				<?php christiaanconover_posted_on(); ?>
			</div><!-- .entry-meta -->
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
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'christiaanconover' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'christiaanconover' ) );

			if ( ! christiaanconover_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'christiaanconover' );
				} else {
					$meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'christiaanconover' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'christiaanconover' );
				} else {
					$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'christiaanconover' );
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink()
			);
		?>

		<?php edit_post_link( __( 'Edit', 'christiaanconover' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
