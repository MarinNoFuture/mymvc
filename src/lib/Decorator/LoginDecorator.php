<?php
namespace lib\Decorator;
use lib\Decorator\Decorator;

class LoginDecorator implements Decorator
{
    public function before($controller = '')
    {
//        session_start();
//        if (!isset($_SESSION['islogin']) || empty($_SESSION['islogin']))
//        {
//            header('location: /login/index');
//            exit;
//        }
    }
    public function after($return_value = '')
    {
        // TODO: Implement after() method.
    }
}