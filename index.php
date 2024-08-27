<?php


header("Content-Type:text/html;charset=UTF-8");
//подключаем файл конфигурации
//include 'config.php';
//include 'functions.php';
//include "galery.php";
//include "index.tpl.php";//
// spl_autoload_register(function ($ContentManager) {
//     include $ContentManager. '.php';
// });
require_once 'DataBaseConnect.php';
require_once 'ContentManager.php';

$connect = DataBaseConnect::connect();

$contentManager = new ContentManager($connect);

$arr = $contentManager->getStatti();
var_dump($arr);

//$statti = $contentManager->getStatti();
//$categories = $contentManager->getCat();
//
//$html = $contentManager->render('template_name', ['key' => 'value']);
//echo $html;

// $statti = getStatti(FALSE);
// $cat = getCat();


// echo render('index',array('statti' => $statti,'cat'=>$cat,'galery'=>$galery));

