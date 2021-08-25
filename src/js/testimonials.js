import Glide, { Autoplay, Swipe, Controls } from '@glidejs/glide/dist/glide.modular.esm';

( function () {
	if ( document.querySelector( '.testimonials' ) ) {
		let members = new Glide( '.testimonials', {
			type: 'carousel',
			perView: 1,
			autoplay: 20000
		} );
		
		members.mount( { Autoplay, Swipe, Controls } );
	}
} )();