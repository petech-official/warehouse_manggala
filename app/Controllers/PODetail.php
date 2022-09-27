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
        $this->BarangGradeModel = new \App\Models\BarangGradeModel();
        $this->StockBarangModel = new \App\Models\StockBarangModel();
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

        $supplier = $this->POModel->getData($id)['id_supplier'];

        $data = [
            'id_po_detail' => $id,
            'id_po' => $id,
            'judul' => $this->controller,
            'aksi' => ' / Tambah Data',
            'validation' => \Config\Services::validation(),
            'dataBarang' => $this->BarangModel->getBarangPO($supplier)
        ];

        return view($this->controller . '/tambah', $data);
    }
    public function save()
    {
        $id_po = $this->request->getVar('id_po');
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
        ])) {

            return redirect()->to('/' . $this->controller . '/tambah/' . $id_po)->withInput();
        };


        // $grade = $this->BarangModel->where('id_barang', $this->request->getVar('id_barang'))->find()[0]['id_grade'];
        // $gradeStandar = $this->BarangGradeModel->where('id', 1)->find()[0]['id'];
        $BeratPO = $this->request->getVar('berat_total');

        // if ($grade == $gradeStandar) {

        $barang = $this->BarangModel->getData($this->request->getVar('id_barang'));
        $beratBarang = $barang['berat'];
        $box = ceil($BeratPO / $beratBarang);

        // } else {
        //     if ($this->request->getVar('berat_total') == '') {
        //         return redirect()->to('/' . $this->controller . '/tambah/' . $id_po)->withInput();
        //     }
        //     $beratBarang = $this->request->getVar('berat_total');
        //     $box = ceil($this->request->getVar('quantitas'));
        // }

        $model = $this->controller . 'Model';
        $this->$model->save([
            'id_po' => $this->request->getVar('id_po'),
            'id_barang' => $this->request->getVar('id_barang'),
            'quantitas' => $box,
            'berat_total' => $BeratPO,
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
        // if (!$this->validate([
        //     'id_barang' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Data tidak boleh kosong!',
        //         ]
        //     ],
        //     // 'quantitas' => [
        //     //     'rules' => 'required',
        //     //     'errors' => [
        //     //         'required' => 'Masukan quantitas !',
        //     //     ]
        //     // ],
        // ])) {
        //     return redirect()->to('/' . $this->controller . '/edit')->withInput();
        // };
        $model = $this->controller . 'Model';
        // $barang = $this->BarangModel->getData($this->request->getVar('id_barang'));
        // $totalBerat = $barang['berat'] * $this->request->getVar('quantitas');

        $this->$model->save([
            'id_po_detail' => $id,
            // 'id_po' => $this->request->getVar('id_po'),
            // 'id_barang' => $this->request->getVar('id_barang'),
            // 'quantitas' => $this->request->getVar('quantitas'),
            // 'berat_total' => $totalBerat,
            'keterangan_po_detail' => $this->request->getVar('keterangan_po_detail'),
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
    public function getBeratMax()
    {

        $id = $this->request->getPost('IdBarang');
        // Cari max berat
        $max = $this->BarangModel->where('id_barang', $id)->findColumn('max_berat')[0];
        $stock = $this->StockBarangModel->where('id_barang', $id)->findColumn('berat_total')[0];
        // $stock = $this->StockBarangModel->where('id_barang', $id)->findColumn['berat_total'];
        $total = (int) $max - (int) $stock;
        echo json_encode($total);
    }
    public function tambahAutomatisBarang($id_po)
    {

        $id_supplier = $this->POModel->where('id_po', $id_po)->findColumn('id_supplier')[0];
        $barang =  $this->StockBarangModel->getKebutuhanAutomatis($id_supplier);
        $model = $this->controller . 'Model';
        foreach ($barang as $key => $value) {
            $this->$model->save([
                'id_po' => $id_po,
                'id_barang' => $value['id_barang'],
                'quantitas' => (($value['max_berat'] / $value['berat']) - $value['box']),
                'berat_total' => ($value['max_berat'] - $value['berat_total']),
                'keterangan_po_detail' => "",
            ]);

            $this->StockBarangModel->save([
                'id_stock' => $this->StockBarangModel->where('id_barang', $value['id_barang'])->findColumn('id_stock')[0],
                'id_barang' => $value['id_barang'],
                'status_pengadaan' => 1
            ]);
        }

        session()->setFlashdata('pesan', 'Data berhasil ditambah');
        return redirect()->to('/' . $this->controller . '/index/' . $id_po);
    }
}
