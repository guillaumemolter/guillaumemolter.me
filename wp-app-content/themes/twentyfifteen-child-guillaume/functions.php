<?php

function twentyfifteen_child_scripts() {
   wp_enqueue_style( 'twentyfifteen-style', get_template_directory_uri().'/style.css' ); 
   wp_enqueue_style( 'twentyfifteen-child-style',get_stylesheet_uri()); 
   wp_enqueue_style( 'twentyfifteen-fonts', twentyfifteen_child__fonts_url(), array(), null );
   wp_enqueue_script( 'twentyfifteen-skip-link-focus-fix', get_stylesheet_directory_uri() . '/js/child-scripts.js', array( 'jquery' ), '20141220', true );
   wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.2' );
   wp_enqueue_style( 'favicons', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', array(), '4.3' );
}
add_action( 'wp_enqueue_scripts', 'twentyfifteen_child_scripts' );
remove_action('init', 'twentyfifteen_fonts_url');
add_action( 'init', 'twentyfifteen_child__fonts_url' );

function twentyfifteen_child__fonts_url() {
    $fonts_url = '';

    /* Translators: If there are characters in your language that are not
	 * supported by Lato, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$arimo = _x( 'on', 'Lato font: on or off', 'twentyfifteen-child' );

	if ( 'off' !== $arimo ) {
		$font_families = array();
		$font_families[] = 'Cabin:700';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}

	return $fonts_url;

}

function gm_social(){
	return '<a href="https://github.com/guillaumemolter" title="Code is poetry" class="fa fa-github-alt"></a><a href="https://www.linkedin.com/in/gmolter/" title="All about my job" class="fa fa-linkedin"></a><a href="https://twitter.com/guillaumemolter" title="#Trolololo" class="fa fa-twitter"></a><a href="https://www.facebook.com/guillaume.molter" title="For friends only" class="fa fa-facebook"></a><a href="http://www.youtube.com/user/guillaumemolter" title="Watching/Liking/Listing" class="fa fa-youtube"></a><a href="https://www.flickr.com/photos/guillaumemolter/sets/" title="My Photo Album" class="fa fa-flickr"></a><a href="http://instagram.com/guillaumemolter" title="My inner hipster" class="fa fa-instagram"></a><a href="http://pinterest.com/guillaumemolter" title="Who doesn\'t like crafting ;-)" class="fa fa-pinterest"></a>';
}
add_shortcode( 'gm_social', 'gm_social' );
add_filter('widget_text', 'do_shortcode');