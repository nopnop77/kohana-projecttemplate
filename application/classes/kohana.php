<?php defined('SYSPATH') OR die('No direct script access.');

class Kohana extends Kohana_Core
{
	const APP_VERSION = '0.0.0';
	const QA = 5;
	const BETA = 6;

	// Useful for when the constant is too vague as an int
	public static $environment_string = 'development';

}
