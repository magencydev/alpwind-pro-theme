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

	// Theme styles.
	wp_enqueue_style( 'utility-styles', "$assets/css/tailwind.css", array(), $version, 'all' );
	wp_enqueue_style( 'theme-styles', "$assets/css/theme.css", array(), $version, 'all' );

	// Theme scripts.
	wp_enqueue_script( 'alpwind-global-scripts', "$assets/static/global.js", array(), $version, true );
	wp_enqueue_script( 'alpwind-scripts', "$assets/js/theme.js", array(), $version, true );

	// Register styles for future use.
	wp_register_style( 'alpwind-testimonials', "$assets/css/testimonials.css", array(), $version, 'all' );

	// Register scripts for future use.
	wp_register_script( 'alpwind-query', "$assets/js/query.js", array(), $version, true );
	wp_register_script( 'alpwind-testimonials', "$assets/js/testimonials.js", array(), $version, true );

	wp_localize_script(
		'alpwind-member-forms',
		'af_data',
		array(
			'public_key'  => get_field( 'public_key', 'options' ),
			'gc_site_key' => get_field( 'google_recaptcha_site_key', 'options' ),
		)
	);
}

// Add theme function with hook.
add_action( 'wp_enqueue_scripts', 'alpwind_wp_enqueue_scripts' );
