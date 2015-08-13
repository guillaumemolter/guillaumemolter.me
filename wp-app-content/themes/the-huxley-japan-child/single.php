<?php get_header(); ?>

			<div id="content">
				
				<div id="inner-content" class=" cf">

						<?php 
							$thumb_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full-size', true);
						?>

						<?php if ( has_post_thumbnail()): ?>
							<header class="article-header" style="background-image:url('<?php echo esc_url( $thumb_array[0] ); ?>');background-size:cover;background-position:center;position:relative;">
						
						<?php else: ?>	
							<header class="article-header no-bg">

						<?php endif; ?>

							<div class="bg-overlay"></div>
							<div class="wrap">
								<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
								<h2 class="entry-title single-title" itemprop="headline"><?php echo get_field("subtitle"); ?></h2>
							</div>
							</header> <?php // end article header ?>
						
						<div id="inner-content" class="wrap cf post-content-single">
						<div class="m-all t-3of3 d-7of7 cf">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							
							<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">

								<?php
									get_template_part( 'post-formats/format', get_post_format() );
								?>

         					</article> <?php // end article ?>

						<?php endwhile; ?> <?php endif; ?>
								<?php 
									
									$previous_post = get_previous_post();
									$next_post = get_next_post();
									
								?>
								<?php if(is_a( $next_post , 'WP_Post' )): 							
									
									$nextimage = wp_get_attachment_image_src(get_post_thumbnail_id($next_post->ID), 'large', true);
								?>

									<div class="next-prev-post" style="background-image:url('<?php echo esc_url( $nextimage[0] ); ?>');">
										<div class="next">
											<a class="h5" href="<?php echo get_permalink($next_post->ID); ?>"><?php echo get_the_title($next_post->ID); ?> &rarr; <br /><span class="h6"><?php echo get_field("subtitle",$next_post->ID); ?></span></a>
										</div>
									</div> 
								<?php endif; ?>
								<?php 
									if(is_a( $previous_post , 'WP_Post' )): 
									
									$previmage = wp_get_attachment_image_src(get_post_thumbnail_id($previous_post->ID), 'large', true);
								?>
									<div class="next-prev-post" style="background-image:url('<?php echo esc_url( $previmage[0] ); ?>');">
										<div class="prev">
											<a  class="h5" href="<?php echo get_permalink($previous_post->ID); ?>">&larr; <?php echo get_the_title($previous_post->ID); ?><br /><span class="h6"><?php echo get_field("subtitle",$previous_post->ID); ?></span></a>
										</div>
									</div> 
								<?php endif; ?>

						</div>
						<div class="clear"></div>
					</div>
					
				</div>

			</div>

<?php get_footer(); ?>