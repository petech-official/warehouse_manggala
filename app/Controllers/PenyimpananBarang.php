<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PenyimpananBarang extends BaseController
{
    // model yang dibutuhkan
    // protected $userModel;
    public function __construct()
    {
        $this->PenyimpananBarangModel = new \App\Models\PenyimpananBarangModel();
        $this->BarangModel = new \App\Models\BarangModel();
    }

    public $controller = 'PenyimpananBarang';
    public function index()
    {
        $model = $this->controller . 'Model';
        $data = [
            'judul' => $this->controller,
            'data' => $this->$model->getSimpan(),
        ];
        return view($this->controller . '/index', $data);
    }
    public function tambah()
    {
        $data = [
            'judul' => $this->controller,
            'aksi' => ' / Tambah Data',
            'dataBarang' => $this->BarangModel->getBarang(),
            'validation' => \Config\Services::validation(),
        ];
        return view($this->controller . '/tambah', $data);
    }
    public function save()
    {
        //Validasi
        if (!$this->validate([
            'posisi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data tidak boleh kosong !',
                ]
            ],
            'id_barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data tidak boleh kosong !',
                ]
            ],
            'berat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data tidak boleh kosong !',
                ]
            ],
        ])) {
            return redirect()->to('/' . $this->controller . '/tambah')->withInput();
        };
        $model = $this->controller . 'Model';
        $this->$model->save([
            'id_barang' => $this->request->getVar('id_barang'),
            'posisi_barang' => $this->request->getVar('posisi'),
            'berat_penyimpanan' => $this->request->getVar('berat'),
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
            'berat_penyimpanan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data tidak boleh kosong !',
                ]
            ],
        ])) {
            return redirect()->to('/' . $this->controller . '/edit/' . $id)->withInput();
        };
        $model = $this->controller . 'Model';
        $this->$model->save([
            'id_penyimpanan' => $id,
            'berat_penyimpanan' => $this->request->getVar('berat_penyimpanan'),
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
