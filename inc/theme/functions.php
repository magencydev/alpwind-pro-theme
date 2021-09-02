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
 * @param string $singular The singular name of the item being created.
 * @param string $plural The plural name of the item being created.
 *
 * @return array
 */
function alpwind_generate_labels( $singular, $plural ) {
	return array(
		'name'                  => "{$plural}",
		'singular_name'         => "{$singular}",
		'menu_name'             => "{$plural}",
		'name_admin_bar'        => $singular,
		'add_new'               => 'Add New',
		'add_new_item'          => "Add New $singular",
		'new_item'              => "New $singular",
		'edit_item'             => "Edit $singular",
		'view_item'             => "View $singular",
		'all_items'             => "All {$plural}",
		'search_items'          => "Search {$plural}",
		'parent_item_colon'     => "Parent {$plural}:",
		'not_found'             => "No {$plural} found.",
		'not_found_in_trash'    => "No {$plural} found in Trash.",
		'featured_image'        => "{$singular} Feature Image",
		'set_featured_image'    => 'Set feature image',
		'remove_featured_image' => 'Remove feature image',
		'use_featured_image'    => 'Use as feature image',
		'archives'              => "$singular archives",
		'insert_into_item'      => "Insert into $singular",
		'uploaded_to_this_item' => "Uploaded to this $singular",
		'filter_items_list'     => "Filter {$plural} list",
		'items_list_navigation' => "{$plural} list navigation",
		'items_list'            => "{$plural} list",
	);
}
