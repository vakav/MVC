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
				$model->log($_POST['auth'], $_POST['login'],$_POST['password']);
				include 'view/form_auth.php';

		
			}
			public function tasklist_controller()
			{

				include "tpl/tasklist_tpl.php";
		

			}

}


?>