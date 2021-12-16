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
        // //Validasi
        // if (!$this->validate([
        //     'zzz' => [
        //         'rules' => 'required|is_unique[NamaTableZzz.AttributZzz]',
        //         'errors' => [
        //             'required' => 'Masukan zzz !',
        //             'is_unique' => 'zzz harus unik !'
        //         ]

        //     ]
        // ])) {
        //     return redirect()->to('/' . $this->controller . '/tambah')->withInput();
        // };        
        $model = $this->controller . 'Model';
        $this->$model->save([
            'id_jenis' => $this->request->getVar('jenis'),
            'id_keterangan' => $this->request->getVar('keterangan'),
            'lot' => $this->request->getVar('lot'),
            'id_grade' => $this->request->getVar('grade'),
            'produk' => $this->request->getVar('produksi'),
            'dus' => $this->request->getVar('dus'),
            'kg' => $this->request->getVar('kg'),
            'keterangan' => $this->request->getVar('keterangan'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambah');
        return redirect()->to('/Stock/index');
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
}
