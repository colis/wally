<?php
/**
 * Classes that need to hook into WordPress must implement this interface.
 *
 * @package wally/core
 */

namespace Wally\Core;

defined( 'ABSPATH' ) || die();

/**
 * Interface Registrable
 *
 * @package wally/core
 */
interface Registrable {
	/**
	 * Register WordPress hooks.
	 */
	public function register();
}
