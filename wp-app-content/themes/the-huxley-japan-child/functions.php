<?php
	
	function huxley_japan_display_lang_switcher(){
		$links = bogo_language_switcher_links();
		
		foreach($links as $link){
			if($link["locale"]!="en_GB" && $link["locale"]!=get_locale()){
				echo '<p class="lang_switcher bogo-language-switcher"><a class="'.$link["lang"].'" href="'.$link["href"].'">';
				if($link["locale"]==="fr_FR"){
					echo 'Français';
				}
				else{
					echo 'English';
				}
				echo '</a></p>';
			}
		}
		
	}
	
	add_filter( 'post_gallery', 'huxley_japan_gallery', 10, 2 );
	function huxley_japan_gallery( $output, $attr) {
	    global $post, $wp_locale;
	
	    static $instance = 0;
	    $instance++;
	
	    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	    if ( isset( $attr['orderby'] ) ) {
	        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
	        if ( !$attr['orderby'] )
	            unset( $attr['orderby'] );
	    }
	
	    extract(shortcode_atts(array(
	        'order'      => 'ASC',
	        'orderby'    => 'menu_order ID',
	        'id'         => $post->ID,
	        'itemtag'    => 'div',
	        'icontag'    => 'div',
	        'captiontag' => 'div',
	        'columns'    => 3,
	        'size'       => 'thumbnail',
	        'include'    => '',
	        'exclude'    => ''
	    ), $attr));
	
	    $id = intval($id);
	
	    if ( !empty($include) ) {
	        $include = preg_replace( '/[^0-9,]+/', '', $include );
	        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	
	        $attachments = array();
	        foreach ( $_attachments as $key => $val ) {
	            $attachments[$val->ID] = $_attachments[$key];
	        }
	    } else {
	        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	    }
	
	    if ( empty($attachments) )
	        return '';
	
	    if ( is_feed() ) {
	        $output = "\n";
	        foreach ( $attachments as $att_id => $attachment )
	            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
	        return $output;
	    }
	
	    
	    $columns = intval($columns);
	    $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
	    $float = is_rtl() ? 'right' : 'left';
	
	    $selector = "gallery-{$instance}";
	
	    $output = apply_filters('gallery_style', "
	        <style type='text/css'>
	            #{$selector} {
	                margin: auto;
	            }
	            #{$selector} .gallery-item {
	                float: {$float};
	                margin: 10px 1% 20px 1%;
	                text-align: center;
	                width: ".($itemwidth-2)."%;
	            }
	            #{$selector} img {
	                border-radius:20px;
	            }
	        </style>
	        <!-- see gallery_shortcode() in wp-includes/media.php -->
	        <p class=\"gallery-legend\">(cliquez pour voir l'image en grand et avec la légende)</p>
	        <div id='$selector' class='gallery galleryid-{$id}'>");
	
	    $i = 0;
	    foreach ( $attachments as $id => $attachment ) {
	        $link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);
	
	        $output .= "<div class='gallery-item'>";
	        $output .= $link;
	        $output .= "</div>";
	    }
	
	    $output .= "</div>\n";
	
	    return $output;
	}

	add_action( 'init', 'huxley_japan_unregister_taxonomy');
	function huxley_japan_unregister_taxonomy(){
		global $wp_taxonomies;
		$taxonomies = array( 'category', 'post_tag' );
		foreach( $taxonomies as $taxonomy ) {
			if ( taxonomy_exists( $taxonomy) )
				unset( $wp_taxonomies[$taxonomy]);
		}
	}
	
	add_action( 'wp_enqueue_scripts', 'huxley_japan_enqueue_styles' );
	function huxley_japan_enqueue_styles() {
	    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	    wp_enqueue_script( 'google-maps', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false','',3,true );
	    wp_enqueue_script( 'child-scripts', get_stylesheet_directory_uri() . '/js/main.js',array('jquery'),1,true );
	
	}
	
	function huxley_japan_home_order( $query ) {
    	if ( $query->is_home() && $query->is_main_query() ) {
        	$query->set( 'order', 'ASC' );
	    }
	}
	add_action( 'pre_get_posts', 'huxley_japan_home_order' );
	
	
	function huxley_japan_home_slider(){
		
			?>
			<div id="slide-wrap" class="full-top-area<?php echo esc_attr( $slider_class ); ?>">
		
				<div id="load-cycle"></div>
				
				<?php 	
					$args = array('posts_per_page' => 16,'post_status' => 'publish','order'=>'ASC');
					$fPosts = new WP_Query( $args );
				?>
		
				<?php if ( $fPosts->have_posts() ) : ?>
		
					<div class="cycle-slideshow" 
					<?php if ( get_theme_mod('huxley_slider_effect') ) :
					echo 'data-cycle-fx="' . wp_kses_post( get_theme_mod('huxley_slider_effect') ) . '" data-cycle-tile-count="10"';
					else:
					echo 'data-cycle-fx="scrollHorz"';
					endif;?> 
					data-cycle-slides="> div.slides" 
					<?php if ( get_theme_mod('huxley_slider_timeout') ): 
					$slider_timeout = wp_kses_post( get_theme_mod('huxley_slider_timeout') );
					echo 'data-cycle-timeout="' . $slider_timeout . '000"';
					else:
					echo 'data-cycle-timeout="5000"';
					endif; ?> 
					data-cycle-prev="#sliderprev" data-cycle-next="#slidernext">
		
		
						<?php while ( $fPosts->have_posts() ) : $fPosts->the_post();  ?>
		
							<div class="slides">
		
								<div id="post-<?php the_ID(); ?>" <?php post_class('post-theme'); ?>>
		
									<?php if ( has_post_thumbnail()) : ?>
		
										<div class="slide-thumb">
											<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
											<?php the_post_thumbnail( "full" ); ?>
											</a>
											<div class="bg-overlay"></div>
										</div>
											
										<?php else: ?>
											<div class="slide-noimg"></div>
		
									<?php endif; ?>
		
								</div>
		
		
								<div class="slide-copy-wrap">
									<div class="table">
										<div class="table-cell"> 
											<div class="slide-copy">
												<h2 class="slide-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Read %s', 'the-huxley' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
												<h3 class="slide-subtitle"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Read %s', 'the-huxley' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php echo get_field("subtitle"); ?></a></h3>
												<a href="#main-header" class="arrow fa fa-angle-down"></a>
											</div>
										</div>
									</div>
								</div>
		
							</div>
		
						<?php endwhile; ?>
		
						<div class="slidernav">
							<a id="sliderprev" href="#" title="<?php _e('Previous', 'the-huxley'); ?>"><span class="fa fa-angle-left"></span></a>
							<a id="slidernext" href="#" title="<?php _e('Next', 'the-huxley'); ?>"><span class="fa fa-angle-right"></span></a>
						</div>
		
					</div>
		
				<?php endif; ?>
		
				<?php wp_reset_postdata(); ?>
		
				</div> <!-- slider-wrap -->
			<?php
		
	}
	
	
?>