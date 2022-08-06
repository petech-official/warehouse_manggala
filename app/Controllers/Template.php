<?php

namespace App\Controllers;

class Template extends BaseController
{
    public function __construct()
    {
        $this->StockBarangModel = new \App\Models\StockBarangModel();
    }
    public function index()
    {
        return view('template/index');
    }
}
