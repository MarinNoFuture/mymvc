<?php
/**
 * Created by PhpStorm.
 * User: mawen
 * Date: 8/3/16
 * Time: 5:15 PM
 */
namespace lib\Db\mysql;

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
        $this->conn = mysql_connect($host, $user, $passwd);
        mysql_select_db($dbname, $this->conn);
        return $this->conn;
    }
    
    public function query($sql)
    {
        $res = mysql_query($sql, $this->conn);
        return $res;
    }

    public function close()
    {
        mysql_close($this->conn);
    }
}