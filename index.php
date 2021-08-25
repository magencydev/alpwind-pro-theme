<?php
/**
 * The default template for showing post listing and/or home page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#home-page-display
 *
 * @package Alpwind_Pro_Theme
 * @since 0.0.1
 */

get_header();

// Add query script for Ajax loading posts.
wp_enqueue_script( 'query-scripts' );

// Get current queried object.
$queried_object = get_queried_object();
$term_id        = $queried_object->term_id;

// Index variables.
$index_search   = ( get_search_query() ) ? get_search_query() : 'false';
$index_category = is_category() ? $term_id : false;
$index_tag      = is_tag() ? $term_id : false;
?>

<div id="post-templates" class="hidden">
	<div class="post-template relative overflow-hidden bg-gray bg-opacity-90 rounded-md p-6 md:p-8 lg:p-10">
		<div class="flex flex-wrap sm:flex-nowrap">
			<img class="post-thumb object-cover w-24 h-24 sm:w-16 sm:h-16 lg:w-32 lg:h-32 object-center pb-4 sm:pb-0" loading="lazy" />
			<div class="sm:pl-4 md:pl-6 lg:pl-8">
				<h4 class="post-title pb-4"></h4>
				<div class="post-excerpt"></div>
				<div class="flex items-center gap-2">
					<svg width="14" height="14" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M6.54447 12.5C9.65567 12.5 12.1778 9.81371 12.1778 6.5C12.1778 3.18629 9.65567 0.5 6.54447 0.5C3.43326 0.5 0.911133 3.18629 0.911133 6.5C0.911133 9.81371 3.43326 12.5 6.54447 12.5Z" stroke="#232924" stroke-linecap="round" stroke-linejoin="round" />
						<path d="M6.54443 2.75V6.5H10.0653"	stroke="#232924" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
					<span class="post-date"></span>
				</div>
			</div>
		</div>
		<a class="post-link absolute w-full h-full inset-0 z-20"></a>
	</div>
</div>

<main id="main" style="min-height: 90vh;" class="relative overflow-hidden pt-6">

	<!-- Background line graphic. -->
	<div class="absolute bottom-0 right-0 z-0 hidden sm:block transform
				translate-x-32 translate-y-32 md:-mb-96 lg:translate-y-56">
		<svg xmlns="http://www.w3.org/2000/svg"
			width="1091"
			height="977"
			viewBox="0 0 1091 977"
			fill="none">

			<path class="transition-opacity duration-500"
				:class="active ? 'line-point opacity-100 ' : 'opacity-0'"
				:d="get_line_pos"
				:stroke-width="line_width"
				stroke="#61D255" />
		</svg>
	</div>

	<div class="container mx-auto px-4 xl:max-w-6xl relative z-10">
		<div class="pt-8">
			<h2 class="font-bold md:text-4xl lg:text-5xl xl:text-6xl">
				<?php the_field( 'news_page_headline', 'options' ); ?>
			</h2>
		</div>

		<?php get_template_part( 'template-parts/filters', 'post' ); ?>

		<div class="mb-12 lg:mb-24">
			<div id="post-insert"
				class="pt-16 pb-12"
				data-post-templates="#post-templates"
				data-post-type="posts"
				data-post-search="<?php echo esc_attr( $index_search ); ?>"
				data-post-category="<?php echo esc_attr( $index_category ); ?>"
				data-post-tag="<?php echo esc_attr( $index_tag ); ?>"
				data-post-count="8"
				data-post-thumb="<?php echo esc_url( wp_get_attachment_image_src( get_field( 'defaults_thumbnail', 'options' ), 'full', false )[0] ); ?>">

				<div class="post-loader text-center">
					<?php esc_html_e( 'Loading...', 'alpwind-pro' ); ?>
				</div>

				<div class="post-container grid grid-cols-1 md:grid-cols-2 gap-6 mb-12"></div>

				<div class="md:grid-cols-2 flex justify-center">
					<button class="btn btn-primary post-pagination">
						<?php esc_html_e( 'View More', 'alpwind-pro' ); ?>
						<svg class="post-button-loader hidden w-6 h-6 ml-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" xml:space="preserve">
							<path fill="currentColor" d="M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z">
								<animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 25 25" to="360 25 25" dur="0.6s" repeatCount="indefinite" />
							</path>
						</svg>
					</button>
				</div>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>
