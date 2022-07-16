<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class StockBarangDetail extends BaseController
{
    // model yang dibutuhkan
    // protected $userModel;
    public function __construct()
    {
        $this->StockBarangModel = new \App\Models\StockBarangModel();
        $this->StockBarangDetailModel = new \App\Models\StockBarangDetailModel();
    }
    public $controllerMain = 'StockBarang';
    public $controller = 'StockBarangDetail';
    public function index($id)
    {
        $modelMain = $this->controllerMain . 'Model';
        $model = $this->controller . 'Model';
        $data = [
            'judul' => $this->controller,
            'judulMain' => $this->controllerMain,
            'aksi' => ' / Detail Data',
            'validation' => \Config\Services::validation(),
            'dataMain' => $this->$modelMain->getDataStockDetail($id),
            'data'  => $this->$model->getStockBarangDetail($id),
        ];
        return view($this->controller . '/index', $data);
    }
    public function edit($id)
    {
        $model = $this->controller . 'Model';
        $data = [
            'judul' => $this->controller,
            'aksi' => ' / Ubah Data',
            'validation' => \Config\Services::validation(),
            'data'  => $this->$model->getDataDetail($id),
        ];
        return view('/' . $this->controller . '/ubah', $data);
    }
    public function update($id)
    {
        if (!$this->validate([
            'posisi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data tidak boleh kosong!',

                ]
            ]
        ])) {
            return redirect()->to('/' . $this->controller . '/edit/' . $id)->withInput();
        };
        $model = $this->controller . 'Model';
        $this->$model->save([
            'id_stock_detail' => $id,
            'posisi' => $this->request->getVar('posisi'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/' . $this->controller . '/index/' . $this->request->getVar('id_stock'));
    }
}
