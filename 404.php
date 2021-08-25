<?php
/**
 * 404 Page Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#404-not-found
 *
 * @package Alpwind_Pro_Theme
 * @since 0.0.1
 */

get_header();
?>

<main id="main" class="py-12 md:py-24">
	<div class="container mx-auto px-4 xl:max-w-6xl">
		<h1 class="mb-12">
			<?php esc_html_e( '404: Page Not Found', 'alpwind-pro' ); ?>
		</h1>
		<div class="wp-content">
			<?php the_field( 'misc_four_oh_four', 'options' ); ?>
		</div>
	</div>
</main>

<?php
get_footer();
