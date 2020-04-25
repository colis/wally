<?php
/**
 * Project CPT.
 *
 * @package wally/core
 */

namespace Wally\Core\PostType;

defined( 'ABSPATH' ) || die();

/**
 * Class Project
 *
 * @package wally/core
 */
class Project extends BaseCustomPostType {
	const NAME           = 'project';
	const ICON           = 'dashicons-art';
	const LABEL_SINGULAR = 'Project';
	const LABEL_PLURAL   = 'Projects';

	/**
	 * Get the name to use for the custom post type.
	 *
	 * @return string Custom post type name.
	 */
	protected function get_name() : string {
		return self::NAME;
	}

	/**
	 * Get the arguments that configure the custom post type.
	 *
	 * @return array Array of arguments.
	 */
	protected function get_arguments() : array {
		$supports = [
			'title',
			'editor',
			'thumbnail',
			'excerpt',
			'author',
		];

		return [
			'labels'       => $this->get_labels(),
			'supports'     => $supports,
			'rewrite'      => true,
			'public'       => true,
			'show_in_rest' => true,
			'has_archive'  => false,
		];
	}
}
