<?php
/**
 * The theme's function file for including all necessary theme hooks, filters and functions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Alpwind_Pro_Theme
 * @since 0.0.1
 */

// Include all theme functions.
// Note: functions needs to come first.
require_once 'inc/theme/functions.php';
require_once 'inc/theme/cron.php';
require_once 'inc/theme/filters.php';
require_once 'inc/theme/shortcodes.php';

// Include all WordPress hooks.
require_once 'inc/hooks-wp/admin-bar-menu.php';
require_once 'inc/hooks-wp/admin-enqueue-scripts.php';
require_once 'inc/hooks-wp/admin-init.php';
require_once 'inc/hooks-wp/admin-menu.php';
require_once 'inc/hooks-wp/after-setup-theme.php';
require_once 'inc/hooks-wp/init.php';
require_once 'inc/hooks-wp/rest-api-init.php';
require_once 'inc/hooks-wp/wp-body-open.php';
require_once 'inc/hooks-wp/wp-enqueue-scripts.php';
require_once 'inc/hooks-wp/wp-footer.php';
require_once 'inc/hooks-wp/wp-header.php';

// Include all ACF hooks.
require_once 'inc/hooks-acf/init.php';
