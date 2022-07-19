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
  }

  public $controller = 'SchedulePengeluaran';
  public function index()
  {
    $model = $this->controller . 'Model';
    $data = [
      'judul' => $this->controller,
      'data' => $this->$model->findAll(),
    ];
    return view($this->controller . '/index', $data);
  }
  public function tambah()
  {
    $data = [
      'judul' => $this->controller,
      'aksi' => ' / Tambah Data',
      'validation' => \Config\Services::validation(),
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
    ])) {
      return redirect()->to('/' . $this->controller . '/tambah')->withInput();
    };
    $pieces = explode("/", $this->request->getVar('tgl_pengeluaran'));
    $tanggal = $pieces[2] . '-' . $pieces[1] . '-' . $pieces[0];
    $model = $this->controller . 'Model';
    $this->$model->save([
      'tgl_pengeluaran' => $tanggal,
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
    ])) {
      return redirect()->to('/' . $this->controller . '/edit/' . $id)->withInput();
    };
    $pieces = explode("/", $this->request->getVar('tgl_pengeluaran'));
    $tanggal = $pieces[2] . '-' . $pieces[1] . '-' . $pieces[0];
    $model = $this->controller . 'Model';
    $this->$model->save([
      'id_schedule_penerimaan' => $id,
      'tgl_pengeluaran' => $tanggal,
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
