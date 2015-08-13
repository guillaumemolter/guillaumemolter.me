<?php
/*
Theme Name: Kristen & Guillaume
Theme URI: https://github.com/guillaumemolter
Description: A theme for a wedding site
Author: Guillaume Molter
Author URI: https://github.com/guillaumemolter
Version: 1.0
*/
?>

<?php get_header(); ?>

<h1>I was invited to / J'étais invité à</h1>
<section class="clearfix">
	<div class="leftCol">
		<a href="<?php echo get_permalink(171); ?>">
			<h2>Historic Hotel Bethlehem</h2>
			<img src="<?php echo get_template_directory_uri(); ?>/images/bethlehem.jpg" />
		</a>
	</div>
	<div class="rightCol">
		<a href="<?php echo get_permalink(169); ?>">
			<h2>Maison Familialle de Doulaincourt</h2>
			<img src="<?php echo get_template_directory_uri(); ?>/images/doulaincourt.jpg" />
		</a>
	</div>
</section>


<?php get_footer(); ?>