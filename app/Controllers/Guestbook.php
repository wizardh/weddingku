<?php

namespace App\Controllers;
use App\Models\GuestModel;
class Guestbook extends BaseController
{
    function __construct()
    {
        helper(['form', 'cookie', 'date']);
        $this->guestModel = new GuestModel();

        $this->validation =  \Config\Services::validation();
        $this->request = \Config\Services::request();
        $this->session = \Config\Services::session();
        
    }

    public function index()
    {        
        $data = array(
            'title'         => 'Home',
            'page_name'     => 'Daftar Pesan Buku Tamu',
            'guestbooks'    => $this->guestModel->get_guestbooks(false),
            'session'       => $this->session,
        );

        return view('admin/list_guestbook', $data);
    }

    public function create()
    {
        $guest_id = $this->request->getPost('guest_id');
        $message = $this->request->getPost('message');
        $data = array(
            'guest_id'         => $guest_id,
            'message'          => $message,
            'created_at'    => date('Y-m-d H:i:s'),
        );
        $insert = $this->guestModel->insert_guestbook($data);
        if($insert)
        {
            $this->session->setFlashdata('success', "Berhasil mengirim pesan ke buku tamu");
            if($this->request->isAJAX())
            {
                echo json_encode(array('status' => 'success'));
            }
            else
            {
                return true;
            }
        }
        else
        {
            $this->session->setFlashdata('error', "Tidak ada data yang berubah");
            if($this->request->isAJAX())
            {
                echo json_encode(array('status' => 'error'));
            }
            else
            {
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
            $this->session->setFlashdata('success', "Berhasil memperbarui data buku tamu");
            if($this->request->isAJAX())
            {
                echo json_encode(array('status' => 'success'));
            }
            else
            {
                return true;
            }
        }
        else
        {
            $this->session->setFlashdata('error', "Tidak ada data yang berubah");
            if($this->request->isAJAX())
            {
                echo json_encode(array('status' => 'error'));
            }
            else
            {
                return false;
            }
        }
    }    

}
