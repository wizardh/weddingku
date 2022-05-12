<?php

namespace App\Controllers;
use App\Models\GuestModel;
use App\Models\AdminModel;
class Invitation extends BaseController
{
    function __construct()
    {
        helper(['custom_helper']);
        $this->guestModel = new GuestModel();
        $this->adminModel = new AdminModel();
    }

    public function index($invitation_code = '')
    {        
        $guest = $this->guestModel->get_by_code($invitation_code);
        if( !$guest )
        {
            return view('errors/html/error_404');
        }

        $guestbook = $this->guestModel->get_guestbooks();
        $private_guestbook = $this->guestModel->get_private_guestbooks($guest->id);
        $setting = $this->adminModel->get_wedding_settings();
        $wishlist = $this->adminModel->get_wishlist();

        $data = array(
            'title'             => 'The Wedding of Niken & Aya — Invitation',
            'setting'           => $setting,
            'guest'             => $guest,
            'guestbook'         => $guestbook,
            'private_guestbook' => $private_guestbook,
            'wishlist'          => $wishlist,
        );
        return view('invitation', $data);
    }

}
