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
        $id_po_detail = $this->$model->getData($id)['id_po_detail'];

        $data = [
            'judul' => $this->controller,
            'judulMain' => $this->controllerMain,
            'aksi' => ' / Detail Data',
            'validation' => \Config\Services::validation(),
            'dataMain' => $this->$model->getData($id),
            'dataPO' => $this->$model->getPO(),
            'data'  => $this->$model->getPODetail($no_po, $id_po_detail),
        ];
        return view('/' . $this->controller . '/index', $data);
    }
}
