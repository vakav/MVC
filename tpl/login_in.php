<?php

	$model = new model($pdo);
	$model->log($_POST['auth'], $_POST['login'],$_POST['password']);

include 'view/form_auth.php';

?>
