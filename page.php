<?php
/**
 * The template for displaying all single pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-page
 *
 * @package Alpwind_Pro_Theme
 * @since 0.0.1
 */

$context = Timber::context();

$timber_post         = new Timber\Post();
$context['post']     = $timber_post;
$context['sections'] = get_field( 'sections' );

Timber::render( array( 'page-' . $timber_post->post_name . '.twig', 'page.twig' ), $context );
