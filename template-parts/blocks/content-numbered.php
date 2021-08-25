<?php
/**
 * Template part to display numbered content on page.
 *
 * @since 0.0.1
 */

?>

<section class="bg-white py-16 md:py-24 lg:py-32 xl:py-36">
	<div class="container mx-auto px-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6 md:gap-8 lg:gap-10 xl:gap-12">
		<div class="md:col-span-3">
			<h3 class="uppercase text-black font-light text-center sm:text-left">
				<?php the_sub_field( 'headline' ); ?>
			</h3>
		</div>

		<?php while ( have_rows( 'columns' ) ) : ?>
			<?php the_row(); ?>

			<div class="flex items-center justify-center sm:justify-start">
				<div class="sm:flex-shrink-0">
					<?php echo wp_get_attachment_image( get_sub_field( 'image' ), 'full', true, array( 'class' => 'h-40 lg:h-48 xl:h-56 w-auto object-contain' ) ); ?>
				</div>
				<div class="text-charcoal md:text-lg lg:text-xl xl:text-2xl sm:flex-grow">
					<?php the_sub_field( 'description' ); ?>
				</div>
			</div>
		<?php endwhile; ?>
	</div>
</section>