/**
 * WP Query
 * Ajax style search functionality for theme.
 */

import WP_Query from './classes/WP_Query';

( function () {
	if ( document.querySelector( '#post-insert' ) ) {
		let query = new WP_Query( '#post-insert', {
			thumbnail:   'fimg_url',
			msg_classes: [
				'text-center',
				'text-xl',
				'md:grid-cols-2',
				'lg:col-span-3'
			],
			filters: [
				{ selector: '#post-category', param: 'categories' },
				{ selector: '#post-tag', param: 'tags' },
				{ selector: '#post-search', param: 'search' }
			]
		} );
	
		query.mount();
	}
} )();