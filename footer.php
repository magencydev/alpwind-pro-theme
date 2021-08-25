<?php
/**
 * The footer template includes footer menu,
 * footer scripts and ending document tags.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/
 *
 * @package Alpwind_Pro_Theme
 * @since 0.0.1
 */

// Get footer navigation HTML.
get_template_part( 'template-parts/theme/menu', 'footer' );

// Get alert for unsupported browsers.
get_template_part( 'template-parts/theme/alert', 'unsupported' );

// Get WordPress footer scripts, etc.
wp_footer();

// End document.
echo '</body></html>';
