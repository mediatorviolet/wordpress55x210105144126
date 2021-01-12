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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress55x210105144126' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '[mp8[p>jD7[iQKWf~BZD_#gT[{,6t6N)D:VF4kR!lh@I,JxA9:/4> a-7o;SQ[Zd' );
define( 'SECURE_AUTH_KEY',  'bE$FDXoPR#Gn;a8j8{%p-Rs_<s!s(Cv$,qA@mqz<>0c|Z{g4&W,57tl5X/gw%F]7' );
define( 'LOGGED_IN_KEY',    'P/TqcMG@=Z^1%)hL6N}c0B72-u!PyO{r;ANr5tGF[>8u#0im&KuYcS)UN;.O^tfI' );
define( 'NONCE_KEY',        '_dW$;K~gI%zuZgc[ehNx6,z_l%&CJ+M/;HT%nEc;yDj7s8(0eT+Qfb-n6}=R.CvO' );
define( 'AUTH_SALT',        'r2@t6oN~P?f(i%2MNOl2lX]_2eLdOc4Ns9oy;pO<-lYpo6Cf7]q7hlM7SuKNiz<q' );
define( 'SECURE_AUTH_SALT', 'U!w_sYnZq8$iA-LQE|ld#{h1jvP>zz3a3:z7DM9ljtr%`9&3F@y9cT=(yr8FC x+' );
define( 'LOGGED_IN_SALT',   '(R$(k?utG4pE*S=7_Ip)bbBhqgKK-el:r_$rd<{bVf_xP.RGq8s#$_|=1$*^6Y]-' );
define( 'NONCE_SALT',       'rp@qRRX,SQ(+~TOh5#NwGf#HpJNB5o?gE9}9 o!;$zENlQ-}w{yB_{q<+Xv2sWGn' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
