<?php
/**
 * WP Body Open Hook
 * Adds customizations to theme with wp_body_open hook.
 *
 * @link https://developer.wordpress.org/reference/hooks/wp_body_open/
 *
 * @package Alpwind_Pro_Theme
 * @since 0.0.1
 */

/**
 * Theme function to implement customizations.
 *
 * @return void
 */
function alpwind_wp_body_open() {

	if ( class_exists( 'ACF' ) ) {
		the_field( 'body_scripts', 'options' );
	}
}

// Add theme function with hook.
add_action( 'wp_body_open', 'alpwind_wp_body_open' );
