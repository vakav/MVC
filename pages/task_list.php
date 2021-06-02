<?php
session_start();
?>

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
include '../model/pdoconnect.php';

		spl_autoload_register(function ($class) 
    {
         if(file_exists('../model/' . $class . '.php'))
        {
            require_once('../model/' . $class . '.php');
        }
    });
		

		$model = new tasklist($pdo);
		$model->add_tasks($_SESSION['user']['id'],$text_for_task,$add_task);
		$model->unready($upd_unraedy);
		$model->ready($upd_raedy);
		$model->del_task($del_id_task);
		$model->ready_all($ready_all,$_SESSION['user']['id']);
		$model->remove_all($_SESSION['user']['id'],$remove_all);
		$out = $model->out_tasks($_SESSION['user']['id']);

			include "../view/Tasklist.php";
			
		?>
	</div>

</body>
</html>