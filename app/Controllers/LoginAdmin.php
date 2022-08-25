<?php

namespace App\Controllers;

use App\Models\AdminModel;

class LoginAdmin extends BaseController
{
    public function __construct()
    {
        $this->adminModel = new \App\Models\AdminModel();
    }
    public function index()
    {
        helper(['form']);
        return view('login_admin/index');
    }
    public function auth()
    {
        $session = session();
        $model = new AdminModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where('username', $username)->first();
        if ($data) {
            $pass = $data['password'];
            if ($pass == $password) {
                $ses_data = [
                    'username'      => $data['username'],
                    'status'        => $data['status'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('msg', 'Password salah/kosong coba ulangi!');
                return redirect()->to('/loginAdmin');
            }
        } else {
            $session->setFlashdata('msg', 'Username tidak ditemukan coba ulangi!');
            return redirect()->to('/loginAdmin');
        }
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/loginAdmin');
    }

    function verifikasi()
    {
        return view('login_admin/verifikasi');
    }
    public function ganti_password()
    {
        // jika email benar
        $model = new AdminModel();
        $email = $this->request->getVar('email');
        $data = $model->where('email', $email)->first();
        if ($data) {
            $id_admin = $data['id_admin'];
            $email = $data['email'];
            $data = [
                'id_admin' => $id_admin,
                'email' => $email,
                'validation' => \Config\Services::validation(),
            ];
            return view('/login_admin/ganti_password', $data);
        } else {
            // jika email tidak ada\
            $session = session();
            $session->setFlashdata('msg', 'email tidak ditemukan coba ulangi!');
            return redirect()->to('/loginAdmin/verifikasi');
        }
    }
    public function passwordbaru()
    {
        $id_admin =  $this->request->getVar('id_admin');
        // $email =  $this->request->getVar('email');
        // $data = [
        //     'id_admin' => $id_admin,
        //     'validation' => \Config\Services::validation(),
        // ];
        // if (!$this->validate([
        //     'passwordbaru' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Data tidak boleh kosong!'
        //         ]
        //     ],
        //     'passwordulangbaru' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Data tidak boleh kosong!'
        //         ]
        //     ],
        // ])) {
        //     $session = session();
        //     $session->setFlashdata('msg', 'Password tidak sama ulangi!');
        //     return redirect()->to('/loginAdmin/index');;
        // };
        $passwordbaru = $this->request->getVar('passwordbaru');
        $passwordulangbaru = $this->request->getVar('passwordulangbaru');
        // cek sama atau tidak
        if ($passwordbaru != $passwordulangbaru) {
            // tidak sama
            $session = session();
            $session->setFlashdata('msg', 'Password tidak sama ulangi!');
            return redirect()->to('/loginAdmin/index');
        } else {
            // sama
            $this->adminModel->save([
                'id_admin' => $id_admin,
                'password' => $passwordbaru,
            ]);
            $session = session();
            $session->setFlashdata('msg', 'Password sudah diganti silahkan masuk dengan password baru!');
            return redirect()->to('/loginAdmin/index');
        }
    }
}
