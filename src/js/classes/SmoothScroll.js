/**
 * Scrollable.js
 * A custom plugin for smooth scrolling.
 */

 export default class {
	constructor(el, hash = false) {
		this.items = document.querySelectorAll(el)
		this.hash = hash
	}

	mount() {
		let self = this

		for (let item of this.items) {
			item.addEventListener('click', function(e) {
				let href = this.getAttribute('href')
				let tar = href.slice(href.indexOf('#'))

				e.preventDefault()
				self.scroll_to(tar)
			})
		}

		if (this.hash) {
			setTimeout(() => {
				this.scroll_to(this.hash)
			}, 250)

			setTimeout(() => {
				window.location.hash = this.hash
			}, 500)
		}
	}

	scroll_to(target) {
		if (!document.querySelector(target)) return

		let tar = document.querySelector(target)

		window.scroll({
			top: window.pageYOffset + tar.getBoundingClientRect().top - 85,
			left: 0,
			behavior: 'smooth',
		})
	}
}