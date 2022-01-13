<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class BPBDetail extends BaseController
{
    // model yang dibutuhkan
    // protected $userModel;
    public function __construct()
    {
        $this->BPBModel = new \App\Models\BPBModel();
    }
    public $controllerMain = 'BPB';
    public $controller = 'BPBDetail';
    public function index($id)
    {
        $model = $this->controllerMain . 'Model';
        $no_po = $this->$model->getData($id)['no_po'];
        $id_barang = $this->$model->getData($id)['id_barang'];
        $data = [
            'judul' => $this->controller,
            'judulMain' => $this->controllerMain,
            'aksi' => ' / Detail Data',
            'validation' => \Config\Services::validation(),
            'dataMain' => $this->$model->getData($id),
            'dataPO' => $this->$model->getPO(),
            'data'  => $this->$model->getPODetail($no_po, $id_barang),
        ];
        return view('/' . $this->controller . '/index', $data);
    }
}
