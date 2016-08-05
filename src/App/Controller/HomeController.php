<?php
namespace App\Controller;

use lib\BaseController;

Class HomeController extends BaseController
{
    public function index()
    {
        return ['userid'=>1, 'username'=>'mawen'];
    }
}