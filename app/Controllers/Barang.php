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
        $this->BarangUkuran = new \App\Models\BarangUkuranModel();
        $this->BarangLot = new \App\Models\BarangLotModel();
    }

    public $controller = 'Barang';
    public function index()
    {
        $dataJenis = $this->BarangJenis->findAll();
        $dataKeterangan = $this->BarangKeterangan->findAll();
        $dataGrade = $this->BarangGrade->findAll();
        $dataLot = $this->BarangLot->findAll();
        $dataUkuran = $this->BarangUkuran->findAll();
        $data = [
            'judul' => 'Barang',
            'dataJenis' => $dataJenis,
            'dataKeterangan' => $dataKeterangan,
            'dataGrade' => $dataGrade,
            'dataLot' => $dataLot,
            'dataUkuran' => $dataUkuran
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
    // Tambah Lot
    public function tambahLot()
    {

        $data = [
            'judul' => $this->controller,
            'aksi' => ' / Tambah Data',
            'validation' => \Config\Services::validation(),
        ];
        return view($this->controller . '/tambahLot', $data);
    }
    // Tambah Ukuran
    public function tambahUkuran()
    {

        $data = [
            'judul' => $this->controller,
            'aksi' => ' / Tambah Data',
            'validation' => \Config\Services::validation(),
        ];
        return view($this->controller . '/tambahUkuran', $data);
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
    // Save lot
    public function saveLot()
    {
        // Validasi
        if (!$this->validate([
            'lot' => [
                'rules' => 'required|is_unique[barang_lot.lot]',
                'errors' => [
                    'required' => 'Masukan lot !',
                    'is_unique' => 'lot harus unik !'
                ]

            ]
        ])) {
            return redirect()->to('/' . $this->controller . '/tambahLot')->withInput();
        };
        $this->BarangLot->save([
            'lot' => $this->request->getVar('lot'),
        ]);
        session()->setFlashdata('pesan', 'Data lot barang berhasil ditambah');
        return redirect()->to('/' . $this->controller);
    }
    // Save ukuran
    public function saveUkuran()
    {
        // Validasi
        if (!$this->validate([
            'ukuran' => [
                'rules' => 'required|is_unique[barang_ukuran.ukuran]',
                'errors' => [
                    'required' => 'Masukan ukuran !',
                    'is_unique' => 'ukuran harus unik !'
                ]

            ]
        ])) {
            return redirect()->to('/' . $this->controller . '/tambahUkuran')->withInput();
        };
        $this->BarangUkuran->save([
            'ukuran' => $this->request->getVar('ukuran'),
        ]);
        session()->setFlashdata('pesan', 'Data ukuran barang berhasil ditambah');
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
        return view('/' . $this->controller . '/ubahJenis', $data);
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

    // edit Lot
    public function editLot($id)
    {
        $data = [
            'judul' => $this->controller,
            'aksi' => ' / Ubah Data',
            'validation' => \Config\Services::validation(),
            'data'  => $this->BarangLot->getData($id),
        ];
        return view('/' . $this->controller . '/ubahLot', $data);
    }
    // Update Lot
    public function updateLot($id)
    {
        //Validasi
        if (!$this->validate([
            'lot' => [
                'rules' => 'required|is_unique[barang_lot.lot]',
                'errors' => [
                    'required' => 'Masukan lot !',
                    'is_unique' => 'lot harus unik !'
                ]
            ]
        ])) {
            return redirect()->to('/' . $this->controller . '/edit')->withInput();
        };
        $this->BarangLot->save([
            'id' => $id,
            'lot' => $this->request->getVar('lot'),
        ]);

        session()->setFlashdata('pesan', 'Data lot barang berhasil diubah');
        return redirect()->to('/' . $this->controller);
    }

    // edit Ukuran
    public function editUkuran($id)
    {
        $data = [
            'judul' => $this->controller,
            'aksi' => ' / Ubah Data',
            'validation' => \Config\Services::validation(),
            'data'  => $this->BarangUkuran->getData($id),
        ];
        return view('/' . $this->controller . '/ubahUkuran', $data);
    }
    // Update Ukuran
    public function updateUkuran($id)
    {
        //Validasi
        if (!$this->validate([
            'ukuran' => [
                'rules' => 'required|is_unique[barang_ukuran.ukuran]',
                'errors' => [
                    'required' => 'Masukan ukuran !',
                    'is_unique' => 'ukuran harus unik !'
                ]
            ]
        ])) {
            return redirect()->to('/' . $this->controller . '/edit')->withInput();
        };
        $this->BarangUkuran->save([
            'id' => $id,
            'ukuran' => $this->request->getVar('ukuran'),
        ]);

        session()->setFlashdata('pesan', 'Data ukuran barang berhasil diubah');
        return redirect()->to('/' . $this->controller);
    }


    // Delete
    public function deleteKeterangan()
    {
        $id = $this->request->getVar('idKeterangan');
        $this->BarangKeterangan->delete($id);
        session()->setFlashdata('pesan', 'Data Keterangan barang berhasil dihapus');
        return redirect()->to('/' . $this->controller);
    }
    public function deleteJenis()
    {
        $id = $this->request->getVar('idJenis');
        $this->BarangJenis->delete($id);
        session()->setFlashdata('pesan', 'Data Jenis barang berhasil dihapus');
        return redirect()->to('/' . $this->controller);
    }
    public function deleteGrade()
    {
        $id = $this->request->getVar('idGrade');
        $this->BarangGrade->delete($id);
        session()->setFlashdata('pesan', 'Data Grade barang berhasil dihapus');
        return redirect()->to('/' . $this->controller);
    }
    public function deleteLot()
    {
        $id = $this->request->getVar('idLot');
        $this->BarangLot->delete($id);
        session()->setFlashdata('pesan', 'Data Lot barang berhasil dihapus');
        return redirect()->to('/' . $this->controller);
    }
    public function deleteUkuran()
    {
        $id = $this->request->getVar('idUkuran');
        $this->BarangUkuran->delete($id);
        session()->setFlashdata('pesan', 'Data Ukuran barang berhasil dihapus');
        return redirect()->to('/' . $this->controller);
    }
}
