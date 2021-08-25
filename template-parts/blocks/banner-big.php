<?php
/**
 * Template part to display banner at top of page.
 *
 * @since 0.0.1
 */

?>

<header class="relative pt-48">
	<?php echo wp_get_attachment_image( get_sub_field( 'background_image' ), 'full', false, array( 'class' => 'w-full h-full absolute inset-0 object-cover z-0' ) ); ?>
	
	<div class="absolute top-0 left-0 h-1/2 w-full bg-gradient-to-b from-black to-transparent z-10 opacity-60"></div>
	<div class="absolute bottom-0 left-0 h-2/3 w-full bg-gradient-to-b from-transparent to-white z-10"></div>

	<div class="container mx-auto px-6 relative z-20">
		<div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-12 lg:gap-16 xl:gap-20">
			<div class="text-white">
				<h1>
					<?php the_sub_field( 'headline' ); ?>
				</h1>
				
				<div class="text-lg md:text-xl lg:text-2xl uppercase font-light mt-6">
					<?php the_sub_field( 'description' ); ?>
				</div>

				<div class="mt-8">
					<?php echo wp_get_attachment_image( get_sub_field( 'image' ), 'full', false, array( 'class' => 'w-full transform md:scale-110 origin-top-right' ) ); ?>
				</div>
			</div>

			<div class="pb-10">
				<div class="bg-white px-6 py-10 md:p-8 lg:p-10 xl:p-12 shadow-md">
					<?php gravity_form( get_sub_field( 'gravity_form', true, false, false, null, true ) ); ?>
				</div>
			</div>
		</div>
	</div>
</header>
