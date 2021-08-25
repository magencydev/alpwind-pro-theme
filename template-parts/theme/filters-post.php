<?php
/**
 * Template for displaying some default post filters for post listing pages.
 *
 * @link https://developer.wordpress.org/rest-api/
 * @link https://developer.wordpress.org/reference/classes/wp_query/
 *
 * @package Alpwind_Pro_Theme
 * @since 0.0.1
 */

$filter_fields = array(
	array(
		'type'        => 'select',
		'id'          => 'post-category',
		'placeholder' => __( 'Select A Category', 'alpwind-pro' ),
		'options'     => get_terms( array( 'taxonomy' => 'category' ) ),
		'selected'    => function( $tid ) {
			global $index_category;
			return intval( $index_category ) === $tid ? 'selected' : '';
		},
	),
	array(
		'type'        => 'select',
		'id'          => 'post-tag',
		'placeholder' => __( 'Select A Tag', 'alpwind-pro' ),
		'options'     => get_terms( array( 'taxonomy' => 'post_tag' ) ),
		'selected'    => function( $tid ) {
			global $index_tag;
			return intval( $index_tag ) === $tid ? 'selected' : '';
		},
	),
	array(
		'type'        => 'search',
		'id'          => 'post-search',
		'placeholder' => __( 'Search Posts', 'alpwind-pro' ),
	),
	array(
		'type'        => 'button',
		'id'          => 'post-filter',
		'placeholder' => __( 'Filter', 'alpwind-pro' ),
	),
);
?>

<section class="pt-12">
	<div class="container" id="post-filters">
		<div class="flex flex-wrap items-center justify-between -mx-2 gap-y-4">
			<?php foreach ( $filter_fields as $field ) : ?>
				<div class="px-2 w-full md:w-1/2 xl:w-1/4">
					<?php if ( 'select' === $field['type'] ) : ?>
						<select id="<?php echo esc_attr( $field['id'] ); ?>"
								class="border-charcoal rounded-lg px-4 py-3.5">
							<option value="">
								<?php echo esc_html( $field['placeholder'] ); ?>
							</option>

							<?php foreach ( $field['options'] as $option ) : ?>
								<option value="<?php echo esc_attr( $option->term_id ); ?>"
									<?php echo esc_attr( $field['selected']( $option->term_id ) ); ?>>
									<?php echo esc_html( $option->name ); ?>
								</option>
							<?php endforeach; ?>

							<option value="">
								<?php esc_html_e( 'Clear', 'alpwind-pro' ); ?>
							</option>
						</select>
					<?php elseif ( 'search' === $field['type'] ) : ?>
						<input type="search" id="<?php echo esc_attr( $field['id'] ); ?>" placeholder="<?php echo esc_attr( $field['placeholder'] ); ?>"
								class="border border-charcoal rounded-lg px-4 py-3.5" />
					<?php elseif ( 'button' === $field['type'] ) : ?>
						<button type="button" id="<?php echo esc_attr( $field['id'] ); ?>" class="btn btn-primary w-full">
							<?php echo esc_attr( $field['placeholder'] ); ?>
						</button>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
