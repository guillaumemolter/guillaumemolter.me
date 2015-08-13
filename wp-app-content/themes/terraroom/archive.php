<?php get_header(); ?>

<?php 
	
	$term = get_term(get_queried_object()->term_id,"category"); 
	$termFields = get_fields($term);
	$termChildren = get_term_children( $term->term_id, "category" );
?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php
								
							echo '<img src="'.$termFields["picto"]["sizes"]["thumbnail"].'" class="itemPicto categoryPicto" />';
								
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							
							the_archive_description( '<div class="taxonomy-description">', '</div>' );
							
							?>
							
							<?php if(!is_wp_error($termChildren) && !empty($termChildren)): ?>
							
							<?php
							
							echo '<ul>';
							
							foreach ( $termChildren as $childID ) {
								
								$child = get_term($childID, 'category' );
								$childFields = get_fields($child);
								echo '<li><a href="' . get_term_link( $childID, 'category' ) . '"><img src="'.$childFields["picto"]["sizes"]["thumbnail"].'" class="itemPicto categoryPicto" />' . $child->name . '</a></li>';
							}
							echo '</ul>';
							?>
							
							<?php elseif (have_posts()) : while (have_posts()) : the_post(); ?>

								<?php
									get_template_part( 'post-formats/loop');
								?>

							<?php endwhile; ?>

									<?php bones_page_navi(); ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the archive.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</main>

					<?php get_sidebar(); ?>

				</div>

			</div>

<?php get_footer(); ?>
