<?php
/**
 * The template for displaying all single pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-page
 *
 * @package Alpwind_Pro_Theme
 * @since 0.0.1
 */

get_header();

echo '<main id="main">';

if ( have_rows( 'sections' ) ) {
	while ( have_rows( 'sections' ) ) {
		the_row();
		get_template_part( 'template-parts/blocks/' . get_row_layout() );
	}
}

echo '</main>';

get_footer();
