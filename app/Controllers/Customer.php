<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Customer extends BaseController
{
    // model yang dibutuhkan
    // protected $userModel;
    public function __construct()
    {
        $this->CustomerModel = new \App\Models\CustomerModel();
        $this->CustomerDetailModel = new \App\Models\CustomerDetailModel();
    }

    public $controller = 'Customer';
    public function index()
    {
        $model = $this->controller . 'Model';
        $data = [
            'judul' => $this->controller,
            'data' => $this->$model->findAll(),
        ];
        return view($this->controller . '/index', $data);
    }
    public function tambah()
    {
        $data = [
            'judul' => $this->controller,
            'aksi' => ' / Tambah Data',
            'validation' => \Config\Services::validation(),
        ];
        return view($this->controller . '/tambah', $data);
    }
    public function save()
    {
        //Validasi
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[customer.nama]',
                'errors' => [
                    'required' => 'Masukan nama !',
                    'is_unique' => 'nama harus unik !'
                ]
            ],
            'telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan telp !',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan alamat !',
                ]
            ]

        ])) {
            return redirect()->to('/' . $this->controller . '/tambah')->withInput();
        };
        $model = $this->controller . 'Model';
        $this->$model->save([
            'nama' => $this->request->getVar('nama'),
            'telp' => $this->request->getVar('telp'),
            'alamat' => $this->request->getVar('alamat'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambah');
        return redirect()->to('/' . $this->controller);
    }
    public function edit($id)
    {
        $model = $this->controller . 'Model';
        $data = [
            'judul' => $this->controller,
            'aksi' => ' / Ubah Data',
            'validation' => \Config\Services::validation(),
            'data'  => $this->$model->getData($id),
        ];
        return view('/' . $this->controller . '/ubah', $data);
    }
    public function update($id)
    {
        //Validasi
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan nama !',
                ]
            ],
            'telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan telp !',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan alamat !',
                ]
            ]
        ])) {
            return redirect()->to('/' . $this->controller . '/tambah')->withInput();
        };
        $model = $this->controller . 'Model';
        $this->$model->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'telp' => $this->request->getVar('telp'),
            'alamat' => $this->request->getVar('alamat'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/' . $this->controller);
    }
    public function delete()
    {
        $model = $this->controller . 'Model';
        $id = $this->request->getVar('id');
        $this->$model->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/' . $this->controller);
    }
}
