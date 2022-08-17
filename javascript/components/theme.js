export default () => ({
	theme: 'light',
	init() {
		if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
			this.dark();
		} else {
			this.light();
		}
	},
	toggle() {
		this.theme === 'light' ? this.dark() : this.light();
	},
	dark() {
		this.theme = 'dark';
		document.documentElement.classList.add('dark');
		localStorage.theme = this.theme;
	},
	light() {
		this.theme = 'light';
		document.documentElement.classList.remove('dark');
		localStorage.theme = this.theme;
	}
});
