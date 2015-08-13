<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package bcwp
 */

if ( ! function_exists( 'the_posts_navigation' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function the_posts_navigation() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation posts-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Posts navigation', 'bcwp' ); ?></h2>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( 'Older posts', 'bcwp' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts', 'bcwp' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'the_post_navigation' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function the_post_navigation() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Post navigation', 'bcwp' ); ?></h2>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', '%title' );
				next_post_link( '<div class="nav-next">%link</div>', '%title' );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'bcwp_posted_on' ) ) :
function bcwp_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		_x( '%s', 'post date', 'bcwp' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$category = get_the_category(); 
	if($category){
		$cat = '<a href="' . esc_url(get_category_link($category[0]->term_id )) . '">' . esc_attr($category[0]->cat_name) . '</a>';
	}

	if ( !is_singular()) {
		echo '<span class="posted-on">' . $posted_on . '</span><span class="cat-link">' . $cat . '</span>';
	} elseif (!get_theme_mod('meta_singles')) {
		echo '<span class="posted-on">' . $posted_on . '</span>';
		if ( 'post' == get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'bcwp' ) );
			if ( $categories_list ) {
				printf( '<span class="cat-links">' . __( '%1$s', 'bcwp' ) . '</span>', $categories_list );
			}
		}		
	}
}
endif;

if ( ! function_exists( 'bcwp_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function bcwp_entry_footer() {
	if ( 'post' == get_post_type() && !get_theme_mod('meta_singles') ) {

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'bcwp' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . __( 'Tagged %1$s', 'bcwp' ) . '</span>', $tags_list );
		}
	}
}
endif;


if ( ! function_exists( 'the_archive_description' ) ) :
/**
 * Shim for `the_archive_description()`.
 *
 * Display category, tag, or term description.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the description. Default empty.
 * @param string $after  Optional. Content to append to the description. Default empty.
 */
function the_archive_description( $before = '', $after = '' ) {
	$description = apply_filters( 'get_the_archive_description', term_description() );

	if ( ! empty( $description ) ) {
		/**
		 * Filter the archive description.
		 *
		 * @see term_description()
		 *
		 * @param string $description Archive description to be displayed.
		 */
		echo $before . $description . $after;
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function bcwp_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'bcwp_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'bcwp_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so bcwp_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so bcwp_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in bcwp_categorized_blog.
 */
function bcwp_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'bcwp_categories' );
}
add_action( 'edit_category', 'bcwp_category_transient_flusher' );
add_action( 'save_post',     'bcwp_category_transient_flusher' );
