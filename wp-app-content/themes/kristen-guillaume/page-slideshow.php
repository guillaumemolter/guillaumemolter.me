<?php

/*
Template Name: Slideshow
*/

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php the_title(); ?></title>
		
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/supersized/css/supersized.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/supersized/theme/supersized.shutter.css" type="text/css" media="screen" />
		
		<script src="http://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/supersized/js/jquery.easing.min.js"></script>
		
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/supersized/js/supersized.3.2.7.min.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/supersized/theme/supersized.shutter.min.js"></script>
		

		<script type="text/javascript">
			
			jQuery(function($){
				
				$.supersized({
				
					// Functionality
					slide_interval          :   5000,
					autoplay				: 	0,		// Length between transitions
					transition              :   0, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
					transition_speed		:	700,		// Speed of transition
					fit_always				: 1,
					random					: 1,								   
					// Components							
					slide_links				:	'blank',	// Individual links for each slide (Options: false, 'num', 'name', 'blank')
					slides 					:  	[
												<?php
														
													$sup="";
												
												    while ( have_posts() ) : the_post();
												
												            $gallery = get_post_gallery( get_the_ID(), false );
												            
															$ids = explode( ",", $gallery['ids'] );
															
															foreach( $ids as $id ) {
															
															   $slide   = wp_get_attachment_image_src( $id,"slide");
															   $full   = wp_get_attachment_image_src( $id,"full");
															   
															   $sup.="{image : '".$slide[0]."',url : '".$full[0]."'},";
															
															} 
												
												    endwhile;
												    
												    echo substr($sup,0,-1);
												?>
												]
					
				});
		    });
		    
		</script>
		
	</head>
	<body>
	
		<!--End of styles-->

	<!--Thumbnail Navigation-->
	<div id="prevthumb"></div>
	<div id="nextthumb"></div>
	
	<!--Arrow Navigation-->
	<a id="prevslide" class="load-item"></a>
	<a id="nextslide" class="load-item"></a>
	
	<div id="thumb-tray" class="load-item">
		<div id="thumb-back"></div>
		<div id="thumb-forward"></div>
	</div>
	
	<!--Time Bar-->
	<div id="progress-back" class="load-item">
		<div id="progress-bar"></div>
	</div>
	
	<!--Control Bar-->
	<div id="controls-wrapper" class="load-item">
		<div id="controls">
			
			<a id="play-button"><img id="pauseplay" src="<?php echo get_template_directory_uri(); ?>/supersized/img/pause.png"/></a>
		
			<!--Slide counter-->
			<div id="slidecounter">
				<span class="slidenumber"></span> / <span class="totalslides"></span>
			</div>
			
			<!--Slide captions displayed here-->
			<div id="slidecaption"></div>
			
			<!--Thumb Tray button-->
			<a id="tray-button"><img id="tray-arrow" src="<?php echo get_template_directory_uri(); ?>/supersized/img/button-tray-up.png"/></a>
			
			<!--Navigation-->
			<ul id="slide-list"></ul>
			
		</div>
	</div>
	
	</body>
</html>