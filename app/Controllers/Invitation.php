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
        // if( !$guest )
        // {
        //     return view('errors/html/error_404');
        // }

        $guestbook = $this->guestModel->get_guestbooks();
        if( $guest ){
            $private_guestbook = $this->guestModel->get_private_guestbooks($guest->id);
        }else{
            $private_guestbook = $this->guestModel->get_ip_guestbooks($this->request->getIPAddress());
        }
        $setting = $this->adminModel->get_wedding_settings();
        $wishlist = $this->adminModel->get_wishlist();

        $data = array(
            'title'             => 'The Wedding of Niken & Aya — Invitation',
            'setting'           => $setting,
            'guest'             => $guest,
            'guestbook'         => $guestbook,
            'private_guestbook' => $private_guestbook,
            'wishlist'          => $wishlist,
            'url_code'          => $invitation_code
        );
        return view('invitation', $data);
    }

    public function getTimeZone()
    {
        echo date_default_timezone_get();
    }

}
