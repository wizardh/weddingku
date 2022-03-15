<?php

namespace App\Controllers;
use App\Models\AdminModel;
class Setting extends BaseController
{
    function __construct()
    {
        helper(['form', 'cookie', 'date']);
        $this->adminModel = new AdminModel();        
    }

    public function index()
    {        
        if( is_null(session('logged_in')) )
        {
            return redirect()->to(base_url('login'));
        }
                
        $data = array(
            'title'         => 'Home',
            'page_name'     => 'Setting Detail Pernikahan',
            'wsettings'       => $this->adminModel->get_wedding_settings(),
        );

        return view('admin/form_setting', $data);
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
            session()->setFlashdata('success', "Berhasil mengirim pesan ke buku tamu");
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
            session()->setFlashdata('error', "Tidak ada data yang berubah");
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
            session()->setFlashdata('success', "Berhasil memperbarui data buku tamu");
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
            session()->setFlashdata('error', "Tidak ada data yang berubah");
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
