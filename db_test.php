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

$param = Yaml::parse(file_get_contents('src/config/db.yml'));
$db = Db::factory();
echo '马文2342'.PHP_EOL;
$db->connect($param['host'], $param['user'], $param['password'], 'mymvc');
$res = $db->query('select * from users;');
while($row=mysql_fetch_array($res))
{
    print_r($row);
}
echo "end".PHP_EOL;
die();