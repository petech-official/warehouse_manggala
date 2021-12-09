<?php

namespace App\Controllers;

class User extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new \App\Models\UserModel();
    }
    public function index()
    {

        $data = [
            'judul' => 'User',
            'aksi' => '',
            'user' => $this->userModel->findAll()
        ];

        return view('user/index', $data);
    }
    public function tambah()
    {
        $data = [
            'judul' => 'User',
            'aksi' => ' / Tambah Data'
        ];
        return view('user/tambah', $data);
    }
    public function save()
    {
        $this->userModel->save([
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),

        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambah');
        return redirect()->to('/user');
    }
    public function delete($id)
    {
        $this->userModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/user');
    }
    public function edit($id)
    {
        $data = [
            'judul' => 'User',
            'aksi' => ' / Ubah Data',
            'validation' => \Config\Services::validation(),
            'user'  => $this->userModel->getUser($id)
        ];
        return view('user/ubah', $data);
    }
    public function update($id)
    {
        $this->userModel->save([
            'id' => $id,
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/user');
    }
}
