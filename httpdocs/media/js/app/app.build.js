({
	name: "bootstrap",
	out: "../app-min.js",
	paths: {
		underscore: "../../3rdparty/underscore",
		backbone: "../../3rdparty/backbone",
		mustache: "../../3rdparty/mustache/mustache",
		jquery: "../../3rdparty/require/jquery",
		text: "../../3rdparty/require/text",
		json2: "../../3rdparty/json2"
	},
	wrap: {
		start: "$(function() {",
		end: "});"
	},
	optimizeCss: "none",
	optimize: "uglify"
})