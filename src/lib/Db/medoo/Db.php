<?php

namespace lib\Db\medoo;

class Db extends \medoo{

    private static $db;

    public function __construct(){
        $option = [
                'database_type' => 'mysql',
                'database_name' => 'mymvc',
                'server' => 'localhost',
                'username' => 'root',
                'password' => '111111',
                'charset' => 'utf8',
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