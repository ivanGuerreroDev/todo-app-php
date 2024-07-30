<?php
trait StringUtils {

	/**
	 * @param string $haystack
	 * @param string $needle
	 * @return bool
	 */
	final public static function endsWith($haystack, $needle) {
		$haystack = substr($haystack, -strlen($needle));
		return $haystack === $needle;
	}

	/**
	 * @param string $haystack
	 * @param string $needle
	 * @return bool
	 */
	final public static function startsWith($haystack, $needle) {
		$haystack = substr($haystack, 0, strlen($needle));
		return $haystack === $needle;
	}

}
