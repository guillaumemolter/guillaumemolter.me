<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

/* Local settings contains DB Credentials, SALTS and the DOMAIN_CURRENT_SITE */
if(file_exists(dirname(__FILE__) . '/' . 'local-settings.php')){
	require_once(dirname(__FILE__) . '/' . 'local-settings.php');	
}
else{
	die(dirname(__FILE__) . '/' . "local-settings.php is missing, please read the repo's readme.md");
}

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'molterwpmu_';


/** Relocating the wp-content folder out of wordpress  */

define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/wp-app-content' );
define( 'WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/wp-app-content' );

define( 'WP_PLUGIN_DIR', dirname( __FILE__ ) . '/wp-app-content/plugins' );
define( 'WP_PLUGIN_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/wp-app-content/plugins' );
define( 'PLUGINDIR', 'wp-app-content/plugins' );

/** Disabling file editing from the admin  */
define('DISALLOW_FILE_EDIT', true);

/** Network setup  */
define( 'WP_ALLOW_MULTISITE', true );
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', true);
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

/** Domain mapping  */
define( 'SUNRISE', 'on' );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/wp-app/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
