<!DOCTYPE html>
<html>
<head>
	<title>Tasklist</title>
</head>

<link rel="stylesheet" type="text/css" href="../styles/main.css">
<body>
	<form method="POST" action="?c=index_controller&option=logout">
	<input type="submit" name="logout" value="Выход" class="IN">
</form>
<a href=""></a>
	<div class="wrapper">
<?php
$model = new model($pdo);
$out = $model->out_tasks($_SESSION['user']['id']);
include "view/tasklist_view.php";


?>
	</div>

</body>
</html>