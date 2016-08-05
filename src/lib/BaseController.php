<?php
namespace lib;

abstract class BaseController
{
    protected $data;
    protected $controller_name;
    protected $view_name;
    protected $template_dir;

    abstract function index();
    function __construct($controller_name, $view_name)
    {
        $this->controller_name = $controller_name;
        $this->view_name = $view_name;
    }

    function assign($key, $value)
    {
        $this->data[$key] = $value;
    }

    function display($file = '')
    {
        if (empty($file))
        {
            $file = strtolower($this->controller_name).'/'.$this->view_name.'.php';
        }
        $path = $_SERVER['DOCUMENT_ROOT'].'/src/App/View/'.$file;
        extract($this->data);
        include_once $path;
    }

}