<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class StockBarangDetail extends BaseController
{
    // model yang dibutuhkan
    // protected $userModel;
    public function __construct()
    {
        $this->StockBarangModel = new \App\Models\StockBarangModel();
        $this->StockBarangDetailModel = new \App\Models\StockBarangDetailModel();
        $this->PenyimpananBarangModel = new \App\Models\PenyimpananBarangModel();
    }
    public $controllerMain = 'StockBarang';
    public $controller = 'StockBarangDetail';
    public function index($id)
    {
        $modelMain = $this->controllerMain . 'Model';
        $model = $this->controller . 'Model';
        $data = [
            'judul' => $this->controller,
            'judulMain' => $this->controllerMain,
            'aksi' => ' / Detail Data',
            'validation' => \Config\Services::validation(),
            'dataMain' => $this->$modelMain->getDataStockDetail($id),
            'data'  => $this->$model->getStockBarangDetail($id),
        ];
        return view($this->controller . '/index', $data);
    }
    public function edit($id)
    {
        $model = $this->controller . 'Model';
        $id_stock = $this->StockBarangDetailModel->where('id_stock_detail', $id)->findColumn('id_stock')[0];
        $id_barang = $this->StockBarangModel->where('id_stock', $id_stock)->findColumn('id_barang')[0];
        $data = [
            'judul' => $this->controller,
            'aksi' => ' / Ubah Data',
            'validation' => \Config\Services::validation(),
            'data'  => $this->$model->getDataDetail($id),
            'dataPenyimpanan' => $this->PenyimpananBarangModel->where('id_barang', $id_barang)->where('status_penyimpanan', 0)->findAll()
        ];
        return view('/' . $this->controller . '/ubah', $data);
    }
    public function update($id)
    {
        if (!$this->validate([
            'posisi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data tidak boleh kosong!',

                ]
            ]
        ])) {
            return redirect()->to('/' . $this->controller . '/edit/' . $id)->withInput();
        };
        $model = $this->controller . 'Model';
        $id_penyimpnan = $this->request->getVar('posisi');
        $posisi =  $this->PenyimpananBarangModel->where('id_penyimpanan', $id_penyimpnan)->findColumn('posisi_barang')[0];


        $berat_detail =  (int) $this->$model->where('id_stock_detail', $id)->findColumn('berat_detail')[0];
        $disimpan = (int) $this->PenyimpananBarangModel->where('id_penyimpanan', $id_penyimpnan)->findColumn('disimpan')[0];
        $berat_baru_disimpan = $berat_detail + $disimpan;
        $max_disimpan = (int) $this->PenyimpananBarangModel->where('id_penyimpanan', $id_penyimpnan)->findColumn('berat_penyimpanan')[0];
        $sisa = $berat_baru_disimpan - $max_disimpan;


        $berat_baru_disimpan = $berat_detail + $disimpan;
        $max_disimpan = (int) $this->PenyimpananBarangModel->where('id_penyimpanan', $id_penyimpnan)->findColumn('berat_penyimpanan')[0];

        if ($berat_baru_disimpan > $max_disimpan) {
            $sisa = $berat_baru_disimpan - $max_disimpan;
            $disimpan_sekarang = $max_disimpan;
        } else {
            $sisa = 0;
            $disimpan_sekarang = $berat_baru_disimpan;
        }

        $this->PenyimpananBarangModel->save([
            'id_penyimpanan' => $id_penyimpnan,
            'disimpan' => $disimpan_sekarang,
        ]);
        // cek penuh
        if ($max_disimpan == $disimpan_sekarang) {
            $this->PenyimpananBarangModel->save([
                'id_penyimpanan' => $id_penyimpnan,
                'status_penyimpanan' => 1
            ]);
        }

        // jika ada sisa        
        // 2500                

        if ($sisa >= 1) {
            for ($index = 0; $index <= 100; $index++) {
                $id_barang = $this->PenyimpananBarangModel->where('id_penyimpanan', $id_penyimpnan)->findColumn('id_barang');
                $id_penyimpanan_sisa = $this->PenyimpananBarangModel->where('id_barang', $id_barang)->where('status_penyimpanan', 0)->findColumn('id_penyimpanan')[0];
                $disimpan_sisa = (int) $this->PenyimpananBarangModel->where('id_penyimpanan', $id_penyimpanan_sisa)->findColumn('disimpan')[0];
                $max_disimpan_sisa = (int) $this->PenyimpananBarangModel->where('id_penyimpanan', $id_penyimpanan_sisa)->findColumn('berat_penyimpanan')[0];

                // = 2500 + 0
                $berat_baru_disimpan_sisa = $sisa + $disimpan_sisa;

                // = 2500 > 1500
                if ($berat_baru_disimpan_sisa > $max_disimpan_sisa) {
                    // = 1500
                    $disimpan_sekarang = $max_disimpan_sisa;

                    // 2500 - 
                    $sisa = $sisa - $disimpan_sekarang;
                    $status = 1;
                } else {
                    $status = 0;
                    $disimpan_sekarang = $sisa;
                    $sisa = 0;
                }

                $this->PenyimpananBarangModel->save([
                    'id_penyimpanan' => $id_penyimpanan_sisa,
                    'disimpan' => $disimpan_sekarang,
                    'status_penyimpanan' => $status
                ]);

                // cek penuh
                if (($sisa <= 0)) {
                    $index = 99;
                }
                $index++;
            }
        }
        $this->$model->save([
            'id_stock_detail' => $id,
            'posisi' => $posisi,
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/' . $this->controller . '/index/' . $this->request->getVar('id_stock'));
    }
    public function dariBPB($id_barang)
    {
        $id_stock = $this->StockBarangModel->where('id_barang', $id_barang)->findColumn('id_stock')[0];

        $modelMain = $this->controllerMain . 'Model';
        $model = $this->controller . 'Model';
        $data = [
            'judul' => $this->controller,
            'judulMain' => $this->controllerMain,
            'aksi' => ' / Detail Data',
            'validation' => \Config\Services::validation(),
            'dataMain' => $this->$modelMain->getDataStockDetail($id_stock),
            'data'  => $this->$model->getStockBarangDetail($id_stock),
        ];
        return view($this->controller . '/index', $data);
    }
}
