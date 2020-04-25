<?php
/**
 * Plugin Name: Wally Core
 * Plugin URI:  https://github.com/colis/wally
 * Description: Core functionalities for the veronicaurbano.it site
 * Version:     1.0.0
 * Author:      Carmine Colicino
 * Author URI:  https://github.com/colis
 * Text Domain: wally-core
 * Domain Path: /languages
 *
 * @package wally/core
 */

// Useful global constants.
define( 'WALLY_CORE_VERSION', '1.0.0' );
define( 'WALLY_CORE_URL', plugin_dir_url( __FILE__ ) );
define( 'WALLY_CORE_PATH', plugin_dir_path( __FILE__ ) );
define( 'WALLY_CORE_INC', WALLY_CORE_PATH . 'includes/' );

// Include files.
require_once WALLY_CORE_INC . 'functions/setup.php';

// Activation/Deactivation.
register_activation_hook( __FILE__, '\Wally\Core\Setup\activate' );
register_deactivation_hook( __FILE__, '\Wally\Core\Setup\deactivate' );

// Bootstrap.
Wally\Core\Setup\setup();

// Require Composer autoloader if it exists.
if ( file_exists( WALLY_CORE_PATH . '/vendor/autoload.php' ) ) {
	require_once WALLY_CORE_PATH . 'vendor/autoload.php';
}

new Wally\Core\Main( __FILE__ );
