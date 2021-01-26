<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class BerandaController extends Controller
{
    public function index()
    {
        return view('dashboard.beranda.index');
    }
}
