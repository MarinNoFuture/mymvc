<?php
namespace App\Model;

use lib\BaseModel;

Class UserModel extends BaseModel
{
    public function getUsers()
    {
        if(is_callable([$this->model,'query']) && $this->config['drive'] != 'medoo')
        {
          $res = $this->model->query('select * from users;');
          $data = $res->fetchAll();
        } else {
          $res = $this->model->select('users', '*');
          $data = $res;
        }
        return $data;
    }

    public function addUser($data)
    {
        return $this->model->insert('users', $data);
    }

    public function getOne($id)
    {
        $result = $this->model->get('users', '*', ['id' => $id]);
        return $result;
    }

    public function setOne($id, $data)
    {
        $result = $this->model->update('users', $data, ['id' => $id]);
        return $result;
    }

    public function delOne($id)
    {
        $result = $this->model->delete('users', ['id' => $id]);
        return $result;
    }

}