<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'ldp_icomm');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'D9RN#N(-=Lh<4E[b/SZCU- m+ -GeT~Y{t64siU9R9B%gqtX&:nFC-1U4Xw=f2I_');
define('SECURE_AUTH_KEY',  'duvk67PE|J-lW(.4KVHv}_I|pg+ :ckS-3ujHqecq9G;p?q;BM Am(/N4P3jpDQ_');
define('LOGGED_IN_KEY',    'fYD)%W`4SEP!){vWhW8o3hDw}4!7jr,So:+XN8Rz/z^P Lx[0%?h0*=2!{DE-X+3');
define('NONCE_KEY',        'P3Hd9>5Pu.i;it?^O_x$cMS*[:mJ1E}IyHDXBGS6PTLK2JJ|dbua^bXg;>f{@d}w');
define('AUTH_SALT',        'Ti{>%O6bD+SMLLO}|_@YuxqtK|0giafB5_#I)$?UEk/$Xd)h}C8|aGu8`p2G{K<s');
define('SECURE_AUTH_SALT', '`Au(++8bZAm}`Dd}M$=K{%pxj@~-/F9|}jb]HD:Fe$<2Ww<%xj|kMravXr:Lez91');
define('LOGGED_IN_SALT',   'l ~G;J}gL=lATQd4ot^(;{<-+0ggtxHX&Q_=&&-.-o:ZUCH5]MP]vqo9&xH/1M.-');
define('NONCE_SALT',       '?mh~ey0+O(X=,N;+[p) =]@$Jn&FP^QSdKwe}oEXQ]>}bF%3;Mf_1C-Y5>hZV3&H');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
