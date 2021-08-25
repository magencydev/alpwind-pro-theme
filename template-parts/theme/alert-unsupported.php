<?php
/**
 * Template for displaying an error message if user is using IE.
 *
 * @link https://developer.wordpress.org/reference/functions/get_template_part/
 *
 * @package Alpwind_Pro_Theme
 * @since 0.0.1
 */

$browser = alpwind_get_browser( $_SERVER );

if ( 'Internet Explorer' === $browser['name'] ) : ?>
	<div id="ie-popup" class="fixed top-0 left-0 w-full h-full z-50 flex justify-center items-center">
		<div class="absolute z-40 top-0 left-0 w-full h-full opacity-50 cursor-pointer" style="background: black;" id="close-ie-popup" onclick="alpwind_close_ie_popup();"></div>
		<div class="relative z-50 rounded-md p-8 shadow-sm w-11/12 md:w-10/12 lg:w-9/12 text-center" style="background: white;">
			<h3 class="pb-8">Unsupported Browser</h3>
			<p>Hey there! Looks like you're using Internet Explorer. You can click out of this box and continue to this site, however things may look a little off!</p>
			<p>We recommend using one of these broswers for a better overall web experience.</p>
			<div class="flex flex-wrap -mx-6 pt-8">
				<div class="w-full md:w-1/2 xl:w-1/3 text-center p-6">
					<a href="https://www.google.com/chrome/" target="_blank">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/chrome.png" loading="lazy" class="w-auto mx-auto h-32 max-w-full mb-4" alt="Google Chrome">
					</a>
					<h5 class="pb-1">Google Chrome</h5>
					<p>One of the most popular browsers built by Google.</p>
				</div>
				<div class="w-full md:w-1/2 xl:w-1/3 text-center p-6">
					<a href="https://www.mozilla.org/en-US/firefox/new/" target="_blank">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/firefox.png" class="w-auto mx-auto h-32 max-w-full mb-4" alt="Firefox">
					</a>
					<h5 class="pb-1">Firefox</h5>
					<p>Mozilla's full featured browser.</p>
				</div>
				<div class="w-full md:w-1/2 xl:w-1/3 text-center p-6">
					<a href="https://www.microsoft.com/en-us/edge" target="_blank">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/edge.png" class="w-auto mx-auto h-32 max-w-full mb-4" alt="Microsoft Edge">
					</a>
					<h5 class="pb-1">Microsoft Edge</h5>
					<p>Internet Explorer's awesome predecessor and the new standard for web browsing on Windows.</p>
				</div>
			</div>
		</div>
	</div>

	<script>
		var popup = document.getElementById( 'ie-popup' );

		function alpwind_close_ie_popup() {
			popup.style.display = 'none';
			window.alpwind_pro.set_cookie( 'is_ie', 'true', 2 );
		}

		if ( window.alpwind_pro.get_cookie( 'is_ie' ) ) {
			popup.style.display = 'none';
		}
	</script>
<?php endif; ?>
