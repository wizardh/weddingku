<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    public function get_wedding_settings()
    {
        $builder = $this->db->table('wedding_settings');
        $builder->select('*');
        $query = $builder->get();
        return $query->getRow();
    }

    public function insert_wedding_settings($params)
    {
        $builder = $this->db->table('wedding_settings');
        $builder->insert($params);
        return $this->db->insertID();
    }

    public function update_wedding_settings($params)
    {
        $builder = $this->db->table('wedding_settings');
        $builder->where('id', $params['id']);
        $builder->update($params);
        return $this->db->affectedRows();
    }

}