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

}