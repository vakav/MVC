<?php
session_start();
?>
<?php
include '../model/pdoconnect.php';
include '../model/model.php';

$model = new model($pdo);
$model->login_in($_POST['auth'], $_POST['login'],$_POST['password']);

include 'form_auth.php';

?>
