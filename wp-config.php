<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'uniskies01');

/** MySQL database username */
define('DB_USER', 'uniskies');

/** MySQL database password */
define('DB_PASSWORD', '6FYRmx*');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'qJz=7Uk|GdT<#.7K]<4YbO4PM_lu$-i.z1t paSGcH CRBRNIK>6+EUaAswo&Zvq');
define('SECURE_AUTH_KEY',  'ER*gZL8#<ePUG2}!-|+II KzEQDh+rNqiI9Io6k5>GIu[pBr_+8~o[C-YDOg?_S[');
define('LOGGED_IN_KEY',    'dp7%C6bo?Kad0C| )kB,jYD!qdE>+|^/-3{9X5=t>.|fx/uAnoE6GQ8j4f7M+ 5u');
define('NONCE_KEY',        ')u-hIwQ|-l^nrPBWzqHX:K/CR&I<Ko#q.rRcS1zrXfpAC-bGD>+|.LC>%-+0S-j4');
define('AUTH_SALT',        '/+l4]nh3q>@o>0SH))YCFk8(Dzkt7!,HMpWB)z.5>bz7B4gmCTHw2X!}&`B`tJA@');
define('SECURE_AUTH_SALT', 'bF%h=pZ(+0Oj+m f&F9|MUr%KQxM+%Y28^uA|dT:6Ba4RNX]L$2Ha:[kcR@?dvIp');
define('LOGGED_IN_SALT',   '9|P#pkFO47IfPB7i=ump+4{Y>ac|?k1nHz^z3G@|td>2>z8HY8Rbm=dia]{-,IDk');
define('NONCE_SALT',       '.acRGdQ2C:^L-E#`FP`2GqKH!hUZy5N :MEIFqG8H+I|MzUDuY!`uD)w?Fs/>mzq');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/'); 

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');                 
                    
                    