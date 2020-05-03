<?php
/**
 * Template part for displaying the header navigation menu
 *
 * @package Wally
 */

?>

<nav class="c-header__navigation c-navigation o-container">
	<?php
	wp_nav_menu(
		[
			'theme_location' => 'primary',
			'container'      => '',
			'menu_class'     => 'c-navigation__menu-wrapper',
		]
	);
	get_template_part( 'template-parts/header/social-links' );
	?>
</nav>
