<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CustomerDetail extends BaseController
{
    // model yang dibutuhkan
    // protected $userModel;
    public function __construct()
    {
        $this->CustomerModel = new \App\Models\CustomerModel();
        $this->CustomerDetailModel = new \App\Models\CustomerDetailModel();
    }
    public $controllerMain = 'Customer';
    public $controller = 'CustomerDetail';
    public function index($id)
    {
        $model = $this->controllerMain . 'Model';
        $modelDetail = $this->controller . 'Model';
        $data = [
            'judul' => $this->controller,
            'judulMain' => $this->controllerMain,
            'aksi' => ' / Detail Data',
            'validation' => \Config\Services::validation(),
            'dataMain' => $this->$model->getData($id),
            'data'  => $this->$modelDetail->getData($id),
        ];
        return view('/' . $this->controller . '/index', $data);
    }
    public function tambah($id)
    {
        $data = [
            'id_customer' => $id,
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
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data tidak boleh kosong!',
                ]
            ]
        ])) {
            return redirect()->to('/' . $this->controller . '/tambah/' . $this->request->getVar('id_customer'))->withInput();
        };
        $model = $this->controller . 'Model';
        $this->$model->save([
            'id_customer' => $this->request->getVar('id_customer'),
            'alamat' => $this->request->getVar('alamat'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambah');
        return redirect()->to('/' . $this->controller . '/index/' . $this->request->getVar('id_customer'));
    }
    public function edit($id)
    {
        $model = $this->controller . 'Model';
        $data = [
            'judul' => $this->controller,
            'aksi' => ' / Ubah Data',
            'validation' => \Config\Services::validation(),
            'data'  => $this->$model->getDataDetail($id),
        ];
        return view('/' . $this->controller . '/ubah', $data);
    }
    public function update($id)
    {
        if (!$this->validate([
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data tidak boleh kosong!',

                ]
            ]
        ])) {
            return redirect()->to('/' . $this->controller . '/edit/' . $id)->withInput();
        };
        $model = $this->controller . 'Model';
        $this->$model->save([
            'id_customer_detail' => $id,
            'alamat' => $this->request->getVar('alamat'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/' . $this->controller . '/index/' . $this->request->getVar('id_customer'));
    }
    public function delete()
    {
        $modelMain = $this->controllerMain . 'Model';
        $model = $this->controller . 'Model';
        $id = $this->request->getVar('id');
        $id_customer = $this->request->getVar('id_customer');
        $this->$model->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/' . $this->controller . '/index/' . $id_customer);
    }
}
