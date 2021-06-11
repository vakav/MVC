<?php
class index_controller
{
	public function button_index()
	{
		include "view/index_view.php";
	}

	public function auth()
	{

		$model = new model();
		if(!empty($_POST)) {
			$po = $model->log($_POST['auth'], $_POST['login'],$_POST['password']);
		}
		if ($po==1) 
		{
			header('Location: ?c=tasklist_controller&option=tasklist');
		}
		elseif ($po==2) 
		{
			header('Location: ?c=tasklist_controller&option=tasklist');
		}
		elseif ($po==4) 
		{
			header('Location: ?c=tasklist_controller&option=tasklist');
		}

		include 'view/form_auth.php';
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