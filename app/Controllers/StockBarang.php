<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class StockBarang extends BaseController
{
    // model yang dibutuhkan
    // protected $userModel;
    public function __construct()
    {
        $this->StockBarangModel = new \App\Models\StockBarangModel();
        $this->BarangModel = new \App\Models\BarangModel();
    }

    public $controller = 'StockBarang';
    public function index()
    {
        $model = $this->controller . 'Model';
        $data = [
            'judul' => $this->controller,
            'data' => $this->$model->getStockDetail(),
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
            'id_barang' => [
                'rules' => 'required|is_unique[stock_barang.id_barang]',
                'errors' => [
                    'required' => 'Masukan barang !',
                    'is_unique' => 'Barang sudah ada !'
                ]
            ]
        ])) {
            return redirect()->to('/' . $this->controller . '/tambah')->withInput();
        };
        $model = $this->controller . 'Model';
        $this->$model->save([
            'id_barang' => $this->request->getVar('id_barang'),
            'keterangan_stock' => $this->request->getVar('keterangan_stock'),
            'status_stock' => 0,
            'lokasi_stock' => $this->request->getVar('lokasi_stock'),

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
            'data'  => $this->$model->getDataStockDetail($id),
        ];
        return view('/' . $this->controller . '/ubah', $data);
    }
    public function update($id)
    {
        $model = $this->controller . 'Model';
        $this->$model->save([
            'id_stock' => $id,
            'id_barang' => $this->request->getVar('id'),
            'keterangan_stock' => $this->request->getVar('keterangan_stock'),
            'lokasi_stock' => $this->request->getVar('lokasi_stock'),
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
