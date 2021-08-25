<?php
/**
 * Endpoints Class
 * This class handles all data that will be pulled in on the frontend.
 *
 * @package Alpwind_Pro_Theme
 * @since 0.0.1
 */

/**
 * API Class
 */
class Alpwind_Pro_Rest_API {
	/**
	 * Create Custom Endpoints
	 *
	 * @return void
	 */
	public function endpoints_and_fields() {

		// Register REST field for post thumbnail.
		register_rest_field(
			array( 'post' ),
			'fimg_url',
			array(
				'get_callback'    => 'alpwind_get_rest_featured_image',
				'update_callback' => null,
				'schema'          => null,
			)
		);

		// Gets latest upcoming event.
		register_rest_route(
			'alpwindpro/v1',
			'/upcoming',
			array(
				'methods'  => 'GET',
				'callback' => array( $this, 'latest_upcoming_event' ),
			)
		);
	}

	/**
	 * Method that adds featured image into REST results.
	 *
	 * @param object $object Post object.
	 * @param string $field_name Name of field to be added.
	 * @param object $request The request object.
	 *
	 * @return string/bool
	 */
	public function alpwind_get_rest_featured_image( $object, $field_name, $request ) {

		if ( $object['featured_media'] ) {
			$img = wp_get_attachment_image_src( $object['featured_media'], 'app-thumb' );
			return $img[0];
		}

		return false;
	}

	/**
	 * Get latest upcoming event.
	 *
	 * @return array
	 */
	public function latest_upcoming_event() {

		$current_date = gmdate( 'Ymd' );
		$targets      = array();

		$args = array(
			'post_type'      => 'awp-event',
			'posts_per_page' => 1,
			'meta_key'       => 'start_date',  // phpcs:ignore
			'meta_value'     => $current_date, // phpcs:ignore
			'meta_compare'   => '>',
			'orderby'        => 'meta_value',
			'order'          => 'ASC',
		);

		$event  = new WP_Query( $args );
		$output = false;

		while ( $event->have_posts() ) {
			$event->the_post();

			$desc      = get_field( 'description' );
			$nice_desc = preg_replace( '#<h([1-6]).*?>(.*?)<\/h[1-6]>#si', '<h${1}>${2} - </${1}>', $desc );

			$output = array(
				'title'         => get_the_title(),
				'link'          => get_the_permalink(),
				'description'   => wp_strip_all_tags( $nice_desc ),
				'website'       => get_field( 'website' ),
				'contact_email' => get_field( 'contact_email' ),
				'contact_phone' => get_field( 'contact_phone' ),
				'start_date'    => get_field( 'start_date' ),
				'start_time'    => get_field( 'start_time' ),
			);
		}

		return $output;
	}
}
