import GLightbox from 'glightbox'

window.addEventListener('load', function() {
	if (document.querySelector('.gallery-icon')) {
		const lightbox = GLightbox({
			selector: '.gallery-icon > a'
		});
	}
})