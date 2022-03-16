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

    public function update_last_login($id, $ip_address)
    {
        $builder = $this->db->table('login');
        $builder->set(['last_login' => date('Y-m-d H:i:s'), 'last_ip' => $ip_address]);
        $builder->where('id', $id);
        $builder->update();

        $builder = $this->db->table('login_attempt');
        $builder->set([ 'attempt_no' => 0, 
                        'is_blocked' => 0,
                        'last_attempt' => date('Y-m-d H:i:s'),
                    ]);
        $builder->where('ip_address', $ip_address);
        $builder->update();

        return true;
    }

    public function insert_attempt($username, $ip_address)
    {
        // check if ip exists in table login_attempt
        $builder = $this->db->table('login_attempt');
        $builder->select('*');
        $builder->where('ip_address', $ip_address);
        $query = $builder->get();
        if($query->getNumRows() > 0) {
            // update last_attempt
            $attempt = $query->getRow();
            $is_blocked = 0;
            if($attempt->attempt_no >= 4){
                $is_blocked = 1;
            }
            $builder = $this->db->table('login_attempt');
            $builder->set([ 'username' => $username, 
                            'attempt_no' => $attempt->attempt_no + 1, 
                            'is_blocked' => $is_blocked,
                            'last_attempt' => date('Y-m-d H:i:s'),
                        ]);
            $builder->where('ip_address', $ip_address);
            $builder->update();
            return $attempt->attempt_no + 1;
        } else {
            // insert new record
            $builder = $this->db->table('login_attempt');
            $builder->insert(['username' => $username, 'ip_address' => $ip_address, 'attempt_no' => 1, 'first_attempt' => date('Y-m-d H:i:s')]);
            return 1;
        }

    }

}