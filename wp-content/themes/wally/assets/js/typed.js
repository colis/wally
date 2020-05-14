/* global Typed */
/**
 * File typed.js.
 *
 * Creates typewriter effects.
 */

if ( 'loading' === document.readyState ) {
	// The DOM has not yet been loaded.
	document.addEventListener( 'DOMContentLoaded', initTyped );
} else {
	// The DOM has already been loaded.
	initTyped();
}

// Initiate the menus when the DOM loads.
function initTyped() {
	new Typed( '#typed', {
		cursorChar: '_', 
		backSpeed: 60,  
		backDelay: 510, 
		startDelay: 310, 
		typeSpeed: 110,  
		loop: true,
		stringsElement: '#typed-strings',
	} );
}
