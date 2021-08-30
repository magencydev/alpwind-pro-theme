<?php
/**
 * The theme's function file for including main theme class.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Alpwind_Pro_Theme
 * @since 0.0.1
 */

// Define path to Composer's autoload file.
$composer_autoload = get_template_directory() . '/vendor/autoload.php';

// Check if Composer's autoload file exists and include it.
if ( file_exists( $composer_autoload ) ) {
	require_once $composer_autoload;
	$timber = new Timber\Timber();
}

// Check if Timber class exists - if not, shut it down.
if ( ! class_exists( 'Timber' ) ) {
	echo esc_html_e( 'Please make sure Timber is setup correctly.' );
	exit;
}

// Sets the directories (inside your theme) to find .twig files.
Timber::$dirname = array( 'templates', 'views' );

// Pull in main theme class.
require_once 'inc/classes/class-alpwind-pro-theme.php';

// Initialize theme class to enable all customizations and support.
$theme = new Alpwind_Pro_Theme();
