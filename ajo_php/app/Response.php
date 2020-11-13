<?php

namespace App\App;

/**
 * @author Zubs <zubairidrisaweda@gmail.com>
 * @package App\App
 */
class Response
{
	public function setStatusCode(int $code)
	{
		http_response_code($code);
	}
}
