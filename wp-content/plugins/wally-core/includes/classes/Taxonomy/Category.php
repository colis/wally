<?php
/**
 * Default WordPress Category taxonomy.
 *
 * @package wally/core
 */

namespace Wally\Core\Taxonomy;

use Wally\Core\Registrable;
use Wally\Core\PostType\CPT as CPT;

defined( 'ABSPATH' ) || die();

/**
 * Class Category
 *
 * @package wally/core
 */
class Category implements Registrable {
	const NAME = 'category';

	const CUSTOM_POST_TYPES = [
		// CPT::NAME,
	];

	/**
	 * Hook into WordPress.
	 *
	 * @return void
	 */
	public function register() {
		add_action( 'init', [ $this, 'action_add_category_to_post_types' ], 10 );
	}

	/**
	 * Register default taxonomies to given post types.
	 *
	 * @return void
	 */
	public function action_add_category_to_post_types() {
		foreach ( self::CUSTOM_POST_TYPES as $post_type_name ) {
			register_taxonomy_for_object_type( self::NAME, $post_type_name );
		}
	}
}
