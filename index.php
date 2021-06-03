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

 
 

if($_GET['option']) {
 $class = trim(strip_tags($_GET['option']));
}
else {
 $class = 'index_controller'; 
}

 if(class_exists($class)) {
 
 $model = new $class;
 }
 else {
 	var_dump($class);
 }

?>