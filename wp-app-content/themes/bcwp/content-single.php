<?php
/**
 * @package bcwp
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="post-inner">	
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

			<div class="entry-meta">
				<?php bcwp_posted_on(); ?>
			</div><!-- .entry-meta -->
			
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'bcwp' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php bcwp_entry_footer(); ?>
		</footer><!-- .entry-footer -->
		<aside class="entry-social">
			<div class="share"><span>Spread the word:</span><div class="fb-share-button" data-layout="button_count"></div> <a href="https://twitter.com/share" class="twitter-share-button">Tweet</a> <a href="//www.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark"  data-pin-color="red"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_red_20.png" /></a></div>
			<div class="fb-comments" data-href="<?php echo get_the_permalink(); ?>" data-width="100%" data-numposts="5"></div>
		</aside>
		
	</div>	
</article><!-- #post-## -->
