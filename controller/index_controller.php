<?php

class index_controller
{
	        public function button_index()
	        {
	             include "view/index_view.php";
	        }

	        public function auth()
			{
			include"tpl/login_in.php";
		
			}
			public function tasklist_controller()
			{

				include "tpl/tasklist_tpl.php";
		

			}

}


?>