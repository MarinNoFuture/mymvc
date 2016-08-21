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
        return ['goodbye'];
    }
    // for medoo
    public function addUser()
    {
    	$data = [
    		'name' => 'lxj',
    		'sex' => 0,
    		'phone' => '18710406968'
    	];
    	$res = modelFactory::getMode('user')->addUser($data);
    	dump($res);
    }
    // for medoo
    public function getUser()
    {
    	$id = $_GET['id'];
    	$res = modelFactory::getMode('user')->getOne($id);
    	dump($res);
    }

    //for medoo
    public function editUser()
    {
    	$id = $_GET['id'];
    	$data = [
    		'name' => 'lxj'
    	];
    	$res = modelFactory::getMode('user')->setOne($id, $data);
    	dump($res);
    }

    public function delUser()
    {
    	$id = $_GET['id'];
    	$res = modelFactory::getMode('user')->delOne($id);
    	dump($res);
    }
}