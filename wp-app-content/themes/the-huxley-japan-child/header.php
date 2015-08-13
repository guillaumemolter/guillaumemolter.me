<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<?php if ( get_theme_mod( 'huxley_favicon' ) ) : ?>
		<link rel="icon" href="<?php echo esc_url( get_theme_mod( 'huxley_favicon' ) ); ?>">
		<?php endif; ?>

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?> >

		<div id="container">
			
			<header class="header" role="banner" id="main-header">
				<div id="inner-header" class="wrap cf">
					<div class="head-left centered">
						<p id="logo" class="h1"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="nofollow">
							<?php if(get_locale()==="fr_FR") { echo "Japon 2015"; } else { bloginfo('name'); } ?>
						</a></p>
						<p class="h3"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="nofollow"><?php bloginfo('description'); ?></a></p>
						<?php huxley_japan_display_lang_switcher();  ?>
					</div>

					<div class="head-right <?php echo  esc_attr($centered_class); ?>">
						
		                <div class="mobile-menu">
		                	<div id="main-navigation">
								<div id="close"><span class="fa fa-times"></span> Close</div>
								<div class="clear"></div>
        					</div>
							<div class="side-nav" id="push"><span class="fa fa-bars"></span></div>
						</div>
	            	</div>
	                <div class="clear"></div>
				</div>

			</header>