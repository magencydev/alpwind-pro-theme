<?php
/**
 * WP Header Hook
 * Adds customizations to theme with wp_header hook.
 *
 * @link https://developer.wordpress.org/reference/hooks/wp_header/
 *
 * @package Alpwind_Pro_Theme
 * @since 0.0.1
 */

/**
 * Theme function to implement customizations.
 *
 * @return void
 */
function alpwind_wp_head() {

	if ( class_exists( 'ACF' ) ) {
		the_field( 'scripts_head', 'options' );
	}
}

// Add theme function with hook.
add_action( 'wp_head', 'alpwind_wp_head' );
