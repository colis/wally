<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Wally
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function wally_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'wally_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function wally_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'wally_pingback_header' );

/**
 * Set the archive page of a specific post type to be used as the homepage.
 *
 * @param WP_Query $query The current query.
 */
function use_cpt_archive_as_home_page( $query ) {
	if ( ! is_admin() && $query->is_main_query() && is_home() ) {
		$query->set( 'post_type', [ 'project' ] );
	}
}
add_action( 'pre_get_posts', 'use_cpt_archive_as_home_page' );
