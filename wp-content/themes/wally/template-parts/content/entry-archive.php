<?php
/**
 * Template part for displaying any post in archive lists.
 *
 * @package Wally
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'o-content-list__item' ); ?>>
	<h5 class="card-title"><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h5>
	<a href="<?php the_permalink(); ?>" class="card-image">
		<?php the_post_thumbnail( 'medium' ); ?>
	</a>
</article>
