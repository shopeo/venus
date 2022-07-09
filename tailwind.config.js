/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

module.exports = {
	content: [
		'./theme/**/*.php',
	],
	theme: {
		extend: {},
	},
	experimental: {
		optimizeUniversalDefaults: true,
	},
	plugins: [],
}
