<?php

namespace App\Controllers;
use App\Models\LoginModel;
class Login extends BaseController
{
    function __construct()
    {        
        helper(['form', 'cookie', 'date']);
        $this->loginModel = new LoginModel();
    }

    public function hash_pass($password)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        return $hash;
    }
     
    public function index()
    {
        if( session('logged_in') )
        {
            return redirect()->to(base_url('guest'));
        }

        $data = array(
            'title' => 'Login',
        );

        return view('admin/login', $data);
    }

    public function process()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $ip_address = $this->request->getIPAddress();

        $data_login = $this->loginModel->get_by_username($username);

        if ($data_login) {
            if (password_verify($password, $data_login->password)) {
                session()->set([
                    'user_id'   => $data_login->id,
                    'username'  => $data_login->username,
                    'user_type' => $data_login->user_type,
                    'logged_in' => TRUE
                ]);

                $this->loginModel->update_last_login($data_login->id, $ip_address);
    
                return redirect()->to(base_url('guest'));
            } else {
                $fail_attempt = $this->log_fail_attempt($username, $ip_address);
                if($fail_attempt >= 5){
                    session()->setFlashdata('error', 'Anda telah diblokir, segera hubungi Administrator!');
                    return redirect()->to(base_url('login'));    
                }elseif($fail_attempt > 0){
                    session()->setFlashdata('error', 'Username atau password salah! <br>Anda memiliki '.$fail_attempt.'/5 kesempatan!');
                    return redirect()->to(base_url('login'));    
                }else{
                    session()->setFlashdata('error', 'Username atau password salah!');
                    return redirect()->to(base_url('login'));
                }
            }
        } else {
            $fail_attempt = $this->log_fail_attempt($username, $ip_address);
            if($fail_attempt >= 5){
                session()->setFlashdata('error', 'Anda telah diblokir, segera hubungi Administrator!');
                return redirect()->to(base_url('login'));    
            }elseif($fail_attempt > 0){
                session()->setFlashdata('error', 'Username atau password salah! <br>Anda memiliki '.$fail_attempt.'/5 kesempatan!');
                return redirect()->to(base_url('login'));    
            }else{
                session()->setFlashdata('error', 'Username atau password salah!');
                return redirect()->to(base_url('login'));
            }
        }
    }

    public function log_fail_attempt($username, $ip_address)
    {
        return $this->loginModel->insert_attempt($username, $ip_address);
    }

    public function logout()
    {
        $array_items = ['user_id', 'username', 'user_type', 'logged_in'];
        session()->remove($array_items);        
        return redirect()->to(base_url('login'));
    }

    public function form_password()
    {
        $data = array(
            'title' => 'Form Ganti Password',
            'page_name' => 'Form Ganti Password',
        );
        return view('admin/form_password', $data);
    }

    public function change_password()
    {
        $old_password = $this->request->getPost('old_password');
        $new_password = $this->request->getPost('new_password');
        $confirm_password = $this->request->getPost('confirm_password');

        $data_login = $this->loginModel->get_by_username(session('username'));

        if (password_verify($old_password, $data_login->password)) {
            if ($new_password == $confirm_password) {
                $data = array(
                    'id'            => $data_login->id, 
                    'password'      => $this->hash_pass($new_password), 
                );
                $update = $this->loginModel->update_password($data);
                if($update)
                {
                    session()->setFlashdata('success', "Password berhasil diganti!");
                    return redirect()->to(base_url('change_password'));
                }
                else
                {
                    session()->setFlashdata('error', "Password gagal diganti!");
                    return redirect()->to(base_url('change_password'));
                }
            } else {
                session()->setFlashdata('error', "Password baru dan konfirmasi password tidak sama!");
                return redirect()->to(base_url('change_password'));
            }
        } else {
            session()->setFlashdata('error', "Password lama salah!");
            return redirect()->to(base_url('change_password'));
        }
    }
}
