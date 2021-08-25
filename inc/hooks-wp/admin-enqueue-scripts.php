<?php
/**
 * Admin Enqueue Scripts Hook
 * Adds customizations to theme with admin_enqueue_scripts hook.
 *
 * @link https://developer.wordpress.org/reference/hooks/admin_enqueue_scripts/
 *
 * @package Alpwind_Pro_Theme
 * @since 0.0.1
 */

/**
 * Theme function to implement customizations.
 *
 * @param string $hook The name of the admin hook being called.
 *
 * @return void
 */
function alpwind_admin_enqueue_scripts( $hook ) {
	// Add scripts for admin side of things.
}

// Add theme function with hook.
add_action( 'admin_enqueue_scripts', 'alpwind_admin_enqueue_scripts' );
