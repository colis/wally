<?php
/**
 * Template part for displaying any post in archive lists.
 *
 * @package Wally
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'o-content-list__item' ); ?>>
	<?php $image_id = get_field( 'archive_thumbnail' ) ?: get_post_thumbnail_id(); // phpcs:ignore WordPress.PHP.DisallowShortTernary.Found ?>
	<?php echo wp_get_attachment_image( $image_id, 'project-archive' ); ?>
	<a href="<?php the_permalink(); ?>" class="project-meta">
		<h3 class="project-title"><?php the_title(); ?></h3>
		<?php $categories = get_the_category(); ?>
		<?php if ( $categories ) : ?>
			<p class="project-category">
				<?php
				echo esc_html(
					join(
						' - ',
						array_map(
							function( $category ) {
								return $category->name;
							},
							$categories
						)
					)
				);
				?>
			</p>
		<?php endif; ?>
	</a>
</article>
