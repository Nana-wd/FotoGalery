<?php
///////////////config//////////////////
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_NAME','fotoGalery');


define('SITE','http://localhost/galery');

define('GALERY','galery/');





$site_name = 'Тестовый сайт';
$button = "Button";
///////////////config//////////////////

//
// $db = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

// if(mysqli_connect_error($db)) {
// 	exit('No connection with database');
// }



mysqli_query($db,"SET NAMES UTF8");
?>