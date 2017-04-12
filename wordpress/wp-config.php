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
define('DB_NAME', 'combiot1_beautycarelife');

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
define('AUTH_KEY',         '@|CA-BhbW%jBYw&<$SI03+|>I=Iimsa$b[P0-TJQC_h:ILyv9I3F(~{MVPDO3P]?');
define('SECURE_AUTH_KEY',  'g-9:8NYGY$r8NG-*Oh`V;P[NhNyT[tS#,z^Pd#L8P,Sm2PF+en+?qm>^{[XzT@Zu');
define('LOGGED_IN_KEY',    'T@|L+s|j3zgOhUzm9JKOZSz*XP/su!qw[|t[|4a(hMBkNM)O;<?ift<P63}}97.S');
define('NONCE_KEY',        'p1m[2(`<U]GYxBk>eKDqlweti$`-ahWh#HsC*T-EJUg=w:l{489h#p]N`CoUzI !');
define('AUTH_SALT',        '%/4]6T<B=4{{W/E8@+gn1I@i,W>-sC1zs*iSs2^%|KO{,lha}IN`D<wo19{Q<Re}');
define('SECURE_AUTH_SALT', 'Qy;t~3Ylj[p-T,>-+>`~,X2dk7_aXDoZm4[A<0H7.>0Inh4di@PD0Z!`yju -&ut');
define('LOGGED_IN_SALT',   '|?:l@A_O8)7!_Z;.&By V-Oy|Qfs,~l6UouzP}}~+HO85P57KsiW6em^1F1-sqU.');
define('NONCE_SALT',       'U$djMz|y(SsF<`!z<HFdLBw=5%GHS=>FS+1U=I@`=<QM2AL+U(Hcp ~0Xf(})G=w');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
