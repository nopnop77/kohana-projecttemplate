/**
 * Application bootstrap file. This makes sure all the files that are
 * needed are loaded correctly.
 */
require.config({
	baseUrl: Kohana.media_url + "js/app",
	paths: {
		underscore: "../../vendor/underscore",
		backbone: "../../vendor/backbone",
		mustache: "../../vendor/mustache",
		jquery: "../../vendor/require/jquery",
		text: "../../vendor/require/text",
		json2: "../../vendor/json2"
	}
});

require([
	"app",
	"json2"
], function (App, json2) {

	// Load the app when the DOM is ready
	$(document).ready(function () {
		App.initialize();
	});

});