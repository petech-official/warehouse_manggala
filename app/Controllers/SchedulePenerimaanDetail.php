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
    $this->SchedulePenerimaanDetailModel = new \App\Models\SchedulePenerimaanDetailModel();
    $this->SupplierModel = new \App\Models\SupplierModel();
    $this->BarangModel = new \App\Models\BarangModel();
    $this->POModel = new \App\Models\POModel();
  }
  public $controllerMain = 'SchedulePenerimaan';
  public $controller = 'SchedulePenerimaanDetail';
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
      'data'  => $this->$modelDetail->getPenerimaanDetail($id),


    ];
    return view('/' . $this->controller . '/index', $data);
  }
  public function tambah($id)
  {
    $data = [
      'id_schedule_penerimaan' => $id,
      'judul' => $this->controller,
      'aksi' => ' / Tambah Data',
      'validation' => \Config\Services::validation(),
      'dataSupplier' => $this->SupplierModel->findAll(),
      'dataPO' => $this->POModel->where('status', 0)->findAll(),
    ];
    return view($this->controller . '/tambah', $data);
  }
  public function save()
  {
    //Validasi
    if (!$this->validate([
      'po' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Data tidak boleh kosong!',
        ]
      ],
      'supplier' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Data tidak boleh kosong!',
        ]
      ],
      'id_barang' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Data tidak boleh kosong!',
        ]
      ],
      'berat_penerimaan' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Data tidak boleh kosong!',
        ]
      ],
      'status_penerimaan' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Data tidak boleh kosong!',
        ]
      ],
    ])) {
      return redirect()->to('/' . $this->controller . '/tambah/' . $this->request->getVar('id_schedule_penerimaan'))->withInput();
    };
    $id_schedule_penerimaan = $this->request->getVar('id_schedule_penerimaan');
    $id_barang = $this->request->getVar('id_barang');
    $id_supplier = $this->request->getVar('supplier');
    $id_po = $this->request->getVar('po');
    $berat_penerimaan = $this->request->getVar('berat_penerimaan');
    $status_penerimaan = $this->request->getVar('status_penerimaan');
    $model = $this->controller . 'Model';

    $this->$model->save([
      'id_schedule_penerimaan' => $id_schedule_penerimaan,
      'id_po' => $id_po,
      'id_supplier' => $id_supplier,
      'id_barang' => $id_barang,
      'berat_penerimaan' => $berat_penerimaan,
      'status_penerimaan' => $status_penerimaan,

    ]);
    session()->setFlashdata('pesan', 'Data berhasil ditambah');
    return redirect()->to('/' . $this->controller . '/index/' . $this->request->getVar('id_schedule_penerimaan'));
  }
  public function edit($id)
  {

    $data = [
      'id_schedule_penerimaan'  => $this->SchedulePenerimaanDetailModel->where('id_schedule_penerimaan_detail', $id)->findColumn('id_schedule_penerimaan')[0],
      'id_schedule_penerimaan_detail' => $id,
      'judul' => $this->controller,
      'aksi' => ' / Ubah Data',
      'validation' => \Config\Services::validation(),
      'data'  => $this->SchedulePenerimaanDetailModel->getData($id),
      'dataSupplier' => $this->SupplierModel->findAll(),
      'dataPO' => $this->POModel->where('status', 0)->findAll(),
      'dataBarang' => $this->BarangModel->getBarang(),
    ];
    return view('/' . $this->controller . '/ubah', $data);
  }
  public function update($id)
  {
    //Validasi
    if (!$this->validate([
      'po' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Data tidak boleh kosong!',
        ]
      ],
      'supplier' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Data tidak boleh kosong!',
        ]
      ],
      'id_barang' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Data tidak boleh kosong!',
        ]
      ],
      'berat_penerimaan' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Data tidak boleh kosong!',
        ]
      ],
      'status_penerimaan' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Data tidak boleh kosong!',
        ]
      ],
    ])) {
      return redirect()->to('/' . $this->controller . '/edit/' . $id)->withInput();
    };
    $model = $this->controller . 'Model';
    $id_schedule_penerimaan = $this->request->getVar('id_schedule_penerimaan');
    $id_barang = $this->request->getVar('id_barang');
    $id_supplier = $this->request->getVar('supplier');
    $id_po = $this->request->getVar('po');
    $berat_penerimaan = $this->request->getVar('berat_penerimaan');
    $status_penerimaan = $this->request->getVar('status_penerimaan');
    $model = $this->controller . 'Model';


    //dd($id, $id_schedule_penerimaan, $id_po, $id_supplier, $id_barang, $berat_penerimaan, $status_penerimaan);
    $this->$model->save([
      'id_schedule_penerimaan' => $id,
      'id_schedule_penerimaan_detail' => $id_schedule_penerimaan,
      'id_po' => $id_po,
      'id_supplier' => $id_supplier,
      'id_barang' => $id_barang,
      'berat_penerimaan' => $berat_penerimaan,
      'status_penerimaan' => $status_penerimaan,

    ]);

    session()->setFlashdata('pesan', 'Data berhasil diubah');
    return redirect()->to('/' . $this->controller . '/index/' . $id);
  }
  public function delete()
  {
    $model = $this->controller . 'Model';
    $id = $this->request->getVar('id');
    $id_schedule_penerimaan = $this->SchedulePenerimaanDetailModel->where('id_schedule_penerimaan_detail', $id)->findColumn('id_schedule_penerimaan')[0];
    $this->$model->delete($id);
    session()->setFlashdata('pesan', 'Data berhasil dihapus');
    return redirect()->to('/' . $this->controller . '/index/' . $id_schedule_penerimaan);
  }
  public function getBarang()
  {
    $id = $this->request->getPost('namaSupplier');
    $dataBarang = $this->BarangModel->getDataPenerimaan($id);
    echo json_encode($dataBarang);
  }
}
