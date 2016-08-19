<?php
namespace lib\Decorator;
use lib\BaseDecorator;

class TemplateDecorator implements BaseDecorator
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
            if(!empty($return_value))
            {
                foreach ($return_value as $k => $v)
                {
                    $this->controller->assign($k, $v);
                }
                $this->controller->display();
            }
        }
    }
}