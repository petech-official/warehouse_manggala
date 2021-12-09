<?php

namespace App\Controllers;

class Karyawan extends BaseController
{
  protected $karyawanModel;
  public function __construct()
  {
    $this->KaryawanModel = new \App\Models\KaryawanModel();
  }
  public function index()
  {

    $data = [
      'judul' => 'Karyawan',
      'karyawan' => $this->KaryawanModel->findAll()
    ];
    return view('karyawan/index', $data);
  }
}
