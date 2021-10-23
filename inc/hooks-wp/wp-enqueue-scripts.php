<?php
/**
 * WordPress Enqueue Scripts Hook
 * Adds customizations to theme with wp_enqueue_scripts hook.
 *
 * @link https://developer.wordpress.org/reference/hooks/wp_enqueue_scripts/
 *
 * @package Alpwind_Pro_Theme
 * @since 0.0.1
 */

/**
 * Theme function to implement customizations.
 *
 * @return void
 */
function alpwind_wp_enqueue_scripts() {

	// Reusable variables.
	$assets  = get_template_directory_uri() . '/assets';
	$version = '0.0.1';

	// Add Theme styles.
	wp_enqueue_style( 'alpwind-utilities', "$assets/css/tailwind.css", array(), $version, 'all' );
	wp_enqueue_style( 'alpwind-theme', "$assets/css/theme.css", array(), $version, 'all' );

	// Register Additional styles.
	wp_register_style( 'alpwind-post', "$assets/css/post.css", array(), $version, 'all' );
	wp_register_style( 'alpwind-print', "$assets/css/print.css", array(), $version, 'print' );

	// Add Theme scripts.
	wp_enqueue_script( 'alpwind-scripts', "$assets/js/theme.js", array(), $version, true );

	// Register Additional scripts.
	wp_register_script( 'alpwind-post', "$assets/js/post.js", array(), $version, true );
}

// Add theme function with hook.
add_action( 'wp_enqueue_scripts', 'alpwind_wp_enqueue_scripts' );
