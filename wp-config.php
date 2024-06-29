<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'musicalnote' );

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
define( 'AUTH_KEY',         'c96jGDxQh4dn%u<KzH8+o>P2jizSX8$3(@?Nj[S/42nY9IlK1_.sB;`~QJ&.>,Zj' );
define( 'SECURE_AUTH_KEY',  '!ZA.f8G?@J<r;9I.,@>9}I-@xl;$bgXU#3m$ka/LofEnsDku~&@_*D#>`WSp`$5F' );
define( 'LOGGED_IN_KEY',    'j@my#bc@=6(-fK5/L[l$H*9kCS%:AM_*ID144UZnq<bEV!6>ky%@3CgK1ME8P};f' );
define( 'NONCE_KEY',        'AyTCg1cB7#dV7 }vS!^NA,cBc3q|T^EjutIXd;{/AYWr}V&e3@|oLdW/|4{~e&qi' );
define( 'AUTH_SALT',        'Q]e=|,w#Ip3ka)~4E(r?&yS-r%zp9m&3tbtEa?pEaWTkU58ccIM-H.N+V0QN{P*)' );
define( 'SECURE_AUTH_SALT', '77x+=HnSB@.qlM:qsiolQ:J3TQ}.?bKz1#zlDAe,bpCSfqa=rzPLttjw%.]NigmF' );
define( 'LOGGED_IN_SALT',   '@*2+_HCul=wR8~]eiE*J,?2(m0p|:jRmR 1HU0GEds08qlK>BxLp!v8Qg11;FKBD' );
define( 'NONCE_SALT',       '3e<%5-wryBAj`0#6BT&!7@&C  gg:1icw_,,CGO(;t!{^VFO~6|pz+IcunKy*3f^' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
