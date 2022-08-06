<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SchedulePengeluaranDetail extends BaseController
{
  // model yang dibutuhkan
  // protected $userModel;
  public function __construct()
  {
    // $this->roleModel = new \App\Models\RoleModel();
    $this->SchedulePengeluaranModel = new \App\Models\SchedulePengeluaranModel();
    $this->SchedulePengeluaranDetailModel = new \App\Models\SchedulePengeluaranDetailModel();
    $this->CustomerModel = new \App\Models\CustomerModel();
    $this->CustomerDetailModel = new \App\Models\CustomerDetailModel();
    $this->BarangModel = new \App\Models\BarangModel();
    $this->SOModel = new \App\Models\SOModel();
  }
  public $controllerMain = 'SchedulePengeluaran';
  public $controller = 'SchedulePengeluaranDetail';
  public function index($id)
  {
    $data = [
      'tanggal' => $id,
      'judul' => $this->controller,
      'aksi' => ' / Detail Data',
      'validation' => \Config\Services::validation(),
      'data'  => $this->SchedulePengeluaranModel->getPengeluaranDetail($id),
    ];
    return view('/' . $this->controller . '/index', $data);
  }
  public function tambah($id)
  {
    $data = [
      'id_schedule_pengeluaran' => $id,
      'judul' => $this->controller,
      'aksi' => ' / Tambah Data',
      'validation' => \Config\Services::validation(),
      'dataCustomer' => $this->CustomerModel->findAll(),
      'dataSO' => $this->SOModel->where('status', 0)->findAll(),
      'dataBarang' => $this->BarangModel->getBarang(),
    ];
    return view($this->controller . '/tambah', $data);
  }
  public function save()
  {
    //Validasi
    if (!$this->validate([
      'so' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Data tidak boleh kosong!',
        ]
      ],
      'customer' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Data tidak boleh kosong!',
        ]
      ],
      'alamat_kirim' => [
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
      'berat_pengeluaran' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Data tidak boleh kosong!',
        ]
      ],
      'status_pengeluaran' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Data tidak boleh kosong!',
        ]
      ],
    ])) {
      return redirect()->to('/' . $this->controller . '/tambah/' . $this->request->getVar('id_schedule_pengeluaran'))->withInput();
    };
    $id_schedule_pengeluaran = $this->request->getVar('id_schedule_pengeluaran');
    $id_barang = $this->request->getVar('id_barang');
    $id_customer = $this->request->getVar('customer');
    $id_customer_detail = $this->request->getVar('alamat_kirim');
    $id_so = $this->request->getVar('so');
    $berat_pengeluaran = $this->request->getVar('berat_pengeluaran');
    $status_pengeluaran = $this->request->getVar('status_pengeluaran');

    //dd($id_schedule_pengeluaran, $id_barang, $id_customer, $id_customer_detail, $id_so, $berat_pengeluaran, $status_pengeluaran);
    $model = $this->controller . 'Model';

    $this->$model->save([
      'id_schedule_pengeluaran' => $id_schedule_pengeluaran,
      'id_so' => $id_so,
      'id_customer' => $id_customer,
      'id_customer_detail' => $id_customer_detail,
      'id_barang' => $id_barang,
      'berat_pengeluaran' => $berat_pengeluaran,
      'status_pengeluaran' => $status_pengeluaran,

    ]);
    session()->setFlashdata('pesan', 'Data berhasil ditambah');
    return redirect()->to('/' . $this->controller . '/index/' . $this->request->getVar('id_schedule_pengeluaran'));
  }
  public function edit($id)
  {
    $data = [
      'id_schedule_pengeluaran'  => $this->SchedulePengeluaranDetailModel->where('id_schedule_pengeluaran_detail', $id)->findColumn('id_schedule_pengeluaran')[0],
      'id_schedule_pengeluaran_detail' => $id,
      'judul' => $this->controller,
      'aksi' => ' / Ubah Data',
      'validation' => \Config\Services::validation(),
      'data'  => $this->SchedulePengeluaranDetailModel->getData($id),
      'dataCustomer' => $this->CustomerModel->findAll(),
      'dataCustomerDetail' => $this->CustomerDetailModel->findAll(),
      'dataSO' => $this->SOModel->where('status', 0)->findAll(),
      'dataBarang' => $this->BarangModel->getBarang(),
    ];
    return view('/' . $this->controller . '/ubah', $data);
  }
  public function update($id)
  {
    //Validasi
    if (!$this->validate([
      'so' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Data tidak boleh kosong!',
        ]
      ],
      'customer' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Data tidak boleh kosong!',
        ]
      ],
      'id_customer_detail' => [
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
      'berat_pengeluaran' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Data tidak boleh kosong!',
        ]
      ],
      'status_pengeluaran' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Data tidak boleh kosong!',
        ]
      ],
    ])) {
      return redirect()->to('/' . $this->controller . '/edit/' . $id)->withInput();
    };
    $model = $this->controller . 'Model';
    $id_schedule_pengeluaran = $this->request->getVar('id_schedule_pengeluaran');
    $id_barang = $this->request->getVar('id_barang');
    $id_customer = $this->request->getVar('customer');
    $id_customer_detail = $this->request->getVar('id_customer_detail');
    $id_so = $this->request->getVar('so');
    $berat_pengeluaran = $this->request->getVar('berat_pengeluaran');
    $status_pengeluaran = $this->request->getVar('status_pengeluaran');;
    $model = $this->controller . 'Model';




    $this->$model->save([
      'id_schedule_pengeluaran' => $id,
      'id_schedule_pengeluaran_detail' => $id_schedule_pengeluaran,
      'id_so' => $id_so,
      'id_customer' => $id_customer,
      'id_customer_detail' => $id_customer_detail,
      'id_barang' => $id_barang,
      'berat_pengeluaran' => $berat_pengeluaran,
      'status_pengeluaran' => $status_pengeluaran,

    ]);

    session()->setFlashdata('pesan', 'Data berhasil diubah');
    return redirect()->to('/' . $this->controller . '/index/' . $id);
  }
  public function delete()
  {
    $model = $this->controller . 'Model';
    $id = $this->request->getVar('id');
    $id_schedule_pengeluaran = $this->SchedulePengeluaranDetailModel->where('id_schedule_pengeluaran_detail', $id)->findColumn('id_schedule_pengeluaran')[0];
    $this->$model->delete($id);
    session()->setFlashdata('pesan', 'Data berhasil dihapus');
    return redirect()->to('/' . $this->controller . '/index/' . $id_schedule_pengeluaran);
  }
  public function getBarang()
  {
    $id = $this->request->getPost('namaCustomer');
    $dataBarang = $this->BarangModel->getDataPenerimaan($id);
    echo json_encode($dataBarang);
  }
}
