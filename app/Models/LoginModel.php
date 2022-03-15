<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    public function get_by_username($username)
    {
        $builder = $this->db->table('login');
        $builder->select('*');
        $builder->where('username', $username);
        $query = $builder->get();
        return $query->getRow();
    }    

    public function update_password($params)
    {
        $builder = $this->db->table('login');
        $builder->set($params);
        $builder->where('id', $params['id']);
        $builder->update();
        return true;
    }

}