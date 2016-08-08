<?php
namespace App\Model;

use lib\BaseModel;

Class UserModel extends BaseModel
{
    public function getUsers()
    {
        $data = [];
        $res = $this->model->query('select * from wp_cm_users;');
//        foreach ($res as $row)
//        {
//            $data[] = $row;
//        }
        $data = $res->fetchAll();
        return $data;
    }
}