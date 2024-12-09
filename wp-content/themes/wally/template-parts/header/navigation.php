<?php
/**
 * Template part for displaying the header navigation menu
 *
 * @package Wally
 */

?>

<nav class="c-header__navigation c-navigation">
	<?php
	wp_nav_menu(
		[
			'theme_location' => 'primary',
			'container'      => '',
			'menu_class'     => 'c-navigation__menu-wrapper',
		]
	);
	?>
</nav>
