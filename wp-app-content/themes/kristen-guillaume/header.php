<!DOCTYPE html>
<!--[if IE 6]>
<html class="ie ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 9]>
<html class="ie ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8) | !(IE 9) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
	<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	
	
	<script src="http://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
	
	<link href='http://fonts.googleapis.com/css?family=EB+Garamond&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/style.css" />
	
	<title></title>
	<!--[if lt IE 9]>
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/ie/ie.css" />
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/ie/html5.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/ie/json2.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<section id="mainWrapper">
		<header class="leftCol">
					<a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" /></a>
					<nav>
					
					<?php if(get_the_ID()==169 || get_the_ID()==167): ?>
							<a class="link <?php if(get_the_ID()==169) echo "active"; ?>" href="<?php echo get_permalink(169); ?>"><?php echo get_the_title(169); ?></a>
							<a class="link <?php if(get_the_ID()==167) echo "active"; ?>" href="<?php echo get_permalink(167); ?>"><?php echo get_the_title(167); ?></a> 
						<?php else: ?>
							<a class="link <?php if(get_the_ID()==171) echo "active"; ?>" href="<?php echo get_permalink(171); ?>"><?php echo get_the_title(171); ?></a>
							<a class="link <?php if(get_the_ID()==175) echo "active"; ?>" href="<?php echo get_permalink(175); ?>"><?php echo get_the_title(175); ?></a> 
						<?php endif; ?>
					
					<?php /* 
						<?php if(get_the_ID()==17 || get_the_ID()==5 || get_the_ID()==13 || get_the_ID()==27 || get_the_ID()==35 || get_the_ID()==58): ?>
							<a class="link <?php if(get_the_ID()==35) echo "active"; ?>" href="<?php echo get_permalink(35); ?>"><?php echo get_the_title(35); ?></a>
							<a class="link <?php if(get_the_ID()==17) echo "active"; ?>" href="<?php echo get_permalink(17); ?>"><?php echo get_the_title(17); ?></a> 							<a class="link <?php if(get_the_ID()==5) echo "active"; ?>" href="<?php echo get_permalink(5); ?>"><?php echo get_the_title(5); ?></a> 
							<a class="link <?php if(get_the_ID()==13) echo "active"; ?>" href="<?php echo get_permalink(13); ?>"><?php echo get_the_title(13); ?></a> 							<a class="link <?php if(get_the_ID()==27) echo "active"; ?>" href="<?php echo get_permalink(27); ?>"><?php echo get_the_title(27); ?></a>
							<a class="link <?php if(get_the_ID()==58) echo "active"; ?>" href="<?php echo get_permalink(58); ?>"><?php echo get_the_title(58); ?></a>
						<?php else: ?>
							<a class="link <?php if(get_the_ID()==37) echo "active"; ?>" href="<?php echo get_permalink(37); ?>"><?php echo get_the_title(37); ?></a>
							<a class="link <?php if(get_the_ID()==15) echo "active"; ?>" href="<?php echo get_permalink(15); ?>"><?php echo get_the_title(15); ?></a> 							<a  class="link <?php if(get_the_ID()==2) echo "active"; ?>"href="<?php echo get_permalink(2); ?>"><?php echo get_the_title(2); ?></a>
							<a class="link <?php if(get_the_ID()==11) echo "active"; ?>" href="<?php echo get_permalink(11); ?>"><?php echo get_the_title(11); ?></a> 							<a class="link <?php if(get_the_ID()==39) echo "active"; ?>" href="<?php echo get_permalink(39); ?>"><?php echo get_the_title(39); ?></a>
							<a class="link <?php if(get_the_ID()==56) echo "active"; ?>" href="<?php echo get_permalink(56); ?>"><?php echo get_the_title(56); ?></a>
						<?php endif; ?>
						*/
					?>
	
					</nav>
	
		</header>
		<section id="contentWrapper" class="rightCol">
	
	