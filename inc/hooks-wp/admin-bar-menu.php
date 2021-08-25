<?php
/**
 * Admin Bar Menu Hook
 * Adds customizations to theme with admin_bar_menu hook.
 *
 * @link https://developer.wordpress.org/reference/hooks/admin_bar_menu/
 *
 * @package Alpwind_Pro_Theme
 * @since 0.0.1
 */

/**
 * Theme function to implement customizations.
 *
 * @param object $wp_admin_bar The admin bar class instance.
 *
 * @return void
 */
function alpwind_admin_bar_menu( $wp_admin_bar ) {

	$wp_admin_bar->remove_menu( 'customize' );

	if ( class_exists( 'ACF' ) ) {
		if ( ! get_field( 'misc_comments', 'options' ) ) {
			$wp_admin_bar->remove_menu( 'comments' );
		}

		if ( ! get_field( 'misc_posts', 'options' ) ) {
			$wp_admin_bar->remove_menu( 'new-post' );
		}
	}
}

// Add theme function with hook.
add_action( 'admin_bar_menu', 'alpwind_admin_bar_menu', 999 );
