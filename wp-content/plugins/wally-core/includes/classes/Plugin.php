<?php
/**
 * All classes should extend this abstract class so that we can add helpers to the main one.
 *
 * @package wally/core
 */

namespace Wally\Core;

defined( 'ABSPATH' ) || die();

/**
 * Abstract Class Plugin
 *
 * @package wally/core
 */
abstract class Plugin {
	/**
	 * Holds the instance of the main plugin to be re-used across other classes.
	 *
	 * @var object Main plugin instance.
	 */
	protected $plugin;

	/**
	 * Stores the plugin main class.
	 *
	 * @param object $plugin Instance of the main class.
	 */
	public function __construct( $plugin ) {
		$this->plugin = $plugin;
	}
}
