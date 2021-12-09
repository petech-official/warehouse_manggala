<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        // Cek session
        $session = session();
        $username = $session->get('username');
        if (empty($username)) {
            return redirect()->to('/loginAdmin');
        }

        return view('dashboard/index');
    }
}
