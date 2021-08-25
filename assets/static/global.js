/**
 * This file is for setting global functions that will be used in various
 * scripts throughout the theme.
 *
 * @package Alpwind_Pro_Theme
 * @since 0.0.1
 */

window.alpwind_pro = {
	/**
	 * Set a browser cookie.
	 *
	 * @param {string} cname  The name of the cookie.
	 * @param {mixed}  cvalue The value of the cookie.
	 * @param {int}    exdays Number of days until cookie expires.
	 */
	set_cookie: function( cname, cvalue, exdays ) {
		const d = new Date();
		d.setTime( d.getTime() + ( exdays * 24 * 60 * 60 * 1000 ) );
		let expires = "expires=" + d.toUTCString();
		document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
	},

	/**
	 * Get a browser cookie.
	 * 
	 * @param {string} cname The name of the cookie to retrieve.
	 * @returns 
	 */
	get_cookie: function( cname ) {
		let name = cname + "=";
		let ca = document.cookie.split( ';' );
	
		for ( let i = 0; i < ca.length; i++ ) {
			let c = ca[ i ];
			while ( c.charAt( 0 ) === ' ' ) {
				c = c.substring( 1 );
			}
			if ( c.indexOf( name ) === 0 ) {
				return c.substring( name.length, c.length );
			}
		}
	
		return false;
	}
}
