<?php
/**
 * Template for skip to main content link for screen reader users.
 *
 * @package Wally
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<a class="skip-link u-screen-reader-text" href="#main">
	<?php esc_html_e( 'Skip to content', 'wally' ); ?>
</a>
