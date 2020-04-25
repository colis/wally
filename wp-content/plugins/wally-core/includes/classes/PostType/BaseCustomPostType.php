<?php
/**
 * Base class that all CPTs should extend from.
 *
 * @package wally/core
 */

namespace Wally\Core\PostType;

use Wally\Core\Registrable;

defined( 'ABSPATH' ) || die();

/**
 * Abstract class BaseCustomPostType.
 *
 * @package wally/core
 */
abstract class BaseCustomPostType implements Registrable {
	/**
	 * Register the custom post type.
	 */
	public function register() {
		add_action(
			'init',
			function () {
				$arguments = wp_parse_args(
					$this->get_arguments(),
					[
						/* translators: %s - custom post type label. */
						'label'            => sprintf( esc_html__( '%s', 'wally-core' ), static::LABEL_PLURAL ),
						'menu_position'    => 5,
						'menu_icon'        => static::ICON,
						'delete_with_user' => false,
					]
				);

				register_post_type( $this->get_name(), $arguments );
			}
		);
	}

	/**
	 * Get the name to use for the custom post type.
	 *
	 * @return string Custom post type name.
	 */
	abstract protected function get_name() : string;

	/**
	 * Get the arguments that configure the custom post type.
	 *
	 * @return array Array of arguments.
	 */
	abstract protected function get_arguments() : array;

	/**
	 * Get the parent slug.
	 *
	 * @return string The parent slug.
	 */
	protected function get_parent_slug() : string {
		return _x( 'resources', 'Parent slug', 'wally-core' );
	}

	/**
	 * Gets the labels array for cpt configuration.
	 *
	 * @return array Array of labels.
	 */
	protected function get_labels() : array {
		return [
			// Plurals.
			/* translators: %s - custom post type plural name. */
			'name'              => esc_html( sprintf( _x( '%s', 'Post Type General Name', 'wally-core' ), static::LABEL_PLURAL ) ),
			/* translators: %s - custom post type plural name. */
			'menu_name'         => sprintf( esc_html__( '%s', 'wally-core' ), static::LABEL_PLURAL ),
			/* translators: %s - custom post type plural name. */
			'all_items'         => sprintf( esc_html__( 'All %s', 'wally-core' ), static::LABEL_PLURAL ),
			/* translators: %s - custom post type plural name. */
			'view_items'        => sprintf( esc_html__( 'View %s', 'wally-core' ), static::LABEL_PLURAL ),

			// Singulars.
			/* translators: %s - custom post type singular name. */
			'singular_name'     => esc_html( sprintf( _x( '%s', 'Post Type Singular Name', 'wally-core' ), static::LABEL_SINGULAR ) ),
			/* translators: %s - custom post type singular name. */
			'name_admin_bar'    => sprintf( esc_html__( '%s', 'wally-core' ), static::LABEL_SINGULAR ),
			/* translators: %s - custom post type singular name. */
			'archives'          => sprintf( esc_html__( '%s Archives', 'wally-core' ), static::LABEL_SINGULAR ),
			/* translators: %s - custom post type singular name. */
			'attributes'        => sprintf( esc_html__( '%s Attributes', 'wally-core' ), static::LABEL_SINGULAR ),
			/* translators: %s - custom post type singular name. */
			'parent_item_colon' => sprintf( esc_html__( 'Parent %s:', 'wally-core' ), static::LABEL_SINGULAR ),
			/* translators: %s - custom post type singular name. */
			'add_new_item'      => sprintf( esc_html__( 'Add New %s', 'wally-core' ), static::LABEL_SINGULAR ),
			'add_new'           => esc_html__( 'Add New', 'wally-core' ),
			/* translators: %s - custom post type singular name. */
			'new_item'          => sprintf( esc_html__( 'New %s', 'wally-core' ), static::LABEL_SINGULAR ),
			/* translators: %s - custom post type singular name. */
			'edit_item'         => sprintf( esc_html__( 'Edit %s', 'wally-core' ), static::LABEL_SINGULAR ),
			/* translators: %s - custom post type singular name. */
			'update_item'       => sprintf( esc_html__( 'Update %s', 'wally-core' ), static::LABEL_SINGULAR ),
			/* translators: %s - custom post type singular name. */
			'view_item'         => sprintf( esc_html__( 'View %s', 'wally-core' ), static::LABEL_SINGULAR ),
			/* translators: %s - custom post type singular name. */
			'search_items'      => sprintf( esc_html__( 'Search %s', 'wally-core' ), static::LABEL_SINGULAR ),
		];
	}
}
