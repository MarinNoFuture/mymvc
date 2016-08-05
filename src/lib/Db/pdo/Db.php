<?php

namespace lib\Db\pdo;

use lib\Db\DbFactory;

class Db extends DbFactory{

    protected $conn;

    private function __construct(){

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

    public function connect($host, $user, $passwd, $dbname)
    {
        $this->conn = new \PDO("mysql:host=$host;dbname=$dbname", $user, $passwd);
    }

    public function query($sql)
    {
        $res = $this->conn->query($sql);
        return $res;
    }

    public function close()
    {
        unset($this->conn);
    }
}