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
define('DB_NAME', 'twistfox');

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
define('AUTH_KEY',         ',Rs:C=n!Ck=xU:gCc)OwJ?;+ONd=E>KkU1ND3-_Nv%Utvt6==iPHK9{:nU3{dtS`');
define('SECURE_AUTH_KEY',  'b5m10I9)>UAxUzC^R*D+(#(7}+|=qLa;*{c$* mV[^4A.P=hMcQOk7d79`Y}uwu^');
define('LOGGED_IN_KEY',    ']C@HWe`oi?uqSKM6Nd:*,]#-{Fg`MPcW ^{P#7wZhYRm_!%jUb`YgpmBIaQeo>Sb');
define('NONCE_KEY',        '*sU_z`j8S:Ri1cS<-d%hpm/EPaOaIX};Fo#08U`0UOUsFTNUD`+lkZ[astCyx7CB');
define('AUTH_SALT',        '~0~FUMax+Vq@Lf:U-!e0 HcpC3W& [uh)zbLMI!s{W&jRPejz`,+U5O!2+l3-iPr');
define('SECURE_AUTH_SALT', 'UmN[4 Qg<UnZ)h.x=h~*tgpm:6W(J1_HSB{4B+Ad%)Q]ur80~15<6PW],(iXMI9]');
define('LOGGED_IN_SALT',   'zK8/us=!s<<E|Kg`}B5~n1J0#X.)k9|Cen:X71$RnE.!c*Up_wk],mEwV3?q=k;`');
define('NONCE_SALT',       's}R{C5@n554ZtCB4 Nq?DyI|yQK-ntHVxyo%UR&8X`$xp&u85o/70p@SLwSsmrQK');

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
