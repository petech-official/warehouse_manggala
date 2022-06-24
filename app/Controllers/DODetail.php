<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DODetail extends BaseController
{
    // model yang dibutuhkan
    // protected $userModel;
    public function __construct()
    {
        $this->DODetailModel = new \App\Models\DODetailModel();
        $this->DOModel = new \App\Models\DOModel();
        $this->SOModel = new \App\Models\SOModel();
        $this->SODetailModel = new \App\Models\SODetailModel();
        $this->BarangModel = new \App\Models\BarangModel();
        $this->BarangGradeModel = new \App\Models\BarangGradeModel();
        $this->StockBarangModel = new \App\Models\StockBarangModel();
    }

    public $controller = 'DODetail';
    public $controllerMain = 'DO';
    public function index($id)
    {
        $modelMain = $this->controllerMain . 'Model';
        $model = $this->controller . 'Model';
        $data = [
            'judul' => $this->controller,
            'judulMain' => $this->controllerMain,
            'aksi' => ' / Detail Data',
            'validation' => \Config\Services::validation(),
            'dataMain' => $this->$model->getDO($id),
            'data'  => $this->$model->getDODetail($id),
        ];
        return view($this->controller . '/index', $data);
    }
    public function tambah($id)
    {
        $model = $this->controller . 'Model';
        $data = [
            'id_do' => $id,
            'judul' => $this->controller,
            'aksi' => ' / Tambah Data',
            'validation' => \Config\Services::validation(),
            'dataBarang' => $this->$model->getBarang($id)
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
            'berat_total' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan berat !',
                ]
            ],
        ])) {
            return redirect()->to('/' . $this->controller . '/tambah/' .  $this->request->getVar('id_do'))->withInput();
        };
        // $id_do = $this->request->getVar('id_do');
        $barang = $this->BarangModel->getData($this->request->getVar('id_barang'));
        // $grade = $this->BarangModel->where('id_barang', $this->request->getVar('id_barang'))->find()[0]['id_grade'];
        // $gradeStandar = $this->BarangGradeModel->where('id', 1)->find()[0]['id'];

        // if ($grade == $gradeStandar) {
        $barang = $this->BarangModel->getData($this->request->getVar('id_barang'));
        $Box = ceil($this->request->getVar('berat_total') / $barang['berat']);
        $totalBerat = $barang['berat'] * $Box;
        // } else {
        //     if ($this->request->getVar('berat_total') == '') {
        //         return redirect()->to('/' . $this->controller . '/tambah/' . $id_do)->withInput();
        //     }
        //     $totalBerat = ceil($this->request->getVar('berat_total'));
        // }

        $model = $this->controller . 'Model';
        $this->$model->save([
            'id_do' => $this->request->getVar('id_do'),
            'id_barang' => $this->request->getVar('id_barang'),
            'box' => $Box,
            'berat_total' => $totalBerat,

        ]);

        // Motong SO
        $id_so = $this->DOModel->where('id_do', $this->request->getVar('id_do'))->find()[0]['id_so'];;
        $GetQuantitas = $this->SODetailModel->getSoDetailBarang($id_so, $this->request->getVar('id_barang'), 0);
        $QuantitasAwal = $GetQuantitas['quantitas'];
        $QuantitasBaru = $GetQuantitas['quantitas_mutasi'] + $Box;
        $BeratAwal = $GetQuantitas['berat_total'];
        $BeratBaru = $GetQuantitas['berat_total_mutasi'] + $totalBerat;

        // Ganti Status
        if ($QuantitasBaru >= $QuantitasAwal and $BeratBaru >= $BeratAwal) {
            $status = 1;
        } else {
            $status = 0;
        }

        //so detail
        $this->SODetailModel->save([
            'id_so_detail' => $GetQuantitas['id_so_detail'],
            'id_so' => $id_so,
            'id_barang' => $this->request->getVar('id_barang'),
            'quantitas_mutasi' => $QuantitasBaru,
            'berat_total_mutasi' => $BeratBaru,
            'status_so' => $status
        ]);

        // so        
        $statusSO = $this->SODetailModel->GetStatus($id_so)[0]['status_so'];
        if ((int)$statusSO == 1) {
            $this->SOModel->save([
                'id_so' => $id_so,
                'status' => 1
            ]);
        };

        // Motong Stock        
        $id_stock = ($this->StockBarangModel->getIdStock($barang['id_barang']));
        $box_stock = ($this->StockBarangModel->getBoxStock($barang['id_barang']))['box'];
        $berat_stock = ($this->StockBarangModel->getBeratStock($barang['id_barang']))['berat_total'];
        $this->StockBarangModel->save([
            'id_stock' => $id_stock['id_stock'],
            'id_barang' => $barang['id_barang'],
            'box' => (int)$box_stock -  $Box,
            'berat_total' => (int)$berat_stock - $totalBerat,
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambah');
        return redirect()->to('/' . $this->controller . '/index/' . $this->request->getVar('id_do'));
    }
    public function edit($id)
    {
        $model = $this->controller . 'Model';
        $data = [
            'judul' => $this->controller,
            'aksi' => ' / Ubah Data',
            'validation' => \Config\Services::validation(),
            'data'  => $this->$model->getData($id),
            'dataBarang' => $this->BarangModel->getBarang()
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
        return redirect()->to('/dorder');
    }
}
