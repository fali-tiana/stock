/** @type {import('tailwindcss').Config} */

const plugin = require("tailwindcss/plugin");

module.exports = {
	content: ["./application/views/**/*.{php,html}"],
	theme: {
		extend: {
			colors: {

				// prior colors
				'white' : '#F9F9F9',

				// black shades
				'black': {
					DEFAULT: '#0F0C0C',
					100: '#1F1F29',
					200: '#17171F',
					300: '#13131A',
					400: '#101014',
					500: '#0C0C0F',
				},

				// primary colors
				'primary': {
					100: '#EEF1FF',
					200: '#D2DAFF',
					300: '#AAC4FF',
					400: '#B1B2FF',
					500: '#9C9DFF',
					600: '#8788FF',
					700: '#7273FF',
					800: '#5D5EFF',
					900: '#7879DE',
				},	

				// coffee shades
				'coffee' : {
					100: '#F3EDD0',
					200: '#E4D8BA',
					300: '#D5CEA3',
					400: '#C7A98E',
					500: '#A38668',
					600: '#7F6550',
					700: '#5E4938',
					800: '#3C2A21',
					900: '#1A120B',
					1000: '#120D0A',
					1100: '#0F0B08',
					1200: '#0C0906',
				},

				// utility colors
				success: "#08C552",
				info: "#24BEFE",
				warning: "#F28F1E",
				danger: "#D92D20",
				purplee: "#8A2BE2",

				"dark-success": "#006b3f",
				"dark-info": "#1c98cc",
				"dark-warning": "#d16d00",
				"dark-danger": "#a42917",
				"dark-purplee": "#6d1e7a",

				// utility bakground colors
				"success-bg": "#E5F5E4",
				"info-bg": "#F3F7FF",
				"warning-bg": "#FEEDE8",
				"danger-bg": "#FEE4E2",
				"purplee-bg": "#f2E4f7",
			},

			screens: {
				"max-3xl": { max: "1580px" },
				// => @media (max-width: 1653px) { ... }

				"max-2xl": { max: "1535px" },
				// => @media (max-width: 1535px) { ... }

				"max-xl": { max: "1280px" },
				// => @media (max-width: 1279px) { ... }

				"max-lg": { max: "1146px" },
				// => @media (max-width: 1023px) { ... }

				"max-md": { max: "768px" },
				// => @media (max-width: 767px) { ... }

				"max-sm": { max: "640px" },
				// => @media (max-width: 639px) { ... }

				"max-xs": { max: "426px" },
				// => @media (max-width: 426px) { ... }
			},
		},
	},
	plugins: [
		plugin(function ({ addBase, theme }) {
			addBase({
				h1: { fontSize: theme("fontSize.3xl"), fontWeight: 700 },
				h2: { fontSize: theme("fontSize.2xl"), fontWeight: 600 },
				h3: { fontSize: theme("fontSize.lg"), fontWeight: 500 },
			});
		}),
	],
};
