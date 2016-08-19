<?php
namespace App\Controller;

use lib\BaseController;
use lib\modelFactory;

Class HomeController extends BaseController
{
    public function index()
    {
        $res = modelFactory::getMode('user')->getUsers();
        return ['res'=>$res];
    }
    public function goodbye()
    {
        print_r(['goodbye']);
    }
}