<?php
class Controller {
	protected $arrParams = null;

	public function getModel($modelName){
		
		$modelClass = ucfirst($modelName);
		require_once (APP_PATH . '/Models/' . $modelClass . '.php');
		$model = new $modelClass();
		return $model;
	}

	public function render($view = null, $data = [])
	{

		extract($data);
		$path = APP_PATH.'/Views/'.$view.'.php';
		require_once($path);

	}

	public function	strparam($param = [])
	{
		$str= null;

		foreach ($param as $key => $val) {
			$str.=$key.'='.$val.'&';
		}
		$str = rtrim($str, '&');
		return $str;
	}


	public function redirect($param = ['controller' => 'index', 'action'=>'index'])
	{

		$str = $this->strparam($param);
		header("Location: index.php?$str");

	}

}