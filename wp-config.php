<?php
if ( file_exists( __DIR__ . '/wp-config-local.php' ) ) {
	require_once __DIR__ . '/wp-config-local.php';
} else {
	var_dump('aws');die();
	define( 'DB_NAME', $_SERVER['RDS_DB_NAME'] );
	define( 'DB_USER', $_SERVER['RDS_USERNAME'] );
	define( 'DB_PASSWORD', $_SERVER['RDS_PASSWORD'] );
	define( 'DB_HOST', $_SERVER['RDS_HOSTNAME'] . ':' . $_SERVER['RDS_PORT'] );
	define( 'DB_CHARSET', 'utf8' );
	define( 'DB_COLLATE', '' );
	define( 'AUTH_KEY', $_SERVER['AUTH_KEY'] );
	define( 'SECURE_AUTH_KEY', $_SERVER['SECURE_AUTH_KEY'] );
	define( 'LOGGED_IN_KEY', $_SERVER['LOGGED_IN_KEY'] );
	define( 'NONCE_KEY', $_SERVER['NONCE_KEY'] );
	define( 'AUTH_SALT', $_SERVER['AUTH_SALT'] );
	define( 'SECURE_AUTH_SALT', $_SERVER['SECURE_AUTH_SALT'] );
	define( 'LOGGED_IN_SALT', $_SERVER['LOGGED_IN_SALT'] );
	define( 'NONCE_SALT', $_SERVER['NONCE_SALT'] );

	define( 'WP_DEBUG', false );
}

$table_prefix = 'wp_';


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
