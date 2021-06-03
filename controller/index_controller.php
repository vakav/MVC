<?php

class index_controller
{
	        protected $pdo;
	        public function __construct($pdo)
	        {
	            $this->pdo = $pdo;
	             include "view/index_view.php";
	        }

	      
}

?>