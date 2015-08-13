<?php
/**
 * @package bcwp
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() && ( get_theme_mod( 'index_feat_image' ) != 1 ) ) : ?>
	<div class="entry-thumb">
		<a class="thumb-icon" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" ><?php the_post_thumbnail('bcwp-entry-thumb'); ?></a>
	</div>
	<?php endif; ?>

	<div class="post-inner">
		<header class="entry-header">
			<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

			<?php if ( 'post' == get_post_type() && !get_theme_mod('meta_index') ) : ?>
			<div class="entry-meta">
				<?php bcwp_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php if ( (get_theme_mod('full_content') == 1) ) : ?>
				<?php the_content( sprintf(
					__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'bcwp' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) ); ?>
			<?php else : ?>
				<?php the_excerpt(); ?>
			<?php endif; ?>

			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'bcwp' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-## -->