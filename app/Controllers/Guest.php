<?php

namespace App\Controllers;
use App\Models\GuestModel;
class Guest extends BaseController
{
    function __construct()
    {
        helper(['form', 'cookie', 'date']);
        $this->guestModel = new GuestModel();

    }

    public function index()
    {        
        if( is_null(session('logged_in')) )
        {
            return redirect()->to(base_url('login'));
        }

        $data = array(
            'title'         => 'Home',
            'wedding_date'  => '2022-06-04',
            'page_name'     => 'Daftar Tamu',
            'guests'        => $this->guestModel->get_guests(),
        );

        return view('admin/list_guest', $data);
    }

    public function new()
    {
        if( is_null(session('logged_in')) )
        {
            return redirect()->to(base_url('login'));
        }
                
        $data = array(
            'title'         => 'Home',
            'wedding_date'  => '2022-06-04',
            'page_name'     => 'Data Tamu Baru',
            'new'           => true,
        );

        return view('admin/form_guest', $data);
    }

    public function create()
    {
        $title = $this->request->getPost('title');
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $phone = $this->request->getPost('phone');
        $address = $this->request->getPost('address');
        $notes = $this->request->getPost('notes');
        $invitation_code = $this->guestModel->unique_code(5);
        $invited_by = $this->request->getPost('invited_by');
        $data = array(
            'title'         => $title,
            'name'          => $name,
            'email'         => $email,
            'phone'         => $phone,
            'address'       => $address,
            'notes'         => $notes,
            'invitation_code' => $invitation_code,
            'invited_by'    => $invited_by,
            'created_at'    => date('Y-m-d H:i:s'),
        );
        $insert = $this->guestModel->insert_guest($data);
        if($insert)
        {
            session()->setFlashdata('success', "Berhasil menyimpan data tamu: {$name}");
        }
        else
        {
            session()->setFlashdata('error', "Gagal menyimpan data tamu: {$name}");
        }
        return redirect()->to(base_url('guest/new'));
    }

    public function edit($id)
    {
        $guest = $this->guestModel->get_guest($id);
        if( !$guest )
        {
            return view('errors/html/error_404');
        }
        $data = array(
            'title'         => 'Home',
            'wedding_date'  => '2022-06-04',
            'page_name'     => 'Edit/View Data Tamu',
            'guest'         => $guest,
            'new'           => FALSE,
        );

        return view('admin/form_guest', $data);
    }

    public function update($id)
    {
        $title = $this->request->getPost('title');
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $phone = $this->request->getPost('phone');
        $address = $this->request->getPost('address');
        $notes = $this->request->getPost('notes');
        $data = array(
            'id'            => $id, 
            'title'         => $title,
            'name'          => $name,
            'email'         => $email,
            'phone'         => $phone,
            'address'       => $address,
            'notes'         => $notes,
            'updated_at'    => date('Y-m-d H:i:s'),
        );
        $update = $this->guestModel->update_guest($data);
        if($update)
        {
            session()->setFlashdata('success', "Berhasil memperbarui data tamu: {$name}");
        }
        else
        {
            session()->setFlashdata('error', "Tidak ada data yang berubah");
        }

        return redirect()->to(base_url('guest/new'));
    }    

}
