<?php
/**
 * Template for displaying an footer menu using Tailwind CSS markup.
 * Why not use WordPress's wp_nav_menu function and/or a Walker Class?
 * Those methods limit the menu's structure and require a lot of CSS and/or
 * JavaScript to control different mega menu styles.
 * This seems to be a reasonable alternative.
 *
 * @link https://developer.wordpress.org/reference/functions/get_template_part/
 *
 * @package Alpwind Pro
 * @since 0.0.1
 */

?>

<footer id="footer" class="pt-16 pb-10 bg-black">

	<div class="container mx-auto px-6 pb-4 relative z-10">
		<div class="flex flex-wrap justify-between gap-6 sm:gap-8 xl:gap-12">
			<div class="sm:col-span-4 md:col-span-3 xl:col-span-2">
				<a href="<?php bloginfo( 'url' ); ?>" title="<?php bloginfo( 'title' ); ?>">
					<?php if ( wp_get_attachment_image( get_field( 'footer_logo', 'options' ) ) ) : ?>
						<?php echo wp_get_attachment_image( get_field( 'footer_logo', 'options' ), 'full', false, array( 'class' => 'w-40 max-w-full' ) ); ?>
					<?php else : ?>
						<span class="text-xl xl:text-2xl font-bold text-white"><?php bloginfo( 'title' ); ?></span>
					<?php endif; ?>
				</a>
			</div>

			<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-6 gap-6 lg:gap-8">
				<?php foreach ( alpwind_menu( 'primary' ) as $item ) : ?>
					<div>
						<a href="<?php echo esc_attr( $item->url ); ?>" target="<?php echo esc_attr( $item->target ); ?>" title="<?php echo esc_attr( $item->attr_title ? $item->attr_title : $item->title ); ?>" class="block text-white text-xl font-semibold transition-color duration-200 hover:text-red <?php alpwind_item_active( $item, 'text-red' ); ?>">
							<?php echo esc_html( $item->title ); ?>
						</a>

						<!-- Child Items -->
						<?php if ( isset( $item->children ) ) : ?>
							<ul class="block pt-4">
								<?php foreach ( $item->children as $child ) : ?>
									<li class="pb-3">
										<a href="<?php echo esc_attr( $child->url ); ?>" target="<?php echo esc_attr( $child->target ); ?>" title="<?php echo esc_attr( $child->attr_title ? $child->attr_title : $child->title ); ?>" class="text-sm text-white hover:text-red <?php alpwind_item_active( $child, 'text-red' ); ?>">
											<?php echo esc_html( $child->title ); ?>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="flex justify-end">
			<div class="flex -mx-3 mb-4 xl:justify-center">
				<?php while ( have_rows( 'footer_social', 'options' ) ) : ?>
					<?php the_row(); ?>
					<?php $s_link = get_sub_field( 'link' ); ?>

					<a href="<?php echo esc_url( $s_link['url'] ); ?>" title="<?php echo esc_attr( $s_link['title'] ); ?>" target="_blank" class="block py-2 px-3 text-white">
						<?php echo wp_get_attachment_image( get_sub_field( 'icon' ), 'full', true, array( 'class' => 'w-6 h-6' ) ); ?>
					</a>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
</footer>
