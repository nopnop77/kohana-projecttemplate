<?php defined('SYSPATH') OR die('No direct script access.');

/**
 * auth constraints
 */
class Migration_Default_20110204130515 extends Minion_Migration_Base {

	/**
	 * Run queries needed to apply this migration
	 *
	 * @param Database Database connection
	 */
	public function up(Database $db)
	{
		$db->query(NULL, '
			ALTER TABLE `pvt_roles_users`
			ADD CONSTRAINT `fk_pvt_roles_users_user_id`
				FOREIGN KEY (`user_id`)
				REFERENCES `users` (`id`)
				ON DELETE CASCADE,
			ADD CONSTRAINT `fk_pvt_roles_users_role_id`
				FOREIGN KEY (`role_id`)
				REFERENCES `roles` (`id`)
				ON DELETE CASCADE;
		');

		$db->query(NULL, '
			ALTER TABLE `user_tokens`
			ADD CONSTRAINT `fk_user_tokens_user_id`
				FOREIGN KEY (`user_id`)
				REFERENCES `users` (`id`)
				ON DELETE CASCADE;
		');
	}

	/**
	 * Run queries needed to remove this migration
	 *
	 * @param Database Database connection
	 */
	public function down(Database $db)
	{
		
	}
}
