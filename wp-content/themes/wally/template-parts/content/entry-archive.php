<?php
/**
 * Template part for displaying any post in archive lists.
 *
 * @package Wally
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'o-content-list__item' ); ?>>
	<?php $crop_location = get_post_meta( get_the_ID(), 'crop-location', true ); ?>
	<?php $image_size = $crop_location ? "project-archive-$crop_location" : 'project-archive'; ?>
	<?php the_post_thumbnail( $image_size ); ?>
	<a href="<?php the_permalink(); ?>" class="project-meta">
		<h3 class="project-title"><?php the_title(); ?></h3>
		<?php $categories = get_the_category(); ?>
		<?php if ( $categories ) : ?>
			<p class="project-category"><?php echo esc_html( $categories[0]->name ); ?></p>
		<?php endif; ?>
	</a>
</article>
