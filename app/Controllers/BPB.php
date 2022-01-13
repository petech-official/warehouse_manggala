<?php

namespace App\Controllers;

use App\Controllers\BaseController;

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
            'dataPO' => $this->POModel->findAll()
        ];
        return view($this->controller . '/tambah', $data);
    }
    public function save()
    {
        //Validasi
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


        // cek jumlah bpb

        if ($this->$model->countAllResults() == 0) {
            $BPBTerakhir = substr("BPB00000000", 7);
            $cekbulantahun = substr("BPB00000000", 3, -4);
            dd($BPBTerakhir, $cekbulantahun);
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

        $PO = $this->POModel->where('id_po', $this->request->getVar('po'))->find()[0]['no_po'];

        $barang = $this->BarangModel->getData($this->request->getVar('barang'));
        $totalBerat = $barang['berat'] * $this->request->getVar('quantitas');


        // Motong PO
        // ambil quantitas
        $GetQuantitas = $this->PODetailModel->where('id_po', $this->request->getVar('po'))->where('id_barang', $this->request->getVar('barang'))->find()[0];
        $QuantitasBaru = $GetQuantitas['quantitas'] - $this->request->getVar('quantitas');
        $beratBaru = $barang['berat'] * $QuantitasBaru;

        $this->PODetailModel->save([
            'id_po_detail' => $GetQuantitas['id_po_detail'],
            'quantitas' => $QuantitasBaru,
            'berat_total' => $beratBaru
        ]);

        $this->$model->save([
            'no_bpb' => 'BPB' . date('ym') . $BPBBaru,
            'tgl_bpb' => $tanggal,
            'no_surat_jalan' => $this->request->getVar('no_surat_jalan'),
            'no_mobil' => $this->request->getVar('no_mobil'),
            'no_po' => $PO,
            'id_barang' => $this->request->getVar('barang'),
            'quantitas' => $this->request->getVar('quantitas'),
            'berat' => $totalBerat
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambah');
        return redirect()->to('/' . $this->controller);
    }
    public function edit($id)
    {
        $model = $this->controller . 'Model';
        $barang = $this->$model->getData($id)['no_po'];
        $po = $this->POModel->where('no_po', $barang)->find();
        $barang = $po[0]['id_po'];
        $data = [
            'judul' => $this->controller,
            'aksi' => ' / Ubah Data',
            'validation' => \Config\Services::validation(),
            'data'  => $this->$model->getData($id),
            'dataPO' => $this->POModel->findAll(),
            'dataBarang' => $this->$model->getBarang($barang)
        ];
        return view('/' . $this->controller . '/ubah', $data);
    }
    public function update($id)
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
        //     return redirect()->to('/' . $this->controller . '/edit')->withInput();
        // };
        $pieces = explode("/", $this->request->getVar('tgl_bpb'));
        $tanggal = $pieces[2] . '-' . $pieces[1] . '-' . $pieces[0];

        $model = $this->controller . 'Model';

        $PO = $this->POModel->where('id_po', $this->request->getVar('po'))->find()[0]['no_po'];
        $this->$model->save([
            'id_bpb' => $id,
            'no_surat_jalan' => $this->request->getVar('no_surat_jalan'),
            'no_mobil' => $this->request->getVar('no_mobil'),
            'no_po' => $PO,
            'id_barang' => $this->request->getVar('barang'),
            'quantitas' => $this->request->getVar('quantitas'),
            'berat' => $this->request->getVar('berat'),
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
    public function getPO()
    {
        $id = $this->request->getPost('namaPO');
        $dataPO = $this->PODetailModel->getPODetail($id);
        echo json_encode($dataPO);
    }
}
