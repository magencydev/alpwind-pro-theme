/**
 * Scrollable.js
 * A custom plugin for smooth scrolling.
 */

export default class {
	constructor(el, options) {
		this.always_home = options.always_home ? options.always_home : false
		this.items = document.querySelectorAll(el)
	}

	mount() {
		let self = this

		for (let item of this.items) {
			item.addEventListener('click', function(e) {
				let href = this.getAttribute('href')
				let tar = href.slice(href.indexOf('#'))
				let pos = this.getAttribute('data-scroll-to')
					? this.getAttribute('data-scroll-to')
					: 'start'

				if (self.always_home && window.location.pathname !== '/') {
					e.preventDefault()
					window.location.href = '/' + tar
				} else {
					self.scroll_to(tar, e, pos)
				}
			})
		}

		if (window.location.hash) {
			setTimeout(() => {
				this.scroll_to(window.location.hash, false, 'start')
			}, 500)
		}
	}

	scroll_to(target, event, pos = 'center') {
		let tar = document.querySelector(target)

		if (tar) {
			if (event) {
				event.preventDefault()
			}

			tar.scrollIntoView({
				behavior: 'smooth',
				block: pos
			})
		}
	}
}