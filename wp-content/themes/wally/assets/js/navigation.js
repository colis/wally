/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */

if ( 'loading' === document.readyState ) {
	// The DOM has not yet been loaded.
	document.addEventListener( 'DOMContentLoaded', initNavigation );
} else {
	// The DOM has already been loaded.
	initNavigation();
}

// Initiate the menus when the DOM loads.
function initNavigation() {
	initNavToggle();
}

/**
 * Add event listener to the button that handles toggling the mobile menu.
 */
function initNavToggle() {
	const toggleButton = document.querySelector( '.js-menu-button' );

	toggleButton.addEventListener( 'click', function () {
		toggleMainNavigation();
	} );
}

function toggleMainNavigation() {
	const html = document.querySelector( 'html' );

	if ( html.classList.contains( 'navigation-open' ) ) {
		disableMainNavigation();
	} else {
		enableMainNavigation();
	}
}

function enableMainNavigation() {
	const html = document.querySelector( 'html' );
	const toggleButton = document.querySelector( '.js-menu-button' );

	html.classList.add( 'navigation-open' );
	toggleButton.setAttribute( 'aria-expanded', 'true' );
}

function disableMainNavigation() {
	const html = document.querySelector( 'html' );
	const toggleButton = document.querySelector( '.js-menu-button' );

	html.classList.remove( 'navigation-open' );
	toggleButton.setAttribute( 'aria-expanded', 'false' );
}
