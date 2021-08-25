<?php
/**
 * WordPress REST API Init Hook
 * Adds customizations to theme with rest_api_init hook.
 *
 * @link https://developer.wordpress.org/reference/hooks/rest_api_init/
 *
 * @package Alpwind_Pro_Theme
 * @since 0.0.1
 */

// Include custom endpoints and fields class.
require_once get_template_directory() . '/inc/classes/class-alpwind-pro-rest-api.php';

// Initialize Rest API class.
$alpwind_rest_api = new Alpwind_Pro_Rest_API();

// Add theme function with hook.
add_action( 'rest_api_init', array( $alpwind_rest_api, 'alpwind_rest_api_init' ) );
