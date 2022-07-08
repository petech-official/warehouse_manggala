<?php

namespace App\Controllers;

use \Config\Services\session;


class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->StockBarangModel = new \App\Models\StockBarangModel();
        $this->BarangModel = new \App\Models\BarangModel();
    }
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
            'data' => $this->StockBarangModel->getKebutuhan(),
            // 'data_pengeluaran' => $this->StockBarangModel->getPengeluaran(),
        ];
        return view('dashboard/index', $data);
    }
    public function Pengeluaran()
    {
    }
}
