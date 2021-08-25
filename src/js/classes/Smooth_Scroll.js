/**
 * Scrollable.js
 * A custom plugin for smooth scrolling.
 */

export default class {
	constructor( el, options ) {
		this.always_home = options.always_home ? options.always_home : false;
		this.items       = document.querySelectorAll( el );
	}

	mount() {
		let self = this;

		for ( let item of this.items ) {
			item.addEventListener( 'click', function( e ) {
				let tar = this.getAttribute( 'href' );

				if ( self.always_home && window.location.pathname !== '/' ) {
					e.preventDefault();
					window.location.href = '/' + tar;
				} else {
					self.scroll_to( tar, e );
				}
			} );
		}

		if ( window.location.hash ) {
			setTimeout( () => {
				this.scroll_to( window.location.hash );
			}, 500 );
		}
	}

	scroll_to( target, event ) {
		let tar = document.querySelector( target );

		if ( tar ) {
			if ( event ) {
				event.preventDefault();
			}

			tar.scrollIntoView( {
				behavior: 'smooth',
				block:    'start'
			} );
		}
	};
}