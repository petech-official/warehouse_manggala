<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pengeluaran extends BaseController
{
  // model yang dibutuhkan
  // protected $userModel;
  public function __construct()
  {
    // $this->roleModel = new \App\Models\RoleModel();
    $this->SchedulePengeluaranModel = new \App\Models\SchedulePengeluaranModel();
    $this->SchedulePengeluaranDetailModel = new \App\Models\SchedulePengeluaranDetailModel();
    $this->SOModel = new \App\Models\SOModel();
    $this->SODetailModel = new \App\Models\SODetailModel();
  }

  public $controller = 'Pengeluaran';
  public function index()
  {
    // ubah tanggal saat ini
    $tanggalSekarang = date('Y-m-d');
    $id_schedule_pengeluaran = $this->SchedulePengeluaranModel->where('tgl_Pengeluaran', $tanggalSekarang)->findColumn('id_schedule_pengeluaran')[0];

    $dataScheduleSekarang = $this->SchedulePengeluaranDetailModel->getPengeluaranDetail($id_schedule_pengeluaran);
    $data = [
      'judul' => $this->controller,
      'data' => $dataScheduleSekarang,
    ];
    return view($this->controller . '/index', $data);
  }

  public function list_barang()
  {
    $model = $this->controller . 'Model';
    $data = [
      'judul' => $this->controller,
      'dataStock' => $this->StockBarangModel->getKebutuhan(),
    ];
    return view($this->controller . '/list_barang', $data);
  }
  public function cek_so()
  {
    $data = [
      'judul' => $this->controller,
      'data' => $this->SOModel->getSO(),
    ];
    return view($this->controller . '/cek_so', $data);
  }
  public function cek_so_detail($id)
  {
    $this->SOModel->getSO($id);
    $data = [
      'judul' => "Pengeluaran",
      'judulMain' => "Pengeluaran",
      'aksi' => ' / Detail Data',
      'validation' => \Config\Services::validation(),
      'dataMain' => $this->SODetailModel->getSO($id),
      'data'  => $this->SODetailModel->getSODetail($id),
    ];
    return view('/' . $this->controller . '/cek_so_detail', $data);
  }
  public function cek_overload()
  {
    $data = [
      'judul' => $this->controller,
      'dataStock' => $this->StockBarangModel->getStockDetail(),
    ];
    return view($this->controller . '/cek_overload', $data);
  }
}
