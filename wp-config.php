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
define( 'DB_NAME', 'ad_comp' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'jes1zzjgpxedhofkpag4qirzz91rov9khe3q4d0nrnaahuldgfcnpuuyxgqxza90' );
define( 'SECURE_AUTH_KEY',  'jztehvuy9wmtvstiqfzkcazaozrlpugurdxegee9eo4lrrvqkiumffdv0w3rrsfm' );
define( 'LOGGED_IN_KEY',    'gw0oumpr4gtv5dpccm3g13ml1x4plofhtm2cssygwyhbhagdu16iqputptqavktk' );
define( 'NONCE_KEY',        'kgkdlvrm2hlyslyydmgjmtaswthan2augrgvyymxidpoxj33gaztrmz7kjb3bv6p' );
define( 'AUTH_SALT',        'ugc6tnmaypimfsda8lm6cjldtyg9kkwaupelguhtgnalqvmkudkwk0apimt7ml05' );
define( 'SECURE_AUTH_SALT', 'dkl7gsyw5lpkfz85csbrkyxhnjc4ecfrrqek0reuhgt6wleaxlkx4nrsdm8sbqw3' );
define( 'LOGGED_IN_SALT',   'thbgjqt0wz6bpca5ps0s5awhur6hrrmluxnmukrvgghicnj5zl11pt0hg5hxcsii' );
define( 'NONCE_SALT',       'n1s7h8pbcwr0jkafjyhazu2ytfvjulkewf0lswdxrwtftszsh2fukevzhmniiclm' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wptj_';

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
