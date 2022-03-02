<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use phpDocumentor\Reflection\Types\This;
use PhpParser\Node\Stmt\Echo_;

class BPB extends BaseController
{
    // model yang dibutuhkan
    // protected $userModel;
    public function __construct()
    {
        $this->BPBModel = new \App\Models\BPBModel();
        $this->POModel = new \App\Models\POModel();
        $this->PODetailModel = new \App\Models\PODetailModel();
        $this->BarangModel = new \App\Models\BarangModel();
        $this->BarangGradeModel = new \App\Models\BarangGradeModel();
    }

    public $controller = 'BPB';
    public function index()
    {

        $model = $this->controller . 'Model';
        $data = [
            'judul' => $this->controller,
            'data' => $this->$model->findAll(),
            'dataPO' => $this->$model->getPO(),
        ];
        return view($this->controller . '/index', $data);
    }
    public function tambah()
    {
        $data = [
            'judul' => $this->controller,
            'aksi' => ' / Tambah Data',
            'validation' => \Config\Services::validation(),
            'dataPO' => $this->POModel->where('status', 0)->findAll()
        ];
        return view($this->controller . '/tambah', $data);
    }
    public function save()
    {
        //Validasi

        if (!$this->validate([
            'tgl_bpb' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan tgl_bpb !',
                ]
            ],
            'no_surat_jalan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan no_surat_jalan !',
                ]
            ],
            'packing_list' => [

                'rules' => 'max_size[packing_list,1024]|ext_in[packing_list,pdf]',
                'errors' => [
                    'max_size' => 'Ukuran harus dibawah 1 Mb !',
                    'ext_in' => 'Yang anda pilih bukan document !',
                ]
            ],
            'supir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan supir !',
                ]
            ],
            'no_mobil' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan no_mobil !',
                ]
            ],
            'po' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan po !',
                ]
            ],
            'barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan barang !',
                ]
            ],
            'quantitas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan box !',
                ]
            ],
        ])) {

            return redirect()->to('/' . $this->controller . '/tambah')->withInput();
        };

        $filePackingList = $this->request->getFile('packing_list');

        $kosong = $filePackingList->getName();
        if ($kosong == '') {
            return redirect()->to('/' . $this->controller . '/tambah')->withInput();
        }
        $model = $this->controller . 'Model';
        // cek jumlah bpb

        if ($this->$model->countAllResults() == 0) {
            $BPBTerakhir = substr("BPB00000000", 7);
            $cekbulantahun = substr("BPB00000000", 3, -4);
        } else {
            $BPBTerakhir = substr($this->$model->getNoBPB('no_bpb')[0]['no_bpb'], 7);
            $cekbulantahun = substr($this->$model->getNoBPB('no_bpb')[0]['no_bpb'], 3, -4);
        }

        $cekbulan = substr($cekbulantahun, 2);
        $cektahun = substr($cekbulantahun, 0, -2);

        if ($cekbulan != date('m')) {
            $BPBBaru = 1;
            $BPBBaru = sprintf("%04d", $BPBBaru);
        } elseif ($cektahun != date('y')) {
            $BPBBaru = 1;
            $BPBBaru = sprintf("%04d", $BPBBaru);
        } else {
            $BPBTerakhir = intval(ltrim($BPBTerakhir, '0'));
            $BPBBaru = $BPBTerakhir + 1;
            $BPBBaru = sprintf("%04d", $BPBBaru);
        }

        $pieces = explode("/", $this->request->getVar('tgl_bpb'));
        $tanggal = $pieces[2] . '-' . $pieces[1] . '-' . $pieces[0];

        // cek barang standar
        // Motong PO
        // ambil quantitas standar
        $barang_po = $this->request->getVar('barang');
        $id_barang = $this->PODetailModel->where('id_po_detail', $barang_po)->find()[0]['id_barang'];
        $grade = $this->BarangModel->where('id_barang', $id_barang)->find()[0]['id_grade'];
        $gradeStandar = $this->BarangGradeModel->where('id', 1)->find()[0]['id'];
        $PO = $this->POModel->where('id_po', $this->request->getVar('po'))->find()[0]['no_po'];
        $GetQuantitas = $this->PODetailModel->getPoDetailBarang($this->request->getVar('po'), $this->request->getVar('barang'), 0);
        $barang = $this->BarangModel->getData($GetQuantitas['id_barang']);
        $QuantitasAwal = $GetQuantitas['quantitas'];
        $QuantitasBaru = $GetQuantitas['quantitas_mutasi'] + $this->request->getVar('quantitas');

        $BeratAwal = $GetQuantitas['berat_total'];

        if ($grade == $gradeStandar) {
            $totalBerat = $barang['berat'] * $this->request->getVar('quantitas');
            $beratBaru = $barang['berat'] * $QuantitasBaru;
        } else {
            if ($this->request->getVar('berat_total') == '') {
                return redirect()->to('/' . $this->controller . '/tambah')->withInput();
            }
            $totalBerat = $this->request->getVar('berat_total');
            $beratBaru = $GetQuantitas['berat_total_mutasi'] + $totalBerat;
        }

        // Ganti Status
        if ($QuantitasBaru >= $QuantitasAwal and $beratBaru >= $BeratAwal) {
            $status = 1;
        } else {
            $status = 0;
        }
        //ambil document
        $filePackingList = $this->request->getFile('packing_list');

        if ($filePackingList->getError() == 4) {
            $namaPackingList = 'default.txt';
        } else {
            // Generate nama random
            // cari extensi
            $namaPackingList = $filePackingList->getName();
            $pecah = explode(".", $namaPackingList);
            $namaPackingList = 'BPB' .  date('ym') . $BPBBaru;
            // pindahkan file ke folder img            
            $filePackingList->move('packing_list', $namaPackingList . '.' . $pecah[1]);
        }


        $this->$model->save([
            'no_bpb' => 'BPB' . date('ym') . $BPBBaru,
            'tgl_bpb' => $tanggal,
            'no_surat_jalan' => $this->request->getVar('no_surat_jalan'),
            'no_mobil' => $this->request->getVar('no_mobil'),
            'no_po' => $PO,
            'id_po_detail' => $this->request->getVar('barang'),
            'quantitas' => $this->request->getVar('quantitas'),
            'berat' => $totalBerat,
            'packing_list' => $namaPackingList . '.' . $pecah[1],
            'supir' => $this->request->getVar('supir'),

        ]);


        // po detail status
        $this->PODetailModel->save([
            'id_po_detail' => $GetQuantitas['id_po_detail'],
            'quantitas_mutasi' => $QuantitasBaru,
            'berat_total_mutasi' => $beratBaru,
            'status_po' => $status
        ]);


        // po
        $ID_PO = $this->PODetailModel->getIdPO($GetQuantitas['id_po_detail']);
        $statusPO = $this->PODetailModel->GetStatus($ID_PO)[0]['status_po'];
        if ((int)$statusPO == 1) {

            $this->POModel->save([
                'id_po' => $ID_PO,
                'status' => 1
            ]);
            // echo "1";
            // die;
        };
        // echo "2";
        // die;
        // $int = (int)$status;
        // dd($status);




        session()->setFlashdata('pesan', 'Data berhasil ditambah');
        return redirect()->to('/' . $this->controller);
    }
    public function edit($id)
    {
        $model = $this->controller . 'Model';
        $barang = $this->$model->getData($id)['no_po'];
        $po = $this->POModel->where('no_po', $barang)->find();
        $barang = $po[0]['id_po'];

        $id_bpb = $this->$model->getData($id)['id_bpb'];
        $id_po_detail = $this->$model->getData($id)['id_po_detail'];

        $data = $this->$model->getPODetailBarang($id_bpb, $id_po_detail);

        $data = [
            'judul' => $this->controller,
            'aksi' => ' / Ubah Data',
            'validation' => \Config\Services::validation(),
            'data'  => $this->$model->getData($id),
            'dataIdBarang' => $this->$model->getPODetailBarang($id_bpb, $id_po_detail),
            'dataPO' => $this->POModel->where('status', 0)->findAll(),
            'dataBarang' => $this->$model->getBarang($barang)
        ];
        return view('/' . $this->controller . '/ubah', $data);
    }
    public function update($id)
    {
        //Validasi
        if (!$this->validate([
            'tgl_bpb' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan tgl_bpb !',
                ]
            ],
            'no_surat_jalan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan no_surat_jalan !',
                ]
            ],

            'packing_list' => [
                'rules' => 'max_size[packing_list,1024]|ext_in[packing_list,pdf]',
                'errors' => [
                    'max_size' => 'Ukuran harus dibawah 1 Mb !',
                    'ext_in' => 'Yang anda pilih bukan document !',
                ]
            ],
            'supir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan supir !',
                ]
            ],
            'no_mobil' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan no_mobil !',
                ]
            ],
            'po' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan po !',
                ]
            ],
            'barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan barang !',
                ]
            ],
            'quantitas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan box !',
                ]
            ],
            'berat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan berat !',
                ]
            ],
        ])) {
            return redirect()->to('/' . $this->controller . '/edit/' . $id)->withInput();
        };
        $pieces = explode("/", $this->request->getVar('tgl_bpb'));
        $tanggal = $pieces[2] . '-' . $pieces[1] . '-' . $pieces[0];

        $model = $this->controller . 'Model';

        $PO = $this->POModel->where('id_po', $this->request->getVar('po'))->find()[0]['no_po'];

        $model = $this->controller . 'Model';
        $filePackingList = $this->request->getFile('packing_list');
        // cek gambar, apakah tetap ?      

        $packingListLama = $this->$model->where('id_bpb', $id)->findAll()[0]['packing_list'];


        if ($filePackingList != '') {

            unlink('packing_list/' .  $packingListLama);
            //generate random nama        
            $namaPackingList = $filePackingList->getName();
            $pecah = explode(".", $namaPackingList);

            $BPBBaru = substr($this->$model->getNoBPB('no_bpb')[0]['no_bpb'], 7);
            $namaPackingList = 'BPB' .  date('ym') . $BPBBaru . '.' . $pecah[1];

            // pindahkan file ke folder packing
            $filePackingList->move('packing_list', $namaPackingList);
            //hapus file lama
        } else {
            $namaPackingList = $this->$model->where('id_bpb', $id)->findAll()[0]['packing_list'];
        }

        $id_po_detail = $this->PODetailModel->where('id_barang', $this->request->getVar('barang'))->findAll()[0]['id_po_detail'];


        $this->$model->save([
            'id_bpb' => $id,
            'tgl_bpb' => $tanggal,
            'no_surat_jalan' => $this->request->getVar('no_surat_jalan'),
            'packing_list' => $namaPackingList,
            'no_mobil' => $this->request->getVar('no_mobil'),
            'no_po' => $PO,
            'id_po_detail' => $id_po_detail,
            'quantitas' => $this->request->getVar('quantitas'),
            'berat' => $this->request->getVar('berat'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/' . $this->controller);
    }
    public function delete()
    {
        // cari gambar berdasarkan id
        $model = $this->controller . 'Model';
        $id = $this->request->getVar('id');
        $filePackingList = $this->$model->find($id);
        // cek jika gambar = default
        if ($filePackingList['packing_list'] != '') {
            // hapus gambar
            unlink('packing_list/' . $filePackingList['packing_list']);
        }
        $model = $this->controller . 'Model';
        $id = $this->request->getVar('id');
        $this->$model->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/' . $this->controller);
    }
    public function getPO()
    {

        $id = $this->request->getPost('namaPO');
        $dataPO = $this->PODetailModel->getPODetailBerjalan($id);
        echo json_encode($dataPO);
    }
}
