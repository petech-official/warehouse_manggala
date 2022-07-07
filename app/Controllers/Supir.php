<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Supir extends BaseController
{
    // model yang dibutuhkan
    // protected $userModel;
    public function __construct()
    {
        $this->SupirModel = new \App\Models\SupirModel();
    }

    public $controller = 'Supir';
    public function index()
    {
        $model = $this->controller . 'Model';
        $data = [
            'judul' => $this->controller,
            'data' => $this->$model->findAll(),
        ];
        return view($this->controller . '/index', $data);
    }
    public function tambah()
    {
        $data = [
            'judul' => $this->controller,
            'aksi' => ' / Tambah Data',
            'validation' => \Config\Services::validation(),
        ];
        return view($this->controller . '/tambah', $data);
    }
    public function save()
    {
        //Validasi
        if (!$this->validate([
            'nama_supir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan nama !',
                ]
            ],
            'telp_supir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan telp_supir !',
                ]

            ]
        ])) {
            return redirect()->to('/' . $this->controller . '/tambah')->withInput();
        };
        $model = $this->controller . 'Model';
        $this->$model->save([
            'nama_supir' => $this->request->getVar('nama_supir'),
            'telp_supir' => $this->request->getVar('telp_supir'),
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
        ];
        return view('/' . $this->controller . '/ubah', $data);
    }
    public function update($id)
    {
        //Validasi
        if (!$this->validate([
            'nama_supir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan nama_supir !',
                ],
                'telp_supir' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Masukan telp_supir !',
                    ]
                ]
            ]
        ])) {
            return redirect()->to('/' . $this->controller . '/edit')->withInput();
        };
        $model = $this->controller . 'Model';
        $this->$model->save([
            'id_supir' => $id,
            'nama_supir' => $this->request->getVar('nama_supir'),
            'telp_supir' => $this->request->getVar('telp_supir'),

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
