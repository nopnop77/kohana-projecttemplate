/**
 * Application bootstrap file. This makes sure all the files that are
 * needed are loaded correctly.
 */
require.config({
	baseUrl: Kohana.media_url + "js/app",
	paths: {
		underscore: "../../3rdparty/underscore",
		backbone: "../../3rdparty/backbone",
		mustache: "../../3rdparty/mustache",
		jquery: "../../3rdparty/require/jquery",
		text: "../../3rdparty/require/text",
		json2: "../../3rdparty/json2"
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