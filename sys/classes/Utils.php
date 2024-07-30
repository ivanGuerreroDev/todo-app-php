<?php

require_once './sys/classes/traits/DateUtils.php';
require_once './sys/classes/traits/StringUtils.php';

final class Utils {

	use DateUtils, StringUtils;

	/**
	 * @param string $path
	 * @return string
	 */
	final public static function generateLink($path) {
		return Config::PATH . $path;
	}

	private function __construct() {}

}
