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

    public function get_wishlists()
    {
        $builder = $this->db->table('wishlist');
        $builder->join('guest', 'wishlist.guest_id = guest.id', 'left');
        $builder->select('guest.name, guest.address, guest.invited_by, wishlist.*');
        $query = $builder->get();
        return $query->getResult();
    }

    public function get_wishlist()
    {
        $builder = $this->db->table('wishlist');
        $builder->where('status != ', 'hidden');
        $builder->select('*');
        $query = $builder->get();
        return $query->getResult();
    }

    public function get_data_wishlist($id)
    {
        $builder = $this->db->table('wishlist');
        $builder->where('id', $id);
        $builder->select('*');
        $query = $builder->get();
        return $query->getRow();
    }

    public function insert_wishlist($params)
    {
        $builder = $this->db->table('wishlist');
        $builder->insert($params);
        return $this->db->insertID();
    }

    public function delete_wishlist($id)
    {
        $builder = $this->db->table('wishlist');
        $builder->where('id', $id);
        $builder->delete();
        return $this->db->affectedRows();
    }

    public function update_wishlist($params)
    {
        $builder = $this->db->table('wishlist');
        $builder->where('id', $params['id']);
        $builder->update($params);
        return $this->db->affectedRows();
    }    
}