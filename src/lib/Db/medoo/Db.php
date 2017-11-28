<?php

namespace lib\Db\medoo;
use Symfony\Component\Yaml\Yaml;

class Db extends \medoo{

    private static $db;
    private $config;

    public function __construct(){
        $this->config = $param = Yaml::parse(file_get_contents(CONFIGDIR.'/db.yml'));
        $option = [
                'database_type' => 'mysql',
                'database_name' => $this->config['database'],
                'server' => $this->config['host'],
                'username' => $this->config['user'],
                'password' => $this->config['password'],
                'charset' => $this->config['charset'],
        ];
        parent::__construct($option);
    }

    static function factory()
    {
        return self::getInstance();
    }

    static function getInstance(){
        if (self::$db) {
            return self::$db;
        }else{
            self::$db = new self();
            return self::$db;
        }
    }

}