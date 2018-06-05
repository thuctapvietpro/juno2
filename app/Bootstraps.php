<?php
// namespace App;

// require_once './autoload.php';
class Bootstraps {

	protected $_params = null;

	public function __construct()
	{

		$this->_params = $this->getParams();

	}

	public function getParams()
	{
		$get = $_GET;
		$post = $_POST;

		$get['controller'] = $get['controller'] ?? 'admin';
		$get['action'] = $get['action'] ?? 'index';

		$params = array_merge($get, $post);
		return (Object)$params;
	}

	public function run()
	{
		require_once (LIBRARY . '/Pagination.php');
		require_once(LIBRARY . '/Controller.php');
		$controllerName = ucfirst($this->_params->controller) . 'Controller';
		$actionName = $this->_params->action;

		// $controller = new $controllerName();

		$path = APP_PATH.'/Controllers/'.$controllerName.'.php';

		if (file_exists($path)) {

			require_once($path);

			if (!class_exists($controllerName)) {

				die("Không tìm thấy class!!!");
			}

			$controller = new $controllerName();

			if (method_exists($controller, $actionName)) {

				$controller->$actionName();

			} else {

				die("Không tìm thấy hành động!!!");
			}

		} else {

			die("Không tìm thấy file!!!");

		}	

	}
	

}