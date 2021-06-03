<!DOCTYPE html>
<html>
<head>
	<title>Tasklist</title>
</head>

<link rel="stylesheet" type="text/css" href="../styles/main.css">
<body>
	<form method="POST" action="../view/logout.php">
	<input type="submit" name="logout" value="Выход" class="IN">
</form>
	<div class="wrapper">

<?php



		include 'model/pdoconnect.php';

		$add_task=$_POST['add_task'];
		$text_for_task=$_POST['text_for_task'];
		$upd_unraedy=$_POST['UNREADY'];
		$upd_raedy=$_POST['READY'];
		$del_id_task=$_GET['del_id_task'];
		$ready_all=$_POST['ready_all'];
		$remove_all=$_POST['remove_all'];
	
		

		$model = new model($pdo);
		$model->add_tasks($_SESSION['user']['id'],$text_for_task,$add_task);
		
		$model->del_task($del_id_task);
		$model->ready_all($ready_all,$_SESSION['user']['id']);
		$model->remove_all($_SESSION['user']['id'],$remove_all);
		$out = $model->out_tasks($_SESSION['user']['id']);
		include "view/tasklist_view.php";

		$model->unready($upd_unraedy,$id_upd_unready);
		$model->ready($upd_raedy,$id_upd_ready);
			var_dump($id_upd_unready);
			
		?>
	</div>

</body>
</html>