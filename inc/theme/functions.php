<?php
/**
 * Theme specific functions to simplify template building.
 *
 * @package Alpwind_Pro_Theme
 * @since 0.0.1
 */

/**
 * Creates a menu object to build out a custom menu structure.
 *
 * @param string $name Name of menu.
 *
 * @return array
 */
function alpwind_menu( $name ) {
	$locations  = get_nav_menu_locations();
	$menu       = get_term( $locations[ $name ], 'nav_menu' );
	$menu_items = wp_get_nav_menu_items( $menu->term_id );
	$output     = array();
	$parent_ids = array();

	if ( ! $menu_items ) {
		return $output;
	}

	// Menu parent items.
	foreach ( $menu_items as $key => $item ) {
		if ( '0' === $item->menu_item_parent ) {
			array_push( $output, $item );
			array_push( $parent_ids, $item->ID );
			unset( $menu_items[ $key ] );
		}
	}

	// Menu child items.
	foreach ( $menu_items as $key => $item ) {
		$parent = intVal( $item->menu_item_parent );

		if ( in_array( $parent, $parent_ids, true ) ) {
			$k = array_search( $parent, array_column( $output, 'ID' ), true );

			if ( ! isset( $output[ $k ]->children ) ) {
				$output[ $k ]->children = array();
			}
			array_push( $output[ $k ]->children, $item );

			unset( $menu_items[ $key ] );
		}
	}

	// Menu grandchild items.
	foreach ( $menu_items as $item ) {
		$parent = $item->menu_item_parent;

		foreach ( $output as $out ) {
			if ( isset( $out->children ) ) {
				foreach ( $out->children as $child ) {
					if ( $child->ID === $parent ) {
						if ( ! isset( $child->children ) ) {
							$child->children = array();
						}
						array_push( $child->children, $item );
					}
				}
			}
		}
	}

	return $output;
}

/**
 * Checks if a menu item is active by checking it against the current
 * post object. Then it echos a specified class string if active.
 *
 * @param object $item The current menu item object.
 * @param string $class The class to be returned.
 *
 * @return void
 */
function alpwind_item_active( $item, $class ) {
	global $post;

	$obj_id = intval( $item->object_id );

	$current  = ( $post->ID === $obj_id );
	$parents  = in_array( $obj_id, get_post_ancestors( $post->ID ), true );
	$is_posts = is_home() && ( intval( get_option( 'page_for_posts' ) ) === $obj_id );

	if ( $parents || $current || $is_posts ) {
		echo esc_attr( $class );
	}
}

/**
 * Does the same as alwpind_item_active but for users.
 *
 * @param object $item The current menu item object.
 * @param string $class The class to be returned.
 *
 * @return void
 */
function alpwind_item_active_user( $item, $class ) {
	global $author;

	if ( $author === $item ) {
		echo esc_attr( $class );
	}
}

/**
 * Creates a breadcrumb array to build out a breadcrumb list.
 *
 * @param object $post_obj The current post object.
 * @param array  $arr An array of page objects to show.
 *
 * @return array
 */
function alpwind_breadcrumbs( $post_obj, $arr = array() ) {
	if ( $post_obj->post_parent ) {
		$parent = get_post( $post_obj->post_parent );
		array_push( $arr, $parent );
		return alpwind_breadcrumbs( $parent, $arr );
	} else {
		global $post;
		array_push( $arr, $post );
		return $arr;
	}
}

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

/**
 * Get Browser Function.
 * This function can be used to gather information about the user's browser
 * and operating system.
 *
 * @param array $server The global server constant.
 *
 * @return array
 */
function alpwind_get_browser( $server ) {
	$u_agent  = $server['HTTP_USER_AGENT'];
	$bname    = 'Unknown';
	$platform = 'Unknown';
	$version  = '';

	if ( preg_match( '/linux/i', $u_agent ) ) {
		$platform = 'linux';
	} elseif ( preg_match( '/macintosh|mac os x/i', $u_agent ) ) {
		$platform = 'mac';
	} elseif ( preg_match( '/windows|win32/i', $u_agent ) ) {
		$platform = 'windows';
	}

	if ( preg_match( '/MSIE/i', $u_agent ) && ! preg_match( '/Opera/i', $u_agent ) ) {
		$bname = 'Internet Explorer';
		$ub    = 'MSIE';
	} elseif ( preg_match( '/Firefox/i', $u_agent ) ) {
		$bname = 'Mozilla Firefox';
		$ub    = 'Firefox';
	} elseif ( preg_match( '/OPR/i', $u_agent ) ) {
		$bname = 'Opera';
		$ub    = 'Opera';
	} elseif ( preg_match( '/Chrome/i', $u_agent ) && ! preg_match( '/Edge/i', $u_agent ) ) {
		$bname = 'Google Chrome';
		$ub    = 'Chrome';
	} elseif ( preg_match( '/Safari/i', $u_agent ) && ! preg_match( '/Edge/i', $u_agent ) ) {
		$bname = 'Apple Safari';
		$ub    = 'Safari';
	} elseif ( preg_match( '/Netscape/i', $u_agent ) ) {
		$bname = 'Netscape';
		$ub    = 'Netscape';
	} elseif ( preg_match( '/Edge/i', $u_agent ) ) {
		$bname = 'Edge';
		$ub    = 'Edge';
	} elseif ( preg_match( '/Trident/i', $u_agent ) ) {
		$bname = 'Internet Explorer';
		$ub    = 'MSIE';
	}

	$known   = array( 'Version', $ub, 'other' );
	$pattern = '#(?<browser>' . join( '|', $known ) . ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';

	preg_match_all( $pattern, $u_agent, $matches );

	$i = count( $matches['browser'] );
	if ( 1 !== $i ) {
		if ( strripos( $u_agent, 'Version' ) < strripos( $u_agent, $ub ) ) {
			$version = $matches['version'][0];
		} else {
			$version = $matches['version'][1];
		}
	} else {
		$version = $matches['version'][0];
	}

	if ( null === $version || '' === $version ) {
		$version = '?';
	}

	return array(
		'userAgent' => $u_agent,
		'name'      => $bname,
		'version'   => $version,
		'platform'  => $platform,
		'pattern'   => $pattern,
	);
}

if ( ! function_exists( 'alpwind_has_gform' ) ) {
	/**
	 * Check if the page has a gravity form.
	 *
	 * @since 0.0.1
	 *
	 * @param int $id Post or page id, default to false.
	 *
	 * @return boolean
	 */
	function alpwind_has_gform( $id = false ) {
		if ( ! $id ) {
			global $post;
			$p = $post;
		} else {
			$p = get_post( $id );
		}

		return isset( $p->post_content )
			? ( strpos( $p->post_content, 'gravity_form' ) !== false )
			: false;
	}
}
