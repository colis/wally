<?php
/**
 * Default WordPress PostTag taxonomy.
 *
 * @package wally/core
 */

namespace Wally\Core\Taxonomy;

use Wally\Core\Registrable;
use Wally\Core\PostType\Project as ProjectCPT;

defined( 'ABSPATH' ) || die();

/**
 * Class PostTag
 *
 * @package wally/core
 */
class PostTag implements Registrable {
	const NAME = 'post_tag';

	const CUSTOM_POST_TYPES = [
		ProjectCPT::NAME,
	];

	/**
	 * Hook into WordPress.
	 *
	 * @return void
	 */
	public function register() {
		add_action( 'init', [ $this, 'action_add_tags_to_post_types' ] );
	}

	/**
	 * Register tags to given post types.
	 *
	 * @return void
	 */
	public function action_add_tags_to_post_types() {
		foreach ( self::CUSTOM_POST_TYPES as $post_type_name ) {
			register_taxonomy_for_object_type( self::NAME, $post_type_name );
		}
	}
}
