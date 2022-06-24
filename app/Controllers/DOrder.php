<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DOrder extends BaseController
{
    // model yang dibutuhkan
    // protected $userModel;
    public function __construct()
    {
        $this->DOModel = new \App\Models\DOModel();
        $this->SOModel = new \App\Models\SOModel();
        $this->SupirModel = new \App\Models\SupirModel();
        $this->KendaraanModel = new \App\Models\KendaraanModel();
    }

    public $controller = 'DOrder';
    public function index()
    {
        $model = 'DOModel';
        $data = [
            'judul' => $this->controller,
            'data' => $this->$model->getDo(),
        ];
        return view($this->controller . '/index', $data);
    }
    public function tambah()
    {
        $data = [
            'judul' => $this->controller,
            'aksi' => ' / Tambah Data',
            'dataSO' => $this->SOModel->where('status', 0)->findAll(),
            'dataMobil' => $this->KendaraanModel->findAll(),
            'dataSupir' => $this->SupirModel->findAll(),
            'validation' => \Config\Services::validation(),
        ];
        return view($this->controller . '/tambah', $data);
    }
    public function save()
    {
        //Validasi
        if (!$this->validate([
            'tgl_do' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan tgl_do !',
                ]
            ],
            'so' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan so !',
                ]
            ],
            'no_po' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan no_po !',
                ]
            ],
            'kendaraan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan kendaraan !',
                ]
            ],
            'supir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan supir !',
                ]
            ],

        ])) {
            return redirect()->to('/' . $this->controller . '/tambah')->withInput();
        };
        $model = 'DOModel';
        if ($this->$model->countAllResults() == 0) {
            $SOTerakhir = substr("DO00000000", 6);
            $cekbulantahun = substr("DO00000000", 2, -4);
        } else {
            $SOTerakhir = substr($this->$model->getNoDo('no_do')[0]['no_do'], 6);
            $cekbulantahun = substr($this->$model->getNoDo('no_do')[0]['no_do'], 2, -4);
        }
        $cekbulan = substr($cekbulantahun, 2);
        $cektahun = substr($cekbulantahun, 0, -2);

        if ($cekbulan != date('m')) {
            $DOBaru = 1;
            $DOBaru = sprintf("%04d", $DOBaru);
        } elseif ($cektahun != date('y')) {
            $DOBaru = 1;
            $DOBaru = sprintf("%04d", $DOBaru);
        } else {
            $SOTerakhir = intval(ltrim($SOTerakhir, '0'));
            $DOBaru = $SOTerakhir + 1;
            $DOBaru = sprintf("%04d", $DOBaru);
        }
        $pieces = explode("/", $this->request->getVar('tgl_do'));
        $tanggal = $pieces[2] . '-' . $pieces[1] . '-' . $pieces[0];

        $this->$model->save([
            'tgl_do' => $tanggal,
            'no_do' => 'DO' .  date('ym') . $DOBaru,
            'id_so' => $this->request->getVar('so'),
            'no_po' => $this->request->getVar('no_po'),
            'id_supir' => $this->request->getVar('supir'),
            'id_kendaraan' => $this->request->getVar('kendaraan'),
            'catatan' => $this->request->getVar('catatan'),

        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambah');
        return redirect()->to('/' . $this->controller);
    }
    public function edit($id)
    {
        $model = 'DOModel';
        $data = [
            'judul' => $this->controller,
            'aksi' => ' / Ubah Data',
            'validation' => \Config\Services::validation(),
            'data'  => $this->$model->getData($id),
            'dataSO' => $this->SOModel->where('status', 0)->findAll(),
            'dataKendaraan' => $this->KendaraanModel->findAll(),
            'dataSupir' => $this->SupirModel->findAll(),
        ];
        return view('/' . $this->controller . '/ubah', $data);
    }
    public function update($id)
    {
        //Validasi
        if (!$this->validate([
            'tgl_do' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan tgl_do !',
                ]
            ],
            'so' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan so !',
                ]
            ],
            'no_po' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan no_po !',
                ]
            ],
            'kendaraan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan kendaraan !',
                ]
            ],
            'supir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan supir !',
                ]
            ],
        ])) {
            return redirect()->to('/' . $this->controller . '/edit/' . $id)->withInput();
        };
        $model = 'DOModel';
        $pieces = explode("/", $this->request->getVar('tgl_do'));
        $tanggal = $pieces[2] . '-' . $pieces[1] . '-' . $pieces[0];
        $this->$model->save([
            'id_do' => $id,
            'tgl_do' => $tanggal,
            'id_so' => $this->request->getVar('so'),
            'no_po' => $this->request->getVar('no_po'),
            'id_supir' => $this->request->getVar('supir'),
            'id_kendaraan' => $this->request->getVar('kendaraan'),
            'catatan' => $this->request->getVar('catatan'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/' . $this->controller);
    }
    public function delete()
    {
        $model = 'DOModel';
        $id = $this->request->getVar('id');
        $this->$model->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/' . $this->controller);
    }
}
