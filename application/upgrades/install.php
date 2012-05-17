<?php defined('SYSPATH') OR die('No direct script access.');
/**
 * 
 * Upgrade application to version 0.0.1
 *
 */

class Upgrade_Install extends Upgrade_Base {

	/**
	 * Run all database upgrades for this app version
	 *
	 * @param Database Database connection
	 */
	protected function _execute()
	{
		$this->_add_auth_roles();
	}


	protected function _add_auth_roles()
	{
		DB::insert('roles', array('name', 'description'))
			->values(array('login', 'Login privileges, granted after account confirmation.'))
			->values(array('admin', 'Administrative user, has access to everything.'))
			->execute($this->_db);
	}

}
