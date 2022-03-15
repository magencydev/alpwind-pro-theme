// Import and Initialize Alpine.js
import Alpine from 'alpinejs'
window.Alpine = Alpine
Alpine.start()

// Import and setup Theme utilities
import Origin from './classes/Origin'
window.Origin = new Origin()

// Import all other dependencies
import lax from 'lax.js'
import SmoothScroll from './classes/SmoothScroll'


// On content load event:
document.addEventListener('DOMContentLoaded', () => {
	// Smooth Scroll
	let path = window.location.pathname

	if (document.querySelector('a[href^="#"]')) {
		let scrollable = new SmoothScroll('a[href^="#"]')
		scrollable.mount()
	}

	if (document.querySelector('a[href^="' + path + '#"]')) {
		let innerScrollable = new SmoothScroll('a[href^="' + path + '#"]')
		innerScrollable.mount()
	}

	// Parallax
	lax.init()
	lax.addDriver('scrollY', () => window.scrollY)

	lax.addElements('.drift', {
		scrollY: {
			translateY: [
				["elInY", "elOutY"],
				{
					1023: [0, 0],
					1024: ['-elHeight/4', 'elHeight/4'],
				},
			]
		}
	})
})