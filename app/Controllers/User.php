<?php

namespace App\Controllers;

class User extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->adminModel = new \App\Models\AdminModel();
    }
    public function index()
    {
        $data = [
            'judul' => 'User',
            'aksi' => '',
            'user' => $this->adminModel->findAll(),
            'session' => session()
        ];

        return view('user/index', $data);
    }
    public function tambah()
    {
        $data = [
            'judul' => 'User',
            'aksi' => ' / Tambah Data',
            'validation' => \Config\Services::validation(),
        ];
        return view('user/tambah', $data);
    }
    public function save()
    {
        // Validasi
        if (!$this->validate([
            'username' => [
                'rules' => 'required|is_unique[admin.username]',
                'errors' => [
                    'required' => 'Masukan username !',
                    'is_unique' => 'Username harus unik !'
                ]

            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih status !',
                ]

            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan pasword !',
                ]

            ],
        ])) {
            return redirect()->to('/user/tambah')->withInput();
        }

        $this->adminModel->save([
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'status' => $this->request->getVar('status'),

        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambah');
        return redirect()->to('/user');
    }
    public function delete()
    {
        $id = $this->request->getVar('id_user');
        $this->adminModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/user');
    }
    public function edit($id)
    {
        $data = [
            'judul' => 'User',
            'aksi' => ' / Ubah Data',
            'validation' => \Config\Services::validation(),
            'user'  => $this->adminModel->getUser($id),
        ];
        return view('user/ubah', $data);
    }


    public function update($id)
    {
        // Ambil Nilai
        $usernameLama = $this->adminModel->getUser($id);
        $usernameBaru =  $this->request->getVar('username');
        // Cek Kesamaan
        if ($usernameLama['username'] == $usernameBaru) {
            $rules = 'required';
        } else {
            $rules = 'required|is_unique[user.username]';
        }
        // Validasi
        if (!$this->validate([
            'username' => [
                'rules' => $rules,
                'errors' => [
                    'required' => 'Masukan username !',
                    'is_unique' => 'Username harus unik !'
                ]

            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan pasword !',
                ]

            ],
        ])) {
            return redirect()->to('/user/edit/' . $id)->withInput();
        }

        $this->adminModel->save([
            'id' => $id,
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'status' => $this->request->getVar('status'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/user');
    }
}
