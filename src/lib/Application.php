<?php
namespace lib;
use App\Controller;
use lib\BaseLog;
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
        BaseLog::init();
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
        //写入日志测试log类
        BaseLog::log('mawen');
        $uri_arr = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        if(count($uri_arr) == 1)
        {
            list($c, $v) = ['home','index'];
        }else{
            $c = $uri_arr[0];
            $v = $uri_arr[1];
            array_shift($uri_arr);
            array_shift($uri_arr);
            $param_count = count($uri_arr);
            if( !empty($param_count) )
            {
                for ($i=0; $i < $param_count; $i=$i+2) { 
                    if( isset($uri_arr[$i+1]) )
                    {
                        $_GET[$uri_arr[$i]] = $uri_arr[$i+1];    
                    }
                }
            }
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