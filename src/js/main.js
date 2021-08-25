/**
 * General Scripts
 * Scripts to be included on every page of theme.
 */

import Smooth_Scroll from './classes/Smooth_Scroll';
import Alpine from 'alpinejs';
import primary_menu from './alpine/primary_menu';

window.Alpine = Alpine;
Alpine.data( 'primary_menu', primary_menu );
Alpine.start();

( function () {
	if ( document.querySelector( 'a[href^="#"]' ) ) {
		let scrollable = new Smooth_Scroll( 'a[href^="#"]', {
			always_home: false
		} );

		scrollable.mount();
	}
} )();