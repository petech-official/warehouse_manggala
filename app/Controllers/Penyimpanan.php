<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Penyimpanan extends BaseController
{
  // model yang dibutuhkan
  // protected $userModel;
  public function __construct()
  {
    // $this->roleModel = new \App\Models\RoleModel();
    $this->SchedulePenerimaanModel = new \App\Models\SchedulePenerimaanModel();
    $this->SchedulePenerimaanDetailModel = new \App\Models\SchedulePenerimaanDetailModel();
    $this->StockBarangModel = new \App\Models\StockBarangModel();
    $this->StockBarangDetailModel = new \App\Models\StockBarangDetailModel();
  }

  public $controller = 'Penyimpanan';
  public function index()
  {
    // ubah tanggal saat ini
    // $tanggalSekarang = date('Y-m-d');
    // $id_schedule_penerimaan = $this->SchedulePenerimaanModel->where('tgl_penerimaan', $tanggalSekarang)->findColumn('id_schedule_penerimaan');

    // if ($id_schedule_penerimaan) {
    //   $id_schedule_penerimaan = $this->SchedulePenerimaanModel->where('tgl_penerimaan', $tanggalSekarang)->findColumn('id_schedule_penerimaan')[0];
    // } else {
    //   $id_schedule_penerimaan = 0;
    // };

    $data = $this->SchedulePenerimaanModel->findAll();


    // $dataScheduleSekarang = $this->SchedulePenerimaanDetailModel->getPenerimaanDetail($id_schedule_penerimaan);
    $data = [
      'judul' => $this->controller,
      'data' => $data,
    ];
    return view($this->controller . '/index', $data);
  }
  public function cek_stock()
  {
    $data = [
      'judul' => $this->controller,
      'dataStock' => $this->StockBarangModel->getStockDetail(),
    ];
    return view($this->controller . '/cek_stock', $data);
  }
  public function cek_stock_detail($id)
  {
    $data = [
      'judul' => 'StockBarangDetail',
      'judulMain' => 'StockBarang',
      'aksi' => ' / Detail Data',
      'validation' => \Config\Services::validation(),
      'dataMain' => $this->StockBarangModel->getDataStockDetail($id),
      'data'  => $this->StockBarangDetailModel->getStockBarangDetail($id),
    ];
    return view($this->controller . '/cek_stock_detail', $data);
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
  public function cek_po()
  {
    $data = [
      'judul' => $this->controller,
      'data' => $this->POModel->getPO(),
    ];
    return view($this->controller . '/cek_po', $data);
  }
  public function cek_po_detail($id)
  {
    $this->POModel->getPO($id);
    $data = [
      'judul' => "Pengadaan",
      'judulMain' => "Pengadaan 2",
      'aksi' => ' / Detail Data',
      'validation' => \Config\Services::validation(),
      'dataMain' => $this->PODetailModel->getPO($id),
      'data'  => $this->PODetailModel->getPODetail($id),
    ];
    return view('/' . $this->controller . '/cek_po_detail', $data);
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
