<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Alpwind_Pro_Theme
 * @since 0.0.1
 */

get_header();
?>

<main id="main" class="relative overflow-hidden">

	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>

		<div class="bg-blue py-12 wp-content">
			<div class="container px-4 mx-auto xl:max-w-6xl text-white">
				<div class="md:pt-6">
					<h1 class="pb-4 md:pb-8"><?php the_title(); ?></h1>
					<span class="flex gap-2 mb-1">
						<span class="dashicons dashicons-admin-users"></span>
						<span>
							Posted By:
							<?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?>
						</span>
					</span>

					<span class="flex gap-2">
						<span class="dashicons dashicons-clock"></span>
						<span>
							Posted On: <?php the_date( 'M j, Y' ); ?>
							<?php if ( get_the_date() !== get_the_modified_date() ) : ?>
								<br>Updated On: <?php the_modified_date( 'M j, Y' ); ?>
							<?php endif; ?>
						</span>
					</span>
				</div>
			</div>
		</div>

		<div class="container px-4 mx-auto xl:max-w-6xl wp-content">
			<div class="pt-8 md:pt-12">
				<?php the_content(); ?>
			</div>
		</div>

		<div class="pt-12 pb-6 container mx-auto px-4 xl:max-w-6xl">
			<a class="btn btn-tertiary"
				href="<?php the_permalink( get_option( 'page_for_posts' ) ); ?>">
				<svg width="17" height="9"
					class="btn-arrow-reversed transform rotate-180 ml-0 mr-1.5"
					viewBox="0 0 17 9"
					fill="none"
					xmlns="http://www.w3.org/2000/svg">

					<path d="M1 3.75H0.25V5.25H1V3.75ZM17 4.5L9.5
							0.169873V8.83013L17 4.5ZM1
							5.25H10.25V3.75H1V5.25Z"
						fill="#61D255" />
				</svg>

				<?php esc_html_e( 'All Posts', 'alpwind-pro' ); ?>
			</a>
		</div>

		<div class="container mx-auto xl:max-w-6xl px-4 mb-12 md:mb-32 lg:mb-40">
			<div class="flex gap-4 pt-4">
				<?php $ptags = get_the_tags( $post->ID ); ?>
				<?php if ( is_array( $ptags ) ) : ?>
					<?php foreach ( $ptags as $ptag ) : ?>
						<a href="<?php echo esc_url( get_tag_link( $ptag ) ); ?>" class="btn btn-primary">
							<span class="text-sm font-normal">
								<?php echo esc_html( $ptag->name ); ?>
							</span>
						</a>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	<?php endwhile; ?>
</main>

<?php
get_footer();
