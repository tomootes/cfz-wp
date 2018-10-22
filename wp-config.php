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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'cfz');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'h@rdC0d3d');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'CIpR#CDOF.I#i02=:]:IWC|Ud4Z/i] JAkb#C|:Cq6ehyO:R_PZYb]u[sUA.lv%g');
define('SECURE_AUTH_KEY',  'v71Ndv|dO(xV3{#./1avBd!_cMC(H*}`n]:1~@NdhYdUW4NgUjp*/[icZn`;R[-d');
define('LOGGED_IN_KEY',    '20~i.daEk05 PA6YOshxo>a=ANsJ_25Oub%gnd@>6y-#Ai~IVJ7Aj^t9HTvuln{B');
define('NONCE_KEY',        '(l@_4B*jV/}&M*<q!#0_b/ amT4|~g&t~?N{}ITxhh#j6Xm88Bx^q6Q@;@e/&y1T');
define('AUTH_SALT',        '6`Y)J~(h,NA?K$G)G;q,NjMP1Kvt9)-782N1%5Z:!(@[XVK,2?+*njcK,:6aVkxf');
define('SECURE_AUTH_SALT', 'S<`w<hvY0JTqN)m$rLP#5LeZAmMc*RB+`d4~7[C2sRBr&kyHR.Ql=0$2-eOyX@LE');
define('LOGGED_IN_SALT',   '=BuXL!(-/IO Vp{vQGt~Rz@pi}N`MZl+2,bKvni15J(6zm_e1ND @4G6NcS?dM.b');
define('NONCE_SALT',       '(Lr#MY>(66yxs=vN Ke&Hku:pKaKoGHCY}>ASN(-E:N%[6ghz/ v;Zj7P,-cu/|M');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

// // url of front end
// define('WP_HOME','http://cfz.local');

// // url of wordpress backend
// define('WP_SITEURL','http://cfz.local');

define('NUXT_URL', 'http://localhost:8000');
