<?php
namespace lib;

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
        $drive_whole_ns = 'lib\Db\\'.$this->config['drive'].'\\Db'; 
        $this->model = $drive_whole_ns::factory();
        if(is_callable([$this->model, 'connect']))
        {
            $this->model->connect($param['host'], $param['user'], $param['password'], $param['database']);
        }
    }

    function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
    }
}