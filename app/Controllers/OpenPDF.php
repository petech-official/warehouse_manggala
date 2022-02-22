<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class OpenPDF extends BaseController
{
    public function index($judul)
    {
        // //memanggil file example.pdf yang berada di folder bernama file
        // $filePath = "packing_list/" . $judul;
        // //Membuat kondisi jika file tidak ada
        // if (!file_exists($filePath)) {
        //     echo "The file $filePath does not exist";
        //     die();
        // }
        // //nama file untuk tampilan
        // $filename = $judul;
        // header('Content-type:application/pdf');
        // header('Content-disposition: inline; filename="' . $filename . '"');
        // header('content-Transfer-Encoding:binary');
        // header('Accept-Ranges:bytes');
        // //membaca dan menampilkan file
        // readfile($filePath);
        $data = [
            'judul' => $judul
        ];
        return view('openPDF/index', $data);
    }
}
