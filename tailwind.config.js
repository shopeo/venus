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
					50: 'var(--primary-color-50)',
					100: 'var(--primary-color-100)',
					200: 'var(--primary-color-200)',
					300: 'var(--primary-color-300)',
					400: 'var(--primary-color-400)',
					500: 'var(--primary-color-500)',
					600: 'var(--primary-color-600)',
					700: 'var(--primary-color-700)',
					800: 'var(--primary-color-800)',
					900: 'var(--primary-color-900)'
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
