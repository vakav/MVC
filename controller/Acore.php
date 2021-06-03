<?php
 abstract class Acore
 {

 	protected $m;
	
	public function __construct() {
		$this->m = new model();
	}

 	
 	protected function tasklist()
 	{
 		$this->m->add_tasks($_SESSION['user']['id'],$text_for_task,$add_task);
		$this->m->unready($upd_unraedy);
		$this->m->ready($upd_raedy);
		$this->m->del_task($del_id_task);
		$this->m->ready_all($ready_all,$_SESSION['user']['id']);
		$this->m->remove_all($_SESSION['user']['id'],$remove_all);
		$out = $this->m->out_tasks($_SESSION['user']['id']);

 	}
 	protected function login_in()
 	{
		$this->m->log($_POST['auth'], $_POST['login'],$_POST['password']);
 	}







public function get_body($tpl) {
		
	
		$login_in = $this->login_in();
		$task = $this->tasklist();
	
		include "tpl/index.php";
	}

 }
?>