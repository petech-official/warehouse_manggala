<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Stock extends BaseController
{
    // model yang dibutuhkan
    // protected $userModel;
    public function __construct()
    {
        $this->BarangModel = new \App\Models\BarangModel();
        $this->BarangJenis = new \App\Models\BarangJenisModel();
        $this->BarangKeterangan = new \App\Models\BarangKeteranganModel();
        $this->BarangGrade = new \App\Models\BarangGradeModel();
        $this->BarangProduksi = new \App\Models\SupplierModel();
    }

    public $controller = 'Barang';
    public function index()
    {
        $model = $this->controller . 'Model';
        $data = [
            'judul' => $this->controller,
            'data' => $this->$model->getBarang(),
        ];
        return view('Stock/index', $data);
    }
    public function tambah()
    {
        // $dataJenis = ;
        // $dataKeterangan = $this->MasterBarangKeterangan->findAll();
        // $dataGrade = $this->MasterBarangGrade->findAll();
        $data = [
            'judul' => $this->controller,
            'aksi' => ' / Tambah Data',
            'validation' => \Config\Services::validation(),
            'dataJenis' => $this->BarangJenis->findAll(),
            'dataKeterangan' => $this->BarangKeterangan->findAll(),
            'dataGrade' => $this->BarangGrade->findAll(),
            'dataProduksi' => $this->BarangProduksi->findAll()
        ];
        return view('Stock/tambah', $data);
    }
    public function save()
    {
        //Validasi
        if (!$this->validate([
            'jenis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan jenis !',
                ]
            ],
            'lot' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan lot !',
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan keterangan !',
                ]
            ],
            'grade' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan grade !',
                ]
            ],
            'produksi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan produksi !',
                ]
            ],
            'dus' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan dus !',
                ]
            ],
            'kg' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan kg !',
                ]
            ],
        ])) {
            return redirect()->to('/Stock/tambah')->withInput();
        };

        $dus = $this->request->getVar('dus');
        $kg = $this->request->getVar('kg');
        $keterangan_dus = $kg / $dus;


        $model = $this->controller . 'Model';
        $this->$model->save([
            'id_jenis' => $this->request->getVar('jenis'),
            'id_keterangan' => $this->request->getVar('keterangan'),
            'keterangan_detail' => $this->request->getVar('keteranganDetail'),
            'lot' => $this->request->getVar('lot'),
            'id_grade' => $this->request->getVar('grade'),
            'produk' => $this->request->getVar('produksi'),
            'dus' => $dus,
            'kg' => $kg,
            'keterangan_dus' => $keterangan_dus
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambah');
        return redirect()->to('/Stock/index');
    }
    public function edit($id)
    {
        $data = [
            'judul' => $this->controller,
            'aksi' => ' / Ubah Data',
            'validation' => \Config\Services::validation(),
            'data'  => $this->BarangModel->getData($id),
            'dataJenis' => $this->BarangJenis->findAll(),
            'dataKeterangan' => $this->BarangKeterangan->findAll(),
            'dataGrade' => $this->BarangGrade->findAll(),
            'dataProduksi' => $this->BarangProduksi->findAll()
        ];
        return view('/Stock/ubah', $data);
    }
    public function update($id)
    {

        //Validasi
        if (!$this->validate([
            'lot' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan lot !',
                ]
            ],
            'dus' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan dus !',
                ]
            ],
            'kg' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan kg !',
                ]
            ],
        ])) {
            return redirect()->to('/Stock/edit/' . $id)->withInput();
        };

        $dus = $this->request->getVar('dus');
        $kg = $this->request->getVar('kg');
        $keterangan_dus = $kg / $dus;

        $model = $this->controller . 'Model';
        $this->$model->save([
            'id_barang' => $id,
            'id_jenis' => $this->request->getVar('jenis'),
            'id_keterangan' => $this->request->getVar('keterangan'),
            'keterangan_detail' => $this->request->getVar('keteranganDetail'),
            'lot' => $this->request->getVar('lot'),
            'id_grade' => $this->request->getVar('grade'),
            'produk' => $this->request->getVar('produksi'),
            'dus' => $dus,
            'kg' => $kg,
            'keterangan_dus' => $keterangan_dus
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/Stock');
    }
    public function delete()
    {

        $model = $this->controller . 'Model';
        $id = $this->request->getVar('id');
        $this->$model->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/Stock');
    }
}
