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
define('DB_NAME', 'solbyinfotech');

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
define('AUTH_KEY',         'A]w$L$Yn:7[:-0GlPQ2,g/2t>;Xc%kqB+DC^Pj-23.O*.5||5J-=u|7O9q+<_BxN');
define('SECURE_AUTH_KEY',  '[#O0E$1}DfCx5G6--V7Y^K R,n%$M er`9d_|N;3DShCuJV{WJAAg*mb(+E0j_uX');
define('LOGGED_IN_KEY',    'w*s3kqsI(vI-<*qHxcS/)<^m=a&qrXdRw=_g@z!,=huIP^1o|86GJ/S_k?#|1]dT');
define('NONCE_KEY',        'aIPU)y{#CiL$Qw*AE9(5Ygp}xajI6{^/XhlohJ-jRI?o&IZc yj#dh$s.!^JkFm_');
define('AUTH_SALT',        'G%.h{jS$XrSU2!})kT6(gi<WB4T<P1|K:`JGb]Vk1.&wd;*7|o@WP^Z^#4B0QzSG');
define('SECURE_AUTH_SALT', '2(yL`VVY`onTQ~!)g0-y{@`TfNdKTRF7?(DupN`lMw;IJ:# W0|I[~h6r|L(R~}0');
define('LOGGED_IN_SALT',   'Y4-%tX!}Q~=?Xf+l<{Xt^vF63;8TEc8L2.lG1mJ]rc/zDgCeeQe{%k]X_<oK )p4');
define('NONCE_SALT',       'LGCe@%}g%O7J:cyY^eS[B@4(53,j5wX$+3HW@>AH$C])TdA8*HoQ`fSSf!CG ut=');

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
