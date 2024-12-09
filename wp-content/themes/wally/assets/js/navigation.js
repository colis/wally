/**
 * File navigation.js.
 */

const header = document.querySelector( '.c-header' );
const adminBar = document.querySelector( '#wpadminbar' );

if ( 'loading' === document.readyState ) {
	// The DOM has not yet been loaded.
	document.addEventListener( 'DOMContentLoaded', initNavigation );
} else {
	// The DOM has already been loaded.
	initNavigation();
}

// Initiate the menus when the DOM loads.
function initNavigation() {
	initStickyToggle();
}

/**
 * Add event listener on scroll event that handles toggling the sticky menu.
 */
function initStickyToggle() {
	toggleStickyNavigation();
}

function toggleStickyNavigation() {
	// Add a "sentinel" element to track the scroll position of the page.
	const sentinel = document.createElement( 'div' );
	sentinel.setAttribute( 'id', 'jump-links-sentinel' );
	header.after( sentinel );

	const offset = adminBar?.offsetHeight || 0;

	const observer = new window.IntersectionObserver(
		( [ entry ] ) => {
			header.classList.toggle(
				'sticky',
				! entry.isIntersecting &&
					entry.boundingClientRect.top - offset < 0
			);
		},
		{
			rootMargin: `${ offset * -1 }px`,
		}
	);

	observer.observe( sentinel );
}
