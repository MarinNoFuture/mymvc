<?php
/**
 * Created by PhpStorm.
 * User: mawen
 * Date: 8/3/16
 * Time: 3:30 PM
 */
namespace lib\Decorator;
use lib\Decorator\Decorator;

class HelloDecorator implements Decorator
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
    public function before($controller = '')
    {
        echo "hello".$this->name;
    }
    public function after($return_value = '')
    {
        echo "byebye".$this->name;
    }
}