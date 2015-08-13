<div class="thumb-wrap">
	<?php
		$thumb_url_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large', true); 
	?>
	<a href="<?php the_permalink(); ?>">
	<?php if(has_post_thumbnail()): ?>
		<div class="image-bg" style="background-image:url(<?php echo esc_url( $thumb_url_array[0] ); ?>);">
	<?php else: ?>
		<div class="no-bg">
	<?php endif; ?>
		</div>
	</a>
</div>

<div class="the-post-content">
	<div class="table">
		<div class="table-cell">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<h3><a href="<?php the_permalink(); ?>"><?php echo get_field("subtitle"); ?></a></h3>
			<div class="date">
				<?php printf( __( '<time class="updated" datetime="%1$s" pubdate>%2$s</time>', 'the-huxley' ), get_the_time('Y-m-j'), get_the_time(get_option('date_format'))); ?>
			</div>
		</div>
	</div>
</div>
<div class="clear"></div>