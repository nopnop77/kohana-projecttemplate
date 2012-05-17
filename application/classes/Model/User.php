<?php defined('SYSPATH') OR die('No direct access allowed.');

class Model_User extends Model_Auth_User implements Model_ACL_User {

	/**
	 * Wrapper method to execute ACL policies. Only returns a boolean, if you
	 * need a specific error code, look at Policy::$last_code
	 *
	 * @param string $policy_name the policy to run
	 * @param array  $args        arguments to pass to the rule
	 *
	 * @return boolean
	 */
	public function can($policy_name, $args = array())
	{
		$status = FALSE;

		try
		{
			$refl   = new ReflectionClass('Policy_' . $policy_name);
			$class  = $refl->newInstanceArgs();
			$status = $class->execute($this, $args);

			if ($status === TRUE)
				return TRUE;
		}
		catch (ReflectionException $ex) // try and find a message based policy
		{
			// Try each of this user's roles to match a policy
			foreach ($this->roles->find_all() as $role)
			{
				$status = Kohana::message('policy', $policy_name.'.'.$role->id);

				if ($status)
					return TRUE;
			}
		}

		// We don't know what kind of specific error this was
		if ($status === FALSE)
		{
			$status = Policy::GENERAL_FAILURE;
		}

		Policy::$last_code = $status;

		return $status === TRUE;
	}


	/**
	 * Wrapper method for self::can() but throws an exception instead of bool
	 *
	 * @param string $policy_name the policy to run
	 * @param array  $args        arguments to pass to the rule
	 *
	 * @throws Policy_Exception
	 *
	 * @return null
	 */
	public function assert($policy_name, $args = array())
	{
		$status = $this->can($policy_name, $args);

		if ($status !== TRUE)
		{
			throw new Policy_Exception(
				'Could not authorize policy :policy',
				array(':policy' => $policy_name),
				Policy::$last_code
			);
		}
	}

}