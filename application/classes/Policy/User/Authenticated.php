<?php defined('SYSPATH') OR die('No direct script access.');

class Policy_User_Authenticated extends Policy
{
	public function execute(Model_ACL_User $user, array $extra = NULL)
	{
		// By default we allow logged in users access to everything
		return $user->loaded();
	}
}