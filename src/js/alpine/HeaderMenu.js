export default () => ({
	open: false,
	atTop: true,

	toggleMenu(val) {
		this.open = val
	},

	watchScroll() {
		this.atTop = window.scrollY < 300
	},

	menuContainerClasses() {
		return {
			'relative': this.atTop,
			'sticky bg-black text-white': !this.atTop
		}
	},

	drawerContainerClasses() {
		return {
			'translate-x-0': this.open,
			'-translate-x-72 sm:-translate-x-80 md:-translate-x-96': ! this.open,
		}
	}
})