<?php defined('SYSPATH') OR die('No direct script access.');

class Media {

	public static function url($filepath)
	{
		// Only allow caching on production
		$cachebusting = in_array(Kohana::$environment, array(Kohana::PRODUCTION, KOHANA::STAGING)) ? microtime(true) : KOHANA::APP_VERSION;

		return URL::base().'media/'.$filepath.'?'.$cachebusting;
	}
}