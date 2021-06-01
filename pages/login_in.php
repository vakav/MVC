<?php
session_start();
?>
<?php
include '../model/pdoconnect.php';


spl_autoload_register(function ($class) 
    {
         if(file_exists('../model/' . $class . '.php'))
        {
            require_once('../model/' . $class . '.php');
        }
    });



	$model = new auth($pdo);
	$model->login_in($_POST['auth'], $_POST['login'],$_POST['password']);

include '../view/form_auth.php';

?>
