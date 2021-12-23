<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SODetail extends BaseController
{
    // model yang dibutuhkan
    // protected $userModel;
    public function __construct()
    {
        $this->SOModel = new \App\Models\SOModel();
        $this->SODetailModel = new \App\Models\SODetailModel();
    }
    public $controllerMain = 'SO';
    public $controller = 'SODetail';
    public function index($id)
    {
        $model = $this->controllerMain . 'Model';
        $modelDetail = $this->controller . 'Model';
        $data = [
            'judul' => $this->controller,
            'judulMain' => $this->controllerMain,
            'aksi' => ' / Detail Data',
            'validation' => \Config\Services::validation(),
            'dataMain' => $this->$model->getData($id),
            'data'  => $this->$modelDetail->getSODetail($id),
        ];
        return view('/' . $this->controller . '/index', $data);
    }
    public function tambah($id)
    {
        $data = [
            'id_SO' => $id,
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
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan alamat !',

                ]
            ],
            'km' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan km !',
                ]
            ],
            'waktu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan waktu !',
                ]
            ],
        ])) {
            return redirect()->to('/' . $this->controller . '/tambah')->withInput();
        };
        $model = $this->controller . 'Model';
        $this->$model->save([
            'id_SO' => $this->request->getVar('id_SO'),
            'alamat' => $this->request->getVar('alamat'),
            'km' => $this->request->getVar('km'),
            'waktu' => $this->request->getVar('waktu'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambah');
        return redirect()->to('/' . $this->controller . '/index/' . $this->request->getVar('id_SO'));
    }
    public function edit($id)
    {
        $model = $this->controller . 'Model';
        $data = [
            'judul' => $this->controller,
            'aksi' => ' / Ubah Data',
            'id_SO' => $id,
            'validation' => \Config\Services::validation(),
            'data'  => $this->$model->getDataDetail($id),
        ];
        return view('/' . $this->controller . '/ubah', $data);
    }
    public function update($id)
    {
        if (!$this->validate([
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan alamat !',

                ]
            ],
            'km' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan km !',
                ]
            ],
            'waktu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan waktu !',
                ]
            ],
        ])) {
            return redirect()->to('/' . $this->controller . '/edit')->withInput();
        };
        $model = $this->controller . 'Model';
        $this->$model->save([
            'id' => $id,
            'alamat' => $this->request->getVar('alamat'),
            'km' => $this->request->getVar('km'),
            'waktu' => $this->request->getVar('waktu'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/' . $this->controller . '/index/' . $this->request->getVar('id_SO'));
    }
    public function delete()
    {
        $modelMain = $this->controllerMain . 'Model';
        $model = $this->controller . 'Model';
        $id = $this->request->getVar('id');
        $id_SO = $this->request->getVar('id_SO');
        $this->$model->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/' . $this->controller . '/index/' . $id_SO);
    }
}
