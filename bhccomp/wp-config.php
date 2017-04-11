<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'bhccomp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '1JY(w%1~o4U0W.Ornl&o{~O|<xzWP^nq!MlbB.t@7&NS34@e=C3i6}-C^t(fvaRa');
define('SECURE_AUTH_KEY',  'kFQ~&Uh~Jv[k%#(#vK[SK+[eJB=_o>Q00RAn>Y9jRaEq,E> 0UCeyP=UzO&r$TmU');
define('LOGGED_IN_KEY',    'wF9n)Eq(!mx5V8ep)h.QB[z~+#.K4=f2Q&D.Z-+2{!MbQvTNQ) p:5/DIDI2eqem');
define('NONCE_KEY',        'g)=;w.yIlG6>7t_hVY[#iDE<8c{tK2*0<XeOHCjI@c@{rYb_JzCd-ij%@N(x.7Mk');
define('AUTH_SALT',        ',e3|EaIqW-4K7yriA.v,F`CZ{V3K+H([V.steiiGbt>~8a[dapb~q(PZ>%`kUsME');
define('SECURE_AUTH_SALT', '-8k!j*aAnC[{cJG1*E/>GTy%iWL~27|czR_g*EN@3?=1M+?Cj/5?5r1 b`ZLN8[ ');
define('LOGGED_IN_SALT',   'nxz5+r;F.{]1cG`^OAq<E|1*,[8)D!?NbK$x aNzC*vI-=x[_11DqVo|Ydmwrkv3');
define('NONCE_SALT',       'wW-Bvz!#~T_P,^{qbX$Qh.(e=+Rate)e_4:$a-el`(k!Jrf+1/nlPE5 3 .ljx|<');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
