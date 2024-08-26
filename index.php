<?php

header("Content-Type:text/html;charset=UTF-8");
//подключаем файл конфигурации
//include 'config.php';
//include 'functions.php';
include "galery.php";
include "index.tpl.php";//
//require_once 'ContentManager.php';
// spl_autoload_register(function ($ContentManager) {
//     include $ContentManager. '.php';
// });
use Fotogalery\ContentManager;


//$host = 'localhost';    
$host = '127.0.0.1'; 
$user = ' root'; 
$password = ''; 
$database = 'fotoGalery'; 
$db = new mysqli($host, $user, $password, $database);

if ($db->connect_error) {
    die('Ошибка подключения: ' . $db->connect_error);
}

$contentManager = new ContentManager($db);
$statti = $contentManager->getStatti();
$categories = $contentManager->getCat();

$html = $contentManager->render('template_name', ['key' => 'value']);
echo $html;

// $statti = getStatti(FALSE);
// $cat = getCat();


// echo render('index',array('statti' => $statti,'cat'=>$cat,'galery'=>$galery));
?>