<?php

namespace App\Controllers;

use App\Models\AdminModel;

class LoginAdmin extends BaseController
{
    public function index()
    {
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
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/loginAdmin');
            }
        } else {
            $session->setFlashdata('msg', 'Username not Found');
            return redirect()->to('/loginAdmin');
        }
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/loginAdmin');
    }
}
