<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PODetail extends BaseController
{
    // model yang dibutuhkan
    // protected $userModel;
    public function __construct()
    {
        $this->POModel = new \App\Models\POModel();
        $this->PODetailModel = new \App\Models\PODetailModel();
        $this->BarangModel = new \App\Models\BarangModel();
    }
    public $controllerMain = 'PO';
    public $controller = 'PODetail';
    public function index($id)
    {
        $model = $this->controllerMain . 'Model';
        $modelDetail = $this->controller . 'Model';
        $this->$model->getPO($id);
        $data = [
            'judul' => $this->controller,
            'judulMain' => $this->controllerMain,
            'aksi' => ' / Detail Data',
            'validation' => \Config\Services::validation(),
            'dataMain' => $this->$modelDetail->getPO($id),
            'data'  => $this->$modelDetail->getPODetail($id),
        ];
        return view('/' . $this->controller . '/index', $data);
    }
    public function tambah($id)
    {
        $modelDetail = $this->controller . 'Model';
        $data = [
            'id_po_detail' => $id,
            'id_po' => $this->$modelDetail->getIdPO($id),
            'judul' => $this->controller,
            'aksi' => ' / Tambah Data',
            'validation' => \Config\Services::validation(),
            'dataBarang' => $this->BarangModel->getBarang()
        ];
        return view($this->controller . '/tambah', $data);
    }
    public function save()
    {
        //Validasi
        if (!$this->validate([
            'id_barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan barang !',

                ]
            ],
            'quantitas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan quantitas !',
                ]
            ],
        ])) {
            return redirect()->to('/' . $this->controller . '/tambah')->withInput();
        };

        $barang = $this->BarangModel->getData($this->request->getVar('id_barang'));
        $totalBerat = $barang['berat'] * $this->request->getVar('quantitas');

        $model = $this->controller . 'Model';
        $this->$model->save([
            'id_po' => $this->request->getVar('id_po'),
            'id_barang' => $this->request->getVar('id_barang'),
            'quantitas' => $this->request->getVar('quantitas'),
            'berat_total' => $totalBerat,
            'keterangan_po_detail' => $this->request->getVar('keterangan_po_detail'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambah');
        return redirect()->to('/' . $this->controller . '/index/' . $this->request->getVar('id_po'));
    }
    public function edit($id)
    {

        $modelDetail = $this->controller . 'Model';

        $data = [
            'judul' => $this->controller,
            'aksi' => ' / Ubah Data',
            'id_po_detail' => $id,
            'id_po' => $this->$modelDetail->getIdPO($id),
            'validation' => \Config\Services::validation(),
            'data'  => $this->$modelDetail->getDataDetail($id),
            'dataBarang' => $this->BarangModel->getBarang()
        ];
        return view('/' . $this->controller . '/ubah', $data);
    }
    public function update($id)
    {
        //Validasi
        if (!$this->validate([
            'id_barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan barang !',
                ]
            ],
            'quantitas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan quantitas !',
                ]
            ],
        ])) {
            return redirect()->to('/' . $this->controller . '/edit')->withInput();
        };
        $model = $this->controller . 'Model';
        $barang = $this->BarangModel->getData($this->request->getVar('id_barang'));
        $totalBerat = $barang['berat'] * $this->request->getVar('quantitas');

        $this->$model->save([
            'id_po_detail' => $id,
            'id_po' => $this->request->getVar('id_po'),
            'id_barang' => $this->request->getVar('id_barang'),
            'quantitas' => $this->request->getVar('quantitas'),
            'berat_total' => $totalBerat,
            'keterangan_po' => $this->request->getVar('keterangan_po_detail'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/' . $this->controller . '/index/' . $this->request->getVar('id_po'));
    }
    public function delete()
    {
        $model = $this->controller . 'Model';
        $id = $this->request->getVar('id');
        $id_po = $this->request->getVar('id_po');
        $this->$model->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/' . $this->controller . '/index/' . $id_po);
    }
}
