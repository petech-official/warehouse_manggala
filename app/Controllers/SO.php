<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SO extends BaseController
{
    // model yang dibutuhkan
    //protected $userModel;
    public function __construct()
    {
        $this->SOModel = new \App\Models\SOModel();
        $this->CustomerModel = new \App\Models\CustomerModel();
        $this->CustomerDetailModel = new \App\Models\CustomerDetailModel();
    }

    public $controller = 'SO';
    public function index()
    {
        $model = $this->controller . 'Model';
        $data = [
            'judul' => $this->controller,
            'data' => $this->$model->getSO(),
        ];
        return view($this->controller . '/index', $data);
    }
    public function tambah()
    {
        $data = [
            'judul' => $this->controller,
            'aksi' => ' / Tambah Data',
            'validation' => \Config\Services::validation(),
            'dataCustomer' => $this->CustomerModel->findAll()
        ];
        return view($this->controller . '/tambah', $data);
    }
    public function save()
    {
        //Validasi
        if (!$this->validate([
            'tgl_so' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan tgl_so !',
                ]
            ],
            'customer' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan customer !',
                ]
            ]
        ])) {
            return redirect()->to('/' . $this->controller . '/tambah')->withInput();
        };
        $model = $this->controller . 'Model';

        $SOTerakhir = substr($this->$model->getNoSo('no_so')[0]['no_so'], 6);
        $cekbulantahun = substr($this->$model->getNoSo('no_so')[0]['no_so'], 2, -4);
        $cekbulan = substr($cekbulantahun, 2);
        $cektahun = substr($cekbulantahun, 0, -2);

        if ($cekbulan != date('m')) {
            $SOBaru = 1;
            $SOBaru = sprintf("%04d", $SOBaru);
        } elseif ($cektahun != date('y')) {
            $SOBaru = 1;
            $SOBaru = sprintf("%04d", $SOBaru);
        } else {
            $SOTerakhir = intval(ltrim($SOTerakhir, '0'));
            $SOBaru = $SOTerakhir + 1;
            $SOBaru = sprintf("%04d", $SOBaru);
        }
        $pieces = explode("/", $this->request->getVar('tgl_so'));
        $tanggal = $pieces[2] . '-' . $pieces[1] . '-' . $pieces[0];
        $this->$model->save([
            'no_so' => 'SO' .  date('ym') . $SOBaru,
            'tgl_so' => $tanggal,
            'id_customer' => $this->request->getVar('customer'),
            'alamat_kirim' => $this->request->getVar('alamat_kirim'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambah');
        return redirect()->to('/' . $this->controller);
    }
    public function edit($id)
    {
        $model = $this->controller . 'Model';
        $so = $this->$model->getData($id)['id_customer'];

        $data = [
            'judul' => $this->controller,
            'aksi' => ' / Ubah Data',
            'validation' => \Config\Services::validation(),
            'data'  => $this->$model->getData($id),
            'dataCustomer' => $this->CustomerModel->findAll(),
            'dataAlamat' => $this->$model->getAlamat($so)
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
        $pieces = explode("/", $this->request->getVar('tgl_so'));
        $tanggal = $pieces[2] . '-' . $pieces[1] . '-' . $pieces[0];
        $model = $this->controller . 'Model';
        $this->$model->save([
            'id_so' => $id,
            'tgl_so' => $tanggal,
            'id_customer' => $this->request->getVar('customer'),
            'alamat_kirim' => $this->request->getVar('alamat_kirim'),
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
    public function getAlamat()
    {
        $id = $this->request->getPost('namaCustomer');
        $dataAlamat = $this->CustomerDetailModel->getData($id);
        echo json_encode($dataAlamat);
    }
}
