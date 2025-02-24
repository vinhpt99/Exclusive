<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'exclusive' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '@EW?ybF-JjF:~%fH?EoecXa[53yJvoNBSHuW0Jg^=,h]|5?1YgZEx2VvnX^?uPL4' );
define( 'SECURE_AUTH_KEY',  'a8fkf,3^7AhoY~]cOgSMPkn(O>voBfk{k>CHyWve^^sFpAaI8DHjk/$r:W6sDCbS' );
define( 'LOGGED_IN_KEY',    'E>dhe9GAF0g0[il-2}eP&,[5Mer8yk)hEY&6kt`J)iXk?RKDE8BAHFGOkx,!*4Ji' );
define( 'NONCE_KEY',        '82R|7CTb})Gt)hl<mX>Qb}9C9Ji<2$N4O%jqh7!DVfujHBiPKjFi2l*xljV2IZ)y' );
define( 'AUTH_SALT',        '9xU;rcsw(95jL~`>&h1D/wIRl7^=`xFp?~t#cVgqe-i(Dc^!E@ZJRBvKRx_-}wM]' );
define( 'SECURE_AUTH_SALT', ' _cX~p+6{3;.UgDHd]]fDCPij1;PM]##2>IXcD|B_sHRYUrS6JfC>h6fqmQ|c9,k' );
define( 'LOGGED_IN_SALT',   '[yR0~[q%9?-{ +t=dg;z5qcRm?WP ,oWK^?oNMHd=<23V@Thvv)b)(t,KG%TZ]Z[' );
define( 'NONCE_SALT',       '&oAxbHz_Elo9ga=<.m^Brf`u-J5R}.T4i@A;P%[(CEdC$PKqX?Fl&:>LKHq[dLM&' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
