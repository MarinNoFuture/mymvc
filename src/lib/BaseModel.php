<?php
namespace lib;

use lib\Db\pdo\Db;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

abstract class BaseModel
{
    protected $model;
    protected $model_name;
    protected $config;

    function __construct()
    {
        $this->config = $param = Yaml::parse(file_get_contents(CONFIGDIR.'/db.yml'));
        $this->model = Db::factory();
        $this->model->connect($param['host'], $param['user'], $param['password'], 'connectmonkey');
    }
}