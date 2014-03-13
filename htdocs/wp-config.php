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
define('DB_NAME', 'ldp_db');

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
define('AUTH_KEY',         '1zt&t--:_Uv,@W!^~e9L&B?@{+AkO.Y{:nBS#Qt2R;*8`D7_|1-*kU8n]q|cz;S?');
define('SECURE_AUTH_KEY',  'j)4taNA*H5.~-j/&Y,.d!+c6.L^QA!Qxhgk>-}iOL4,-MHisS4cZ-3ptzk0|G^2<');
define('LOGGED_IN_KEY',    'krl6B.6?`WuRi8:$d@{$hNj1m^kIe%zS#wfK)-(+$HA(Hjr^8O{.!R2k *iqR`R`');
define('NONCE_KEY',        '2@ce^dc;=QP4hh7y-KSo:Q7nOQ6AhIdYGwwd[GOG(pBVj`9W=(iMHOyLOE~#-|l2');
define('AUTH_SALT',        'eW|BE@8rYNT~lHY7]+~XeoeoR4M<r0YB>E4jMj;K)$?7Q#t^7u)S9[ehLlICUK%0');
define('SECURE_AUTH_SALT', 'p)+x+b+*]h}@Bo(+mOyHNF_~]<eoQ%OXoB_;)+ c~9e%QJ#`|ish#*+ByXJZCLR|');
define('LOGGED_IN_SALT',   'Djl m,v z:6B[+c/k-n@ziXrEYmzS1WmXSWUUsc0Q7b^QaH& z0!w>e2uh|p5*&=');
define('NONCE_SALT',       'ks-0R(WZeYk-@|?3,H8<ZuL;>J.T,+~UEVb|c<0r&Hr;Rl#2Rxp4ufOO3`fPI$z*');

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
