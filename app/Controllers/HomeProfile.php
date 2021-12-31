<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class HomeProfile extends BaseController
{
    public function index()
    {
        return view('Home/index');
    }
}
