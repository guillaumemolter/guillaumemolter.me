<?php
/**
 * The single article page
 */
?>

<?php get_header(); ?>
			<section>
				
				<?php while ( have_posts() ) : the_post(); ?>

					<article <?php post_class(); ?>>
						<h1><?php the_title(); ?></h1>
						<p><?php the_date('d.m.Y'); ?></p>
						<?php the_post_thumbnail('thumbnail'); ?>
						<?php the_content(); ?>
					</article>

				<?php endwhile; // end of the loop. ?>
			</section>
<?php get_footer(); ?>