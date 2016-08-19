<?php
namespace lib;
use App\Controller;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

class Application
{
    public $base_dir;
    protected static $instance;
    public $config;

    public function __construct($base_dir)
    {
        $this->base_dir = $base_dir;
        try {
            $this->config = Yaml::parse(file_get_contents('src/config/route.yml'));
        } catch (ParseException $e) {
            printf("Unable to parse the YAML string: %s", $e->getMessage());
        }
    }
    static function getInstance($base_dir = '')
    {
        if(empty(self::$instance))
        {
            self::$instance = new self($base_dir);
        }
        return self::$instance;
    }

    public function dispatch()
    {
        $uri_arr = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        if(count($uri_arr) == 1)
        {
            list($c, $v) = ['home','index'];
        }elseif(count($uri_arr) == 2){
            list($c, $v) = $uri_arr;
        }
        $c = ucwords($c);
        $controller = 'App\\Controller\\'.$c.'Controller';
        $obj = new $controller($c, $v);
        $decorators = [];
        if (isset($this->config[strtolower($c)]['decorator']))
        {
            $conf_decorator = $this->config[strtolower($c)]['decorator'];
            foreach ($conf_decorator as $value)
            {
                $whole_ns_name = 'lib\\'.$value;
                $decorators[] = new $whole_ns_name;
            }
        }
        foreach ($decorators as $decorator)
        {
            $decorator->before($obj);
        }
//        $v = explode(".",$v)[0];
        $return_value = $obj->$v();
        foreach ($decorators as $decorator)
        {
            $decorator->after($return_value);
        }
    }
}