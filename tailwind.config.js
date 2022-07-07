const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

module.exports = {
	content: [
		'./theme/**/*.php',
		'./theme/**/*.html',
		'./theme/theme.json',
	],
	theme: {
		extend: {},
	},
	experimental: {
		optimizeUniversalDefaults: true
	},
	plugins: [],
}
