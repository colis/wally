<?php
/**
 * Template part for the search/content list content section.
 *
 * @package Wally
 */

?>

<section class="c-content-archive__content">

	<?php
	while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/content/entry', 'archive' );

	endwhile;
	?>

</section>
