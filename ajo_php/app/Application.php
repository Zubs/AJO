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
	public Response $response;
	public static Application $App;
	
	// Initialize the class
	public function __construct($root)
	{
		self::$ROOT = $root;
		self::$App = $this;
		$this->request = new Request();
		$this->response = new Response();
		$this->router = new Router($this->request, $this->response);
	}

	public function run()
	{
		echo $this->router->resolve();
	}
}
