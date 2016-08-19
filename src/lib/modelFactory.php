<?php

namespace lib;

class modelFactory
{
    protected static $instance;

    static function getMode($modelName)
    {
        if(empty(self::$instance))
        {
            $modelClass = 'App\\Model\\'.ucwords($modelName).'Model';
            self::$instance = new $modelClass;
        }
        return self::$instance;
    }
}