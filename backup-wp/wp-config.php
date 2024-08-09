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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u235356948_linhblog' );

/** Database username */
define( 'DB_USER', 'u235356948_tam' );

/** Database password */
define( 'DB_PASSWORD', '%GhMYy4G_CQiyYz' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          '3~45-vcM?cEqdVup|&WZ.(>;|}mYLkIDX_Kgb*;!@Th/VFN8chAyd3eD+R=BiP=?' );
define( 'SECURE_AUTH_KEY',   'Wu)A~N&4=bQ.oK{pVkpSmu$hzeJ]WPIUS;U~-~Z!rU[`*Np<RVuTOC>n|?01p!M ' );
define( 'LOGGED_IN_KEY',     '@U>d #w8k3.djlnO%_i&qz1*PnLse4)VNltJ&G{Ua_uV8Z1i6K!H>0c,V53:^k1?' );
define( 'NONCE_KEY',         'u.qn.:vl_Kn;^(wLi9l_#)]+Wl!uaL-]bD hJh+!x<Fitu]e^9V=dry=k((*Ot-:' );
define( 'AUTH_SALT',         'IFeJw7OAB/s58VK2HQ]10RqZ?mwBfa!Or}*WlF8>f<jY+?Jab!4ap-UDP{*faPl+' );
define( 'SECURE_AUTH_SALT',  '=tBQ5}x-FEndB-f+84rh.83qWxB73WXEmzLgKem@&~#VRSri6wIPdnv_5QR@lGqY' );
define( 'LOGGED_IN_SALT',    'v><zc(J9*4ga2ST(A44(8(!L8>u&$jnQ!d9p3m)$wQ|=B=S7`HG]WaCe)!8mqm?<' );
define( 'NONCE_SALT',        'yU)},H8;[&QISw;M54WNN^?OX,:PiV9Mei~fR#e{dp!z2,mtKSvCbjhvs@Pi.wKu' );
define( 'WP_CACHE_KEY_SALT', 'oB2emQ.G0vU^g{:/(+Vwk6BDvM:*daXMzjV_iS&EOdHHf:&42/<w1N r:u9TS&Y8' );


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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );


/* Add any custom values between this line and the "stop editing" line. */



define( 'WP_AUTO_UPDATE_CORE', false );
define( 'FS_METHOD', 'direct' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
