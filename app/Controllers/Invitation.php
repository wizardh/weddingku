<?php

namespace App\Controllers;
use App\Models\GuestModel;
class Invitation extends BaseController
{
    function __construct()
    {
        $this->guestModel = new GuestModel();
    }

    public function index($invitation_code = '')
    {

        $guest = $this->guestModel->get_by_code($invitation_code);
        $guestbook = $this->guestModel->get_guestbook();
        if( !$guest )
        {
            return view('errors/html/error_404');
        }
        $data = array(
            'title'             => 'Home',
            'wedding_date'      => '2022-06-04',
            'guest'             => $guest,
            'guestbook'         => $guestbook,
        );
        return view('invitation', $data);
    }

}
