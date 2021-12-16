<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Barang extends BaseController
{
    // model yang dibutuhkan
    // protected $userModel;
    public function __construct()
    {
        $this->BarangJenis = new \App\Models\BarangJenisModel();
        $this->BarangKeterangan = new \App\Models\BarangKeteranganModel();
        $this->BarangGrade = new \App\Models\BarangGradeModel();
    }

    public $controller = 'Barang';
    public function index()
    {
        $dataJenis = $this->BarangJenis->findAll();
        $dataKeterangan = $this->BarangKeterangan->findAll();
        $dataGrade = $this->BarangGrade->findAll();
        $data = [
            'judul' => 'Barang',
            'dataJenis' => $dataJenis,
            'dataKeterangan' => $dataKeterangan,
            'dataGrade' => $dataGrade
        ];
        return view($this->controller . '/index', $data);
    }
    // Tambah Jenis
    public function tambahJenis()
    {

        $data = [
            'judul' => $this->controller,
            'aksi' => ' / Tambah Data',
            'validation' => \Config\Services::validation(),
        ];
        return view($this->controller . '/tambahJenis', $data);
    }
    // Tambah Keterangan
    public function tambahKeterangan()
    {

        $data = [
            'judul' => $this->controller,
            'aksi' => ' / Tambah Data',
            'validation' => \Config\Services::validation(),
        ];
        return view($this->controller . '/tambahKeterangan', $data);
    }
    // Tambah Grade
    public function tambahGrade()
    {

        $data = [
            'judul' => $this->controller,
            'aksi' => ' / Tambah Data',
            'validation' => \Config\Services::validation(),
        ];
        return view($this->controller . '/tambahGrade', $data);
    }
    // Save Keterangan
    public function saveKeterangan()
    {
        // Validasi
        if (!$this->validate([
            'keterangan' => [
                'rules' => 'required|is_unique[barang_keterangan.keterangan]',
                'errors' => [
                    'required' => 'Masukan keterangan !',
                    'is_unique' => 'keterangan harus unik !'
                ]

            ]
        ])) {
            return redirect()->to('/' . $this->controller . '/tambahKeterangan')->withInput();
        };
        $this->BarangKeterangan->save([
            'keterangan' => $this->request->getVar('keterangan'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambah');
        return redirect()->to('/' . $this->controller);
    }

    // Save jenis
    public function saveJenis()
    {
        // Validasi
        if (!$this->validate([
            'jenis' => [
                'rules' => 'required|is_unique[barang_jenis.jenis]',
                'errors' => [
                    'required' => 'Masukan jenis !',
                    'is_unique' => 'jenis harus unik !'
                ]

            ]
        ])) {
            return redirect()->to('/' . $this->controller . '/tambahJenis')->withInput();
        };
        $this->BarangJenis->save([
            'jenis' => $this->request->getVar('jenis'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambah');
        return redirect()->to('/' . $this->controller);
    }

    // Save grade
    public function saveGrade()
    {
        // Validasi
        if (!$this->validate([
            'grade' => [
                'rules' => 'required|is_unique[barang_grade.grade]',
                'errors' => [
                    'required' => 'Masukan grade !',
                    'is_unique' => 'grade harus unik !'
                ]

            ]
        ])) {
            return redirect()->to('/' . $this->controller . '/tambahGrade')->withInput();
        };
        $this->BarangGrade->save([
            'grade' => $this->request->getVar('grade'),
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
    // Delete
    public function deleteKeterangan()
    {
        $id = $this->request->getVar('idKeterangan');
        $this->BarangKeterangan->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/' . $this->controller);
    }
    public function deleteJenis()
    {
        $id = $this->request->getVar('idJenis');
        $this->BarangJenis->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/' . $this->controller);
    }
    public function deleteGrade()
    {
        $id = $this->request->getVar('idGrade');
        $this->BarangGrade->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/' . $this->controller);
    }
}
