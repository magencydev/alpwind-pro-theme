<?php
/**
 * Admin Menu Hook
 * Adds customizations to admin menu with admin_menu hook.
 *
 * @link https://developer.wordpress.org/reference/hooks/admin_menu/
 *
 * @package Alpwind_Pro_Theme
 * @since 0.0.1
 */

/**
 * Theme function to implement customizations.
 *
 * @return void
 */
function alpwind_admin_menu() {

	global $submenu;

	if ( class_exists( 'ACF' ) ) {
		if ( ! get_field( 'features_comments', 'options' ) ) {
			remove_menu_page( 'edit-comments.php' );
		}

		if ( ! get_field( 'features_posts', 'options' ) ) {
			remove_menu_page( 'edit.php' );
		}
	}

	if ( isset( $submenu['themes.php'] ) ) {
		foreach ( $submenu['themes.php'] as $index => $menu_item ) {
			if ( in_array( 'Customize', $menu_item, true ) ) {
				unset( $submenu['themes.php'][ $index ] );
			}
		}
	}
}

// Add theme function with hook.
add_action( 'admin_menu', 'alpwind_admin_menu' );
