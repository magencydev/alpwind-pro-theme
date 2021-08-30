<?php
/**
 * Theme specific functions to simplify template building.
 *
 * @package Alpwind_Pro_Theme
 * @since 0.0.1
 */

/**
 * Returns a label array based on provided name, for
 * registering taxonomies, post types and more.
 *
 * @param string $name The name of the item being created.
 *
 * @return array
 */
function alpwind_generate_labels( $name ) {
	return array(
		'name'                  => "{$name}s",
		'singular_name'         => "{$name}",
		'menu_name'             => "{$name}s",
		'name_admin_bar'        => $name,
		'add_new'               => 'Add New',
		'add_new_item'          => "Add New $name",
		'new_item'              => "New $name",
		'edit_item'             => "Edit $name",
		'view_item'             => "View $name",
		'all_items'             => "All {$name}s",
		'search_items'          => "Search {$name}s",
		'parent_item_colon'     => "Parent {$name}s:",
		'not_found'             => "No {$name}s found.",
		'not_found_in_trash'    => "No {$name}s found in Trash.",
		'featured_image'        => "{$name} Feature Image",
		'set_featured_image'    => 'Set feature image',
		'remove_featured_image' => 'Remove feature image',
		'use_featured_image'    => 'Use as feature image',
		'archives'              => "$name archives",
		'insert_into_item'      => "Insert into $name",
		'uploaded_to_this_item' => "Uploaded to this $name",
		'filter_items_list'     => "Filter {$name}s list",
		'items_list_navigation' => "{$name}s list navigation",
		'items_list'            => "{$name}s list",
	);
}
