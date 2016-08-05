<?php
/**
 * Created by PhpStorm.
 * User: mawen
 * Date: 8/3/16
 * Time: 6:59 PM
 */
require 'vendor/autoload.php';
use lib\Db\mysql\Db;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

$param = Yaml::parse(file_get_contents('config/db.yml'));
$db = Db::factory();
echo "hello".PHP_EOL;
$db->connect($param['host'], $param['user'], $param['password'], 'connectmonkey');
$res = $db->query('select * from wp_cm_users;');
while($row=mysql_fetch_array($res))
{
    print_r($row);
}
echo "end".PHP_EOL;
die();