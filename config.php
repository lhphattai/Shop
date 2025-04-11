<?php
session_start();
$file_path = $_SERVER['SCRIPT_FILENAME'];
$n = strpos($file_path,'admin');
$app_folder = substr($file_path,0,$n);

define('APP_PATH', $app_folder);
define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DB', 'shop');

spl_autoload_register(function ($class_name) {
    $class_path = APP_PATH.'librs/'.$class_name.'.php';
    if (file_exists($class_path)) {
        require $class_path;
    } else {
        echo "Class <b>$class_path<b> not exitst";
        die();
    }
});



$app = new App();
