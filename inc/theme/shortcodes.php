<?php
/**
 * Theme Shortcodes
 *
 * @link https://codex.wordpress.org/Shortcode_API
 *
 * @package Alpwind_Pro_Theme
 * @since 0.0.1
 */

/**
 * Year Shortcode
 * For displaying the current year in footer.
 *
 * @return string
 */
function alpwind_year_shortcode() {
	return gmdate( 'Y' );
}
add_shortcode( 'year', 'alpwind_year_shortcode' );
