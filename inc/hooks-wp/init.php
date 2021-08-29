<?php
/**
 * Initialization Hook
 * Adds customizations to theme with init hook.
 *
 * @link https://developer.wordpress.org/reference/hooks/init/
 *
 * @package Alpwind_Pro_Theme
 * @since 0.0.1
 */

/**
 * Theme function to implement customizations.
 *
 * @return void
 */
function alpwind_init() {
	/**
	 * Register navigation menus.
	 */
	register_nav_menus(
		array(
			'primary' => __( 'Primary', 'alpwind-pro' ),
		)
	);

	/**
	 * Register custom post types.
	 */
	register_post_type(
		'awp-event',
		array(
			'labels'             => alpwind_generate_labels( 'Event' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_rest'       => true,
			'menu_icon'          => 'dashicons-calendar-alt',
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'events' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title' ),
		)
	);

	/**
	 * Register custom taxonomies.
	 */
	$event_labels = array(
		'name'          => _x( 'Categories', 'Post type general name', 'alpwind-pro' ),
		'singular_name' => _x( 'Category', 'Post type singular name', 'alpwind-pro' ),
		'add_new'       => __( 'Add New', 'alpwind-pro' ),
		'add_new_item'  => __( 'Add New Category', 'alpwind-pro' ),
		'new_item'      => __( 'New Category', 'alpwind-pro' ),
		'edit_item'     => __( 'Edit Category', 'alpwind-pro' ),
		'view_item'     => __( 'View Category', 'alpwind-pro' ),
		'all_items'     => __( 'All Categories', 'alpwind-pro' ),
		'search_items'  => __( 'Search Categories', 'alpwind-pro' ),
		'not_found'     => __( 'No categories found.', 'alpwind-pro' ),
	);

	register_taxonomy(
		'awp-event-category',
		'awp-event',
		array(
			'labels'             => $event_labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_rest'       => true,
			'hierarchical'       => true,
			'show_admin_column'  => true,
		)
	);

	/**
	 * Control post type support.
	 */
	if ( class_exists( 'ACF' ) && ! get_field( 'misc_comments', 'options' ) ) {
		remove_post_type_support( 'post', 'comments' );
		remove_post_type_support( 'page', 'comments' );
	}
}

// Add theme function with hook.
add_action( 'init', 'alpwind_init' );
