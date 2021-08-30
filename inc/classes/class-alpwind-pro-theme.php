<?php
/**
 * Alpwind Pro Theme Class
 * This class combines Timber and various theme hooks, filters and more.
 *
 * @link https://timber.github.io/docs/
 *
 * @package Alpwind_Pro_Theme
 * @since 0.0.1
 */

/**
 * Wrap theme inside Timber\Site subclass.
 * This is a very simple class with one purpose:
 * to include all theme customizations and support.
 */
class Alpwind_Pro_Theme extends Timber\Site {
	/**
	 * Class constructor function.
	 * This includes all WordPress hooks, filters and more.
	 */
	public function __construct() {
		// Pre-define theme base directory.
		$theme_dir = get_template_directory();

		// Include all theme functions.
		// Note: functions needs to come first.
		require_once "$theme_dir/inc/theme/functions.php";
		require_once "$theme_dir/inc/theme/timber.php";
		require_once "$theme_dir/inc/theme/cron.php";
		require_once "$theme_dir/inc/theme/filters.php";
		require_once "$theme_dir/inc/theme/shortcodes.php";

		// Include all WordPress hooks.
		require_once "$theme_dir/inc/hooks-wp/admin-bar-menu.php";
		require_once "$theme_dir/inc/hooks-wp/admin-enqueue-scripts.php";
		require_once "$theme_dir/inc/hooks-wp/admin-init.php";
		require_once "$theme_dir/inc/hooks-wp/admin-menu.php";
		require_once "$theme_dir/inc/hooks-wp/after-setup-theme.php";
		require_once "$theme_dir/inc/hooks-wp/init.php";
		require_once "$theme_dir/inc/hooks-wp/rest-api-init.php";
		require_once "$theme_dir/inc/hooks-wp/wp-body-open.php";
		require_once "$theme_dir/inc/hooks-wp/wp-enqueue-scripts.php";
		require_once "$theme_dir/inc/hooks-wp/wp-footer.php";
		require_once "$theme_dir/inc/hooks-wp/wp-header.php";

		// Include all ACF hooks.
		require_once "$theme_dir/inc/hooks-acf/init.php";
	}
}
