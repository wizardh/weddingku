<?php

namespace App\Models;

use CodeIgniter\Model;

class GuestModel extends Model
{
    public function unique_code($length)
    {
        $code = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);

        // Check if the code is unique
        $guest = $this->db->table('guest')->where('invitation_code', $code)->get()->getRow();
        if ($guest) {
            // If not, generate another one
            $this->unique_code($length);
        } else {
            // If it is, return the code
            return $code;
        }        
    }

    public function get_by_code($invitation_code)
    {
        $builder = $this->db->table('guest');
        $builder->select('*');
        $builder->where('invitation_code', $invitation_code);
        $query = $builder->get();
        return $query->getRow();
    }

    public function get_guest($id)
    {
        $builder = $this->db->table('guest');
        $builder->select('*');
        $builder->where('id', $id);
        $query = $builder->get();
        return $query->getRow();
    }

    public function get_guests()
    {
        $builder = $this->db->table('guest');
        $builder->select('*');
        $query = $builder->get();
        return $query->getResult();
    }

    public function get_guestbooks($is_filtered = TRUE)
    {
        $builder = $this->db->table('guestbook gb');
        $builder->select('g.title, g.address, g.name, g.is_attending as g_attending, gb.*');
        $builder->join('guest g', 'g.id=gb.guest_id', 'left');
        if( $is_filtered )
        {
            $builder->where('gb.approved', 1);
        }
        $builder->orderBy('id', 'desc');
        $query = $builder->get();
        return $query->getResult();
    }

    public function get_private_guestbooks($guest_id)
    {
        $builder = $this->db->table('guestbook gb');
        $builder->select('g.title, g.address, g.name, gb.*');
        $builder->join('guest g', 'g.id=gb.guest_id');
        $builder->where('gb.guest_id', $guest_id);
        $builder->where('gb.approved', 0);
        $builder->orderBy('id', 'desc');

        $query = $builder->get();
        return $query->getResult();
    }

    public function get_ip_guestbooks($ip_address)
    {
        $builder = $this->db->table('guestbook gb');
        $builder->select('*');
        $builder->where('gb.ip_address', $ip_address);
        $builder->where('gb.approved', 0);

        $query = $builder->get();
        return $query->getResult();
    }

    public function get_guestbook($id)
    {
        $builder = $this->db->table('guestbook gb');
        $builder->select('g.title, g.address, g.name, gb.*');
        $builder->join('guest g', 'g.id=gb.guest_id');
        $builder->where('gb.id', 1);
        $query = $builder->get();
        return $query->getRow();
    }

    public function insert_guest($params)
    {
        $builder = $this->db->table('guest');
        $builder->insert($params);
        return $this->db->insertID();
    }

    public function update_guest($params)
    {
        $builder = $this->db->table('guest');
        $builder->where('id', $params['id']);
        $builder->update($params);
        return $this->db->affectedRows();
    }

    public function insert_guestbook($params)
    {
        $builder = $this->db->table('guestbook');
        $builder->insert($params);
        return $this->db->insertID();
    }


    public function update_guestbook($params)
    {
        $builder = $this->db->table('guestbook');
        $builder->where('id', $params['id']);
        $builder->update($params);
        return $this->db->affectedRows();
    }

}