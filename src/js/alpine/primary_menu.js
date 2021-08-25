export default () => ( {
	open: false,
	scrolled_up: true,
	last_scroll_top: 0,

	toggle_menu( val ) {
		this.open = val;
	},

	watch_for_scroll() {
		let st = window.pageYOffset || document.documentElement.scrollTop;

		if ( st > this.last_scroll_top && 300 < window.pageYOffset ){
			this.scrolled_up = false;
		} else {
			this.scrolled_up = true;
		}

		this.last_scroll_top = st <= 0 ? 0 : st;
	},

	menu_container_classes() {
		return {
			'translate-y-0': this.scrolled_up,
			'-translate-y-32 lg:-translate-y-36': ! this.scrolled_up,
		}
	},

	drawer_container_classes() {
		return {
			'translate-x-0': this.open,
			'-translate-x-72 sm:-translate-x-80 md:-translate-x-96': ! this.open,
		}
	}
} );