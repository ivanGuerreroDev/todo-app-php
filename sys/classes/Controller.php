<?php

abstract class Controller {

	/**
	 * @var array
	 */
	private $data = [];

	/**
	 * @return void
	 */
	abstract public function index();

	/**
	 * @param string $key
	 * @param mixed $value
	 * @return void
	 */
	final protected function set($key, $value) {
		$this->data[$key] = $value;
	}

	/**
	 * @return array
	 */
	final public function getData() {
		return $this->data;
	}

	public function __pre() {}

	public function __post() {}

}
