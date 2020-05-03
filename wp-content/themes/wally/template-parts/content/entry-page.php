<?php
/**
 * Template part for displaying a page.
 *
 * @package Wally
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'c-single-page' ); ?>>
	<?php the_content(); ?>
</article><!-- #post-<?php the_ID(); ?> -->
