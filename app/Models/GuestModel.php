<?php

namespace App\Models;

use CodeIgniter\Model;

class GuestModel extends Model
{

    public function get_by_code($invitation_code)
    {
        $builder = $this->db->table('guest');
        $builder->select('*');
        $builder->where('invitation_code', $invitation_code);
        $query = $builder->get();
        return $query->getRow();
    }

    public function get_guestbook()
    {
        $builder = $this->db->table('guestbook gb');
        $builder->select('g.name, gb.*');
        $builder->join('guest g', 'g.id=gb.guest_id');
        $query = $builder->get();
        return $query->getResult();
    }
}