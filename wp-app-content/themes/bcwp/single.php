<?php
/**
 * The template for displaying all single posts.
 *
 * @package bcwp
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php the_post_navigation(); ?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php 
	if (!get_theme_mod('hide_sidebar_single')) {
		get_sidebar();
	}
?>
<?php get_footer(); ?>
