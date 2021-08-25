<?php
/**
 * Template for displaying a testimonial slide show.
 *
 * @since 0.0.1
 */

wp_enqueue_style( 'alpwind-testimonials' );
wp_enqueue_script( 'alpwind-testimonials' );
?>

<section class="py-16 md:py-24 lg:py-32 bg-green">
	<div class="container mx-auto px-6 xl:max-w-5xl">
		<h3 class="text-black uppercase font-light text-center mb-6 md:mb-8">
			<?php the_sub_field( 'headline' ); ?>
		</h3>

		<div class="glide testimonials relative">
			<div class="glide__track" data-glide-el="track">
				<ul class="glide__slides">
					<?php while ( have_rows( 'testimonials' ) ) : ?>
						<?php the_row(); ?>
						<li class="glide__slide text-center px-8 md:px-12 lg:px-20 xl:px-24">
							<div class="mb-6 md:mb-12">
								<?php the_sub_field( 'description' ); ?>
							</div>

							<div class="flex justify-center">
								<?php echo wp_get_attachment_image( get_sub_field( 'image' ), 'full', false, array( 'class' => 'rounded-full w-14 h-14 md:w-16 md:h-16') ); ?>
							</div>

							<h4 class="py-2 uppercase font-light">
								<?php the_sub_field( 'name' ); ?>
							</h4>

							<div>
								<?php the_sub_field( 'title' ); ?><br />
								<?php the_sub_field( 'company' ); ?>
							</div>
						</li>
					<?php endwhile; ?>
				</ul>
			</div>
			<div data-glide-el="controls" class="absolute flex justify-between w-full top-16 sm:top-12 md:top-8 left-0 my-auto">
				<button data-glide-dir="<">
					<svg width="18" height="13" viewBox="0 0 18 13" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M0.05 6.56L5.79 0.819999L6.46 1.52C6.6 1.66667 6.65667 1.81333 6.63 1.96C6.60333 2.1 6.52333 2.23667 6.39 2.37L3.73 5.02C3.39 5.36 3.08667 5.63 2.82 5.83C3.18 5.78333 3.55667 5.74667 3.95 5.72C4.35 5.69333 4.76 5.68 5.18 5.68H17.84V7.46H5.18C4.76 7.46 4.35 7.44667 3.95 7.42C3.55667 7.39333 3.18 7.35667 2.82 7.31C2.95333 7.42333 3.09333 7.54667 3.24 7.68C3.39333 7.80667 3.55667 7.95333 3.73 8.12L6.41 10.79C6.54333 10.9233 6.62333 11.0633 6.65 11.21C6.67667 11.35 6.62 11.4933 6.48 11.64L5.81 12.34L0.05 6.56Z" fill="black"/>
					</svg>
				</button>
				<button data-glide-dir=">">
					<svg width="18" height="13" viewBox="0 0 18 13" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M17.95 6.44L12.21 12.18L11.54 11.48C11.4 11.3333 11.3433 11.1867 11.37 11.04C11.3967 10.9 11.4767 10.7633 11.61 10.63L14.27 7.98C14.61 7.64 14.9133 7.37 15.18 7.17C14.82 7.21667 14.4433 7.25333 14.05 7.28C13.65 7.30667 13.24 7.32 12.82 7.32L0.159998 7.32L0.159998 5.54L12.82 5.54C13.24 5.54 13.65 5.55333 14.05 5.58C14.4433 5.60667 14.82 5.64333 15.18 5.69C15.0467 5.57667 14.9067 5.45333 14.76 5.32C14.6067 5.19333 14.4433 5.04667 14.27 4.88L11.59 2.21C11.4567 2.07667 11.3767 1.93667 11.35 1.79C11.3233 1.65 11.38 1.50667 11.52 1.36L12.19 0.660001L17.95 6.44Z" fill="black"/>
					</svg>
				</button>
			</div>
		</div>
	</div>
</section>