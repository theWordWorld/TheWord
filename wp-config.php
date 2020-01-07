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
define('DB_NAME', 'TheWord');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '*-@7R(sjlxl)7B$6r1 JTsRt`SaqS4EHn[:s<#DRD5/[VFFbx$t[D^0_Q|r1$A6M');
define('SECURE_AUTH_KEY',  'V+/e%tL14S*v]E;+RCj-&k]JC6-!OX72VX1])7ewV7bC>r38Yf(?_k?3WLv4:G?6');
define('LOGGED_IN_KEY',    'SI[UsH*n.>M$=/EAI,]Ah${$=AKa?9@9YK}0svH7JU%S`F3xv.r*2s=}v-xiu&tR');
define('NONCE_KEY',        'Y9#)gjWiNQR+n*cbFavFw!F%<@zj%SH!z:88+t GP:jG+,$q4^ c#mU(tDROj+?8');
define('AUTH_SALT',        ';>XP@3!ln}s9C-1$5bles?Jk%%o`&S$f^A4Aj4Oi,lOew4ReDGN:3%NxeAR&{?0x');
define('SECURE_AUTH_SALT', 'Fc)+m<!rEgc2-{iM.u:0?fVO0>orxE=~EMsCHBbZ?yi5ss?f@{GF^o(n?#_#PJ<6');
define('LOGGED_IN_SALT',   '%AC-4r TY=yDQ1I$E_A]r!28!ha| 29=b_Qsmmd*bg<_qG]%{HeI4S%pap8B5<$n');
define('NONCE_SALT',       '7)-pag~X*tU:oT/2<*~^9=tEZUe9B]S9F}HOGDa|2)MJa#HdKFsoVl($S~_q]G`/');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
