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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ecoalt' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         ',=[TPlv_AfssDtV/r$VbXqo742N6&Sif.t zSqG8@#|L<cKYDE{qTtdsH<N4I.N8' );
define( 'SECURE_AUTH_KEY',  '6/%E].H91R#Bs1pjG,yXhv`OEZzz;=I(+A$f^;6IMloxp3-q>x3$K2GR,,xz5P`a' );
define( 'LOGGED_IN_KEY',    '$$/<j|5_x?r6=[Enn_U<GZ)*2hXm!W-I[Uw44TRz+bqZ[B[r(o/M]({rDfk7bzRu' );
define( 'NONCE_KEY',        'CEq(LHbAsCRz+[.my2Z+!=iY9vRZ;U]+&iJMv;(0(_%&XTrZ?gLDnN(fD+y5Yz(4' );
define( 'AUTH_SALT',        '|t.@?m[G)+4+@!JQ#Q*pn:8zURJA4#AK]jzwmHNCKDfk,w%qeWo~9u*jTapZ~?8v' );
define( 'SECURE_AUTH_SALT', 'MG*NHT8|6FDQ:vyxhee}@ L8%Mww(`2=qpxxwc_k7VXx=H0/pn8{5qj T<^P~$EH' );
define( 'LOGGED_IN_SALT',   'nXDJ!#,ft4psP|yRq)K+ sTjNd^@^F!Eh_Iv5aV,(tJ`=g8$.n<|!HaSx:*< }yh' );
define( 'NONCE_SALT',       '4pwSuCt5xVh=T-3~0NiQ4tIF4p@x{F]q6u wQwDi3{?w$Fa/$aeFHT6J^L{}N)m_' );

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



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
