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
<a href=?c=index_controller&option=button_index>главная</a>
	<div class="wrapper">
		<?php
		include "view/tasklist_view.php";

		?>
	</div>

</body>
</html>