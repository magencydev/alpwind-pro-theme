<?php
/**
 * The search template.
 *
 * @link https://codex.wordpress.org/Creating_a_Search_Page
 *
 * @package Alpwind_Pro_Theme
 * @since 0.0.1
 */

$templates = array( 'search.twig', 'archive.twig', 'index.twig' );

$context          = Timber::context();
$context['title'] = 'Search results for ' . get_search_query();
$context['posts'] = new Timber\PostQuery();

Timber::render( $templates, $context );
