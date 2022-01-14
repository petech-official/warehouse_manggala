<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PO extends BaseController
{
    // model yang dibutuhkan
    //protected $userModel;
    public function __construct()
    {
        $this->POModel = new \App\Models\POModel();
        $this->SupplierModel = new \App\Models\SupplierModel();
    }

    public $controller = 'PO';
    public function index()
    {
        $model = $this->controller . 'Model';
        $data = [
            'judul' => $this->controller,
            'data' => $this->$model->getPO(),
        ];
        return view($this->controller . '/index', $data);
    }
    public function tambah()
    {
        $data = [
            'judul' => $this->controller,
            'aksi' => ' / Tambah Data',
            'validation' => \Config\Services::validation(),
            'dataSupplier' => $this->SupplierModel->findAll()
        ];
        return view($this->controller . '/tambah', $data);
    }
    public function save()
    {
        //Validasi
        if (!$this->validate([
            'tgl_po' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan tgl_po !',
                ]
            ],
            'supplier' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan supplier !',
                ]
            ]
        ])) {
            return redirect()->to('/' . $this->controller . '/tambah')->withInput();
        };
        $model = $this->controller . 'Model';

        if ($this->$model->countAllResult() == 0) {
            $poTerakhir = substr("PO00000000",6);
            $cekbulantahun = substr("PO00000000",2.-4);
        }else{
            $poTerakhir = substr($this->$model->getNoPo('no_po')[0]['no_po'],6);
            $cekbulantahun = substr($this->$model->getNoPo('no_po')[0]['no_po'],2,-4);
        }


        
        $cekbulan = substr($cekbulantahun, 2);
        $cektahun = substr($cekbulantahun, 0, -2);

        if ($cekbulan != date('m')) {
            $poBaru = 1;
            $poBaru = sprintf("%04d", $poBaru);
        } elseif ($cektahun != date('y')) {
            $poBaru = 1;
            $poBaru = sprintf("%04d", $poBaru);
        } else {
            $poTerakhir = intval(ltrim($poTerakhir, '0'));
            $poBaru = $poTerakhir + 1;
            $poBaru = sprintf("%04d", $poBaru);
        }

        $pieces = explode("/", $this->request->getVar('tgl_po'));
        $tanggal = $pieces[2] . '-' . $pieces[1] . '-' . $pieces[0];

        $this->$model->save([
            'no_po' => 'PO' .  date('ym') . $poBaru,
            'tgl_po' => $tanggal,
            'id_supplier' => $this->request->getVar('supplier'),
            'keterangan_po' => $this->request->getVar('keterangan'),
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
            'dataSupplier' => $this->SupplierModel->findAll(),
        ];
        return view('/' . $this->controller . '/ubah', $data);
    }
    public function update($id)
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
        //     return redirect()->to('/' . $this->controller . '/edit')->withInput();
        // };
        $pieces = explode("/", $this->request->getVar('tgl_po'));
        $tanggal = $pieces[2] . '-' . $pieces[1] . '-' . $pieces[0];
        $model = $this->controller . 'Model';
        $this->$model->save([
            'id_po' => $id,
            'tgl_po' => $tanggal,
            'id_supplier' => $this->request->getVar('supplier'),
            'keterangan_po' => $this->request->getVar('keterangan_po'),
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
