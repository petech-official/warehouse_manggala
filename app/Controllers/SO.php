<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SO extends BaseController
{
    // model yang dibutuhkan
    //protected $userModel;
    public function __construct()
    {
        $this->SOModel = new \App\Models\SOModel();
        $this->CustomerModel = new \App\Models\CustomerModel();
        $this->CustomerDetailModel = new \App\Models\CustomerDetailModel();
    }

    public $controller = 'SO';
    public function index()
    {
        $model = $this->controller . 'Model';
        $data = [
            'judul' => $this->controller,
            'data' => $this->$model->getSO(),
        ];
        return view($this->controller . '/index', $data);
    }
    public function tambah()
    {
        $data = [
            'judul' => $this->controller,
            'aksi' => ' / Tambah Data',
            'validation' => \Config\Services::validation(),
            'dataCustomer' => $this->CustomerModel->findAll()
        ];
        return view($this->controller . '/tambah', $data);
    }
    public function save()
    {
        //Validasi
        if (!$this->validate([
            'zzz' => [
                'rules' => 'required|is_unique[NamaTableZzz.AttributZzz]',
                'errors' => [
                    'required' => 'Masukan zzz !',
                    'is_unique' => 'zzz harus unik !'
                ]

            ]
        ])) {
            return redirect()->to('/' . $this->controller . '/tambah')->withInput();
        };
        $model = $this->controller . 'Model';
        $this->$model->save([
            'zzz' => $this->request->getVar('zzz'),
            'zzz' => $this->request->getVar('zzz'),
            'zzz' => $this->request->getVar('zzz'),
            'zzz' => $this->request->getVar('zzz'),

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
            'zzz' => [
                'rules' => 'required|is_unique[NamaTableZzz.AttributZzz]',
                'errors' => [
                    'required' => 'Masukan zzz !',
                    'is_unique' => 'zzz harus unik !'
                ]

            ]
        ])) {
            return redirect()->to('/' . $this->controller . '/edit')->withInput();
        };
        $model = $this->controller . 'Model';
        $this->$model->save([
            'id' => $this->request->getVar('id'),
            'zzz' => $this->request->getVar('zzz'),
            'zzz' => $this->request->getVar('zzz'),
            'zzz' => $this->request->getVar('zzz'),
            'zzz' => $this->request->getVar('zzz'),
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
    public function getAlamat()
    {
        $id = $this->request->getPost('namaCustomer');        
        $dataAlamat = $this->CustomerDetailModel->getData($id);        
        echo json_encode($dataAlamat);
    }
}

