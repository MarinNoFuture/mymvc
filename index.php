<?php
define('BASEDIR',__DIR__);
//自己写的autoload class
//require_once 'autoload.php';
require 'vendor/autoload.php';
use lib\Application;

Application::getInstance(BASEDIR)->dispatch();