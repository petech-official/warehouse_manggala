<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SchedulePenerimaan extends BaseController
{
  // model yang dibutuhkan
  // protected $userModel;
  public function __construct()
  {
    $this->SchedulePenerimaanModel = new \App\Models\SchedulePenerimaanModel();
    $this->SupplierModel = new \App\Models\SupplierModel();
    $this->BarangModel = new \App\Models\BarangModel();
    $this->POModel = new \App\Models\POModel();
  }

  public $controller = 'SchedulePenerimaan';
  public function index()
  {
    $model = $this->controller . 'Model';
    $data = [
      'judul' => $this->controller,
      'data' => $this->$model->getPenerimaan(),
    ];
    return view($this->controller . '/index', $data);
  }
  public function tambah()
  {
    $data = [
      'judul' => $this->controller,
      'aksi' => ' / Tambah Data',
      'validation' => \Config\Services::validation(),
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
      'tgl_penerimaan' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Data tidak boleh kosong!',
        ]
      ],
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
      return redirect()->to('/' . $this->controller . '/tambah')->withInput();
    };
    $pieces = explode("/", $this->request->getVar('tgl_penerimaan'));
    $tanggal = $pieces[2] . '-' . $pieces[1] . '-' . $pieces[0];
    $model = $this->controller . 'Model';

    $id_barang = $this->request->getVar('id_barang');
    $id_supplier = $this->request->getVar('supplier');
    $id_po = $this->request->getVar('po');
    $berat_penerimaan = $this->request->getVar('berat_penerimaan');
    $status_penerimaan = $this->request->getVar('status_penerimaan');

    $this->$model->save([
      'tgl_penerimaan' => $tanggal,
      'id_po' => $id_po,
      'id_supplier' => $id_supplier,
      'id_barang' => $id_barang,
      'berat_penerimaan' => $berat_penerimaan,
      'status_penerimaan' => $status_penerimaan,
    ]);

    session()->setFlashdata('pesan', 'Data berhasil diubah');
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
      'tgl_penerimaan' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Data tidak boleh kosong!',
        ]
      ],
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
    $pieces = explode("/", $this->request->getVar('tgl_penerimaan'));
    $tanggal = $pieces[2] . '-' . $pieces[1] . '-' . $pieces[0];
    $model = $this->controller . 'Model';

    $id_barang = $this->request->getVar('id_barang');
    $id_supplier = $this->request->getVar('supplier');
    $id_po = $this->request->getVar('po');
    $berat_penerimaan = $this->request->getVar('berat_penerimaan');
    $status_penerimaan = $this->request->getVar('status_penerimaan');

    // dd($status_penerimaan);
    $this->$model->save([
      'id_schedule_penerimaan' => $id,
      'tgl_penerimaan' => $tanggal,
      'id_po' => $id_po,
      'id_supplier' => $id_supplier,
      'id_barang' => $id_barang,
      'berat_penerimaan' => $berat_penerimaan,
      'status_penerimaan' => $status_penerimaan,
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
  public function getBarang()
  {
    $id = $this->request->getPost('namaSupplier');
    $dataBarang = $this->BarangModel->getDataPenerimaan($id);
    echo json_encode($dataBarang);
  }
}
