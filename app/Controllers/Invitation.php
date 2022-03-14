<?php

namespace App\Controllers;
use App\Models\GuestModel;
class Invitation extends BaseController
{
    function __construct()
    {
        helper(['custom_helper']);
        $this->guestModel = new GuestModel();
    }

    public function index($invitation_code = '')
    {        
        $guest = $this->guestModel->get_by_code($invitation_code);
        $guestbook = $this->guestModel->get_guestbooks();
        $private_guestbook = $this->guestModel->get_private_guestbooks($guest->id);
        if( !$guest )
        {
            return view('errors/html/error_404');
        }
        $data = array(
            'title'             => 'Home',
            'wedding_date'      => '2022-08-20',
            'wedding_time'      => '10:00 - 13:00',
            'akad_date'         => '2022-08-20',
            'akad_time'         => '08:00 - 09:00',
            'wedding_address'   => 'IS PLAZA Ballroom, Pramuka, Jakarta Timur',
            'guest'             => $guest,
            'guestbook'         => $guestbook,
            'private_guestbook' => $private_guestbook,
        );
        return view('invitation', $data);
    }

}
