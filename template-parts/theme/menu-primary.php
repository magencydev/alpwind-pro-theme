<?php
/**
 * Template for displaying a dropdown mega menu using Tailwind CSS markup.
 * Why not use WordPress's wp_nav_menu function and/or a Walker Class?
 * Those methods limit the menu's structure and require a lot of CSS and/or
 * JavaScript to control different mega menu styles.
 * This seems to be a reasonable alternative.
 *
 * @link https://developer.wordpress.org/reference/functions/get_template_part/
 *
 * @package Alpwind_Pro_Theme
 * @since 0.0.1
 */

global $post;

$logo = get_field( 'header_logo', 'options' );
?>

<nav class="sticky transition-transform transform z-40 top-0 left-0 w-full xl:text-lg"
	x-data="primary_menu"
	:class="menu_container_classes"
	@scroll.window="watch_for_scroll()">

	<div class="container mx-auto px-4 flex flex-wrap justify-between items-center py-4 xl:py-6"
		@click.away="toggle_menu(false)" x-cloak>

		<!-- Main Nav Branding -->
		<a class="block w-8/12 sm:w-4/12 lg:w-2/12 pr-4 overflow-hidden xl:w-3/12 2xl:w-4/12"
			href="<?php bloginfo( 'url' ); ?>"
			title="<?php bloginfo( 'title' ); ?>">
			<?php if ( wp_get_attachment_image( $logo ) ) : ?>
				<?php echo wp_get_attachment_image( $logo, 'full', false, array( 'class' => 'w-56 max-w-full' ) ); ?>
			<?php else : ?>
				<span class="text-xl xl:text-2xl font-bold"><?php bloginfo( 'title' ); ?></span>
			<?php endif; ?>
		</a>

		<!-- Mobile Menu Trigger -->
		<div class="w-4/12 lg:hidden flex justify-end relative z-20">
			<button class="nav-burger w-8 focus:outline-none"
				@click="toggle_menu(!open)">
				<span class="transform transition-all rounded-md block w-full h-1 mb-1" :class="open ? 'rotate-45 translate-y-2' : ''"></span>
				<span class="transform transition-all rounded-md block w-full h-1 mb-1" :class="open ? 'opacity-0' : ''"></span>
				<span class="transform transition-all rounded-md block w-full h-1" :class="open ? '-rotate-45 -translate-y-2' : ''"></span>
			</button>
		</div>

		<!-- Top-level Main (Desktop) Nav -->
		<div class="nav-main top-0 left-0 z-10 fixed lg:static h-screen lg:h-auto lg:flex lg:items-center
			xl:justify-end lg:translate-x-0 pt-20 lg:pt-0 w-72 sm:w-80 md:w-96 lg:w-10/12 xl:w-9/12
			2xl:w-8/12 transition-transform transform duration-300"
			:class="drawer_container_classes"
			x-cloak>
			<ul class="w-full flex flex-wrap lg:flex-nowrap lg:items-center lg:justify-end px-6 sm:px-10 lg:px-0 py-3 lg:pl-4">
				<?php foreach ( alpwind_menu( 'primary' ) as $item ) : ?>
					<?php if ( ( get_field( 'members_only', $item ) && is_user_logged_in() ) || ! get_field( 'members_only', $item ) ) : ?>
						<li class="relative px-3 lg:px-4 xl:px-5 py-2 w-full lg:w-auto <?php echo esc_attr( implode( ' ', $item->classes ) ); ?>" x-data="{ active: false, mobile: false }" @mouseover="active = true" @mouseleave="active = false">
							<a href="<?php echo esc_url( $item->url ); ?>" target="<?php echo esc_attr( $item->target ); ?>" title="<?php echo esc_attr( $item->attr_title ? $item->attr_title : $item->title ); ?>" class="nav-text transition-colors duration-200 flex justify-between items-stretch lg:block lg:whitespace-nowrap <?php alpwind_item_active( $item, 'is-active' ); ?>">
								<?php echo esc_html( $item->title ); ?>

								<?php if ( isset( $item->children ) ) : ?>
									<span class="items-center px-4 lg:hidden" @click="mobile = !mobile; active = !active; $event.preventDefault()">
										<svg class="-mr-1 ml-2 h-5 w-5 transform transition-transform duration-100"
											:class="mobile ? '-rotate-180' : ''"
											xmlns="http://www.w3.org/2000/svg"
											viewBox="0 0 20 20"
											fill="currentColor"
											aria-hidden="true">
											<path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
										</svg>
									</span>
								<?php endif; ?>

								<span class="hidden lg:block active-indicator absolute transition-colors duration-200 bottom-0.5 left-0 right-0 mx-auto rounded-full w-1.5 h-1.5"></span>
							</a>

							<!-- Primary Dropdown Items -->
							<?php if ( isset( $item->children ) ) : ?>
								<ul class="nav-dropdown lg:absolute left-0 lg:mt-4 w-56 transition-all duration-200 overflow-hidden"
									:class="{ 'lg:max-h-screen lg:px-4 py-2 lg:py-4': active, 'lg:max-h-0': !active, 'max-h-0': !mobile, 'max-h-full': mobile }"
									role="menu"
									aria-orientation="vertical"
									aria-labelledby="options-menu">
									<?php foreach ( $item->children as $child ) : ?>
										<?php if ( ( get_field( 'members_only', $child ) && is_user_logged_in() ) || ! get_field( 'members_only', $child ) ) : ?>
											<li class="w-full px-3 py-2">
												<a href="<?php echo esc_url( $child->url ); ?>" target="<?php echo esc_attr( $child->target ); ?>" title="<?php echo esc_attr( $child->attr_title ? $child->attr_title : $child->title ); ?>" class="nav-dropdown-text transition-colors duration-200 <?php alpwind_item_active( $child, 'is-active' ); ?>">
													<?php echo esc_html( $child->title ); ?>
												</a>
											</li>
										<?php endif; ?>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?>
						</li>
					<?php endif; ?>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</nav>
