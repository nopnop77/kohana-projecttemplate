define([
	"backbone"
], function (
		Backbone
) {

	/**
	 * This isn't the normal way you do routing in backbone, but we don't
	 * need full routing, and don't want to use hashbangs to handle routing
	 * in IE.
	 */

	var initialize = function () {

		var route = $("body").attr("id");
		
	};

	return {
		initialize: initialize
	};
});