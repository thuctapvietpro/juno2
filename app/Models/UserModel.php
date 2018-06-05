<?php

class UserModel extends Pagination {

	protected $username 	= null;
	protected $email 		= null;
	protected $fullname 	= null;
	protected $password 	= null;

	protected $table = "users";

	public function __construct()
	{
		parent::__construct();
	}

	public function setUsername($username)
	{
		$this->username = $username;
	}

	public function getUsername()
	{
		return $this->username;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setFullname($fullname)
	{
		$this->fullname = $fullname;
	}

	public function getFullname()
	{
		return $this->fullname;
	}
	public function setPassword($password)
	{
		$this->password =$password;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function login()
	{
		$sql = "SELECT * FROM $this->table
				WHERE `email` = '$this->email'
				AND `password` = '$this->password'";

		$this->query($sql);
		

		if ($this->num_rows() > 0) {
			$_SESSION['username'] = $this->email;
			$_SESSION['password'] = $this->password;
		} else {
			return "faild";
		}
	}

	public function getUser($id)
	{

		$sql = "SELECT * FROM $this->table WHERE userid = $id";

		$this->query($sql);
		if ($this->num_rows() > 0) {
			$data = $this->get();
			return $data[0];
		} else {
			return "faild";
		}

	}

	public function add()
	{
		$sql = "SELECT * FROM `users`
				WHERE `username` = '$this->username'";
		$this->query($sql);

		if ($this->num_rows() > 0) {

			return 'faild';

		} else {
			$sql = "INSERT INTO `users` (`username`, `password`, `email`, `fullname`)
					VALUES ('$this->username', '$this->password', '$this->email', '$this->fullname')";

			$this->query($sql);
		}
	}

	public function edit($id)
	{

		$sql = "SELECT * FROM `users`
			WHERE `email` = '$this->email' AND `userid` != $id";

		$this->query($sql);

		if (!($this->num_rows() > 0)) {

			$sql = "UPDATE `users`
					SET `email` = '$this->email', `username` = '$this->username', `password` = '$this->password', `fullname` = '$this->fullname'
					WHERE `userid` = $id";

			$this->query($sql);

		}  else {
			return 'faild';
		}

	}

	public function delete($id)
	{
		$sql = "DELETE FROM `users` WHERE `userid` = $id";
		$this->query($sql);

	}

}


