<?php
session_start();

include 'model/pdoconnect.php';
spl_autoload_register(function ($c) 
    {
         if(file_exists('model/' . $c . '.php'))
        {
            require_once('model/' . $c . '.php');
        }
        elseif(file_exists('controller/' . $c . '.php'))
        {
            require_once('controller/' . $c . '.php');
        }
        
    });

 
 

if($_GET['c'] && $_GET['option']) {
 $class = $_GET['c'];
 $option = $_GET['option'];
}
else {
 $class = 'index_controller'; 
 $option = 'button_index';
}


 if(method_exists($class, $option)) {
 
 $model = new $class;
 $model->$option();
 }
 else {
 	var_dump($class);
 }
 
 ?>
 