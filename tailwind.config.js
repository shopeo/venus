/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

module.exports = {
	content: [
		'./theme/**/*.php',
	],
	theme: {
		extend: {
			colors: {
				primary: {
					50: '#fef2f3',
					100: '#fde6e7',
					200: '#f9bfc4',
					300: '#f599a0',
					400: '#ee4d59',
					500: '#e60012',
					600: '#cf0010',
					700: '#ad000e',
					800: '#8a000b',
					900: '#710009'
				}
			},
			fontFamily: {
				sans: ['Nunito', ...defaultTheme.fontFamily.sans],
			},
		},
	},
	experimental: {
		optimizeUniversalDefaults: true,
	},
	plugins: [
		require('@tailwindcss/forms'),
	],
}
