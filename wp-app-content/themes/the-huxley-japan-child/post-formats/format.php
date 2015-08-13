<section class="entry-content cf" itemprop="articleBody">
	<?php if( have_rows('locations') ): ?>
		<div class="acf-map" data-zoom="2">
			<?php while ( have_rows('locations') ) : the_row(); 
	
				$location = get_sub_field('location');
					
			?>
			<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
				<h4>Location Label</h4>
			</div>
		<?php endwhile; ?>
		</div>
	<?php endif; ?>
	<div class="contentWrapper">
	<?php
	
		the_content();
	
	?>
	</div>
</section>