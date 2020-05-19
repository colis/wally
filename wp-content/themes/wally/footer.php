<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wally
 */

?>

<footer id="footer" class="c-footer">
	<div class="o-container">
		<div class="c-footer__info">
			<p class="c-footer__copyright"><?php echo esc_html( gmdate( 'Y' ) ); ?> © Veronica Urbano • All rights reserved</p>
			<p class="c-footer__authors">Designed by me • Developed by a lazy <a href="https://github.com/colis">programmer</a></p>
		</div><!-- .c-footer__info -->
	</div><!-- .o-container -->
</footer><!-- #footer -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
