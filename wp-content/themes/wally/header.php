<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wally
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<?php get_template_part( 'template-parts/components/skip-link' ); ?>

	<div id="site-wrapper" class="o-site-wrapper">

		<header class="c-header">
			<div class="c-main-nav__wrapper">
				<div class="o-container">
					<div class="c-main-nav">
						<a href="<?php echo esc_url( home_url() ); ?>" class="c-logo">veronica urbano</a>
						<?php
							// get_template_part( 'template-parts/header/mobile-menu-button' );
							// get_template_part( 'template-parts/header/navigation' );
						?>
					</div>
				</div>
			</div><!-- .c-main-nav__wrapper -->
		</header><!-- .c-header -->
