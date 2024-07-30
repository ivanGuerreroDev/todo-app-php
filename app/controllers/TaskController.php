<?php

/**
 * TaskController
 */
class TaskController extends AuthController {

	/**
	 * route: /tasks/
	 * @return void
	 */
	public function index() {
		$this->set('title', 'Tasks');
		$tasks = TaskModel::getAllFromInnerJoinWithUsers();
		foreach ($tasks as $task) {
			$task->created_at = Utils::formatDateAndTime($task->created_at);
			$task->user = $this->formatFirstAndLastName($task->first_name, $task->last_name);
		}
		$this->set('tasks', $tasks);
	}

	/**
	 * route: /tasks/create/
	 * @return void
	 */
	public function create() {
		$this->set('title', 'Add task');
		if (!Http::isPost()) {
			return;
		}
		$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
		$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
		if (empty($name) || empty($description)) {
			$this->set('message', 'Error #1!');
			return;
		}
		$userId = intval(Session::get(Config::USER_COOKIE));
		$name = trim($name);
		$description = trim($description);

		// Упис података у базу
		$task = TaskModel::create([
			'user_id' => $userId,
			'name' => $name,
			'description' => $description
		]);
		if (!$task) {
			$this->set('message', 'Error #2!');
			return;
		}
		Redirect::to('tasks');
	}

	/**
	 * route: /tasks/update/$id
	 * @param int $id ID
	 * @return void
	 */
	public function update($id) {
		// Постављање наслова
		$this->set('title', 'Update task');
		if (!Http::isPost()) {
			$this->setTask($id);
			return;
		}
		$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
		$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
		$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
		if (empty($name) || empty($description)) {
			$this->set('message', 'Error #1!');
			$this->setTask($id);
			return;
		}
		$userId = intval(Session::get(Config::USER_COOKIE));
		$name = trim($name);
		$description = trim($description);
		$status = TaskModel::update($id, [
			'user_id' => $userId,
			'name' => $name,
			'description' => $description
		]);
		if (!$status) {
			$this->set('message', 'Error #2!');
			$this->setTask($id);
			return;
		}
		Redirect::to('tasks');
	}

	/**
	 * route: /tasks/delete/$id
	 * @param int $id ID
	 * @return void
	 */
	public function delete($id) {
		// Уклањање података из базе
		TaskModel::delete($id);

		// Редирекција
		Redirect::to('tasks');
	}

	/**
	 * @param int $id ID
	 * @return void
	 */
	private function setTask($id, $name = 'task') {
		$task = TaskModel::getById($id);
		$this->set($name, $task);
	}

	/**
	 * @param string $firstName
	 * @param string $lastName
	 * @return string
	 */
	public static function formatFirstAndLastName($firstName, $lastName) {
		$user = trim(implode(' ', [$firstName, $lastName]));
		return $user ? $user : 'N/A';
	}

}