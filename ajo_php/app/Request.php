<?php

namespace App\App;

/**
 * @author Zubs <zubairidrisaweda@gmail.com>
 * @package App\App
 */
class Request
{
	function getPath()
	{
		$path = $_SERVER['REQUEST_URI'] ?? '/';

		// Check if ? is in request, for query strings
		$position = strpos($path, '?');
		if ($position === false) {
			return $path;
		}

		// Remove ? and what follows
		return substr($path, 0, $position);
	}

	function getMethod($value='')
	{
		return strtolower($_SERVER['REQUEST_METHOD']);
	}
}
