<?php
/**
 * Template part for displaying any post. This is used as fallback if none is found for the current post type.
 *
 * @package Wally
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'c-single-post-project' ); ?>>

	<div class="c-single-post-project_hero"><?php the_post_thumbnail( 'full' ); ?></div>

	<h1 class="c-single-post-project__title"><?php the_title(); ?></h1>

	<div class="c-single-post-project__category">
		<?php the_category(); ?>
	</div>

	<div class="c-single-post-project__content">
		<?php the_content(); ?>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
