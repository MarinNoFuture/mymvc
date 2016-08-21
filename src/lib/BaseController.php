<?php
namespace lib;

abstract class BaseController
{
    protected $data;
    protected $aciton_name;
    protected $controller_name;
    protected $view_name;
    protected $template_dir;

    abstract function index();
    function __construct($controller_name, $view_name)
    {
        $this->controller_name = $controller_name;
        $this->view_name = $view_name;
        $file = strtolower($this->controller_name).'/'.$this->view_name.'.php';
        if(!is_file($file))
        {
            $this->aciton_name = $view_name;
        }
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
        $path = BASEDIR.'/src/App/View/'.$file;
        extract($this->data);
        if(is_file($path))
        {
            include_once $path;
        }else{
            //可以默认写为display的是index.php页面
        }
        //twig加载模板的方式
        // if (empty($file))
        // {
        //     $file = strtolower($this->controller_name).'/'.$this->view_name.'.php';
        // }
        // $path = BASEDIR.'/src/App/View/'.$file;
        // extract($this->data);
        // if(is_file($path))
        // {
        //     \Twig_Autoloader::register();

        //     $loader = new \Twig_Loader_Filesystem(APPDIR.'/View');
        //     $twig = new \Twig_Environment($loader, array(
        //         'cache' => BASEDIR.'/log/twig',
        //         'debug' => DEV
        //     ));
        //     $template = $twig->loadTemplate('index.html');
        //     // $template->display(!empty($this->data)?$this->data:[]);
        //     echo $template->render(array('the' => 'variables', 'go' => 'here'));
        // }else{
        //     //可以默认写为display的是index.php页面
        // }

    }

}