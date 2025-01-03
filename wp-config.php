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
define( 'DB_NAME', 'dbs13649387' );

/* MySQL-Benutzername */
define( 'DB_USER', 'dbu439248' );

/* MySQL-Passwort */
define( 'DB_PASSWORD', 'SolarSolutionsGmbH!' );

/* MySQL-Serveradresse */
define( 'DB_HOST', 'db5016923583.hosting-data.io' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define('WP_HOME', 'https://solarsolutionsgmbh.com');
define('WP_SITEURL', 'https://solarsolutionsgmbh.com');

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
define( 'AUTH_KEY',         '@ol$#$B`2oKM7r=sY-7I3Us]mpj@^*5@^!QmZJvEsL9S2#iq+gW 4tx#1ds(%^I^' );
define( 'SECURE_AUTH_KEY',  ']2iLZ`EwX1tWd1~{U#SL-,X}pua8~)}omp|NCh| z,_>Sp.jNm}t*{6H*MI)Xa8e' );
define( 'LOGGED_IN_KEY',    'b!mF#DAG5Y)@6K@:C.lcBUE. ;#FS:4=%haAsurM^6-IQ+6+iL>_ Ss(Kh+>lE)Q' );
define( 'NONCE_KEY',        'hWmH@?,8<dbGoW1ppJayrbw?cQ&7ul/Iu7aMMh-LW$X(vASUN+4tyUc,@,L]#G=m' );
define( 'AUTH_SALT',        'Yh]+F;7MLgAlG[zdv{>`mj,,[WpPE<y1O;Cwm-,mTOYUsvT;ybqH^Up4xDG<XE6_' );
define( 'SECURE_AUTH_SALT', '7*1RmB/</G*JNzyuyUJP?NRP8v_M5Z$||XwVyJ|(7{`wm4i^Nx[V?j?%F$C>9?L@' );
define( 'LOGGED_IN_SALT',   'dtC+jdhB%C1$xA#Fmv}t-mBX-$*ftx6DkY4z.n7<o}&P%`IL`,~)Py;<*v4~kRK(' );
define( 'NONCE_SALT',       '$AY@ 0tj%n*H+pe^.2%xZ{K)+8z`Hh+QEeD#W}g-#^2Tmj+M$Eoj:mYZjL&WW/Av' );

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
