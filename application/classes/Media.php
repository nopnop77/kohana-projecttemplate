<?php defined('SYSPATH') OR die('No direct script access.');

class Media {

	public static function url($filepath, $cachebusting = TRUE)
	{
		if ( ! $filepath)
			return URL::base().'_media/';

		// Only allow caching on production
		$cachebusting = in_array(Kohana::$environment, array(Kohana::PRODUCTION, KOHANA::STAGING)) ? KOHANA::APP_VERSION : microtime(true);

		return URL::base().'_media/'.$filepath.'?'.$cachebusting;
	}
}