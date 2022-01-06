<?php
/**
 * Theme Filters
 *
 * @link https://www.advancedcustomfields.com/resources/acf-load_field/
 *
 * @package Alpwind_Pro_Theme
 * @since 0.0.1
 */

// Disable Gutenberg.
add_filter( 'use_block_editor_for_post', '__return_false', 10 );

/**
 * Sets up special Gravity Forms select field.
 *
 * @link https://developer.wordpress.org/reference/functions/add_filter/
 *
 * @param array $field Array of field data.
 *
 * @return array
 */
function alpwind_gravity_forms_dropdown( $field ) {
	if ( class_exists( 'GFFormsModel' ) && class_exists( 'ACF' ) ) {
		$choices = array();

		foreach ( \GFFormsModel::get_forms() as $form ) {
			$choices[ $form->id ] = $form->title;
		}

		$field['choices'] = $choices;
	}

	return $field;
}
add_filter( 'acf/load_field/name=gravity_form', 'alpwind_gravity_forms_dropdown' );

/**
 * Gravity Forms Submit Button Fuction
 * Changes the submit input into a button element.
 *
 * @param array $button Button information.
 * @param array $form Form information.
 *
 * @return string
 */
function alpwind_gform_submit_button( $button, $form ) {
	ob_start();
	?>
	<button
		class='w-full mt-4 btn btn-primary'
		id='gform_submit_button_<?php echo esc_attr( $form['id'] ); ?>'
	>
		<?php echo wp_kses( $form['button']['text'], wp_kses_allowed_html( 'post' ) ); ?>
	</button>
	<?php
	return ob_get_clean();
}
add_filter( 'gform_submit_button', 'alpwind_gform_submit_button', 10, 2 );

/**
 * Function to hook in to gform_ajax_spinner_url filter.
 *
 * @param string $image_src The spinner image URL to be filtered.
 * @param array  $form The current form.
 *
 * @return string
 */
function alpwind_gform_ajax_spinner_url( $image_src, $form ) {
	return get_stylesheet_directory_uri() . '/assets/images/loading.svg';
}
add_filter( 'gform_ajax_spinner_url', 'alpwind_gform_ajax_spinner_url', 10, 2 );
