<?php
/**
 * Theme CRON Automations
 * This file handles the triggering on CRON jobs.
 *
 * @package Alpwind_Pro_Theme
 * @since 0.0.1
 */

// Add schedule event to remove old job posts if it has been removed.
if ( ! wp_next_scheduled( 'alpwind_remove_old_job_posts' ) ) {
	wp_schedule_event( time(), 'daily', 'alpwind_remove_old_job_posts' );
}

/**
 * Action hooked to fired with WordPress cron job.
 *
 * @return void
 */
function alpwind_remove_old_job_posts() {
	$posts = get_posts(
		array(
			'numberposts' => -1,
			'post_type'   => 'job',
			'date_query'  => array(
				'before' => gmdate( 'Y-m-d H:i:s', strtotime( '-60 days' ) ),
			),
		)
	);

	if ( ! empty( $posts ) ) {
		foreach ( $posts as $post ) {
			wp_delete_post( $post->ID );
		}
	}
}
add_action( 'alpwind_remove_old_job_posts', 'alpwind_remove_old_job_posts' );
