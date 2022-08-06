<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pengadaan extends BaseController
{
  // model yang dibutuhkan
  // protected $userModel;
  public function __construct()
  {
    // $this->roleModel = new \App\Models\RoleModel();
    $this->StockBarangModel = new \App\Models\StockBarangModel();
    $this->POModel = new \App\Models\POModel();
    $this->PODetailModel = new \App\Models\PODetailModel();
    $this->SupplierModel = new \App\Models\SupplierModel();
  }

  public $controller = 'Pengadaan';
  public function index()
  {
    $data = [
      'judul' => $this->controller,
      'dataStock' => $this->StockBarangModel->getStockDetail(),
    ];
    return view($this->controller . '/index', $data);
  }

  public function list_barang()
  {

    $model = $this->controller . 'Model';
    $data = [
      'judul' => $this->controller,
      'dataSupplier' => $this->StockBarangModel->getKebutuhan2(),

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
  public function edit($id)
  {
    $data = [
      'judul' => $this->controller,
      'id_stock' => $id,
      'validation' => \Config\Services::validation(),
      'data' => $this->StockBarangModel->where('id_stock', $id)->findAll(),
    ];
    return view($this->controller . '/list_barang_ubah', $data);
  }
  public function update()
  {

    $this->StockBarangModel->save([
      'id_stock' => $this->request->getVar('id_stock'),
      'status_pengadaan' => $this->request->getVar('status_pengadaan'),
    ]);
    session()->setFlashdata('pesan', 'Data berhasil diubah');
    return redirect()->to('Pengadaan/list_barang/');
  }
}
