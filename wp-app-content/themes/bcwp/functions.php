<?php
/**
 * bcwp functions and definitions
 *
 * @package bcwp
 */


if ( ! function_exists( 'bcwp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bcwp_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on bcwp, use a find and replace
	 * to change 'bcwp' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'bcwp', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Content width
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 1040;
	}	

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('bcwp-entry-thumb', 750);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'bcwp' ),
		'social'  => __( 'Social', 'bcwp' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'bcwp_custom_background_args', array(
		'default-color' => 'f7f3f0',
		'default-image' => '',
	) ) );
}
endif; // bcwp_setup
add_action( 'after_setup_theme', 'bcwp_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function bcwp_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'bcwp' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer left', 'bcwp' ),
		'id'            => 'sidebar-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer center', 'bcwp' ),
		'id'            => 'sidebar-5',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );	
	register_sidebar( array(
		'name'          => __( 'Footer right', 'bcwp' ),
		'id'            => 'sidebar-6',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );	

	//Custom widgets
	register_widget( 'bcwp_video' );
	register_widget( 'bcwp_Recent_Comments' );
	register_widget( 'bcwp_Recent_Posts' );
	register_widget( 'bcwp_About' );
}
add_action( 'widgets_init', 'bcwp_widgets_init' );

//Custom widgets
require get_template_directory() . "/widgets/video-widget.php";
require get_template_directory() . "/widgets/recent-comments.php";
require get_template_directory() . "/widgets/recent-posts.php";
require get_template_directory() . "/widgets/about-me.php";

/**
 * Enqueue scripts and styles.
 */
function bcwp_scripts() {

	wp_enqueue_style( 'bcwp-bootstrap', get_template_directory_uri() . '/css/bootstrap/css/bootstrap.min.css', array(), true );

	if ( get_theme_mod('body_font_name') !='' ) {
	    wp_enqueue_style( 'bcwp-body-fonts', '//fonts.googleapis.com/css?family=' . esc_attr(get_theme_mod('body_font_name')) ); 
	} else {
	    wp_enqueue_style( 'bcwp-body-fonts', '//fonts.googleapis.com/css?family=Noto+Serif:400,700,400italic,700italic');
	}

	if ( get_theme_mod('headings_font_name') !='' ) {
	    wp_enqueue_style( 'bcwp-headings-fonts', '//fonts.googleapis.com/css?family=' . esc_attr(get_theme_mod('headings_font_name')) ); 
	} else {
	    wp_enqueue_style( 'bcwp-headings-fonts', '//fonts.googleapis.com/css?family=Playfair+Display:400,700'); 
	}	

	wp_enqueue_style( 'bcwp-style', get_stylesheet_uri() );

	wp_enqueue_style( 'bcwp-font-awesome', get_template_directory_uri() . '/fonts/font-awesome.min.css' );	

	wp_enqueue_script( 'bcwp-parallax', get_template_directory_uri() . '/js/parallax.min.js', array('jquery'), true );	

	wp_enqueue_script( 'bcwp-slicknav', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array('jquery'), true );	

	wp_enqueue_script( 'bcwp-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.min.js', array('jquery'), true );				

	wp_enqueue_script( 'bcwp-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), true );	

	wp_enqueue_script( 'bcwp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'bcwp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bcwp_scripts' );

/**
 * Customizer styles
 */
function bcwp_customizer_styles() {

	wp_enqueue_style( 'bcwp-customizer-styles', get_template_directory_uri() . '/css/customizer.css' );	

}
add_action( 'customize_controls_print_styles', 'bcwp_customizer_styles' );

/**
 * Change the excerpt length
 */
function bcwp_excerpt_length( $length ) {
	$excerpt = get_theme_mod('exc_lenght', '55');
	return $excerpt;
}
add_filter( 'excerpt_length', 'bcwp_excerpt_length', 999 );


/**
 * Footer credits
 */

function bcwp_footer_credits() {
	echo '&copy; '.date("Y").' Kristen M.';
}
add_action( 'bcwp_footer', 'bcwp_footer_credits' );

/**
 * Load html5shiv
 */
function bcwp_html5shiv() {
    echo '<!--[if lt IE 9]>' . "\n";
    echo '<script src="' . esc_url( get_template_directory_uri() . '/js/html5shiv.js' ) . '"></script>' . "\n";
    echo '<![endif]-->' . "\n";
}
add_action( 'wp_head', 'bcwp_html5shiv' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Banner
 */
require get_template_directory() . '/inc/banner.php';

/**
 * Styles
 */
require get_template_directory() . '/inc/styles.php';


add_filter( 'post_thumbnail_html', 'bcwp_remove_size_attribute', 10 );
add_filter( 'image_send_to_editor', 'bcwp_remove_size_attribute', 10 );

function bcwp_remove_size_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

function bcwp_imagelink_setup() {
	$image_set = get_option( 'image_default_link_type' );
	
	if ($image_set !== 'none') {
		update_option('image_default_link_type', 'none');
	}
}
add_action('admin_init', 'bcwp_imagelink_setup', 10);