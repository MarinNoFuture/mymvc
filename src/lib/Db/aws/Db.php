<?php
namespace lib\Db\aws;

class Db
{
    protected $dynamodb;

    protected $sdk;

    protected $conn;

    protected static $instance;

    public function __construct($sdk)
    {
        $this->dynamodb = $this->getInstance($sdk);
    }

    static function getInstance($sdk = null)
    {
        if (empty(self::$instance))
        {
            self::$instance = $sdk->createDynamoDb();
        }
        return self::$instance;
    }
}