<?php
	


function twentyfifteen_child_scripts() {
   wp_enqueue_style( 'twentyfifteen-style', get_template_directory_uri().'/style.css' ); 
   wp_enqueue_style( 'twentyfifteen-child-style',get_stylesheet_uri()); 
   //wp_enqueue_style( 'twentyfifteen-fonts', twentyfifteen_child__fonts_url(), array(), null );
   wp_enqueue_script( 'twentyfifteen-skip-link-focus-fix', get_stylesheet_directory_uri() . '/js/child-scripts.js', array( 'jquery' ), '20141220', true );
   wp_enqueue_script( 'google-maps','http://maps.googleapis.com/maps/api/js?sensor=false', '20141220', true );
   
   wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.2' );
   
   wp_localize_script('twentyfifteen-skip-link-focus-fix', 'wpdata', array( 'siteurl' =>  get_stylesheet_directory_uri() )); 
}
add_action( 'wp_enqueue_scripts', 'twentyfifteen_child_scripts' );


function apt_sam_gmap( $atts ){
	
	$html = '<div id="map"></div>
    	<ul id="mapLegend" class="clearfix">';
	
	if(isset($atts["lang"]) && $atts["lang"]=="en"){
		$html .='	<li class="ico3">Le clos des Loirs</li>
    				<li class="ico2">City center</li>
					<li class="ico1">Grand-Massif Express (Ski lifts)</li>
					<li class="ico4">Mini Market</li>';
	}
	else{
		$html .='	<li class="ico3">Le clos des Loirs</li>
    				<li class="ico2">Centre ville</li>
					<li class="ico1">Grand-Massif Express (Télécabines)</li>
					<li class="ico4">Supérette</li>';
	}
	$html .='</ul>';
	
	return $html;
}
add_shortcode( 'google_map', 'apt_sam_gmap' );

function apt_sam_fbbut( $atts ){
	if(isset($atts["lang"]) && $atts["lang"]=="en"){
		$label = "Like it? Share it with your friends:";	
	}
	else{
		$label = "Vous aimez? Parlez-en à vos amis:";
	}
	return '<div class="fblike"><span class="sociable">'.$label.'</span><div class="fb-like" data-send="true" data-layout="button_count" data-width="300" data-show-faces="false" data-action="recommend"></div></div><div id="fb-root"></div>';
}
add_shortcode( 'fb_like', 'apt_sam_fbbut' );
add_filter('widget_text', 'do_shortcode');

add_action( 'bogo_available_languages', 'apt_sam_available_languages_cleanup' );

function apt_sam_available_languages_cleanup($langs=array()){
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	if ( is_plugin_active( 'bogo/bogo.php' ) ) {
		if(is_array($langs) && !empty($langs)){
			foreach($langs as $local=>$lang){
				if($local==="en_GB"){
					$langs[$local] = "English";
				}
				elseif($local==="fr_FR"){
					$langs[$local] = "Français";
				}
				elseif($local==="en_US"){
					unset($langs["en_US"]);
				}
			}
		}
		//print_r($langs);
		return $langs;
	}
}


add_action( 'bogo_language_switcher_links', 'apt_sam_language_switcher_links_cleanup' );

function apt_sam_language_switcher_links_cleanup($langs=array(),$args=array()){
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	if ( is_plugin_active( 'bogo/bogo.php' ) ) {
		
 		if(is_array($langs) && !empty($langs)){
 			foreach($langs as $key=>$lang){
				
				if($lang['locale'] === "en_GB"){
					$langs[$key]["title"]="English";
					$langs[$key]["native_name"]=$langs[$key]["title"];
				}

 			}
 			foreach($langs as $key=>$lang){
				
				if ( get_locale() == $lang['locale'] ) {
					unset($langs[$key]);
				}
				elseif(empty($langs[$key]["href"])){
					unset($langs[$key]);
				}

 			}
		}
 		return $langs;
	}
}
