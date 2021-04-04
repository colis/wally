<?php
// Composer autoloader -- must be first.
if ( ! is_readable( WP_CONTENT_DIR . '/vendor/autoload.php' ) ) {
	// phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_trigger_error -- required for detecting broken deploys.
	trigger_error( 'Cannot find Composer autoload.', E_USER_ERROR );
}
require_once WP_CONTENT_DIR . '/vendor/autoload.php';

// Load client-mu-plugins here!
$wally_mu_plugins = [];

foreach ( $wally_mu_plugins as $plugin_path ) {

	if ( empty( $plugin_path ) ) {
		continue;
	}

	if ( ! is_readable( __DIR__ . $plugin_path ) ) {
		// phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_trigger_error -- required for detecting broken deploys.
		trigger_error( esc_html( "Cannot find a mu-plugins with slug {$plugin_path}" ), E_USER_ERROR );
		die;
	}

	require_once __DIR__ . $plugin_path;
}