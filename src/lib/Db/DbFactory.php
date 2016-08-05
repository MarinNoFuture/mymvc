<?php
/**
 * Created by PhpStorm.
 * User: mawen
 * Date: 8/3/16
 * Time: 4:06 PM
 */
namespace lib\Db;

abstract class DbFactory
{
    protected static $db;
    abstract public static function getInstance();
    abstract public function connect($host, $user, $passwd, $dbname);
    abstract public function query($sql);
    abstract public function close();
}