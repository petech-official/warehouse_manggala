<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Kendaraan extends BaseController
{
    // model yang dibutuhkan
    // protected $userModel;
    public function __construct()
    {
        $this->KendaraanModel = new \App\Models\KendaraanModel();
        $this->StatusModel = new \App\Models\StatusModel();
    }

    public $controller = 'Kendaraan';
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
            'nopol' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan No Polisi !'
                ]
            ],
            'tipe' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Tipe !'
                ]
            ],
            'km' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan KM !'
                ]
            ],
        ])) {
            return redirect()->to('/' . $this->controller . '/tambah')->withInput();
        };
        $model = $this->controller . 'Model';
        $this->$model->save([
            'nopol' => $this->request->getVar('nopol'),
            'tipe' => $this->request->getVar('tipe'),
            'km' => $this->request->getVar('km'),
            'status' => $this->request->getVar('status'),

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
            'status' => $this->StatusModel->findAll()
        ];
        return view('/' . $this->controller . '/ubah', $data);
    }
    public function update($id)
    {
        //Validasi
        //Validasi
        if (!$this->validate([
            'nopol' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan No Polisi !'
                ]
            ],
            'km' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan KM !'
                ]
            ],
        ])) {
            return redirect()->to('/' . $this->controller . '/edit')->withInput();
        };
        $model = $this->controller . 'Model';
        $this->$model->save([
            'id' => $id,
            'nopol' => $this->request->getVar('nopol'),
            'km' => $this->request->getVar('km'),
            'status' => $this->request->getVar('status'),
            'keterangan' => $this->request->getVar('keterangan'),
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
