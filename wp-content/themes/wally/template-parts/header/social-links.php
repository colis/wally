<?php
/**
 * Template part for displaying the social links
 *
 * @package Wally
 */

$menu_items = wp_get_nav_menu_items( 'social-networks' );
if ( ! $menu_items ) {
	return;
}

$num_menu_items = count( $menu_items );
?>

<ul id="menu-social-networks" class="c-navigation__menu-wrapper">
	<?php foreach ( $menu_items as $index => $menu_item ) : ?>
		<li class="menu-item menu-item__social-networks">
			<a href="<?php echo esc_url( $menu_item->url ); ?>"><?php echo esc_html( $menu_item->title ); ?></a>
		</li>
		<?php if ( $index !== $num_menu_items - 1 ) : ?>
			<li class="menu-item menu-item__separator">/</li>
		<?php endif; ?>
	<?php endforeach; ?>
</ul>
