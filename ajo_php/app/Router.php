<?php

namespace App\App;

/**
 * @author Zubs <zubairidrisaweda@gmail.com>
 * @package App\App
 */
class Router
{

	// Set variables
	public Request $request;
	public Response $response;

	// This array holds all the routes the application will have
	protected array $routes = [];

	public function __construct(Request $request, Response $response)
	{
		$this->request = $request;
		$this->response = $response;
	}

	public function get($path, $callback)
	{
		// Store the path and callback
		$this->routes['get'][$path] = $callback;
	}

	public function post($path, $callback)
	{
		// Store the path and callback
		$this->routes['post'][$path] = $callback;
	}

	protected function getLayout()
	{
		ob_start();
		include_once Application::$ROOT."/views/layouts/main.php";
		return ob_get_clean();
	}

	protected function getView($view)
	{
		ob_start();
		include_once Application::$ROOT."/views/$view.php";
		return ob_get_clean();
	}

	public function render($view)
	{
		$layout = $this->getLayout();
		$view = $this->getView($view);
		return str_replace('{{ content }}', $view, $layout);
	}

	function resolve()
	{
		$path = $this->request->getPath();
		$method = $this->request->getMethod();
		$callback = $this->routes[$method][$path] ?? false;

		// If the route is not found
		if ($callback === false) {
			$this->response->setStatusCode(404);
			return '<h1 style="text-align: center; margin: 300px;">404 | Not Found</h1>';
		}

		// See if the route has a view
		if (is_string($callback)) {
			return $this->render($callback);
		}

		return call_user_func($callback);
	}
}
