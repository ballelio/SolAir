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
define('DB_NAME', 'SolAir');

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
define('AUTH_KEY',         'lSe-V<T7B> u)C>rO*TQmR?4se=S6iBirEV&4/6a9%}6BYO0>N^=74]{+@zLd$zt');
define('SECURE_AUTH_KEY',  '/,Sp1~f.eCR@< /+zrT~p]ZA{}kn(F$q{3`*V}$NGur{!AS*#u.C!32=5:/U;A?t');
define('LOGGED_IN_KEY',    '~q0e,)t rt!OZ0`L G?VWj^:3u! /SmzE$t35BC<wI]w#B-Z*ShE;@JyaC$H941%');
define('NONCE_KEY',        'nFE-9=knMys|*GS1u,zt@CdYKTR$={l5G,VPx_4_JL6Et^R>YYylpVqRsq1B#P 4');
define('AUTH_SALT',        '(ekz]64*ptKON-:.P-x4S.8:MzmbdeI7{k3&<U<0M!ZTlj Bt,I|dewD:<GOzaEs');
define('SECURE_AUTH_SALT', ':WxAd4sjKQ^ACa1ILaq.o`Td?9fB<$`;mB=m?{qrPk22o/xF}?0EPIht<h<qV/8c');
define('LOGGED_IN_SALT',   'znj)&V8hK=!Gh=+$d^4J20^&abiXIO+F`vo0 vT}Oh~-rKz~{@{lBYWCP&IQ0e~@');
define('NONCE_SALT',       '6bXL/$yGV<&%Q#BK56^jPS04jtG.(+$X>w3heQFf~&;3~mk<COWRXQpT&ry$t7Dh');

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
