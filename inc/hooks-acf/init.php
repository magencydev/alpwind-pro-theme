<?php
/**
 * ACF Initialization Hook
 * Adds customizations to theme with acf/init hook.
 *
 * @link https://www.advancedcustomfields.com/resources/acf-init/
 *
 * @package Alpwind_Pro_Theme
 * @since 0.0.1
 */

/**
 * Theme function to implement customizations.
 *
 * @return void
 */
function alpwind_acf_init() {

	if ( function_exists( 'acf_add_options_page' ) ) {
		acf_add_options_page(
			array(
				'page_title' => 'Theme Settings',
				'menu_title' => 'Theme Settings',
				'menu_slug'  => 'theme-settings',
				'capability' => 'manage_options',
				'redirect'   => true,
				'icon_url'   => 'dashicons-admin-site-alt3',
				'position'   => 59,
			)
		);

		acf_add_options_page(
			array(
				'page_title'  => 'Theme General',
				'menu_title'  => 'General',
				'menu_slug'   => 'theme-general',
				'capability'  => 'manage_options',
				'redirect'    => false,
				'position'    => 1,
				'parent_slug' => 'theme-settings',
			)
		);

		acf_add_options_page(
			array(
				'page_title'  => 'Theme Branding',
				'menu_title'  => 'Branding',
				'menu_slug'   => 'theme-branding',
				'capability'  => 'manage_options',
				'redirect'    => false,
				'position'    => 1,
				'parent_slug' => 'theme-settings',
			)
		);

		acf_add_options_page(
			array(
				'page_title'  => 'Theme Defaults',
				'menu_title'  => 'Defaults',
				'menu_slug'   => 'theme-defaults',
				'capability'  => 'manage_options',
				'redirect'    => false,
				'position'    => 2,
				'parent_slug' => 'theme-settings',
			)
		);

		acf_add_options_page(
			array(
				'page_title'  => 'Theme Scripts',
				'menu_title'  => 'Scripts',
				'menu_slug'   => 'theme-scripts',
				'capability'  => 'manage_options',
				'redirect'    => false,
				'position'    => 3,
				'parent_slug' => 'theme-settings',
			)
		);

		acf_add_options_page(
			array(
				'page_title'  => 'Theme Links',
				'menu_title'  => 'Links',
				'menu_slug'   => 'theme-links',
				'capability'  => 'manage_options',
				'redirect'    => false,
				'position'    => 4,
				'parent_slug' => 'theme-settings',
			)
		);
	}
}

// Add theme function with hook.
add_action( 'acf/init', 'alpwind_acf_init' );
