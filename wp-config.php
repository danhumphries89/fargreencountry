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
define('DB_NAME', 'fargreencountry');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'tDY!,6c0hvJStFDhbYObhUpJ9N+|^2;T8jgXk5OdOI-bgfTL}xDe.B|D^]| b-/n');
define('SECURE_AUTH_KEY',  '#SOMJvM2Wf JNnBu08(~)Mj]a#hEV !%R1-DQp^&-D/=/(K%YU1YBu29T<|P+d>T');
define('LOGGED_IN_KEY',    ' .%%KhJ}|xQ;~^9, 9T+ER5?_/<}-Y=,`QNe{pZ[COpF)zVM460a[>>Axch4qVV*');
define('NONCE_KEY',        '33MheDQt(?H~z}j,/+X.nWM&,?t|my&;Xtg$ ml+#iHy+~N gp$37=|Pj~,=RTg?');
define('AUTH_SALT',        ' |M@j-&lu05z,x{r}W^]hnHYH5E~IC/X~YT7J*k//bj <+<ptd y/!lWp@>H4ke5');
define('SECURE_AUTH_SALT', 'QOxwW$go:{~[n3H45+v=f[{hL;U(NswLE[{|OGFcA0)4$[O3r2X)9b|Z0}D`mnp.');
define('LOGGED_IN_SALT',   '(`&G`zob frB:3aO; )<7~x=y}|dWLqWLOK9Z(=8j!_V9ybHARcCtB90H9qKz#c0');
define('NONCE_SALT',       'Ii4Q`^p}cV{|mGGb&j&+#I*eK&~g}hUGf!ZmD+e9[<npf!n }dl>zv)JJ3B#d,w$');

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
