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

$_SERVER['HTTPS'] = 'off';
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
    define('FORCE_SSL_ADMIN', true);
    $_SERVER['HTTPS'] = 'on';
}

if (isset($_SERVER['HTTP_X_FORWARDED_HOST'])) {
    $_SERVER['HTTP_HOST'] = $_SERVER['HTTP_X_FORWARDED_HOST'];
}

if (isset($_SERVER['HTTP_X_FORWARDED_PATH'])) {
    $_SERVER['REQUEST_URI'] = $_SERVER['HTTP_X_FORWARDED_PATH'];
}

define('WPLANG', 'fr_FR');
define('WP_AUTO_UPDATE_CORE', false);
define('AUTOMATIC_UPDATER_DISABLED', true);
define('WP_MEMORY_LIMIT', '512MB');

$siteUrl = vsprintf('%s://%s/', [
    $_SERVER['HTTPS'] === 'on' ? 'https':'http',
    $_SERVER['HTTP_HOST'],
]);

define('WP_SITEURL', $siteUrl);
define('WP_HOME', $siteUrl);
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', getenv("DB_NAME"));

/** MySQL database username */
define( 'DB_USER', getenv("DB_USER"));

/** MySQL database password */
define( 'DB_PASSWORD', trim(file_get_contents(getenv("DB_PASSWORD_FILE"))));
/** MySQL hostname */
define( 'DB_HOST', getenv("DB_HOST"));


/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         'R|]FS?b8_}Pk<v$~n_0r5ErMlm3-9XbI~0Qy+h23)L!D{$92&xP]TIY}QFG({pdb');
define('SECURE_AUTH_KEY',  'Aj.kIl]}o|/2?~z*A4V)6Z+nc~.k+Tke}=(7`,Ir-VGQFTh7HYV=e:@-o7zU(YR@');
define('LOGGED_IN_KEY',    'h;C0T:rS*@vO9D}%!A lCPk9.~GSMExw_vZ*PBw2*0.KI{y!ETC+hT8Bo5N;Mv<X');
define('NONCE_KEY',        '2|FO(/^N-8*+PPMHj-QC@n31 Ep43d]Hd*H@(KgjT<Rj^{jkr ghUJn@416|c=ni');
define('AUTH_SALT',        '-8/G#,- c0iHMTw9H0+7rYPS%+P!DOUAK1o04Z^rFk<&Ej&;J*s+PX2Fo|=U2j|;');
define('SECURE_AUTH_SALT', 'pT1S?] }7,{p&)8SAkI-*abG]8cn5`|d6 1}^3A,c*|t*r(g{FL3!GUSp|lbyT+9');
define('LOGGED_IN_SALT',   ';V+XY?qo[}nBlO/Yw|<AB`}D7@[GbJ|p|)NWBe{YqH+x5YB4T2Ug9(1N`HzJ;rW4');
define('NONCE_SALT',       '$v_|+uR+x{J1y:q%BG|6q4%[#t;}x<lV,S.X?$J@}B3 P14k8:t *S_%3I(kKvGt');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'qy1_';

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
define( 'WP_DEBUG', (bool)getenv('WP_DEBUG') ?? false );
define( 'WP_DEBUG_LOG', (bool)getenv('WP_DEBUG_LOG') ?? false );

if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
	$_SERVER['HTTPS'] = 'on';
}

if ( isset($_SERVER['HTTP_X_FORWARDED_HOST'])) {
    $_SERVER['HTTP_HOST'] = $_SERVER['HTTP_X_FORWARDED_HOST'];
}

define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
