<?php
//自己写的autoload class
//require_once 'autoload.php';
require 'vendor/autoload.php';
define('BASEDIR',__DIR__);
define('CONFIGDIR', __DIR__.'/src/config');
define('APPDIR', __DIR__.'/src/App');
define('DEV',true);
if(DEV == true)
{
	$whoops = new \Whoops\Run;
	$err_title = '又出bug啦~~~';
	$option = new \Whoops\Handler\PrettyPageHandler;
	$option->setPageTitle($err_title);
	$whoops->pushHandler($option);
	$whoops->register();
	ini_set('display_error', 'On');
}else{
	ini_set('display_error', 'Off');
}
// dump($_SERVER);
use lib\Application;

Application::getInstance(BASEDIR)->dispatch();