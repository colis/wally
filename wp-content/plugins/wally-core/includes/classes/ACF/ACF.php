<?php
/**
 * ACF related functionalities.
 *
 * @package wally/core
 */

namespace Wally\Core\ACF;

use Wally\Core\Registrable;
use Wally\Core\Plugin;

defined( 'ABSPATH' ) || die();

/**
 * Class ACF
 *
 * @package wally/core
 */
class ACF extends Plugin implements Registrable {
	const JSON_PATH = 'acf-json';

	/**
	 * Register into WordPress
	 */
	public function register() {
		add_filter( 'acf/settings/save_json', [ $this, 'filter_acf_save_json_path' ] );
		add_filter( 'acf/settings/load_json', [ $this, 'filter_acf_load_json_path' ] );
	}

	/**
	 * Changes the folder where the ACF JSON sync functionality will save files into.
	 *
	 * @param string $path Where ACF should save the JSON file.
	 *
	 * @return string
	 */
	public function filter_acf_save_json_path( string $path ) : string {
		return $this->plugin->plugin_path . 'acf-json';
	}

	/**
	 * Registers custom folder within the plugin for the ACF JSON sync functionality.
	 *
	 * @param array $paths Where ACF should look for JSON files.
	 *
	 * @return array
	 */
	public function filter_acf_load_json_path( array $paths ) : array {
		unset( $paths[0] );

		$paths[] = $this->plugin->plugin_path . self::JSON_PATH;

		return $paths;
	}
}
