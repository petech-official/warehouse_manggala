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
        $this->StockBarangDetailModel = new \App\Models\StockBarangDetailModel();
        $this->PenyimpananBarangModel = new \App\Models\PenyimpananBarangModel();
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
            return redirect()->to('/' . $this->controller . '/tambah/' .  $this->request->getVar('id_do'))->withInput();
        };
        // $id_do = $this->request->getVar('id_do');
        $barang = $this->BarangModel->getData($this->request->getVar('id_barang'));
        // $grade = $this->BarangModel->where('id_barang', $this->request->getVar('id_barang'))->find()[0]['id_grade'];
        // $gradeStandar = $this->BarangGradeModel->where('id', 1)->find()[0]['id'];

        // if ($grade == $gradeStandar) {
        $barang = $this->BarangModel->getData($this->request->getVar('id_barang'));
        $Box = ceil($this->request->getVar('berat_total') / $barang['berat']);
        // otomatis
        // $totalBerat = $barang['berat'] * $Box;

        // inputan
        $totalBerat = $this->request->getVar('berat_total');
        // } else {
        //     if ($this->request->getVar('berat_total') == '') {
        //         return redirect()->to('/' . $this->controller . '/tambah/' . $id_do)->withInput();
        //     }
        //     $totalBerat = ceil($this->request->getVar('berat_total'));
        // }

        // 


        // die;

        $model = $this->controller . 'Model';
        $this->$model->save([
            'id_do' => $this->request->getVar('id_do'),
            'id_barang' => $this->request->getVar('id_barang'),
            'box' => $Box,
            'do_berat_total' => $totalBerat,

        ]);


        // Motong SO
        $id_so = $this->DOModel->where('id_do', $this->request->getVar('id_do'))->find()[0]['id_so'];;
        $GetQuantitas = $this->SODetailModel->getSoDetailBarang($id_so, $this->request->getVar('id_barang'), 0);
        $QuantitasAwal = $GetQuantitas['quantitas'];
        $QuantitasBaru = $GetQuantitas['quantitas_mutasi'] + $Box;
        $BeratAwal = $GetQuantitas['berat_total'];
        $BeratBaru = $GetQuantitas['berat_total_mutasi'] + $totalBerat;

        // // Ganti Status
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


        $beratbaru = $this->request->getVar('berat_total');
        $id_barang = $this->request->getVar('id_barang');
        $pengeluaran = $this->StockBarangModel->getPengeluaran($id_barang);

        if (count($pengeluaran) >= 3) {
            $pengeluaran3 = $pengeluaran[0]['do_berat_total'];
            $pengeluaran2 = $pengeluaran[1]['do_berat_total'];
            $pengeluaran1 = $pengeluaran[2]['do_berat_total'];

            // cari demand rata-rata
            $rata2pengeluaran = ($pengeluaran1 + $pengeluaran2 + $pengeluaran3) / 3;

            // Cari lead time
            $id_supplier = $this->BarangModel->getData($id_barang);

            $leadtime = $this->BarangModel->getLeadTime($id_supplier['id_supplier'], $id_barang);


            // service level
            $z = 1.34;

            // Safety Stock
            // standar deviasi
            $sd = sqrt(
                ((pow(($pengeluaran1 - $rata2pengeluaran), 2)) +
                    (pow(($pengeluaran2 - $rata2pengeluaran), 2)) +
                    (pow(($pengeluaran3 - $rata2pengeluaran), 2))) / 2
            );

            $akarleadtime = sqrt($leadtime['lead_time']);

            // standar deviasi * akar leadtime
            $sdl = $sd * $akarleadtime;

            // safetystock
            $safetyStock = $z * $sdl;

            // rop
            $rop = ($rata2pengeluaran * $leadtime['lead_time']) + $safetyStock;
        } else {
            $safetyStock = 0;
            $rop = 0;
        }


        // dd($pengeluaran1, 
        // $pengeluaran2, 
        // $pengeluaran3, 
        // $rata2pengeluaran, 
        // $leadtime['lead_time'],
        // $akarleadtime,
        // $z,
        // $sd, 
        // $sdl,
        // $safetyStock,
        // $rop
        // );

        // Motong Stock        
        $id_stock = ($this->StockBarangModel->getIdStock($barang['id_barang']));
        $box_stock = ($this->StockBarangModel->getBoxStock($barang['id_barang']))['box'];
        $berat_stock = ($this->StockBarangModel->getBeratStock($barang['id_barang']))['berat_total'];
        $this->StockBarangModel->save([
            'id_stock' => $id_stock['id_stock'],
            'id_barang' => $barang['id_barang'],
            'box' => (int)$box_stock -  $Box,
            'berat_total' => (int)$berat_stock - $totalBerat,
            'safetystock' => $safetyStock,
            'rop' => $rop
        ]);

        // end die

        // FIFO
        // Motong stock detail yang pertama
        // Cari ID stock detail yang id stock = 8
        $id_stock_detail = $this->StockBarangDetailModel->where('id_stock', $id_stock['id_stock'])->findColumn('id_stock_detail')[0];
        $posisi = $this->StockBarangDetailModel->where('id_stock', $id_stock['id_stock'])->findColumn('posisi')[0];
        // kurangi stock
        $stock_detail = $this->StockBarangDetailModel->where('id_stock_detail', $id_stock_detail)->findColumn('berat_detail')[0];

        while ($totalBerat != 0) {
            // 1200 A1
            $stock_detail = $this->StockBarangDetailModel->where('id_stock_detail', $id_stock_detail)->findColumn('berat_detail')[0];
            // pengurangan 1200 - 1400
            $update_stock_detail = (int)$stock_detail - abs($totalBerat);
            $this->StockBarangDetailModel->save([
                'id_stock_detail' => $id_stock_detail,
                'id_stock' => $id_stock['id_stock'],
                'berat_detail' => $update_stock_detail
            ]);
            if ($update_stock_detail > 0) {
                // berhenti
                $totalBerat = 0;
            } else {
                $this->StockBarangDetailModel->delete($id_stock_detail);
                $totalBerat = $update_stock_detail;
                $id_stock_detail = $id_stock_detail + 1;
            }
        }

        // motong penyimpanan
        $posisi = $this->StockBarangDetailModel->where('id_stock', $id_stock['id_stock'])->findColumn('posisi')[0];
        $id_penyimpnan = $this->PenyimpananBarangModel->where('posisi_barang', $posisi)->findColumn('id_penyimpanan')[0];

        // berat keluar        
        $disimpan = (int) $this->PenyimpananBarangModel->where('id_penyimpanan', $id_penyimpnan)->findColumn('disimpan')[0];

        //1500-3300
        $berat_baru_disimpan = $disimpan - $totalBerat;
        if ($berat_baru_disimpan < 0) {
            // 
            $berat_baru_disimpan = 0;
            // sisa 1500
            $sisa = abs($disimpan - $totalBerat);
        } else {
            $sisa = 0;
        }

        $this->PenyimpananBarangModel->save([
            'id_penyimpanan' => $id_penyimpnan,
            'disimpan' => $berat_baru_disimpan,
            'status_penyimpanan' => 0
        ]);


        // jika ada sisa     
        // 2000
        if ($sisa >= 1) {
            for ($index = 0; $index <= 100; $index++) {
                $id_barang = $this->PenyimpananBarangModel->where('id_penyimpanan', $id_penyimpnan)->findColumn('id_barang');
                $id_penyimpanan_sisa = $this->PenyimpananBarangModel->where('id_barang', $id_barang)->where('status_penyimpanan', 1)->findColumn('id_penyimpanan')[0];
                $disimpan_sisa = (int) $this->PenyimpananBarangModel->where('id_penyimpanan', $id_penyimpanan_sisa)->findColumn('disimpan')[0];

                // = 1500 - 2000
                $berat_baru_disimpan_sisa = $disimpan_sisa - $sisa;

                if ($berat_baru_disimpan_sisa < 0) {
                    // 
                    $berat_baru_disimpan_sisa = 0;
                    // sisa 300
                    $sisa = abs($disimpan_sisa - $sisa);
                } else {
                    $sisa = 0;
                }


                $this->PenyimpananBarangModel->save([
                    'id_penyimpanan' => $id_penyimpanan_sisa,
                    'disimpan' => $berat_baru_disimpan_sisa,
                    'status_penyimpanan' => 0
                ]);

                // cek penuh
                if (($sisa <= 0)) {
                    $index = 99;
                }
                $index++;
            }
        }

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
        return redirect()->to('/DOrder');
    }
}
