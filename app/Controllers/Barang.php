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
        session()->setFlashdata('pesan', 'Data keterangan barang berhasil ditambah');
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
        session()->setFlashdata('pesan', 'Data jenis barang berhasil ditambah');
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
        session()->setFlashdata('pesan', 'Data grade barang berhasil ditambah');
        return redirect()->to('/' . $this->controller);
    }

    // edit Grade
    public function editGrade($id)
    {
        $data = [
            'judul' => $this->controller,
            'aksi' => ' / Ubah Data',
            'validation' => \Config\Services::validation(),
            'data'  => $this->BarangGrade->getData($id),
        ];
        return view('/' . $this->controller . '/ubahGrade', $data);
    }
    // Update Grade
    public function updateGrade($id)
    {
        //Validasi
        if (!$this->validate([
            'grade' => [
                'rules' => 'required|is_unique[barang_grade.grade]',
                'errors' => [
                    'required' => 'Masukan grade !',
                    'is_unique' => 'grade harus unik !'
                ]
            ]
        ])) {
            return redirect()->to('/' . $this->controller . '/edit')->withInput();
        };
        $this->BarangGrade->save([
            'id' => $id,
            'grade' => $this->request->getVar('grade'),
        ]);

        session()->setFlashdata('pesan', 'Data grade barang berhasil diubah');
        return redirect()->to('/' . $this->controller);
    }

    // edit keterangan
    public function editKeterangan($id)
    {
        $data = [
            'judul' => $this->controller,
            'aksi' => ' / Ubah Data',
            'validation' => \Config\Services::validation(),
            'data'  => $this->BarangKeterangan->getData($id),
        ];
        return view('/' . $this->controller . '/ubahKeterangan', $data);
    }
    // Update keterangan
    public function updateketerangan($id)
    {
        //Validasi
        if (!$this->validate([
            'keterangan' => [
                'rules' => 'required|is_unique[barang_keterangan.keterangan]',
                'errors' => [
                    'required' => 'Masukan keterangan !',
                    'is_unique' => 'keterangan harus unik !'
                ]
            ]
        ])) {
            return redirect()->to('/' . $this->controller . '/edit')->withInput();
        };
        $this->BarangKeterangan->save([
            'id' => $id,
            'keterangan' => $this->request->getVar('keterangan'),
        ]);

        session()->setFlashdata('pesan', 'Data keterangan barang berhasil diubah');
        return redirect()->to('/' . $this->controller);
    }

    // edit jenis
    public function editJenis($id)
    {
        $data = [
            'judul' => $this->controller,
            'aksi' => ' / Ubah Data',
            'validation' => \Config\Services::validation(),
            'data'  => $this->BarangJenis->getData($id),
        ];
        return view('/' . $this->controller . '/ubahjenis', $data);
    }
    // Update jenis
    public function updateJenis($id)
    {
        //Validasi
        if (!$this->validate([
            'jenis' => [
                'rules' => 'required|is_unique[barang_jenis.jenis]',
                'errors' => [
                    'required' => 'Masukan jenis !',
                    'is_unique' => 'jenis harus unik !'
                ]
            ]
        ])) {
            return redirect()->to('/' . $this->controller . '/edit')->withInput();
        };
        $this->BarangJenis->save([
            'id' => $id,
            'jenis' => $this->request->getVar('jenis'),
        ]);

        session()->setFlashdata('pesan', 'Data jenis barang berhasil diubah');
        return redirect()->to('/' . $this->controller);
    }


    // Delete
    public function deleteKeterangan()
    {
        $id = $this->request->getVar('idKeterangan');
        $this->BarangKeterangan->delete($id);
        session()->setFlashdata('pesan', 'Data keterangan barang berhasil dihapus');
        return redirect()->to('/' . $this->controller);
    }
    public function deleteJenis()
    {
        $id = $this->request->getVar('idJenis');
        $this->BarangJenis->delete($id);
        session()->setFlashdata('pesan', 'Data jenis barang berhasil dihapus');
        return redirect()->to('/' . $this->controller);
    }
    public function deleteGrade()
    {
        $id = $this->request->getVar('idGrade');
        $this->BarangGrade->delete($id);
        session()->setFlashdata('pesan', 'Data grade barang berhasil dihapus');
        return redirect()->to('/' . $this->controller);
    }
}
