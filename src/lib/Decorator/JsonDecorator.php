<?php
namespace lib\Decorator;
use lib\Decorator\Decorator;

class JsonDecorator implements Decorator
{
    public function before($controller = '')
    {
        // TODO: Implement before() method.
    }

    public function after($return_value = '')
    {
        if (isset($GET['format']) && $_GET['format'] == 'json')
        {
            echo json_encode($return_value);
        }
    }
}