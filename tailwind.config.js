/** @type {import('tailwindcss').Config} */
module.exports = {
	content: ["./assets/**/*.js", "./templates/**/*.html.twig"],
	theme: {
		container: {
			center: true,
			// screens: {
			// 	sm: "100%", // For small screens (default is 640px)
			// 	md: "600px", // Medium screens (default is 768px)
			// 	lg: "800px", // Large screens (default is 1024px)
			// 	xl: "800px", // Extra-large screens (default is 1280px)
			// 	"2xl": "800px", // Custom: Override for 2xl (default is 1536px)
			// },
		},
		extend: {},
	},
	plugins: [],
};
