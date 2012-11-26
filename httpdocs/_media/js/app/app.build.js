({
	name: "bootstrap",
	out: "../app-min.js",
	paths: {
		underscore: "../../vendor/underscore",
		backbone: "../../vendor/backbone",
		mustache: "../../vendor/mustache/mustache",
		jquery: "../../vendor/require/jquery",
		text: "../../vendor/require/text",
		json2: "../../vendor/json2"
	},
	wrap: {
		start: "$(function() {",
		end: "});"
	},
	optimizeCss: "none",
	optimize: "uglify"
})