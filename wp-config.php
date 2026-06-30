<?php
define( 'WP_CACHE', true );

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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'agebreaker' );

/** Database username */
define( 'DB_USER', 'wp' );

/** Database password */
define( 'DB_PASSWORD', 'wp' );

/** Database hostname */
define('DB_HOST', 'mysql:3309');

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
define( 'AUTH_KEY',         'W)[8CNkP5g*uDa<L(6j:r$yS!z6lobK}Gd !(knAUI:0,x^)bI<m(6p,GjrI4: f' );
define( 'SECURE_AUTH_KEY',  ' L<f@M&BngIrVuoi6 <CgSCvBghBr^YAMVNYZY5*J{TJ_(9B8?B==R88OkknLe?P' );
define( 'LOGGED_IN_KEY',    'nORw%#5j[0Ccix{Iu7|!M[Cc!$Y9DZ0es^sZ#mNS|aV7BK`UUQ/t`7%QR|DP 6-)' );
define( 'NONCE_KEY',        'U_PuUmU4ra7i5plO0DT;|1oZ3wxo!@uLw-T VA/bq(,j2$]W=/:Jo}H|Kd]aa(+s' );
define( 'AUTH_SALT',        'BR[CWA}e3~$a6B~[)U<E+(4KCl!hHdQ@t-&YIy|[R3pm]v8iyibsi6g|:w*]rwC<' );
define( 'SECURE_AUTH_SALT', 'l&2+@+9Qrs;7 ]xj:.cd9Ary!7Wu3S+vq8ZPrb,LUs{AOp5kOPm,e{lu/Eg&rz<a' );
define( 'LOGGED_IN_SALT',   '1fRc+D(`>-fw].<7cG9W!.^eCZOsfU1 0KF3N@S;VvTe,0iJhpQ. GOYIa}zms[s' );
define( 'NONCE_SALT',       ' Stf*p!MKiKnU$7R`]ogFghu9~b<a-G84`!BAV?7XdQ`dMf}dzG;/Qpfe28 iY;5' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'age_';

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



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
