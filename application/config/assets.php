<?php defined('SYSPATH') OR die('No direct script access.');

$js_app_file = Kohana::$environment === Kohana::DEVELOPMENT
	? 'js/app/compiled/app.js'
	: 'js/app/compiled/app.min.js';

return array
(
	'default-template' => array
	(
		array('style', Media::url('css/styles.css'), 'head'),
		array('script', 'http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js', 'body'),
		array('script', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js', 'body', 10),
		array('script', Media::url('vendor/require/require.js'), 'body', 20),
		array('script', Media::url('js/'.((Kohana::$environment == Kohana::DEVELOPMENT) ? 'app/bootstrap.js' : 'app-min.js')), 'body', 30),
	),
);