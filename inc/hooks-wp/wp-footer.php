<?php
/**
 * WP Footer Hook
 * Adds customizations to theme with wp_footer hook.
 *
 * @link https://developer.wordpress.org/reference/hooks/wp_footer/
 *
 * @package Alpwind_Pro_Theme
 * @since 0.0.1
 */

/**
 * Theme function to implement customizations.
 *
 * @return void
 */
function alpwind_wp_footer() {

	if ( class_exists( 'ACF' ) ) {
		the_field( 'footer_scripts', 'options' );
	}
}

// Add theme function with hook.
add_action( 'wp_footer', 'alpwind_wp_footer' );
