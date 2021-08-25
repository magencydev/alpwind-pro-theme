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
				'page_title' => 'Theme Customization',
				'menu_title' => 'Customization',
				'menu_slug'  => 'theme-customization',
				'capability' => 'edit_posts',
				'redirect'   => false,
				'icon_url'   => 'dashicons-admin-site-alt3',
				'position'   => 59,
			)
		);
	}
}

// Add theme function with hook.
add_action( 'acf/init', 'alpwind_acf_init' );
