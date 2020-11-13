<?php

namespace App\App;

/**
 * @author Zubs <zubairidrisaweda@gmail.com>
 * @package App\App
 */
class Application
{

	// Declare variable
	public static string $ROOT;
	public Router $router;
	public Request $request;
	
	// Initialize the class
	public function __construct($root)
	{
		self::$ROOT = $root;
		$this->request = new Request();
		$this->router = new Router($this->request);
	}

	public function run()
	{
		echo $this->router->resolve();
	}
}
