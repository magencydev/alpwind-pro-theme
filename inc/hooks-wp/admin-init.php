<?php
/**
 * Admin Initialization Hook
 * Adds customizations to theme with admin_init hook.
 *
 * @link https://developer.wordpress.org/reference/hooks/admin_init/
 *
 * @package Alpwind_Pro_Theme
 * @since 0.0.1
 */

/**
 * Theme function to implement customizations.
 *
 * @return void
 */
function alpwind_admin_init() {

	remove_post_type_support( 'page', 'editor' );
	remove_post_type_support( 'page', 'thumbnail' );
}

// Add theme function with hook.
add_action( 'admin_init', 'alpwind_admin_init' );
