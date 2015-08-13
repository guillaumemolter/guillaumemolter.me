<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

	<header class="article-header">
		<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished"><?php echo get_the_time('d.m'); ?></time>
		<p class="header-category">[ <?php echo get_the_category_list(' / '); ?> ]</p>
		<h1 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

	</header>

	<section class="entry-content cf">
		<?php the_post_thumbnail('large'); ?>
		<?php the_excerpt(); ?>
	</section>

	<footer class="article-footer cf">
		
		<?php the_tags( '<p class="footer-tags tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>
		
		<p class="footer-comment-count">
			<?php comments_number( __( '<span>No</span> Comments', 'bonestheme' ), __( '<span>One</span> Comment', 'bonestheme' ), __( '<span>%</span> Comments', 'bonestheme' ) );?>
		</p>

	</footer>

</article>