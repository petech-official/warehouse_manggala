<?php

namespace App\Controllers;

use \Config\Services\session;


class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->StockBarangModel = new \App\Models\StockBarangModel();
        $this->BarangModel = new \App\Models\BarangModel();
        $this->POModel = new \App\Models\POModel();
        $this->SOModel = new \App\Models\SOModel();

        $this->BarangModel = new \App\Models\BarangModel();
    }
    public $controller = 'StockBarang';
    public function index()
    {
        $session = session();
        // echo "Welcome back, " . $session->get('username');
        // Cek session
        // $session = session();
        // $username = $session->get('username');
        // if (empty($username)) {
        //     return redirect()->to('/loginAdmin');
        // }        
        $data = [
            // 'data' => $this->StockBarangModel->getKebutuhan(),
            'data' => $this->StockBarangModel->getStockDetail(),
            'dataPO' => $this->POModel->where('status', 0)->findAll(),
            'dataSO' => $this->SOModel->where('status', 0)->findAll(),
            'judul' => $this->controller,
            'data_count' => count($this->StockBarangModel->where("berat_total < rop")->findAll()),
            // 'data_pengeluaran' => $this->StockBarangModel->getPengeluaran(),
        ];
        if (session()->get('status')  == 'Manager Marketing') {
            return view('/Dashboard/index', $data);
        } else {
            return view('StockBarang/index', $data);
        };
    }
    public function Pengeluaran()
    {
    }
}
