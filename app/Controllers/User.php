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

        return view('User/index', $data);
    }
    public function tambah()
    {
        $data = [
            'judul' => 'User',
            'aksi' => ' / Tambah Data',
            'validation' => \Config\Services::validation(),
        ];
        return view('User/tambah', $data);
    }
    public function save()
    {
        // Validasi
        if (!$this->validate([
            'username' => [
                'rules' => 'required|is_unique[admin.username]',
                'errors' => [
                    'required' => 'Data tidak boleh kosong!',
                    'is_unique' => 'Username harus unik !'
                ]

            ],
            'email' => [
                'rules' => 'required|is_unique[admin.username]',
                'errors' => [
                    'required' => 'Data tidak boleh kosong!',
                    'is_unique' => 'Email harus unik !'
                ]

            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data tidak boleh kosong!',
                ]

            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data tidak boleh kosong!',
                ]

            ],
        ])) {
            return redirect()->to('/User/tambah')->withInput();
        }

        $this->adminModel->save([
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'status' => $this->request->getVar('status'),
            'email' => $this->request->getVar('email')

        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambah');
        return redirect()->to('/User');
    }
    public function delete()
    {
        $id = $this->request->getVar('id_user');
        $this->adminModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/User');
    }
    public function edit($id)
    {
        $data = [
            'judul' => 'User',
            'aksi' => ' / Ubah Data',
            'validation' => \Config\Services::validation(),
            'user'  => $this->adminModel->getUser($id),
        ];
        return view('User/ubah', $data);
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
                    'required' => 'Data tidak boleh kosong!',
                ]

            ],
        ])) {
            return redirect()->to('/User/edit/' . $id)->withInput();
        }

        $this->adminModel->save([
            'id' => $id,
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'status' => $this->request->getVar('status'),
            'email' => $this->request->getVar('email')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/User');
    }
}
