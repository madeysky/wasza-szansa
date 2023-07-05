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
define( 'DB_NAME', 'pawel' );

/** Database username */
define( 'DB_USER', 'pawel' );

/** Database password */
define( 'DB_PASSWORD', 'mayday2000' );

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
define( 'AUTH_KEY',         '>{t%KusaCF2:?aX|$<$-TJ4Kqp~1&:?y/X4FrsgF9KP]tHS/d,q^]I}wEnUcWiyF' );
define( 'SECURE_AUTH_KEY',  '4T2x/]t@<WP]!$@p$oFp]$GsL9c@P)HA8h-uGN}:W?1>[Tw#Iu,3~^M${IK^8%j2' );
define( 'LOGGED_IN_KEY',    'OQ9S]0RA;Es`#]xjET4F+a1{`PoE0idsTTAHDc|;STn3!>owoQIJK?Mgv@Q62>3<' );
define( 'NONCE_KEY',        '/*Sz<bXrNlT;5+!SQdN ?XnFaC!iM|?Pg|<g5][3@m.9vjk_jB`54sRB&|shc Yq' );
define( 'AUTH_SALT',        ':W(p0suWnXPFy}naii!fl6iHESEG(+aC<)uVwvF;ck(yvSMR5H!IH9q;Cz;j!G$S' );
define( 'SECURE_AUTH_SALT', 'p9*2l:uTub5qf=Mc@:-S|l:|iF!iC[}Mf2u2,P;;Z?h3yvb6^YNms5uwck2zPRV6' );
define( 'LOGGED_IN_SALT',   'U<^YP?MVkm|#J9>1A.Iq_H$@1[kbQ/ZB5]^A~Tdo:xSGP0[~^_WZwK .h{bWjPMF' );
define( 'NONCE_SALT',       'tl>))Dg^Nqa<aY<Cnr[a6:U@ nU6UJ]o5[-4>|Xa^4m;oC}m{><]4D9?]95&m{pC' );

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
