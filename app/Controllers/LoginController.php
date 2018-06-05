<?php 

class LoginController extends Controller{

	public function __construct()
	{
		if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
			$action = $_GET['action'] ?? '';
			if (($action != 'logout')) {
				$this->redirect(['controller'=>'admin']);
			}
		}

	}
	public function index()
	{
		$this->render('login');
	}

	public function login()
		{	
			$data = [];
			if (isset($_POST['login'])) {

				$email = $_POST['user'];
				$password = $_POST['pass'];

				$user = $this->getModel('UserModel');
				$user->setEmail($email);
				$user->setPassword($password);
				 if ($user->login() == 'faild') {

				 	$data['err'] = "Tài khoản không tồn tại";

				 } else {

				 	$this->redirect(['controller'=> 'admin', 'action'=>'index']);
				 	
				 }

			}

			$this->render('login', $data);

		}

		public function logout()
		{	
			session_destroy();
			$this->redirect(['controller'=> 'login', 'action'=>'index']);
		}

}