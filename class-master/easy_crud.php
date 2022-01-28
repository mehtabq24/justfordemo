<?php

	//session_start();

	function login() {

		$db = new MysqliDb();

		$db->where("username", $_POST['username']);
		$db->where("password", md5($_POST['password']));

		if($db->has("admin"))

		{

			$admin = $db->get('admin');			

			$admin = array_shift($admin);

			$_SESSION['admin_role'] = $admin['username'];
			$_SESSION['admin_is_login'] = '1';

// 			header('location:http://mitraa.co/admin/main_dashboard.php');
			echo "<script>window.location.href='http://localhost/mis-admin/main_dashboard.php';</script>";

		}

		else

		{

			return "Wrong username/password";

		}

	}

	function logout(){			

		unset($_SESSION["user_id"]);

  		unset($_SESSION["admin_is_login"]);

  		unset($_SESSION["author_is_login"]);

		unset($_SESSION['userLoggedIn']);

		unset($_SESSION['userID']);
		
		unset($_SESSION['status']['msg']);

		session_unset();

//		header('location:http://mitraa.co/admin/index.php');
  		echo "<script>window.location.href='http://localhost:8080/mehtab_work/admin/index.php';</script>";
	}



	function isAdminLogin()
	{

		if(isset($_SESSION['admin_role']))
		{
		 if($_SESSION['admin_is_login'] != 1)
		 {
// 			header('location:http://mitraa.co/admin/index.php');
	       echo "<script>window.location.href='http://localhost/admin/index.php';</script>";		
            // 	exit();
		  }
		}  

	}



	function getRegisterUser()
	{
		$db = new MysqliDb();
		return $db->get('register');
	}
	 
?>