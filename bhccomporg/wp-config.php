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
define('DB_NAME', 'b7_19949253_slaaplog');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'IvwIpYyJ#XJ,d3kCsvZ|PHZL`Yc* WHGbO)AhHMTR b04t!d[i $[t/xDZSAxpbz');
define('SECURE_AUTH_KEY',  '8$8[z&qb|^q^Q.U!-Vs=z+|O;::5p 0uc&io<R<D<4qC^fXBFNJT[}|gB4Sxh$qT');
define('LOGGED_IN_KEY',    '%D(XMehTJD#Y>S+w.Bi8?VHaMtP7m) +i>-xtHQq2tm|d XM-IUp6UfRxE#:3VNe');
define('NONCE_KEY',        'emBV~MTF|$sUET+C?nuUQOXD2U3#Bce`tNLZ4{{o do,>76>dDws8{g.<)}z2Hr@');
define('AUTH_SALT',        '_2|t*M/[qz+?At+b;kZ|:i< woNODzO;I+Q2Jv~RCi+C~@NtSO /nSzZ]aH}>JXp');
define('SECURE_AUTH_SALT', 'M%`&!qy`/[jt|>~}p_S4DbZAR,H[;.qD[PQBCJA{ iT[n(Uy-M)OA4A_@l0AFOWx');
define('LOGGED_IN_SALT',   'a^_}053C-(R@gh4$z[%%V-Ga%q6Q8t/zmYBy}k_!Zr.y1e (K9|,i`H,&mI}6mE0');
define('NONCE_SALT',       'Pm+@=DRs<u.:Ne</R8^8xsj3scQ9n&#@p=<;~#([NaUD*bi2CjkL_#YYKwa:>qsP');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
