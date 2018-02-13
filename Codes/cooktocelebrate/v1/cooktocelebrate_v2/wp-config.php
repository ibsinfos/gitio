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
// define('DB_NAME', 'test');
define('DB_NAME', 'cooktocelebrate_v2');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'BpbG-YO #>|aiJ<X+|/Ysxk_fKgG6CVA.+5UEu@z9JM|Bc|*7ZtW3M4SI7;d]}X^');
define('SECURE_AUTH_KEY',  '!fJ>U:-NvF2cj,6lEMR,:):qkT1UZ]r;Dk%mn4~U_{e=bs+mZ;UR>vm5g9gb2l B');
define('LOGGED_IN_KEY',    'B^GMA%Q;e!S}-CN@Td|o?!z8DSK<L-4%KKBaLH#nC80L)*?/+?&W6Ga8DEt:8[B5');
define('NONCE_KEY',        '|mdoU-$p{K=?4SKx7japZ9>#^*ii{!*2S2+A~|P jqPmZHY5)n yC:#yp`lJ$vDl');
define('AUTH_SALT',        'T70_ c0A-j=*J2O{,>>9^u75PqEm4ET7.eB`}#wj[]<@$2p(unYqTl?LB;z#4~#@');
define('SECURE_AUTH_SALT', ')4$YUyZBCY>;ZZ|Yv!u-+,vo4=`;Mm3[ P*#x7cvb0j<`4}S]+a>).Uca{{V%|5A');
define('LOGGED_IN_SALT',   ']B9ticb~7=|Pn(^tzK`/Hm>oy~Dao.oc|!0*Mks6yi|sk,[.1m1QW,tMI#b~7FPX');
define('NONCE_SALT',       '-J?]*mpUg^&Bql:XUmnDb8{1:YY!Cgv?eK)`atDzh7OMab`$8- oR=NHNn^|[o,3');

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
define('FS_METHOD', 'direct');
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
