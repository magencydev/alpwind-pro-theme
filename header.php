<?php
/**
 * The template for the head section of the page and beginning of document.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Alpwind_Pro_Theme
 * @since 0.0.1
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="shortcut icon" href="<?php the_field( 'misc_favicon', 'options' ); ?>" />

	<?php wp_head(); ?>
</head>

<body <?php body_class( 'overflow-x-hidden' ); ?>>
	<?php wp_body_open(); ?>
	<?php get_template_part( 'template-parts/theme/menu', 'primary' ); ?>
