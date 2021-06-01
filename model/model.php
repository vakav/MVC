<?php

spl_autoload_register(function ($class) 
    {
         if(file_exists('../model/' . $class . '.php'))
        {
            require_once('../model/' . $class . '.php');
        }
    });

class model{

	
		public function true_auth()
		{
			$model = new auth($pdo);
			$model->login_in($_POST['auth'], $_POST['login'],$_POST['password']);

		}

		public function true_tasklist()
		{
			$model = new tasklist($pdo);
		$model->add_tasks($_SESSION['user']['id'],$text_for_task,$add_task);
		$model->unready($upd_unraedy);
		$model->ready($upd_raedy);
		$model->del_task($del_id_task);
		$model->ready_all($ready_all,$_SESSION['user']['id']);
		$model->remove_all($_SESSION['user']['id'],$remove_all);
		$out = $model->out_tasks($_SESSION['user']['id']);
		}

	}


?>