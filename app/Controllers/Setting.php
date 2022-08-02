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

    public function update($id)
    {
        $updated_by = session('user_type');
        
        if($this->request->getPost('health_protocol') == 'on')
        {
            $health_protocol = 1;
        }
        else
        {
            $health_protocol = 0;
        }

        $data = array(
            'id'            => $id,
            'groom_name'    => $this->request->getPost('groom_name'),
            'groom_nickname'    => $this->request->getPost('groom_nickname'),
            'bride_name'    => $this->request->getPost('bride_name'),
            'bride_nickname'    => $this->request->getPost('bride_nickname'),
            'groom_parents' => $this->request->getPost('groom_parents'),
            'bride_parents' => $this->request->getPost('bride_parents'),            
            'wedding_date'  => $this->request->getPost('wedding_date'),
            'wedding_time'  => $this->request->getPost('wedding_time'),
            'akad_date'     => $this->request->getPost('akad_date'),
            'akad_time'     => $this->request->getPost('akad_time'),
            'wedding_address' => $this->request->getPost('wedding_address'),
            'akad_address' => $this->request->getPost('akad_address'),
            'health_protocol' => $health_protocol,
            'invitation_template' => $this->request->getPost('invitation_template'),
            'youtube_ids' => $this->request->getPost('youtube_ids'),
            'bg_color' => $this->request->getPost('bg_color'),
            'primary_color' => $this->request->getPost('primary_color'),
            'secondary_color' => $this->request->getPost('secondary_color'),
            'updated_by'    => $updated_by,
        );
        $update = $this->adminModel->update_wedding_settings($data);
        if($update)
        {
            if($this->request->isAJAX())
            {
                echo json_encode(array('status' => 'success'));
            }
            else
            {
                session()->setFlashdata('success', "Data pernikahan berhasil diperbarui");
                return redirect()->to(base_url('setting'));
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
                return redirect()->to(base_url('setting'));
            }
        }
    }    

}
