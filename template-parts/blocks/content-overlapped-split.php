<?php
/**
 * Template part to display a split section with vertically overlapping image
 * on page.
 *
 * @since 0.0.1
 */

$cta = get_sub_field( 'call_to_action' );
?>

<section class="bg-gray bg-opacity-40 sm:my-12 lg:my-24">
	<div class="container mx-auto px-6">
		<div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-8 lg:gap-4">
			<div class="py-16 md:py-24 lg:py-24 xl:py-32 2xl:py-48">
				<h2 class="uppercase text-black font-light mb-6 md:mb-8">
					<?php the_sub_field( 'headline' ); ?>
				</h2>

				<div class="md:text-lg">
					<?php the_sub_field( 'description' ); ?>
				</div>

				<?php if ( isset( $cta['url'] ) ) : ?>
					<div>
						<a href="<?php echo esc_url( $cta['url'] ); ?>"
							title="<?php echo esc_attr( $cta['title'] ); ?>"
							target="<?php echo esc_attr( $cta['target'] ); ?>"
							class="btn btn-primary mt-6">
							<?php echo esc_html( $cta['title'] ); ?>
						</a>
					</div>
				<?php endif; ?>
			</div>

			<div class="relative flex items-center justify-center">
				<?php echo wp_get_attachment_image( get_sub_field( 'image' ), 'full', false, array( 'class' => 'object-contain sm:absolute top-0 bottom-0 my-auto w-full lg:w-10/12 h-96 sm:h-auto' ) ); ?>
			</div>
		</div>
	</div>
</section>