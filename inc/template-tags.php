<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Christiaan Conover
 */

if ( ! function_exists( 'christiaanconover_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function christiaanconover_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'christiaanconover' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'christiaanconover' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'christiaanconover' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'christiaanconover_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function christiaanconover_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'christiaanconover' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav">&larr;</span>&nbsp;%title', 'Previous post link', 'christiaanconover' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( '%title&nbsp;<span class="meta-nav">&rarr;</span>', 'Next post link',     'christiaanconover' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'christiaanconover_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function christiaanconover_posted_on() {
	$time_string = '<span class="fa fa-calendar"></span> <time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<span class="fa fa-calendar"></span> <time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		_x( '%s', 'post date', 'christiaanconover' ),
		$time_string
	);

	$byline = sprintf(
		_x( '%s', 'post author', 'christiaanconover' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';

}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function christiaanconover_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'christiaanconover_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'christiaanconover_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so christiaanconover_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so christiaanconover_categorized_blog should return false.
		return false;
	}
}

/**
 * Get the URL for the post featured image
 * @param string $attribute the attribute of the featurd image to retrieve
 * @param bool $echo whether to print the result to the page
 * @return $result the URL of the featured image
 */
function christiaanconover_featured_image_url( $attribute='url', $size = 'large', $echo = true ) {
	// Access the post object
	global $post;

	// Start with an empty result
	$result = null;

	// If we have a post object and the post has a featured image
	if ( ! empty( $post ) && has_post_thumbnail( $post->ID ) ) {
		// Get the post thumbnail details
		$image = wp_get_attachment_image_src( get_post_thumbnail_id ( $post->ID ), $size );

		// Set the result to the requested attribute of the image
		switch ( $attribute ) {
			case 'url' :
				$result = $image[0];
				break;
			case 'width' :
				$result = $image[1];
				break;
			case 'height' :
				$result = $image[2];
				break;
		}

		// If $echo is true, print the URL
		if ( $echo ) {
			echo $result;
		}
		else {
			return $result;
		}
	}
} // End christiaanconover_featured_image_url()

/**
 * Generate meta description tag, depending on the page being displayed
 *
 * @param 	boolean $echo Whether to print the results. Print if true, return if false.
 * @return 	string
 */
function christiaanconover_meta_description( $echo = true ) {
	// If displaying single post or page
	if ( is_single() ) {
		global $post;
		// If the post has an excerpt, get it. Otherwise, set to null
		if ( has_excerpt() ) {
			$description = get_the_excerpt();
		}
		else {
			$description = null;
		}
	}
	// Everywhere that isn't a single post or page
	else {
		$description = get_bloginfo( 'description' );
	}

	// If the description is set to null, return null
	if ( null == $description ) {
		return null;
	}

	$meta = '<meta name="description" content="' . $description .'">' . PHP_EOL;

	if ( false == $echo ) {
		return $meta;
	}

	echo $meta;
} // christiaanconover_meta_description()

/**
 * Social header links
 */
function christiaanconover_social_links() {
	// If any social links are set, create an unordered list
	if ( get_theme_mod( 'twitter_url' ) || get_theme_mod( 'facebook_url' ) ) {
		echo '<ul>';

		// Iterate through each possible social link
		if ( get_theme_mod( 'twitter_url' ) ) {
			echo '<a class="fa fa-twitter-square" href="' . get_theme_mod( 'twitter_url' ) . '"></a>';
		}
		if ( get_theme_mod( 'facebook_url' ) ) {
			echo '<a class="fa fa-facebook-square" href="' . get_theme_mod( 'facebook_url' ) . '"></a>';
		}

		echo '</ul>';
	}
} // End christiaanconover_social_links()

/**
 * Flush out the transients used in christiaanconover_categorized_blog.
 */
function christiaanconover_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'christiaanconover_categories' );
}
add_action( 'edit_category', 'christiaanconover_category_transient_flusher' );
add_action( 'save_post',     'christiaanconover_category_transient_flusher' );
