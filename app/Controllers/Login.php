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
        $do_remember = ($this->request->getPost('do_remember') ? '1' : '0');

        $data_login = $this->loginModel->get_by_username($username);

        if ($data_login) {
            if (password_verify($password, $data_login->password)) {
                session()->set([
                    'user_id'   => $data_login->id,
                    'username'  => $data_login->username,
                    'user_type' => $data_login->user_type,
                    'logged_in' => TRUE
                ]);
    
                return redirect()->to(base_url('guest'));
            } else {
                session()->setFlashdata('error', 'Username atau password salah!');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Username atau password salah!');
            return redirect()->to(base_url('login'));
        }
    }

    public function logout()
    {
        $array_items = ['user_id', 'username', 'user_type', 'logged_in'];
        session()->remove($array_items);        
        return redirect()->to(base_url('login'));
    }
}
