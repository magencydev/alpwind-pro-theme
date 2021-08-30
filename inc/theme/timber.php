<?php
/**
 * Timber Filters
 *
 * @link https://timber.github.io/docs/guides/filters/
 *
 * @package Alpwind_Pro_Theme
 * @since 0.0.1
 */

/**
 * Timber Context
 *
 * @param string $context context['this'] Being the Twig's {{ this }}.
 *
 * @return array
 */
function alpwind_timber_context( $context ) {
	$context['primary_menu'] = new Timber\Menu( 'primary' );

	// ACF fields.
	$context['favicon']     = get_field( 'misc_favicon', 'options' );
	$context['header_logo'] = get_field( 'header_logo', 'options' );
	$context['footer_logo'] = get_field( 'footer_logo', 'options' );

	return $context;
}
add_filter( 'timber/context', 'alpwind_timber_context' );

/**
 * This is where you can add your own functions to twig.
 *
 * @param string $twig Get extension.
 */
function alpwind_timber_twig( $twig ) {
	$twig->addExtension( new Twig\Extension\StringLoaderExtension() );

	return $twig;
}
add_filter( 'timber/twig', 'alpwind_timber_twig' );
