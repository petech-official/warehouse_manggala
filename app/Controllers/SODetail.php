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
        $this->BarangModel = new \App\Models\BarangModel();
    }
    public $controllerMain = 'SO';
    public $controller = 'SODetail';
    public function index($id)
    {
        $model = $this->controllerMain . 'Model';
        $modelDetail = $this->controller . 'Model';
        $this->$model->getSO($id);
        $data = [
            'judul' => $this->controller,
            'judulMain' => $this->controllerMain,
            'aksi' => ' / Detail Data',
            'validation' => \Config\Services::validation(),
            'dataMain' => $this->$modelDetail->getSO($id),
            'data'  => $this->$modelDetail->getSODetail($id),
        ];
        return view('/' . $this->controller . '/index', $data);
    }
    public function tambah($id)
    {
        $modelDetail = $this->controller . 'Model';
        $data = [
            'id_so_detail' => $id,
            'id_so' => $id,
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
            return redirect()->to('/' . $this->controller . '/tambah/' . $this->request->getVar('id_so'))->withInput();
        };

        $barang = $this->BarangModel->getData($this->request->getVar('id_barang'));
        $totalBerat = $barang['berat'] * $this->request->getVar('quantitas');
        // if ($totalBerat != 0) {
        //     $keterangan_so = 'Barang Standar, 1 Box emiliki berat ' . $barang['berat'] . 'Kg';
        // } else {
        //     $keterangan_so = 'Barang Non Standar';
        // }

        $model = $this->controller . 'Model';
        $this->$model->save([
            'id_so' => $this->request->getVar('id_so'),
            'id_barang' => $this->request->getVar('id_barang'),
            'quantitas' => $this->request->getVar('quantitas'),
            'berat_total' => $totalBerat,
            'keterangan_so' => $this->request->getVar('keterangan_so')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambah');
        return redirect()->to('/' . $this->controller . '/index/' . $this->request->getVar('id_so'));
    }
    public function edit($id)
    {

        $modelDetail = $this->controller . 'Model';

        $data = [
            'judul' => $this->controller,
            'aksi' => ' / Ubah Data',
            'id_so_detail' => $id,
            'id_so' => $this->$modelDetail->getIdSo($id),
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
            return redirect()->to('/' . $this->controller . '/edit/' . $this->request->getVar('id_so'))->withInput();
        };
        $model = $this->controller . 'Model';
        $barang = $this->BarangModel->getData($this->request->getVar('id_barang'));
        $totalBerat = $barang['berat'] * $this->request->getVar('quantitas');
        // if ($totalBerat != 0) {
        //     $keterangan_so = 'Barang Standar, 1 Box emiliki berat ' . $barang['berat'] . 'Kg';
        // } else {
        //     $keterangan_so = 'Barang Non Standar';
        // }        
        $this->$model->save([
            'id_so_detail' => $id,
            'id_so' => $this->request->getVar('id_so'),
            'id_barang' => $this->request->getVar('id_barang'),
            'quantitas' => $this->request->getVar('quantitas'),
            'berat_total' => $totalBerat,
            'keterangan_so' => $this->request->getVar('keterangan_so')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/' . $this->controller . '/index/' . $this->request->getVar('id_so'));
    }
    public function delete()
    {
        $model = $this->controller . 'Model';
        $id = $this->request->getVar('id');
        $id_SO = $this->request->getVar('id_so');
        $this->$model->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/' . $this->controller . '/index/' . $id_SO);
    }
}
