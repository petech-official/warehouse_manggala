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
        $this->BarangGradeModel = new \App\Models\BarangGradeModel();
        $this->CustomerDetailModel = new \App\Models\CustomerDetailModel();
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
        $id_customer = $this->SOModel->where('id_so', $id)->findColumn('id_customer')[0];
        $data = [
            'id_so_detail' => $id,
            'id_so' => $id,
            'judul' => $this->controller,
            'aksi' => ' / Tambah Data',
            'validation' => \Config\Services::validation(),
            'dataBarang' => $this->BarangModel->getBarang(),
            'dataAlamat' => $this->CustomerDetailModel->where('id_customer', $id_customer)->findAll()

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
                    'required' => 'Data tidak boleh kosong!',

                ]
            ],
            'berat_total' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data tidak boleh kosong!',
                ]
            ],
            'keterangan_so' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data tidak boleh kosong!',
                ]
            ],
        ])) {
            return redirect()->to('/' . $this->controller . '/tambah/' . $this->request->getVar('id_so'))->withInput();
        };
        // $id_so = $this->request->getVar('id_so');
        // $grade = $this->BarangModel->where('id_barang', $this->request->getVar('id_barang'))->find()[0]['id_grade'];
        // $gradeStandar = $this->BarangGradeModel->where('id', 1)->find()[0]['id'];

        // if ($grade == $gradeStandar) {
        $barang = $this->BarangModel->getData($this->request->getVar('id_barang'));
        $beratBarang = $barang['berat'];
        $Box = ceil($this->request->getVar('berat_total') / $barang['berat']);

        $box = ceil($Box * $beratBarang);
        // } else {
        //     if ($this->request->getVar('quantitas') == '') {
        //         return redirect()->to('/' . $this->controller . '/tambah/' . $id_so)->withInput();
        //     }
        //     $beratBarang = $this->request->getVar('berat_total');
        //     $box = ceil($this->request->getVar('quantitas') * $beratBarang);
        // }        
        $model = $this->controller . 'Model';
        $this->$model->save([
            'id_so' => $this->request->getVar('id_so'),
            'id_barang' => $this->request->getVar('id_barang'),
            'quantitas' => $Box,
            'berat_total' => $box,
            'keterangan_so' => $this->request->getVar('keterangan_so')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambah');
        return redirect()->to('/' . $this->controller . '/index/' . $this->request->getVar('id_so'));
    }
    public function edit($id)
    {

        $modelDetail = $this->controller . 'Model';
        $id_so = $this->SODetailModel->where('id_so_detail', $id)->findColumn('id_so')[0];
        $id_customer = $this->SOModel->where('id_so', $id_so)->findColumn('id_customer')[0];

        $data = [
            'judul' => $this->controller,
            'aksi' => ' / Ubah Data',
            'id_so_detail' => $id,
            'id_so' => $this->$modelDetail->getIdSo($id),
            'validation' => \Config\Services::validation(),
            'data'  => $this->$modelDetail->getDataDetail($id),
            'dataBarang' => $this->BarangModel->getBarang(),
            'dataAlamat' => $this->CustomerDetailModel->where('id_customer', $id_customer)->findAll()
        ];
        return view('/' . $this->controller . '/ubah', $data);
    }
    public function update($id)
    {
        //Validasi
        // if (!$this->validate([
        //     'id_barang' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Data tidak boleh kosong!',
        //         ]
        //     ],
        // ])) {
        //     return redirect()->to('/' . $this->controller . '/edit/' . $this->request->getVar('id_so'))->withInput();
        // };
        $model = $this->controller . 'Model';
        // $barang = $this->BarangModel->getData($this->request->getVar('id_barang'));
        // $totalBerat = $barang['berat'] * $this->request->getVar('quantitas');
        // if ($totalBerat != 0) {
        //     $keterangan_so = 'Barang Standar, 1 Box emiliki berat ' . $barang['berat'] . 'Kg';
        // } else {
        //     $keterangan_so = 'Barang Non Standar';
        // }        

        $this->$model->save([
            'id_so_detail' => $id,
            'id_so' => $this->request->getVar('id_so'),
            // 'id_barang' => $this->request->getVar('id_barang'),
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
