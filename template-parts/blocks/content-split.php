<?php
/**
 * Template part to display a split section on page.
 *
 * @since 0.0.1
 */

$cta = get_sub_field( 'call_to_action' );
?>

<section class="py-16 md:py-24 lg:py-24 xl:py-32">
	<div class="container mx-auto px-6">
		<div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-8 lg:gap-12 xl:gap-20">
			<div class="relative py-48 lg:py-64">
				<?php echo wp_get_attachment_image( get_sub_field( 'image' ), 'full', false, array( 'class' => 'object-cover absolute inset-0 w-full h-full' ) ); ?>
			</div>

			<div class="flex items-center">
				<div class="py-8">
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
			</div>
		</div>
	</div>
</section>