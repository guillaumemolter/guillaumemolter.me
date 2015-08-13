function initialize() {
    var latlng = new google.maps.LatLng(46.079412, 6.728702);
    
    var myOptions = {
      zoom: 14,
      center: latlng,
      scrollwheel: false,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    
    var map = new google.maps.Map(document.getElementById("map"), myOptions);
    
    var marker = new google.maps.Marker({
    	position: latlng, 
    	map: map, 
    	icon:wpdata.siteurl+"/images/map/ico1.png"
	});
	
	var latlng2 = new google.maps.LatLng(46.083877,6.727881);
	
	var marker2 = new google.maps.Marker({
    	position: latlng2, 
    	map: map, 
    	icon:wpdata.siteurl+"/images/map/ico2.png"
	});
		
	var latlng3 = new google.maps.LatLng(46.076371,6.721519);

	var marker3 = new google.maps.Marker({
    	position: latlng3, 
    	map: map, 
    	icon:wpdata.siteurl+"/images/map/ico3.png"
	});
	
	var latlng4 = new google.maps.LatLng(46.080752, 6.726952);
	
	var marker4 = new google.maps.Marker({
    	position: latlng4, 
    	map: map, 
    	icon:wpdata.siteurl+"/images/map/ico4.png"
	});
}


/**
 * Child Theme script file.
 *
 * @package twentyfifteen-child
 * @since 1.0
 */
( function( $ ) {
	$( document ).ready( function($) {
		
		if($("#map").length==1){
			initialize();
		}
		
		var offset = 220;
		var duration = 500;
		
		$(window).scroll(function() {
			if ($(this).scrollTop() > offset) {
				$('.back-to-top').fadeIn(duration);
			} else {
				$('.back-to-top').fadeOut(duration);
			}
		});
		
		$('.back-to-top').click(function(event) {
			event.preventDefault();
			$('html, body').animate({scrollTop: 0}, duration);
			return false;
		});
	});
	
	(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  if($("html").attr("lang")=="en-GB")
  	js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=253476674783021";
  else
  	js.src = "//connect.facebook.net/fr_FR/all.js#xfbml=1&appId=253476674783021";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
	
	
})( jQuery );


var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-20450692-4']);
_gaq.push(['_trackPageview']);

(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();