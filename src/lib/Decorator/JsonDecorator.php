<?php
namespace lib\Decorator;
use lib\BaseDecorator;

class JsonDecorator implements BaseDecorator
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