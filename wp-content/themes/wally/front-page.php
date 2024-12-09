<?php
/**
 * The template for displaying the front page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Wally
 */

get_header();
?>

<main id="main" class="o-container c-content-archive o-content-list">
	<?php
		get_template_part( 'template-parts/content/archive', 'content' );
	?>
</main>

<?php
get_footer();

