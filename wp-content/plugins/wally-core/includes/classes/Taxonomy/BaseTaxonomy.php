<?php
/**
 * Base class that all Taxonomies should extend from.
 *
 * @package wally/core
 */

namespace Wally\Core\Taxonomy;

use Wally\Core\Registrable;

defined( 'ABSPATH' ) || die();

/**
 * Abstract class BaseTaxonomy.
 *
 * @package wally/core
 */
abstract class BaseTaxonomy implements Registrable {
	/**
	 * Register the custom taxonomy.
	 */
	public function register() {
		add_action(
			'init',
			function () {
				$args = wp_parse_args(
					$this->get_arguments(),
					[
						'labels'            => $this->get_labels(),
						'public'            => true,
						'show_ui'           => true,
						'show_admin_column' => true,
						'show_in_nav_menus' => true,
						'show_tagcloud'     => true,
						'show_in_rest'      => true,
						'hierarchical'      => false,
					]
				);

				register_taxonomy( $this->get_name(), $this->get_post_types(), $args );
			},
			0
		);
	}

	/**
	 * Get the name to use for the custom taxonomy.
	 *
	 * @return string custom taxonomy name.
	 */
	abstract protected function get_name() : string;

	/**
	 * Get the array of custom post types to link the taxonomy to.
	 *
	 * @return array Custom post types array.
	 */
	abstract protected function get_post_types() : array;

	/**
	 * Get the arguments that configure the custom taxonomy.
	 *
	 * @return array Array of arguments.
	 */
	abstract protected function get_arguments() : array;

	/**
	 * Gets the labels array for custom taxonomy configuration.
	 *
	 * @return array Array of labels.
	 */
	protected function get_labels() : array {
		return [
			// Plurals.
			/* translators: %s - custom taxonomy plural name. */
			'name'              => esc_html( sprintf( _x( '%s', 'Taxonomy General Name', 'wally-core' ), static::LABEL_PLURAL ) ),
			/* translators: %s - custom taxonomy plural name. */
			'menu_name'         => sprintf( esc_html__( '%s', 'wally-core' ), static::LABEL_PLURAL ),
			/* translators: %s - custom taxonomy plural name. */
			'all_items'         => sprintf( esc_html__( 'All %s', 'wally-core' ), static::LABEL_PLURAL ),
			/* translators: %s - custom taxonomy plural name. */
			'new_item_name'     => sprintf( esc_html__( 'New %s name', 'wally-core' ), static::LABEL_SINGULAR ),

			// Singulars.
			/* translators: %s - custom taxonomy singular name. */
			'singular_name'     => esc_html( sprintf( _x( '%s', 'Taxonomy Singular Name', 'wally-core' ), static::LABEL_SINGULAR ) ),
			/* translators: %s - custom taxonomy singular name. */
			'parent_item_colon' => sprintf( esc_html__( 'Parent %s:', 'wally-core' ), static::LABEL_SINGULAR ),
			/* translators: %s - custom taxonomy singular name. */
			'add_new_item'      => sprintf( esc_html__( 'Add New %s', 'wally-core' ), static::LABEL_SINGULAR ),
			/* translators: %s - custom taxonomy singular name. */
			'new_item'          => sprintf( esc_html__( 'New %s', 'wally-core' ), static::LABEL_SINGULAR ),
			/* translators: %s - custom taxonomy singular name. */
			'edit_item'         => sprintf( esc_html__( 'Edit %s', 'wally-core' ), static::LABEL_SINGULAR ),
			/* translators: %s - custom taxonomy singular name. */
			'update_item'       => sprintf( esc_html__( 'Update %s', 'wally-core' ), static::LABEL_SINGULAR ),
			/* translators: %s - custom taxonomy singular name. */
			'view_item'         => sprintf( esc_html__( 'View %s', 'wally-core' ), static::LABEL_SINGULAR ),
			/* translators: %s - custom taxonomy singular name. */
			'search_items'      => sprintf( esc_html__( 'Search %s', 'wally-core' ), static::LABEL_SINGULAR ),
			/* translators: %s - custom taxonomy singular name. */
			'popular_items'     => sprintf( esc_html__( 'Popular %s', 'wally-core' ), static::LABEL_PLURAL ),
		];
	}
}
