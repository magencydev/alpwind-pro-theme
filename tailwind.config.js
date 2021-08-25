module.exports = {
	purge: false,
	darkMode: false, // or 'media' or 'class'
	theme: {
		fontFamily: {
			'display': [ 'lato', 'sans-serif' ],
			'body': [ 'lato', 'sans-serif' ],
		},
		colors: {
			transparent: 'transparent',
			current: 'currentColor',
			black: '#000000',
			white: '#FFFFFF',
			gray: '#E2DAD7',
			grayer: '#7F8E9D',
			charcoal: '#2B2B28',
			blue: '#1A2339',
			navy: '#151C30',
			red: '#E27070',
			yellow: '#b3a32d',
			green: {
				light: '#ECF7F1',
				DEFAULT: '#bacfc4',
				dark: '#235251',
			},
			aqua: '#6DD3CE',
		},
		extend: {
			fontSize: {
				'banner': '4.75rem',
			}
		},
	},
	variants: {
		extend: {},
	},
	plugins: [
		require('@tailwindcss/forms'),
	],
}