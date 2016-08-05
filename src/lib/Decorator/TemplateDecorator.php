<?php
namespace lib\Decorator;
use lib\Decorator\Decorator;

class TemplateDecorator implements Decorator
{
    /**
     * @var \lib\BaseController
     */
    protected $controller;
    public function before($controller = '')
    {
        $this->controller = $controller;
    }

    public function after($return_value = '')
    {
        if (!isset($_GET['format']) || empty($_GET['format']))
        {
            foreach ($return_value as $k => $v)
            {
                $this->controller->assign($k, $v);
            }
            $this->controller->display();
        }
    }
}