<?php
define('DS',DIRECTORY_SEPARATOR);
define('SITE_ROOT', __DIR__ . DS . '..' . DS . '..');
defined('INCLUDE_PATH') ? NULL :define('INCLUDE_PATH',SITE_ROOT . DS . 'admin' . DS . 'includes' );

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_NAME','gallery');
define('DB_PASS','');



$path = str_replace("\\","/","http://" . $_SERVER['SERVER_NAME'] .__DIR__."/");
$path1 = str_replace($_SERVER['DOCUMENT_ROOT'],"", $path);
define('ASSET', str_replace('includes','image',$path1));

// define('Path',$path1);


