/**
 * WP_Query Class
 *
 * Class that provides WordPress post retrieval, rending and filtering
 * via WordPress REST API.
 *
 * @link https://developer.wordpress.org/rest-api/reference/posts/
 *
 * @package Alpwind_Pro_Theme
 * @since 0.0.1
 */

import axios from 'axios';

export default class {
	constructor( el, options ) {
		this.self = document.querySelector( el );

		let check_options = ( option, def ) => {
			return ( options[ option ] ) ? options[ option ] : def;
		};

		let check_attribute = ( attr, def ) => {
			let el_attr = this.self.getAttribute( attr );
			return ( el_attr ) ? el_attr : def;
		}

		this.settings = {
			container:   check_options( 'container', '.post-container' ),
			type:        check_attribute( 'data-post-type', 'posts' ),
			filters:     check_options( 'filters', false ),
			msg_classes: check_options( 'msg_classes', false ),
			templates:   check_attribute( 'data-post-templates', '#post-templates' ),
			post_count:  check_attribute( 'data-post-count', 9 ),
			category:    check_attribute( 'data-post-category', 'false' ),
			tag:         check_attribute( 'data-post-tag', 'false' ),
			search:      check_attribute( 'data-post-search', 'false' ),
			order:       check_attribute( 'data-post-order', 'false' ),
			orderby:     check_attribute( 'data-post-orderby', 'false' ),
			default:     check_attribute( 'data-post-thumb', '' ),
		};
	}

	mount() {
		this.templates = document.querySelector( this.settings.templates );

		let query = `/wp-json/wp/v2/${ this.settings.type }`;

		this.pagination = {
			page: 0,
			active: false
		};

		let params = {
			per_page: parseInt( this.settings.post_count ) + 1
		};

		if ( this.settings.category && this.settings.category !== 'false' ) {
			params.categories = this.settings.category;
		}

		if ( this.settings.search && this.settings.search !== 'false' ) {
			params.search = this.settings.search;
		}

		if ( this.settings.tag && this.settings.tag !== 'false' ) {
			params.tags = this.settings.tag;
		}

		if ( this.settings.order && this.settings.order !== 'false' ) {
			params.order = this.settings.order;
		}

		if ( this.settings.orderby && this.settings.orderby !== 'false' ) {
			params.orderby = this.settings.orderby;
		}

		this.get_the_posts( query, params );

		if ( document.querySelector( '.post-pagination' ) ) {
			document.querySelector( '.post-pagination' ).addEventListener( 'click', () => {
				params.offset = this.pagination.page;

				this.self.querySelector( '.post-button-loader' ).style.display = 'block';

				this.get_the_posts( query, params, () => {
					this.self.querySelector( '.post-button-loader' ).style.display = 'none';
				} );
			} );
		}

		if ( document.getElementById( 'post-filter' ) ) {
			document.getElementById( 'post-filter' ).addEventListener( 'click', () => {
				this.pagination.page = 0;
				params.offset = 0;

				if ( this.settings.filters ) {
					for ( let filter of this.settings.filters ) {
						let filter_el = document.querySelector( filter.selector );
						if ( filter_el && filter_el.value ) {
							params[ filter.param ] = filter_el.value;
						} else {
							delete params[ filter.param ];
						}
					}
				}

				this.self.querySelectorAll( '.post-loaded' ).forEach( item => {
					item.remove();
				} );

				if ( this.self.querySelector( '.post-msg' ) ) {
					this.self.querySelector( '.post-msg' ).remove();
				}

				this.self.querySelector( '.post-loader' ).style.display = 'block';

				this.get_the_posts( query, params, () => {
					if ( ! this.self.querySelector( '.post-loaded' ) ) {
						let msg = document.createElement( 'div' );
						if ( this.settings.msg_classes ) {
							this.settings.msg_classes.forEach( cls => {
								msg.classList.add( cls );
							} );
						}
						msg.classList.add( 'post-msg' );
						msg.innerHTML = 'No results found...';
						this.self.appendChild( msg );
					}

					this.self.querySelector( '.post-loader' ).style.display = 'none';
				} );
			} );
		}
	}

