<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SchedulePengeluaran extends BaseController
{
  // model yang dibutuhkan
  // protected $userModel;
  public function __construct()
  {
    $this->SchedulePengeluaranModel = new \App\Models\SchedulePengeluaranModel();
    $this->CustomerModel = new \App\Models\CustomerModel();
    $this->CustomerDetailModel = new \App\Models\CustomerDetailModel();
    $this->BarangModel = new \App\Models\BarangModel();
    $this->SOModel = new \App\Models\SOModel();
  }

  public $controller = 'SchedulePengeluaran';
  public function index()
  {
    $model = $this->controller . 'Model';
    $data = [
      'judul' => $this->controller,
      'data' => $this->$model->getpengeluaran(),
    ];
    return view($this->controller . '/index', $data);
  }
  public function tambah()
  {
    $data = [
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
      'tgl_pengeluaran' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Data tidak boleh kosong!',
        ]
      ],
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
      return redirect()->to('/' . $this->controller . '/tambah')->withInput();
    };

    $pieces = explode("/", $this->request->getVar('tgl_pengeluaran'));
    $tanggal = $pieces[2] . '-' . $pieces[1] . '-' . $pieces[0];
    $model = $this->controller . 'Model';

    $id_barang = $this->request->getVar('id_barang');
    $id_customer = $this->request->getVar('customer');
    $id_customer_detail = $this->request->getVar('alamat_kirim');
    $id_so = $this->request->getVar('so');
    $berat_pengeluaran = $this->request->getVar('berat_pengeluaran');
    $status_pengeluaran = $this->request->getVar('status_pengeluaran');
    $this->$model->save([
      'tgl_pengeluaran' => $tanggal,
      'id_so' => $id_so,
      'id_customer' => $id_customer,
      'id_customer_detail' => $id_customer_detail,
      'id_barang' => $id_barang,
      'berat_pengeluaran' => $berat_pengeluaran,
      'status_pengeluaran' => $status_pengeluaran,
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
      'tgl_pengeluaran' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Data tidak boleh kosong!',
        ]
      ],
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
    $pieces = explode("/", $this->request->getVar('tgl_pengeluaran'));
    $tanggal = $pieces[2] . '-' . $pieces[1] . '-' . $pieces[0];
    $model = $this->controller . 'Model';
    $id_barang = $this->request->getVar('id_barang');
    $id_customer = $this->request->getVar('customer');
    $id_customer_detail = $this->request->getVar('id_customer_detail');
    $id_so = $this->request->getVar('so');
    $berat_pengeluaran = $this->request->getVar('berat_pengeluaran');
    $status_pengeluaran = $this->request->getVar('status_pengeluaran');

    $this->$model->save([
      'id_schedule_pengeluaran' => $id,
      'tgl_pengeluaran' => $tanggal,
      'id_so' => $id_so,
      'id_customer' => $id_customer,
      'id_customer_detail' => $id_customer_detail,
      'id_barang' => $id_barang,
      'berat_pengeluaran' => $berat_pengeluaran,
      'status_pengeluaran' => $status_pengeluaran,
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
}
