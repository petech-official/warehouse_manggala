<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use phpDocumentor\Reflection\Types\This;

class OpenPDF extends BaseController
{
    public $link;
    public function index()
    {
        $judul = $this->request->getVar('link');
        $this->reader($judul);
    }
    public function lihat($judul)
    {
        $this->reader($judul);
    }
    public function reader($judul)
    {
        $filePath = "packing_list/$judul";
        $content = file_get_contents($filePath);
        header('Content-Type: application/pdf');
        header('Content-Length: ' . strlen($content));
        die($content);
    }
}