	trunc( txt, limit = 200 ) {
		let out = txt;

		if ( txt.length > limit ) {
			out = txt.substr( 0, limit ) + '...';
		}

		return out.replace( '[...]', '' );
	}

	format_date( date ) {
		let date_obj = new Date( date ),
			month    = date_obj.getMonth() + 1,
			day      = date_obj.getDate(),
			year     = date_obj.getFullYear();
		
		return `${month}/${day}/${year}`;
	}

	generateList( res ) {
		if ( ! this.templates ) {
			console.warn( 'Please provide the appropriate template markup.' );
			return false;
		}

		let count = 1;

		this.pagination.active = false;

		for ( let item of res ) {
			if ( count > this.settings.post_count ) {
				this.pagination.active = true;
				this.pagination.page = this.pagination.page + parseInt( this.settings.post_count );
				continue;
			}

			let has_multi = this.templates.getAttribute( 'data-multi' ),
				category, clone, els = {};

			if ( has_multi && has_multi !== 'false' ) {
				let c = this.templates.querySelector( '.post-template-' + count );
				clone = c.cloneNode( true );
			} else {
				let c = this.templates.querySelector( '.post-template' );
				clone = c.cloneNode( true );
			}

			els.thumb    = clone.querySelector( '.post-thumb' );
			els.category = clone.querySelector( '.post-category' );
			els.title    = clone.querySelector( '.post-title' );
			els.excerpt  = clone.querySelector( '.post-excerpt' );
			els.author   = clone.querySelector( '.post-author' );
			els.date     = clone.querySelector( '.post-date' );
			els.link     = clone.querySelector( '.post-link' );

			if ( els.thumb ) {
				if ( ! item[ this.settings.thumbnail ] ) {
					els.thumb.setAttribute( 'src', this.settings.default );
				} else {
					els.thumb.setAttribute( 'src', item[ this.settings.thumbnail ] );
				}
			}

			if ( els.category ) {
				els.category.innerHTML = category;
			}

			if ( els.title ) {
				els.title.innerHTML = item.title.rendered;
			}

			if ( els.excerpt && item.excerpt ) {
				els.excerpt.innerHTML = this.trunc( item.excerpt.rendered, 100 );
			}

			if ( els.date ) {
				els.date.innerHTML = this.format_date( item.date );
			}

			if ( els.link ) {
				els.link.setAttribute( 'href', item.link );
			}

			clone.classList.add( 'post-loaded' );
			clone.style.opacity = '0';

			this.self.querySelector(
				this.settings.container
			).appendChild( clone );

			setTimeout( () => {
				clone.style.opacity = '1';
			}, 100 * count );

			count++;
		}

		let pag = this.self.querySelector( '.post-pagination' );
		if ( pag ) {
			if ( this.pagination.active ) {
				pag.parentNode.style.display = 'flex';
			} else {
				pag.parentNode.style.display = 'none';
			}
		}
	}

	get_the_posts( url, data, callback = 0 ) {
		axios.get( url, { params: data } ).then(
			( res ) => {
				if ( this.self.querySelector( '.post-loader' ) ) {
					this.self.querySelector( '.post-loader' ).style.display = 'none';
				}

				this.generateList( res.data );

				if ( this.pagination.active ) {
					if ( this.self.querySelector( '.post-pagination' ) ) {
						this.self.querySelector( '.post-pagination' ).style.display = 'flex';
					}
				} else {
					if ( this.self.querySelector( '.post-pagination' ) ) {
						this.self.querySelector( '.post-pagination' ).style.display = 'none';
					}
				}

				if ( typeof callback === 'function' ) {
					callback();
				}
			}
		);
	}
}
