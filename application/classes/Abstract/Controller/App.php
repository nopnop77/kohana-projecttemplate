<?php defined('SYSPATH') OR die('No direct script access.');

abstract class Abstract_Controller_App extends Abstract_Controller_Base {

	protected function _policies()
	{
		return Arr::merge(parent::_policies(), array(
			'Policy_User_Authenticated' => array(),
		));
	}
}