<?php
class index_controller
{
	        public function button_index()
	        {
	             include "view/index_view.php";
	        }

	        public function auth()
			{

				$model = new model($pdo);
				$po = $model->log($_POST['auth'], $_POST['login'],$_POST['password']);

				if ($po==1) 
				{
					header('Location: ?c=index_controller&option=tasklist');
				}
				elseif ($po==2) 
				{
					header('Location: ?c=index_controller&option=tasklist');
				}
				elseif ($po==4) 
				{
					header('Location: ?c=index_controller&option=tasklist');
				}
				include 'view/form_auth.php';

				

		
			}
			public function tasklist()
			{

				$model = new model($pdo);
				$model->add_tasks($_SESSION['user']['id'],$text_for_task,$add_task);
				$model->unready($upd_unready);
				$model->ready($upd_ready);
				$model->del_task($del_id_task);
				$model->ready_all($ready_all,$_SESSION['user']['id']);
				$model->remove_all($_SESSION['user']['id'],$remove_all);
				$out = $model->out_tasks($_SESSION['user']['id']);
				
				include "tpl/tasklist_tpl.php";
			}
			public function logout()
			{
				session_start();
				$logout=$_POST['logout'];
				if (isset($_POST['logout'])) 
				{
					session_unset();
					header('Location: ?c=index_controller&option=auth');
				}
			}

}


?>