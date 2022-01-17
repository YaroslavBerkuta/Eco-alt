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
define( 'DB_NAME', 'kc396874_ecoalt' );

/** MySQL database username */
define( 'DB_USER', 'kc396874_ecoalt' );

/** MySQL database password */
define( 'DB_PASSWORD', '!;899kkFRs' );

/** MySQL hostname */
define( 'DB_HOST', 'kc396874.mysql.tools' );

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
define( 'AUTH_KEY',         'Iv9LrMD;.M^aR!Vpc)hKg2.&7wE4uX$noO|;^:@6JB4rMEDxkrQWkBDu/ny$%p`_' );
define( 'SECURE_AUTH_KEY',  'd#x44:fj9+`nTqVHvoCP^7q8%X&3~a,o]AA0hsN:SDkoqaW3|g=3P!dZHeii RH{' );
define( 'LOGGED_IN_KEY',    '1<W{(QH?Q_NBjy}UCDb;L63sc/ }!ef802Sgh+h`w udYxgZA}1v1AX~lNm%u_*T' );
define( 'NONCE_KEY',        '*|N$66hz`&8fw_d>}hf|L~L(~Ki*W,)`R>a^YHz]45#n8yi,vk3g+D{_IWic0-91' );
define( 'AUTH_SALT',        '7TU|.2 kzhr*2vBCmH&CoU7428_zbNA5%3EhByR<`?Ubv}+a?Vdll`F>({4RJ>do' );
define( 'SECURE_AUTH_SALT', 'EKZUyN_dtvls^o_8z2wi12}8Y/;O>CR1*`.%4UKw~dq8$xJG3<-M|C`~H5b@4bo#' );
define( 'LOGGED_IN_SALT',   '`8S-sDgs~AJJ?YiG>N9}_-u4ZAw^@|G{dA^:zi#,KWE5+a)s]AA(wOh.sM|$I3X[' );
define( 'NONCE_SALT',       '9y_P*?.Tyqw[Dy<M>#l}-}4|xw}N+|zvP%D%`W />riscLxb|hNj#(nzU>>,-D/e' );

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
