import Alpine from 'alpinejs'
import HeaderMenu from './alpine/HeaderMenu'

window.Alpine = Alpine
Alpine.data('HeaderMenu', HeaderMenu)
Alpine.start()

import Alpwind from './classes/Alpwind'
import PageLoad from './classes/PageLoad'
import lax from 'lax.js'

window.Alpwind = new Alpwind()

new PageLoad(() => {
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