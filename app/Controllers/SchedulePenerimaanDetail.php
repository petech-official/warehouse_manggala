<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SchedulePenerimaanDetail extends BaseController
{
  // model yang dibutuhkan
  // protected $userModel;
  public function __construct()
  {
    // $this->roleModel = new \App\Models\RoleModel();
    $this->SchedulePenerimaanModel = new \App\Models\SchedulePenerimaanModel();
    $this->SupplierModel = new \App\Models\SupplierModel();
    $this->BarangModel = new \App\Models\BarangModel();
    $this->POModel = new \App\Models\POModel();
  }
  public $controller = 'SchedulePenerimaan';

  public function index($id)
  {

    $data = [
      'tanggal' => $id,
      'judul' => $this->controller,
      'aksi' => ' / Detail Data',
      'validation' => \Config\Services::validation(),
      'data'  => $this->SchedulePenerimaanModel->getPenerimaanDetail($id),
    ];
    return view('/' . $this->controller . 'Detail/index', $data);
  }

  public function getBarang()
  {
    $id = $this->request->getPost('namaSupplier');
    $dataBarang = $this->BarangModel->getDataPenerimaan($id);
    echo json_encode($dataBarang);
  }
}
