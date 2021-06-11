<?php
session_start();
class index_controller
{
	public function button_index()
	{
		include "view/index_view.php";
	}
	
	public function auth()
	{

		if(isset($_SESSION['user'])){
			header('Location: ?c=tasklist_controller&option=tasklist');
		}
		else{

			$model = new model();
			if(!empty($_POST['auth']) &&  !empty($_POST['login']) && !empty($_POST['password'])) {
				$po = $model->log($_POST['auth'], $_POST['login'],$_POST['password']);
			}
			elseif ($po=$po) 
			{
				header('Location: ?c=tasklist_controller&option=tasklist');
			}
			

			include 'view/form_auth.php';
		}
	}
	
	public function logout()
	{
		session_start();
		$logout=$_POST['logout'];
		if (isset($_POST['logout'])){
			session_unset();
			header('Location: ?c=index_controller&option=auth');
		}
	}

}


?>