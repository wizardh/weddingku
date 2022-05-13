<?php

namespace App\Controllers;
use App\Models\AdminModel;
use CodeIgniter\Files\File;

class Wishlist extends BaseController
{
    function __construct()
    {
        helper(['form', 'cookie', 'date', 'filesystem']);
        $this->adminModel = new AdminModel();

    }

    public function index()
    {        
        if( is_null(session('logged_in')) )
        {
            return redirect()->to(base_url('login'));
        }

        $data = array(
            'title'         => 'Wishlist',
            'page_name'     => 'Wishlist',
            'wishlist'        => $this->adminModel->get_wishlists(),
        );

        return view('admin/form_wishlist', $data);
    }

    public function create()
    {
        $validationRule = [
            'userfile' => [
                'label' => 'Image File',
                'rules' => 'uploaded[userfile]'
                    . '|is_image[userfile]'
                    . '|mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
            ],
        ];
        if (! $this->validate($validationRule)) {
            // var_dump($this->validator->getErrors());
            session()->setFlashdata('error', "Ada error saat upload file");

            return redirect()->to(base_url('wishlist'));
        }

        $img = $this->request->getFile('userfile');

        if (! $img->hasMoved()) {

            $description = $this->request->getPost('item');
            $image = $this->request->getPost('userfile');
            $reference_link = $this->request->getPost('reference');
            $estimated_price = $this->request->getPost('price');
            $image = $img->getName();

            $img->move(ROOTPATH . 'public/uploads/', $image);
            $data = array(
                'description'   => $description,
                'estimated_price'=> $estimated_price,
                'reference_link' => $reference_link,
                'image'         => $image,
                'status'        => 'open',
                'created'       => date('Y-m-d H:i:s'),
            );

            $insert = $this->adminModel->insert_wishlist($data);
            if($insert)
            {
                session()->setFlashdata('success', "Berhasil menyimpan data wishlist: {$description}");
            }
            else
            {
                session()->setFlashdata('error', "Gagal menyimpan data wishlist: {$description}");
            }
            return redirect()->to(base_url('wishlist'));
        } else {
            return redirect()->to(base_url('wishlist'));
        }
    }

    public function hide($id)
    {
        $wishlist = $this->adminModel->get_data_wishlist($id);
        $status = $wishlist->status;

        if($status != 'hidden')
        {
            $params = array(
                'id'    => $id,
                'status' => 'hidden',
            );
            $message = "Wishlist: {$wishlist->description} berhasil disembunyikan";
        }
        else
        {
            if($wishlist->guest_id != null)
            {
                $params = array(
                    'id'    => $id,
                    'status' => 'booked',
                );
            }
            else
            {
                $params = array(
                    'id'    => $id,
                    'status' => 'open',
                );    
            }           
            $message = "Wishlist: {$wishlist->description} berhasil ditampilkan";     
        }

        $update = $this->adminModel->update_wishlist($params);

        session()->setFlashdata('success', $message);

        return redirect()->to(base_url('wishlist'));
    }

    public function delete($id)
    {
        $wishlist = $this->adminModel->get_data_wishlist($id);
        $image = $wishlist->image;
        $path = ROOTPATH . 'public/uploads/' . $image;
        delete_files($path);

        $delete = $this->adminModel->delete_wishlist($id);
        if($delete)
        {
            session()->setFlashdata('success', "Berhasil menghapus data wishlist: {$wishlist->description}");
        }
        else
        {
            session()->setFlashdata('error', "Gagal menghapus data wishlist: {$wishlist->description}");
        }
        return redirect()->to(base_url('wishlist'));
    }

    public function update($id)
    {
        $title = $this->request->getPost('title');
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $phone = $this->request->getPost('phone');
        $address = $this->request->getPost('address');
        $notes = $this->request->getPost('notes');
        $invitation_code = $this->request->getPost('invitation_code');
        $data = array(
            'id'            => $id, 
            'title'         => $title,
            'name'          => $name,
            'email'         => $email,
            'phone'         => $phone,
            'address'       => $address,
            'notes'         => $notes,
            'invitation_code' => $invitation_code,
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
