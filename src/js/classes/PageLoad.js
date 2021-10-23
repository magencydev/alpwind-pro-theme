import SmoothScroll from './SmoothScroll'

export default class {
	constructor(callback = false) {
		window.addEventListener('load', () => {
			this.loaded()

			if (callback && typeof callback === 'function') {
				callback()
			}
		})
	}

	loaded() {
		let path = window.location.pathname

		if (document.querySelector('a[href^="#"]')) {
			let scrollable = new SmoothScroll('a[href^="#"]', {
				always_home: false
			})

			scrollable.mount()
		}

		if (document.querySelector('a[href^="' + path + '#"]')) {
			let innerScrollable = new SmoothScroll('a[href^="' + path + '#"]', {
				always_home: false
			})

			innerScrollable.mount()
		}
	}
}