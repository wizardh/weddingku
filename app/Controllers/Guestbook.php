<?php

namespace App\Controllers;
use App\Models\GuestModel;
class Guestbook extends BaseController
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
            'page_name'     => 'Daftar Pesan Buku Tamu',
            'guestbooks'    => $this->guestModel->get_guestbooks(false),
        );

        return view('admin/list_guestbook', $data);
    }

    public function create()
    {
        $type = $this->request->getPost('type');
        if ($type == 'public')
        {
            $data = array(
                'guest_name'        => $this->request->getPost('guest_name'),
                'guest_relation'    => $this->request->getPost('guest_relation'),
                'ip_address'        => $this->request->getIPAddress(),
                'is_attending'      => $this->request->getPost('is_attending'),
                'message'           => $this->request->getPost('message'),
                'created_at'        => date('Y-m-d H:i:s'),
            );    
        }
        else
        {
            $data = array(
                'guest_id'          => $this->request->getPost('guest_id'),
                'ip_address'        => $this->request->getIPAddress(),
                'is_attending'      => $this->request->getPost('is_attending'),
                'message'           => $this->request->getPost('message'),
                'created_at'        => date('Y-m-d H:i:s'),
            );    
        }
        $insert = $this->guestModel->insert_guestbook($data);
        if($insert)
        {
            if($this->request->isAJAX())
            {
                echo json_encode(array('status' => 'success'));
            }
            else
            {
                session()->setFlashdata('success', "Berhasil mengirim pesan ke buku tamu");
                return true;
            }
        }
        else
        {
            if($this->request->isAJAX())
            {
                echo json_encode(array('status' => 'error'));
            }
            else
            {
                session()->setFlashdata('error', "Tidak ada data yang berubah");
                return false;
            }
        }
    }

    public function update($id)
    {
        $approved = $this->request->getPost('approved');
        $approved_by = $this->request->getPost('approved_by');
        $data = array(
            'id'            => $id, 
            'approved'      => $approved, 
            'approved_by'   => $approved_by, 
            'approved_at'    => date('Y-m-d H:i:s'),
        );
        $update = $this->guestModel->update_guestbook($data);
        if($update)
        {
            if($this->request->isAJAX())
            {
                echo json_encode(array('status' => 'success'));
            }
            else
            {
                session()->setFlashdata('success', "Berhasil memperbarui data buku tamu");
                return true;
            }
        }
        else
        {
            if($this->request->isAJAX())
            {
                echo json_encode(array('status' => 'error'));
            }
            else
            {
                session()->setFlashdata('error', "Tidak ada data yang berubah");
                return false;
            }
        }
    }    

}
