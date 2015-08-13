#BLANK
by [Guillaume Molter](http://guillaumemolter.me) for [B+G & Partners SA](http://bgcom.ch/)
##A Wordpress boilerplate theme


###1) About this theme

This theme is a blank canvas for __web developers who who already have a very good knowledge of Wordpress__ and who need to build a wordpress website from scratch. __This theme is not functionnal as it is__. It just contains the very basic files & codes that are common to 95% of WP projects.

###2) Philophy
There is no good way or bad way to use this theme. It's only meant to speed up and ease your development process.

This theme was not build to be perfect or suite a lot of differeent use cases. It's only made to match the way we develop our sites at B+G. However we still thought it would be usefull for other developers who have the same workflow.

###3) Installation

1. Like any wordpress theme drop it into /wp-content/themes/
2. In footer.php customize the desired jQuery version from the jQuery CDN or replace jQuery by another library.
3. In footer.php replace the Google Analytics Id by your own id.

###4) What's included
- A whole bunch of usefull standard WP template files
- HTML5 Shiv v3.6 - Add HTML5 new html elements support for old browsers
- Json2.js - Add JSON support for old browsers
- jQuery 10.2 - via the official CDN - If you don't know what jQuery is you should use a different theme.
- Google Analytics tracking code
- Eric Mayer's CSS Reset 2.0


###5) Structure 

####/customize/
To avoid clutering functions.php and improve readability and maintainabily we decided to split it in several php includes that are all located in /customize/. See __functions.php__ to see what goes where.

####/ie/
This folder contains all the IE specifics hacks & tweaks. This files are only included when necessary.

####/styles/
Same idea as /customize/ avoid clutering style.css and improve readability and maintainabily we decided to split it in several css @import includes that are all located in /customize/. See __style.css__ to see what goes where.

####/js/
- main.js should contain your website main logic.
- all other JS/jQuery plugins/etc should be located in this folder.


###6) Licence
WTFPL

###7) Future enhancements

- Include Modernizr
- Replace hard coded <link> & <scripts> by using and leveraging wp_register_script / wp_enqueue_script  
 