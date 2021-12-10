<?php

namespace App\Controllers;

use \Config\Services\session;

class Dashboard extends BaseController
{
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

        return view('dashboard/index');
    }
}
