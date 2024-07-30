<?php

/**
 * TaskApiController
 */
class TaskApiController extends ApiController {

	/**
	 * Route: /api/tasks
	 * cURL example:
	 * <code>
	 * 	curl http://localhost/todoApp/api/tasks --cookie "PHPSESSID=$yourSessionId"
	 * </code>
	 * @return void
	 */
	public function index() {
		Http::checkMethodIsAllowed('GET');
		$tasks = TaskModel::getAll();
		$this->set('tasks', $tasks);
	}

}