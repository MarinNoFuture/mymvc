<?php

namespace lib;

class modelFactory
{
    static function getMode($modelName)
    {
        $modelClass = 'App\\Model\\'.ucwords($modelName).'Model';
        $model = new $modelClass;
        return $model;
    }
}