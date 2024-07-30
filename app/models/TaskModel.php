<?php

/**
 * TaskModel
 */
class TaskModel extends Model {

	/**
	 * @var string
	 */
	protected static $tableName = 'tasks';

	/**
	 * @return array
	 */
	public static function getAllFromInnerJoinWithUsers() {
		$tasks = sprintf('`%s`', self::getTableName());
		$users = sprintf('`%s`', UserModel::getTableName());
		$sql = <<<END
		SELECT $tasks.*, $users.`first_name`, $users.`last_name`
		FROM $tasks INNER JOIN $users
		ON $tasks.`user_id` = $users.`id`;
		END;
		$pst = DB::getInstance()->prepare($sql);
		$pst->execute();

		return $pst->fetchAll();
	}

}