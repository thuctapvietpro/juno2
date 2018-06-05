<?php 
	class AdminController extends Controller{


		public function __construct()
		{
			if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {

				$this->redirect(['controller'=>'login']);
			}

		}


		public function index()
		{
			$user = $this->getModel('UserModel');
			$user->set_rows_per_page(6);
			$user->set_page();
			$user->set_per_row();
			$user->set_total_rows();
			$user->set_total_pages();
			$user->set_list_pages('index', $this->strparam(['controller'=>'admin', 'action'=>'index']));
			$user->set_row();
			$data['user'] = $user->get();
			$data['pagi'] = $user->get_list_pages();
			$data['session'] = $_SESSION;
			$this->render('admin/index', $data);

			
		}

		public function edit()
		{
			$id = $_GET['id'];
			$user = $this->getModel('UserModel');
			$data['user'] = $user->getUser($id);
			if ($data['user'] == "faild") {
				$_SESSION['err'] = "ID không tồn tại";
				$this->redirect(['controller'=>'admin']);
			}

			if (isset($_POST['edit'])) {
				$post= $_POST;
				$user->setUsername($post['user']);
				$user->setEmail($post['mail']);
				$user->setPassword($post['pass']);
				$user->setFullname($post['full']);
				if ($user->edit($id) == "faild") {
					$data['err'] = "Email đã trùng !!!";
				}
				else {
					$_SESSION['success'] = "Cập nhật tài khoản thành công";
					$this->redirect(['controller'=>'admin']);
				}
			}

			$this->render('admin/edit',$data);

		}

		public function add()
		{
			if (isset($_POST['add'])) {
				$post = $_POST;
				$user = $this->getModel('UserModel');
				$user->setUsername($post['user']);
				$user->setEmail($post['mail']);
				$user->setPassword($post['pass']);
				$user->setFullname($post['full']);
				if ($user->add() == "faild") {
					$data['err'] = "Tài khoản đã tồn tại !!!";
				} else {
					$_SESSION['success'] = "Tài khoản được thêm thành công";
					$this->redirect(['controller'=>'admin']);
				}

			}
			$this->render('admin/add');
		}

		public function delete()
		{
			$id = $_GET['id'];
			$user = $this->getModel('UserModel');
			$user->delete($id);
			$_SESSION['success'] = "Xóa tài khoản thành công";
			$this->redirect(['controller'=>'admin']);
		}

		

	}
 ?>