<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Wally
 */

?>

<?php get_header(); ?>
	<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below.', 'wally' ); ?></p>
<?php get_footer(); ?>
