<?php
/**
 * Template part for displaying the a single Project.
 *
 * @package Wally
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'c-single-post-project' ); ?>>

	<div class="c-single-post-project__hero"><?php the_post_thumbnail( 'full' ); ?></div>

	<h1 class="c-single-post-project__title"><?php the_title(); ?></h1>

	<?php $categories = get_the_category(); ?>
	<?php if ( $categories ) : ?>
		<h2 class="c-single-post-project__category"><?php echo esc_html( $categories[0]->name ); ?></h2>
	<?php endif; ?>

	<div class="c-single-post-project__content">
		<?php the_content(); ?>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
